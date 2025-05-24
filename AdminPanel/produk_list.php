<?php

require '../function/admin.php';

// if (cekLoginAdmin()  === false) {
//     $_SESSION['pesan'] = "Anda belum masuk!! Silahkan masuk terlebih dahulu!";
//     header('location:../User/login.php');
// }
$kueri  = mysqli_query($con, "SELECT * FROM product ORDER BY id_product DESC");

// hapus data produk
if (isset($_GET['hapus'])) {
  $id = $_GET['hapus'];
  if (hapusProduk($id)) {
      header("Location: produk_list.php?pesan=Produk berhasil dihapus");
      exit;
  } else {
      header("Location: produk_list.php?pesan=Gagal menghapus produk");
      exit;
  }
}
?>


<?php require "tamplate/navbar.php"; ?>

<div id="main-content" class="main-content">
  <div class="conteiner-fluid">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mt-3">
        <li class="breadcrumb-item" aria-current="page">
            <i data-feather="home"></i><a href="../adminpanel/index.php" style="text-decoration:none;"> Home</a> 
        </li>
        <li class="breadcrumb-item active" aria-current="page"><a href="../adminpanel/produk_list.php" style="text-decoration:none;"> Produk</li>
      </ol>
    </nav>
  </div>
</div>

<div id="main-content" class="main-content-produk">
  <div class="card-custom">
    <!-- Judul -->
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h4 class="mb-0">Produk</h4>
    </div>

    <!-- Baris Search & Tambah Produk -->
    <div class="d-flex justify-content-between align-items-center mb-3 produk-toolbar flex-wrap">
      <!-- Search kiri -->
      <div class="input-group" style="max-width: 300px;">
        <input type="search" class="form-control" placeholder="Cari produk..." aria-label="Search">
        <span class="input-group-text bg-primary text-white">
          <i data-feather="search"></i>
        </span>
      </div>

      <!-- Tambah Produk kanan -->
      <a href="tambah_produk.php" class="btn btn-primary">
        <i data-feather="plus" class="me-1"></i> Add Product
      </a>
    </div>

      <div class="table-responsive">
        <table class="table table-hover  align-middle">
          <thead class="table-light">
            <tr>
              <th>Aksi</th>
              <th>Foto</th>
              <th>Brand</th>
              <th>Harga</th>
              <th>Stok</th>
              <th>model</th>
              <th>Create By</th>
              <th>Create Date</th>
              <th>Last Update By</th>
              <th>Last Update Date</th>
            </tr>
          </thead>
          <tbody>
          <?php 
            $no = 1;
            while ($row = mysqli_fetch_object($kueri)) :
              $imageUrl = htmlspecialchars($row->image); 
            ?>
            <tr>
              <td>
                <a href="edit_produk.php?id=<?= $row->id_product ?>" class="btn btn-warning btn-sm">
                  <i data-feather="edit"></i>
                </a>
                <a href="../AdminPanel/produk_list.php?hapus=<?= $row->id_product ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus produk ini?')">
                  <i data-feather="trash"></i>
                </a>
              </td>
              <td><img src="<?= $imageUrl ?>" alt="<?= htmlspecialchars($row->brand) ?>" alt="Produk 1" width="60"></td>
              <td><?= htmlspecialchars($row->brand) ?></td>
              <td>Rp<?= number_format($row->price, 0, ',', '.') ?></td>
                <td><?= $row->stock ?></td>
                <td><?= htmlspecialchars($row->model) ?></td>
                <td><?= htmlspecialchars($row->CreatedBy) ?></td>
                <td><?= htmlspecialchars($row->CreatedDate) ?></td>
                <td><?= htmlspecialchars($row->LastUpdateBy) ?></td>
                <td><?= htmlspecialchars($row->LastUpdateDate) ?></td>                
            </tr>
            <?php endwhile; ?>
            <!-- Tambahkan baris lain -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php require 'tamplate/footer.php'; ?>

