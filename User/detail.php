<?php
require '../function/admin.php';

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
?>

<?php require 'tamplate/header.php' ?>

<?php $produk = $data['produk']; ?>
<section class="py-5 bg-light">
  <div class="container">
    <div class="d-flex flex-md-row flex-column gap-5 product-gallery-wrapper">

      <!-- Product Images -->
      <div class="col-md-6 d-flex justify-content-center align-items-start fade-in">
        <img src="<?= $produk->image ?>" alt="Smartphone" class="img-fluid rounded shadow-sm w-100" style="max-width: 450px;">
      </div>

      <!-- Product Details -->
      <div class="col-md-6 fade-in product-details" style="animation-delay: 0.2s;">
        <h2 class="fw-bold"><?= $produk->brand ?></h2>
        <div class="mb-3">
          <span class="h4 text-primary">Rp<?= number_format($produk->price, 0, ',', '.') ?></span>
        </div>
        <!-- Stock Availability -->
        <div class="mb-3">
          <span class="badge bg-success">Stock: <?= $produk->stock ?></span>
        </div>

        <div class="mb-3">
          <label class="form-label">Jumlah</label>
          <input type="number" class="form-control w-25" value="1" min="1" max="25">
        </div>

        <div class="d-flex gap-2 flex-wrap">
          <button class="btn btn-primary"><i class="bi bi-cart-plus"></i> Tambah ke Keranjang</button>
          <button class="btn btn-outline-secondary"><i class="bi bi-heart"></i> Wishlist</button>
        </div>

        <div class="mt-4 text-muted small">
          <p><strong>Kategori:</strong> Smartphone, Elektronik</p>
          <p>
            <strong>Bagikan:</strong>
            <a href="#" class="text-decoration-none text-primary ms-2"><i data-feather="facebook"></i></a>
            <a href="#" class="text-decoration-none text-info ms-2"><i data-feather="twitter"></i></a>
            <a href="#" class="text-decoration-none text-danger ms-2"><i data-feather="instagram"></i></a>
          </p>
        </div>
      </div>
    </div>

    <!-- Tabs -->
    <ul class="nav nav-tabs mt-5 fade-in" id="productTab" role="tablist" style="animation-delay: 0.4s;">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="desc-tab" data-bs-toggle="tab" data-bs-target="#desc" type="button" role="tab">Deskripsi</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details" type="button" role="tab">Detail</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab">Ulasan</button>
      </li>
    </ul>
    <div class="tab-content pt-3 fade-in" id="productTabContent" style="animation-delay: 0.5s;">
      <div class="tab-pane fade show active" id="desc" role="tabpanel">
        <p><?= $produk->description ?></p>
      </div>

</section>
<?php require 'tamplate/footer.php' ?>