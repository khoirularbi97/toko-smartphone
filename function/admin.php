<?php
session_start();
require '../config/auth.php';
use Aws\S3\S3Client;

function hapusProduk($id)
{
    global $con;

    // 1. Ambil data produk terlebih dahulu (untuk dapatkan nama gambar)
    $query = mysqli_query($con, "SELECT * FROM product WHERE id_product='$id'");
    if (!$query) {
        die("Query SELECT gagal: " . mysqli_error($con));
    }

    $data = mysqli_fetch_assoc($query);
    if (!$data) {
        die("Produk tidak ditemukan.");
    }

    $image = $data['image'];

    // 2. Inisialisasi MinIO
    $s3 = new S3Client([
        'version'     => 'latest',
        'region'      => 'us-east-1',
        'endpoint'    => 'http://127.0.0.1:9000',
        'use_path_style_endpoint' => true,
        'credentials' => [
            'key'    => 'minioadmin',
            'secret' => 'minioadmin',
        ],
    ]);

    $bucket = 'product';

    // 3. Hapus gambar dari MinIO
    try {
        $s3->deleteObject([
            'Bucket' => $bucket,
            'Key'    => basename($image), // hanya nama file, bukan URL penuh
        ]);
    } catch (Exception $e) {
        echo "Gagal menghapus gambar di MinIO: " . $e->getMessage();
        exit;
    }

    // 4. Hapus data dari database
    $delete = mysqli_query($con, "DELETE FROM product WHERE id_product='$id'");
    if (!$delete) {
        die("Gagal menghapus data produk: " . mysqli_error($con));
    }

    header('Location:../adminpanel/produk_list.php?pesan=Produk berhasil dihapus');
    exit;
}




/*
-----------------------------------------------------
|   menyimpan data request post ke dalam array yang | 
|   selanjutnya akan dikirimkan ke fungsivalidasi   |
-----------------------------------------------------
*/
 function tambahProduk($post)
{
    global $con;

    $username = isset($_SESSION['username']) ? $_SESSION['username'] : 'guest';
    // Tangkap file gambar
    $img        = $_FILES['image'];
    $newname   = date('ymdHis') . '-' . str_replace(' ', '', $img['name']); // nama file unik
    $image     = $newname;

    // Tangkap inputan POST, gunakan htmlspecialchars untuk keamanan
    $brand       = htmlspecialchars($post['brand']);
    $model       = htmlspecialchars($post['model']);
    $price       = htmlspecialchars($post['price']);
    $stock       = htmlspecialchars($post['stock']);
    $description = htmlspecialchars($post['description']);
    $companyCode = 'ADM001'; // misalnya, bisa diganti dari session user
    $status      = 1;
    $isDeleted = 0;
    $createdBy = $username;
    $createdDate = date('Y-m-d H:i:s');
    // $lastUpdateBy = $username;
    // $lastUpdateDate = $createdDate;

    // Validasi
    $data = [
        'brand'       => $brand,
        'model'       => $model,
        'price'       => $price,
        'stock'       => $stock,
        'image'       => $img,
        'description' => $description
    ];

    $validasi = _validation($data);
    if (isset($validasi['pesan'])) {
        header('Location:../adminpanel/tambahProduk.php?pesan=' . urlencode($validasi['pesan']));
        exit;
    }

    // Hapus session form sementara
    _hapusSession();

    //bucket minio

    $bucket = 'product';

    $s3 = new S3Client([
        'version'     => 'latest',
        'region'      => 'us-east-1',
        'endpoint'    => 'http://127.0.0.1:9000',
        'use_path_style_endpoint' => true,
        'credentials' => [
            'key'    => 'minioadmin',
            'secret' => 'minioadmin',
        ],
    ]);
    try {
        $result = $s3->putObject([
            'Bucket' => $bucket,
            'Key'    => $newname,
            'SourceFile' => $img['tmp_name'],
            'ACL'    => 'public-read',
            'ContentType' => mime_content_type($img['tmp_name']),
        ]);
        // Ambil URL file yang di-upload
        $imageUrl = $result['ObjectURL'];

        // Simpan ke database
        $query ="INSERT INTO product(id_product,brand, model, price, stock, description, image, CompanyCode, Status, IsDeleted, CreatedBy, CreatedDate) VALUES ('','$brand','$model','$price','$stock','$description','$imageUrl','$companyCode','$status','$isDeleted','$createdBy','$createdDate')";

        mysqli_query($con, $query);

        // Jika berhasil simpan, pindahkan file gambar
        if (mysqli_affected_rows($con)) {
            header('Location:../adminpanel/produk_list.php?pesan=Data berhasil ditambahkan');
            exit;
        } else {
            echo "Terjadi kesalahan saat menyimpan produk ke database.";
            exit;
        }
    } catch (Exception $e) {
        echo "Gagal upload ke MinIO: " . $e->getMessage();
        exit;
    }
}
/*
-----------------------------------------------------
|   menyimpan data ID dan request POST              |
|   dan mengambil data lama di database dan meng    |
|   Updatenya setelah lolos validasi                |
-----------------------------------------------------
*/
function ubahProduk($id, $post)
{
    global $con;

    // Ambil data lama dari DB
    $query = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM product WHERE id_product = '$id'"));
    if (!$query) {
        echo "Produk tidak ditemukan";
        exit;
    }
    
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : 'guest';
    // Tangkap inputan baru
    $img          = $_FILES['image'];
    $brand        = isset($post['brand']) ? htmlspecialchars($post['brand']) : $query['brand'];
    $model        = isset($post['model']) ? htmlspecialchars($post['model']) : $query['model'];
    $price        = isset($post['price']) ? htmlspecialchars($post['price']) : $query['price'];
    $stock        = isset($post['stock']) ? htmlspecialchars($post['stock']) : $query['stock'];
    $description  = isset($post['description']) ? htmlspecialchars($post['description']) : $query['description'];
    $companyCode = 'ADM001'; // misalnya, bisa diganti dari session user
    $status      = 1;
    $isDeleted = 0;
    $lastUpdateBy = $username;
    $lastUpdateDate = date('Y-m-d H:i:s');

    // Validasi
    $data = [
        'brand'       => $brand,
        'model'       => $model,
        'price'       => $price,
        'stock'       => $stock,
        'description' => $description
    ];
    // Jika gambar baru diupload, sertakan untuk validasi
    if ($img['error'] === 0) {
        $data['image'] = $img;
    }

    $validasi = _validation($data);
    if (isset($validasi['pesan'])) {
        header('Location:../adminpanel/edit_produk.php?id=' . $id . '&pesan=' . urlencode($validasi['pesan']));
        exit;
    }


    _hapusSession();

    // Setup MinIO
    $bucket = 'product';

    $s3 = new S3Client([
        'version'     => 'latest',
        'region'      => 'us-east-1',
        'endpoint'    => 'http://127.0.0.1:9000',
        'use_path_style_endpoint' => true,
        'credentials' => [
            'key'    => 'minioadmin',
            'secret' => 'minioadmin',
        ],
    ]);

    // Handle upload jika gambar baru dikirim
    if ($img['error'] === 0) {
        $ext = pathinfo($img['name'], PATHINFO_EXTENSION);
        $newname = date('ymdHis') . '-' . uniqid() . '.' . $ext;

        try {
            // Upload ke MinIO
            $result = $s3->putObject([
                'Bucket' => $bucket,
                'Key'    => $newname,
                'SourceFile' => $img['tmp_name'],
                'ACL'    => 'public-read',
                'ContentType' => mime_content_type($img['tmp_name']),
            ]);

            $imageUrl = $result['ObjectURL'];

            // Hapus gambar lama dari MinIO
            if (!empty($query['image'])) {
                $oldKey = basename($query['image']);
                $s3->deleteObject([
                    'Bucket' => $bucket,
                    'Key'    => $oldKey
                ]);
            }
        } catch (Exception $e) {
            echo "Gagal upload gambar ke MinIO: " . $e->getMessage();
            exit;
        }
    } else {
        // Gambar tidak diganti, gunakan yang lama
        $imageUrl = $query['image'];
    }

    // Update data ke database
    $updateQuery = "UPDATE product SET 
                brand = '$brand',
                model = '$model',
                price = '$price',
                stock = '$stock',
                description = '$description',
                image = '$imageUrl',
                companyCode = '$companyCode',
                status = $status,
                isDeleted = $isDeleted,
                lastUpdateBy = '$lastUpdateBy',
                lastUpdateDate = '$lastUpdateDate'
            WHERE id_product = '$id'";

    if (mysqli_query($con, $updateQuery)) {
        header('Location: produk_list.php?pesan=Data berhasil diperbarui');
        exit;
    } else {
        echo "Tidak ada perubahan data atau gagal memperbarui.";
        exit;
    }
}

/*
-----------------------------------------------------
|   Mengambil data produk sesuai dengan ID          | 
|   dan menyimpannya ke suatu Array Objek           |
-----------------------------------------------------
*/
function detailProduk($id)
{
    global $con;

    $kueri = mysqli_query($con, "SELECT * FROM product WHERE id_product='$id'");

    // Jika tidak ditemukan
    if (!$kueri || mysqli_num_rows($kueri) == 0) {
        return [
            'true' => false,
            'pesan' => 'Produk tidak ditemukan'
        ];
    }

    $produk = mysqli_fetch_object($kueri);

    
    $minioBaseUrl = 'http://127.0.0.1:9000'; // Sesuaikan jika kamu pakai domain
    $bucketName = 'product';

    if (!empty($produk->image)) {
        $produk->gambar_url = $minioBaseUrl . '/' . $bucketName . '/' . ltrim($produk->image, '/');
    } else {
        $produk->gambar_url = '';
    }

    return [
        'true'   => true,
        'produk' => $produk
    ];
}

function tambahCategory($post)
{
    global $con;

    $username = isset($_SESSION['username']) ? $_SESSION['username'] : 'guest';

    // Tangkap inputan POST, gunakan htmlspecialchars untuk keamanan
    $namaCat     = htmlspecialchars($post['nama_cat']);
    $companyCode = 'ADM001'; // misalnya, bisa diganti dari session user
    $status      = 1;
    $isDeleted = 0;
    $createdBy = $username;
    $createdDate = date('Y-m-d H:i:s');

    // Simpan ke database
    $query ="INSERT INTO category(id_cat,nama_cat,CompanyCode, Status, IsDeleted, CreatedBy, CreatedDate) VALUES ('','$namaCat','$companyCode','$status','$isDeleted','$createdBy','$createdDate')";
    $result = mysqli_query($con, $query);

        // Jika berhasil simpan, pindahkan file gambar
        if (mysqli_affected_rows($result)) {
            header('Location:../AdminPanel/category_list.php?pesan=Data berhasil ditambahkan');
            exit;
        } else {
            echo "Terjadi kesalahan saat menyimpan produk ke database.";
            exit;
        }
}

?>