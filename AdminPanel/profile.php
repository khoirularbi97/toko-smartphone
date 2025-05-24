<?php 
require "tamplate/navbar.php";

// require '../config/auth.php';

//  if (cekLoginAdmin()  === false) {
//     $_SESSION['pesan'] = "Anda belum masuk!! Silahkan masuk terlebih dahulu!";
//     header('location:../User/login.php');
// }
?>

<div id="main-content" class="main-content">
    <div class="container py-5">
      <div class="row g-4">
        <!-- Sidebar -->
        <div class="col-md-4">
          <div class="card-custom text-center">
            <img src="../image/eren.jpeg" alt="Profile" class="profile-img mb-5">
            <h5 class="icon-text">Nathaniel Poole</h5>
            <p class="text-muted"></i> 0857-0000-0000</p>
            <p class="text-muted mb-3"></i> nathaniel@gmail.com</p>
          </div>
        </div>
    
        <!-- Main Form -->
        <div class="col-md-8">
          <div class="card-custom">
            <ul class="nav nav-tabs mb-4">
              <li class="nav-item">
                <a class="nav-link" href="#"><i data-feather="settings"></i> Account Settings</a>
              </li>
              <li class="nav-item"><a class="nav-link" href="#"><i data-feather="bell"></i> Notifications</a></li>
            </ul>
            
            <form>
              <div class="row mb-3">
                <div class="col-md-12">
                  <label class="form-label">First Name</label>
                  <input type="text" class="form-control" value="Nathaniel">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <label class="form-label">Phone Number</label>
                  <input type="text" class="form-control" value="+1800-000">
                </div>
                <div class="col-md-6">
                  <label class="form-label">Email address</label>
                  <input type="email" class="form-control" value="nathaniel.poole@microsoft.com">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-4">
                  <label class="form-label">City</label>
                  <input type="text" class="form-control" value="Bridgeport">
                </div>
                <div class="col-md-4">
                  <label class="form-label">State/County</label>
                  <input type="text" class="form-control" value="WA">
                </div>
                <div class="col-md-4">
                  <label class="form-label">Postcode</label>
                  <input type="text" class="form-control" value="31005">
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label">Country</label>
                <input type="text" class="form-control" value="United States">
              </div>
              <button type="submit" class="btn btn-primary icon-text"><i data-feather="save"></i> Update</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
<?php require 'tamplate/footer.php'; ?>