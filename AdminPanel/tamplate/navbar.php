<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ephone Store</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../asset/css/custom.css">

  <link rel="icon" type="image/x-icon" href="../img/2.png">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Feather Icons -->
  <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>

  <?php if (isset($_SESSION['pesan'])) : ?>
    <div id="pesan" data-pesan="<?= $_SESSION['pesan'] ?>"></div>
  <?php endif; ?>
  <?php unset($_SESSION['pesan']) ?>

  <!-- Navbar -->
  <nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid d-flex justify-content-between">
      <!-- Left section -->
      <div class="d-flex align-items-center">
        <button id="toggleSidebar" class="btn btn-outline-light me-3">
          <i data-feather="menu"></i>
        </button>
        <img src="../img/2.png" class="img-fluid rounded logo-white" style="max-width: 50px;">
        <a class="navbar-brand mb-0 h1" href="index.php">ePhone Store</a>
      </div>

      <!-- Right section: My Account dropdown -->
      <div class="dropdown">
        <button class="btn btn-outline-light dropdown-toggle d-flex align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="../img/blank-user-circles.png" class="img-fluid rounded-circle me-3" style="max-width: 40px;"><?= $_SESSION['username'] ?>
        </button>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item" href="profile.php">Profile</a></li>
          <li><a class="dropdown-item" href="#">Settings</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="../User/logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Sidebar -->
  <div id="sidebar">
    <a href="index.php" class="d-block mb-2 text-white"><i data-feather="home" class="me-2"></i>Home</a>
    <a href="statistik.php" class="d-block mb-2 text-white"><i data-feather="pie-chart" class="me-2"></i>Statistics</a>
    <a href="#" class="d-block mb-2 text-white"><i data-feather="layers" class="me-2"></i>Category</a>
    <a href="produk_list.php" class="d-block mb-2 text-white"><i data-feather="smartphone" class="me-2"></i>Product</a>
    <a href="order_list.php" class="d-block mb-2 text-white"><i data-feather="shopping-bag" class="me-2"></i>Orders</a>
    <a href="#" class="d-block mb-2 text-white"><i data-feather="tag" class="me-2"></i>Promo</a>

  </div>

  <!-- Overlay -->
  <div id="sidebar-overlay"></div>

  <!-- Main Content -->