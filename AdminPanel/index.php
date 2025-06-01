
<?php 
session_start();
require "tamplate/navbar.php";
require '../config/auth.php';

 if (cekLoginAdmin()  != true) {
    $_SESSION['pesan'] = "Anda belum masuk!! Silahkan masuk terlebih dahulu!";
    header('location:../User/login.php');
}
?>

<!-- Main Content -->
<?php
$queryCategory = "SELECT * FROM category";
$resultCategory = mysqli_query($con, $queryCategory);
$jumlahCategory = mysqli_num_rows($resultCategory);

$queryProduct = "SELECT * FROM product";
$resultProduct = mysqli_query($con, $queryProduct);
$jumlahproduct = mysqli_num_rows($resultProduct);
?>
<div id="main-content" class="main-content-index">
  <div class="container mt-5">
    <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <i data-feather="home"></i> Home
                    </li>
                </ol>
            </nav>

    <div class="container mt-5">
      <div class="row d-flex flex-wrap">
        
        <!-- Kategori -->
        <div class="col-1-5 mb-3">
          <div class="summery-box summery-kategory">
            <div class="row">
              <div class="col-5 d-flex justify-content-center align-items-center">
                <i data-feather="list" class="feather-icon"></i> <!-- Feather Icon -->
              </div>
              <div class="col-7">
                <h3>Kategori</h3>
                <p><?php echo $jumlahCategory?> Kategori</p>
                <a href="category_list.php" class="text-white no-decoration">Lihat Detail</a>
              </div>
            </div>
          </div>
        </div>
       
        <!-- Produk -->
        <div class="col-1-5 mb-3">
          <div class="summery-box summery-produk">
            <div class="row">
              <div class="col-5 d-flex justify-content-center align-items-center">
                <i data-feather="box" class="feather-icon"></i> <!-- Feather Icon -->
              </div>
              <div class="col-7">
                <h3>Produk</h3>
                <p><?php echo $jumlahproduct?> Produk</p>
                <p><a href="produk_list.php" class="text-white no-decoration">Lihat Detail</a></p>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Orders -->
        <div class="col-1-5 mb-3">
          <div class="summery-box summery-order">
            <div class="row">
              <div class="col-5 d-flex justify-content-center align-items-center">
                <i data-feather="shopping-cart" class="feather-icon"></i> <!-- Feather Icon -->
              </div>
              <div class="col-7">
                <h3>Orders</h3>
                <p>20 Order</p>
                <p><a href="order-list2.php" class="text-white no-decoration">Lihat Detail</a></p>
              </div>
            </div>
          </div>
        </div>

        <!-- Promo -->
        <div class="col-1-5 mb-3">
          <div class="summery-box summery-promo">
            <div class="row">
              <div class="col-5 d-flex justify-content-center align-items-center">
                <i data-feather="tag" class="feather-icon"></i> <!-- Feather Icon -->
              </div>
              <div class="col-7">
                <h3>Promo</h3>
                <p>5 Promo</p>
                <p><a href="promo.php" class="text-white no-decoration">Lihat Detail</a></p>
              </div>
            </div>
          </div>
        </div>

        <!-- Statistik -->
        <div class="col-1-5 mb-3">
          <div class="summery-box summery-statistik">
            <div class="row">
              <div class="col-5 d-flex justify-content-center align-items-center">
                <i data-feather="bar-chart-2" class="feather-icon"></i> <!-- Feather Icon -->
              </div>
              <div class="col-7">
                <h3>Statistik</h3>
                <p>------</p>
                <p><a href="statistik2.php" class="text-white no-decoration">Lihat Detail</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="main-content" class="main-content-statistik">
        <div class="row g-4 align-items-stretch">
            <!-- Revenue Chart - 50% -->
            <div class="col-md-6"> <!-- Kolom untuk chart revenue menjadi 50% -->
                <div class="card-custom">
                    <h6 class="mb-3">Revenue</h6>
                    <div class="chart-container">
                    <canvas id="revenueChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Customers Pie Chart - 50% -->
            <div class="col-md-6"> 
                <div class="card-custom center-text">
                    <h6 class="mb-3">Customers</h6>
                        <div class="piechart-container">
                        <canvas id="customerChart"></canvas>
                        </div>
                    <div class="mt-3">
                        <p><span class="text-success fw-bold">+18%</span> Daily</p>
                        <p><span class="text-danger fw-bold">+14%</span> Weekly</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require 'tamplate/footer.php'; ?>
  

