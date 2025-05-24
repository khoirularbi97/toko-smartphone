<?php 
require "tamplate/navbar.php";

// require '../config/auth.php';

//  if (cekLoginAdmin() === false) {
//     $_SESSION['pesan'] = "Anda belum masuk!! Silahkan masuk terlebih dahulu!";
//     header('location:../User/login.php');
// }
?>

<div id="main-content" class="main-content">
    <h3 class="mb-2 ms-4 mt-4">Order List</h3>
</div>
<div id="main-content" class="main-content-order">
  <div class="card-custom">
    <h4 class="mb-4">Order History</h4>

    <!-- Tabs -->
    <ul class="nav nav-tabs mb-3">
        <li class="nav-item">
            <a class="nav-link active" href="#">All Order</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#">Summary</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#">Completed</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#">Cancelled</a>
        </li>
    </ul>

    <!-- Date Range + Tombol -->
    <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-3">
      <!-- Range tanggal -->
      <div class="d-flex gap-2">
        <input type="date" class="form-control" />
        <input type="date" class="form-control" />
      </div>

      <!-- Tombol aksi -->
      <div class="d-flex gap-2">
        <button class="btn btn-outline-secondary border-gray">
          <i data-feather="printer" class="me-1"></i> Print
        </button>
        <button class="btn btn-outline-secondary border-gray-excel">
          <i data-feather="file-text" class="me-1"></i> Excel
        </button>
      </div>
    </div>

    <!-- Table -->
    <div class="table-responsive">
      <table class="table table-hover align-middle">
        <thead class="table-light">
          <tr>
            <th>Action</th>
            <th>Id</th>
            <th>Name</th>
            <th>Payment</th>
            <th>Time remaining</th>
            <th>Type</th>
            <th>Status</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
                <button class="btn btn-sm btn-outline-primary me-2">
                    <i data-feather="edit"></i>
                </button>
                <button class="btn btn-sm btn-outline-danger">
                    <i data-feather="trash"></i>
                </button>
            </td>
            <td>#2632</td>
            <td><img src="https://i.pravatar.cc/30?u=1" class="rounded-circle me-2" width="30"> Brooklyn Zoe</td>
            <td>Cash</td>
            <td>13 min</td>
            <td class="text-danger">Delivery</td>
            <td><span class="badge bg-warning text-dark">Delivered</span></td>
            <td>£12.00</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php require 'tamplate/footer.php'; ?>


