<?php

require '../function/admin.php';



//  if (cekLoginAdmin()  === false) {
//     $_SESSION['pesan'] = "Anda belum masuk!! Silahkan masuk terlebih dahulu!";
//     header('location:../User/login.php');
// }

// Cek apakah ID tersedia
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = detailProduk($id);

    if (!$data['true']) {
        echo "<div style='text-align:center; margin-top:20px; color:red;'>{$data['pesan']}</div>";
        exit;
    }

    $produk = $data['produk'];
} else {
    echo "<div style='text-align:center; margin-top:20px; color:red;'>ID produk tidak ditemukan di URL.</div>";
    exit;
}
if (isset($_POST['ubah'])) {
    ubahProduk($id, $_POST);
}
?>

  
  <?php require "tamplate/navbar.php"; ?>
  <?php $produk = $data['produk']; ?>
  
<div id="main-content" class="main-content">
  <div class="container mt-5">
    <!-- Judul halaman -->
    <h3 class="mb-4">
      <i data-feather="edit-3" class="me-2"></i>Edit Produk
    </h3>
      <!-- Form Section -->
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <form action="" method="POST" enctype="multipart/form-data" class="form-section">
            <input type="hidden" name="product_id" value="<?= htmlspecialchars($produk->id_product ?? '') ?>">

            <div class="row g-4">
              <!-- Kolom Kiri: Gambar Produk -->
              <div class="col-md-4">
                <div class="img-container">
                  <img id="preview" src="<?= $produk->image ?>" alt="Preview Produk" class="img-fluid img-preview">
                </div>

                <!-- Upload Gambar -->
                <div class="mb-3">
                  <label class="form-label">Ganti Gambar Produk</label>
                  <input class="form-control" type="file" name="image" accept="image/*" onchange="previewImage(event)">
                </div>
              </div>

              <!-- Kolom Kanan: Form Input -->
              <div class="col-md-8">
                <div class="mb-3">
                  <label for="brand" class="form-label">Nama Produk</label>
                  <input type="text" class="form-control" id="brand" name="brand" value="<?= htmlspecialchars($produk->brand ?? '') ?>" required>
                </div>

                <div class="mb-3">
                  <label for="model" class="form-label">model</label>
                  <input type="text" class="form-control" id="model" name="model" value="<?= htmlspecialchars($produk->model ?? '') ?>" required>
                </div>

                <div class="mb-3">
                  <label for="price" class="form-label">Harga (Rp)</label>
                  <input type="text"  class="form-control" id="price" name="price" value="<?= $produk->price ?>" required>
                </div>

                <div class="mb-3">
                  <label for="stock" class="form-label">Stok</label>
                  <input type="number" class="form-control" id="stock" name="stock" value="<?= $produk->stock ?>" required>
                </div>


                <div class="mb-3">
                  <label for="description" class="form-label">Deskripsi</label>
                  <textarea class="form-control" id="description" name="description" rows="5"><?= htmlspecialchars($produk->description) ?></textarea>
                </div>
              </div>
            </div>

            <!-- Tombol -->
            <div class="text-end mt-4">
            <a href="produk_list.php" class="btn btn-outline-secondary me-2">
              <i data-feather="arrow-left"></i> Cancel
            </a>
            <button type="submit" class="btn btn-primary" name="ubah">
              <i data-feather="save"></i> Save
            </button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>

<?php require 'tamplate/footer.php'; ?>
