<?php 
require 'tamplate/navbar.php';

// if (cekLoginAdmin()  === false) {
//     $_SESSION['pesan'] = "Anda belum masuk!! Silahkan masuk terlebih dahulu!";
//     header('location:../User/login.php');
// }
?>
<div id="main-content" class="main-content">
    <h3 class="mb-2 ms-4 mt-4">Statistik</h3>
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
    <?php require 'tamplate/footer.php';?>