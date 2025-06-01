<?php
require 'conections.php';
require_once '../vendor/autoload.php';


function login($post)
{
    global $con;
    $email = $post['email'];
    $password = $post['password'];

    $verify_query = mysqli_query($con, "SELECT * FROM users WHERE email = '$email'");
    if (mysqli_num_rows($verify_query) > 0) {
        $data = mysqli_fetch_object($verify_query);
        $verify = password_verify($password, $data->password);
        if ($verify === true) {
            $_SESSION['iduser'] = $data ->id_user;
            $_SESSION['username'] = $data ->username;
            $_SESSION['email'] = $data ->email;
            $_SESSION['role'] = $data ->role;

            if ($data->role == 'admin'){
                header('location: ../adminpanel/index.php');
            }else{
                header('location: index.php');
                exit;
            }
        }else{
            $_SESSION['pesan'] = "Password yang anda masukkan tidak sesuai!";
            

        }
    }else{
        $_SESSION['pesan'] ='Email tidak ditemukan!';

        
    }
    return;
}

function register($post)
{
    global $con;
    $username = htmlspecialchars($post['username']);
    $email = htmlspecialchars($post['email']);
    $password = htmlspecialchars($post['password']);
    $role = 'user';
    $oauth_id = null;
    $status = 'active';
    $companyCode = 'COMP001';
    $isDeleted = 0;
    $createdBy = $username;
    $createdDate = date('Y-m-d H:i:s');
    $lastUpdateBy = $createdBy;
    $lastUpdateDate = $createdDate;

    //validasi form input
    if (empty($username)) {
        $_SESSION['pesan'] ='Username harus diisi!';
        return;
    }
    if (empty($email)) {
         $_SESSION['pesan'] ='Email harus diisi!';
        return;
    }
    if (empty($password)) {
         $_SESSION['pesan'] ='Password harus diisi!';
        return;
    }

    $cek = mysqli_query($con, "SELECT * FROM users WHERE username = '$username' OR email = '$email'");
    if (mysqli_num_rows($cek) > 0) {
        $data = mysqli_fetch_assoc($cek);
        if ($data['username'] == $username) {
            $_SESSION['pesan'] ='Username sudah digunakan!';
            
        } elseif ($data['email'] == $email) {
           $_SESSION['pesan'] ='Email sudah terdaftar!';
            
        }
        return;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambah user baru ke database
    $sql ="INSERT INTO users (username, password, email, role, oauth_id, Status, CompanyCode, IsDeleted, CreatedBy, CreatedDate, LastUpdateBy, LastUpdateDate ) VALUES ('$username', '$password', '$email', '$role', NULL, '$status', '$companyCode', '$isDeleted', '$createdBy', '$createdDate', '$lastUpdateBy', '$lastUpdateDate' )";

    // Eksekusi query
    if (mysqli_query($con, $sql)) {
        $_SESSION['sukses'] = 'Akun berhasil dibuat';
        return header('location:../User/login.php');
    } else {
        $_SESSION['pesan'] = 'Gagal menyimpan data';
    }

    mysqli_close($con);


}

// login with google

//init configuration
$clientID = '350470421079-fr877s4e8jjadc6cgkhgqfspl33olq5l.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/toko-smartphone/User/login.php';

//creat client request to access google api
$client = new Google_Client();
$client ->setClientId($clientID);
$client ->setClientSecret($clientSecret);
$client ->setRedirectUri($redirectUri);
$client ->addScope("email");
$client ->addScope("profile");

/*
---------------------------------------------------------
|       konfigurasi minio aws sdk client                |
--------------------------------------------------------- 
*/
use Aws\S3\S3Client;

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
$objects = $s3->listObjects([
    'Bucket' => 'smartphone',
]);

/*
---------------------------------------------------------
|   Menambahkan validasi kesetiap form                  |
--------------------------------------------------------- 
*/
function _validation($data)
{
    //membuat penyimapanan data semetara agar Inputan yang diketikkan tidak hilang,
    //ketika validasi ada yang gagal
    $_SESSION['brand'] = $data['brand'];
    $_SESSION['price'] = $data['price'];
    $_SESSION['stock'] = $data['stock'];
    $_SESSION['description'] = $data['description'];

   // Validasi hanya jika field ada (saat proses edit, field bisa kosong karena tidak diedit)
    if (isset($data['brand']) && trim($data['brand']) === '') {
        return ['pesan' => 'Masukkan brand dengan benar'];
    }
    if (isset($data['price']) && trim($data['price']) === '') {
        return ['pesan' => 'Masukkan nilai price dengan benar'];
    }
    if (isset($data['stock']) && trim($data['stock']) === '') {
        return ['pesan' => 'Masukkan nilai stok dengan benar'];
    }
    if (isset($data['description']) && trim($data['description']) === '') {
        return ['pesan' => 'Deskripsi wajib diisi'];
    }

    // Validasi gambar hanya jika user upload gambar baru
    if (isset($data['image']) && $data['image']['error'] != 4) {
        $allowed = ['image/jpg', 'image/jpeg', 'image/png'];
        if (!in_array($data['image']['type'], $allowed)) {
            return ['pesan' => 'Pilih ekstensi gambar ( JPEG, JPG, PNG )'];
        }
    }

return true;
}



function _hapusSession()
{
    //ketika data lolos dari validasi maka session akan dihapus
    if (isset($_SESSION['brand'])) {
        unset($_SESSION['brand']);
    }
    if (isset($_SESSION['price'])) {
        unset($_SESSION['price']);
    }
    if (isset($_SESSION['stock'])) {
        unset($_SESSION['stock']);
    }
    if (isset($_SESSION['description'])) {
        unset($_SESSION['description']);
    }
}

//Cek apa user telah Login
    function cekLogin()
    {

        if (isset($_SESSION['email'])) {
            return true;
        }
        return false;
    }
    function cekLoginAdmin()
    {

        if (isset($_SESSION['email']) && isset($_SESSION['role'])) {
            if ($_SESSION['role'] === 'admin')
                return true;
        }
        return false;
    }
?>