<?php require 'tamplate/header.php'?>
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
            <div class="col-sm-6 col-md-4 col-lg-4" data-category="Smartphone" data-brand="Samsung" data-rating="4" data-price="18499000">
                <div class="card store-card h-100 shadow-sm">
                <img src="../img/realme-note-60.jpg" class="card-img-top product-img" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Samsung Galaxy S24 Ultra</h5>
                    <p class="card-text text-primary fw-semibold">Rp18.499.000</p>
                    <a href="#" class="btn btn-outline-primary mt-auto">Lihat Detail</a>
                </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4" data-category="Smartphone" data-brand="Apple" data-rating="5" data-price="20999000">
                <div class="card store-card h-100 shadow-sm">
                <img src="../img/oppo-reno6.jpg" class="card-img-top product-img" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">iPhone 15 Pro Max</h5>
                    <p class="card-text text-primary fw-semibold">Rp20.999.000</p>
                    <a href="#" class="btn btn-outline-primary mt-auto">Lihat Detail</a>
                </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4" data-category="Smartphone" data-brand="Xiaomi" data-rating="4" data-price="13599000">
                <div class="card store-card h-100 shadow-sm">
                <img src="../img/vivo-y100.jpg" class="card-img-top product-img" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Xiaomi 14 Ultra</h5>
                    <p class="card-text text-primary fw-semibold">Rp13.599.000</p>
                    <a href="#" class="btn btn-outline-primary mt-auto">Lihat Detail</a>
                </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4" data-category="Smartphone" data-brand="OPPO" data-rating="3" data-price="11499000">
                <div class="card store-card h-100 shadow-sm">
                <img src="../img/oppo-reno6.jpg" class="card-img-top product-img" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">OPPO Find X7</h5>
                    <p class="card-text text-primary fw-semibold">Rp11.499.000</p>
                    <a href="#" class="btn btn-outline-primary mt-auto">Lihat Detail</a>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</section>
<?php require 'tamplate/footer.php'?>