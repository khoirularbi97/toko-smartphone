<?php
session_start();
require '../function/product.php';

$data = produk();
$produk = $data['produk'];
?>

<?php require 'tamplate/header.php' ?>

<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3">
                <div class="filter-sidebar">
                    <h5>Filter</h5>
                    <div class="mb-3">
                        <label class="form-label">Brand</label>
                        <div class="form-check">
                            <input class="form-check-input filter-input" type="checkbox" data-filter="brand" value="Samsung" id="samsung">
                            <label class="form-check-label" for="samsung">Samsung</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input filter-input" type="checkbox" data-filter="brand" value="Apple" id="apple">
                            <label class="form-check-label" for="apple">Apple</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input filter-input" type="checkbox" data-filter="brand" value="Xiaomi" id="xiaomi">
                            <label class="form-check-label" for="xiaomi">Xiaomi</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Penilaian</label>
                        <div class="form-check">
                            <input class="form-check-input filter-input" type="checkbox" data-filter="rating" value="4" id="rate4">
                            <label class="form-check-label" for="rate4">4 Bintang ke atas</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input filter-input" type="checkbox" data-filter="rating" value="3" id="rate3">
                            <label class="form-check-label" for="rate3">3 Bintang ke atas</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga (max Rp)</label>
                        <input id="priceRange" type="range" class="form-range" min="1000000" max="25000000" step="100000" value="25000000">
                        <small id="priceLabel" class="text-muted">Rp25.000.000</small>
                    </div>
                    <div class="d-grid">
                        <button id="clearFilters" class="btn btn-outline-danger btn-sm">Hapus Semua</button>
                    </div>
                </div>
            </div>
            <!-- produk list -->
            <div class="col-lg-9">
                <div class="row g-4" id="productList">

                    <?php foreach ($produk as $product) : ?>
                        <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="card store-card h-100 shadow-sm">
                                <img src="<?= $product->image ?>" class="card-img-top product-img" alt="...">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title"><?= $product->brand ?> <?= $product->model ?></h5>
                                    <p class="card-text text-primary fw-semibold">Rp<?= number_format($product->price, 0, ',', '.') ?></p>
                                    <a href="detail.php?id=<?= $product->id_product ?>" class="btn btn-outline-primary mt-auto">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require 'tamplate/footer.php' ?>