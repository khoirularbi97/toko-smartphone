<?php
session_start();
require 'tamplate/header.php';
require '../config/auth.php';
require '../config/home.php';

// List semua objek di bucket
$produk = home()['produk'];

$images = [];
if (isset($objects['Contents'])) {
    foreach ($objects['Contents'] as $object) {
        $images[] = "http://127.0.0.1:9000/smartphone/" . $object['Key'];
    }
}
?>
    <section class="hero-fluid mb-5">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php foreach ($images as $index => $imgUrl): ?>
                    <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                        <img src="<?= $imgUrl ?>" width="1399" height="500" class="d-block w-100" alt="...">
                    </div>
                    <?php endforeach; ?>
                </div>  
                <<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        <div class="logo-container mt-5">
            <div class="container-fluid">
                <div class="row justify-content-center align-items-center">
                    <div class="col-4 col-sm-2 mb-3">
                    <a href="#" target="_blank">
                        <img src="../img/logo/samsung.png" alt="Samsung">
                    </a>
                    </div>
                    <div class="col-4 col-sm-2 mb-3">
                    <a href="#" target="_blank">
                        <img src="../img/logo/xiaomi.png" alt="Xiaomi">
                    </a>
                    </div>
                    <div class="col-4 col-sm-2 mb-3">
                    <a href="#" target="_blank">
                        <img src="../img/logo/huawei.png" alt="Huawei">
                    </a>
                    </div>
                    <div class="col-4 col-sm-2 mb-3">
                    <a href="#" target="_blank">
                        <img src="../img/logo/Infinix.png" alt="Infinix">
                    </a>
                    </div>
                    <div class="col-4 col-sm-2 mb-3">
                    <a href="#" target="_blank">
                        <img src="../img/logo/oppo.png" alt="Oppo">
                    </a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    require 'catalog.php';
    include 'contact.php';
    require 'tamplate/footer.php';
    ?>
