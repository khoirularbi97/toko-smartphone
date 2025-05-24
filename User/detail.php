<?php
session_start();
require '../function/detail.php';

if (isset($_GET['id'])) {
    $produk = detail($_GET['id'])['produk'];
    $judul = detail($_GET['id'])['judul'];
}
?>

<?php require'tamplate/header.php'?>

<section class="py-5 bg-light">
  <div class="container">
    <div class="d-flex flex-md-row flex-column gap-5 product-gallery-wrapper">

      <!-- Product Images -->
      <div class="col-md-6 d-flex justify-content-center align-items-start fade-in">
        <img src="../img/oppo-reno6.jpg" alt="Smartphone" class="img-fluid rounded shadow-sm w-100" style="max-width: 450px;">
      </div>

      <!-- Product Details -->
      <div class="col-md-6 fade-in product-details" style="animation-delay: 0.2s;">
        <h2 class="fw-bold": <?= $product->brand ?>></h2>
        <div class="mb-2 text-warning">
          ★★★★☆ <span class="text-muted small">(10 reviews)</span>
        </div>
        <div class="mb-3">
          <span class="h4 text-primary">Rp18.499.000</span>
          <del class="text-muted ms-2">Rp19.999.000</del>
          <span class="badge bg-danger ms-2">-8%</span>
        </div>
        <!-- Stock Availability -->
        <div class="mb-3">
          <span class="badge bg-success">In Stock: 25</span>
        </div>
        <p class="text-muted">
          Ditenagai Snapdragon 8 Gen 3, kamera 200MP, layar AMOLED 6.8", baterai 5000mAh. Siap menunjang produktivitas dan hiburan Anda.
        </p>

        <div class="mb-3">
          <label class="form-label">Warna</label>
          <select class="form-select">
            <option>Hitam</option>
            <option>Putih</option>
            <option>Violet</option>
          </select>
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
            <a href="#" class="text-decoration-none text-primary ms-2"><i data-feather ="facebook"></i></a>
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
        <p>Smartphone flagship dengan performa tinggi dan fitur canggih. Cocok untuk kebutuhan fotografi, gaming, hingga multitasking berat.</p>
      </div>
      <div class="tab-pane fade" id="details" role="tabpanel">
        <p>Layar AMOLED 6.8", Refresh rate 120Hz, Chipset Snapdragon 8 Gen 3, RAM 12GB, Kamera utama 200MP, Baterai 5000mAh dengan fast charging 45W.</p>
      </div>
      <div class="tab-pane fade" id="reviews" role="tabpanel">
        <p>⭐⭐⭐⭐⭐ "Smartphone terbaik yang pernah saya miliki!" - Andi</p>
        <p>⭐⭐⭐⭐ "Performa kencang, tapi agak panas saat gaming." - Rina</p>
      </div>
    </div>
  </div>
</section>
<?php require 'tamplate/footer.php'?>
