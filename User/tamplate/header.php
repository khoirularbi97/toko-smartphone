<!-- Top Header -->
 <!DOCTYPE html>
 <html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="../asset/css/user.css">
    <link rel="icon" type="image/x-icon" href="../img/2.png">
    <script src="https://unpkg.com/feather-icons"></script>


    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

  <title>ephone Store</title>
 </head>
 <body>
 <header>
    <!-- MAIN HEADER -->
    <div id="header" class="main-header bg-dark text-white py-3">
        <div class="container">
            <div class="row align-items-center">
                <!-- LOGO -->
                <div class="col-12 col-md-3 d-flex align-items-center justify-content-center justify-content-md-start mb-2 mb-md-0">
                  <a href="../User/index.php" class="header-logo me-2">
                      <img src="../img/2.png" alt="Logo" class="img-fluid" style="max-height: 50px;">
                  </a>
                  <span class="store-name mb-0">ePhone Store</span>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-12 col-md-6 mb-2 mb-md-0">
                  <div class="header-search">
                    <form>
                        <div class="input-group">
                            <input class="form-control" placeholder="Search here">
                            <button class="btn btn-primary search-btn">
                                <i class="fa fa-search"></i> Search
                            </button>
                        </div>
                    </form>
                  </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-12 col-md-3 d-flex justify-content-center justify-content-md-end">
                <!-- Cart Dropdown -->
                <div class="dropdown me-3">
                    <a class="dropdown-toggle text-white text-decoration-none d-flex align-items-center" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-shopping-cart top-header-icon me-1"></i> Cart
                        <span class="badge bg-secondary ms-1"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">View Cart</a></li>
                        <li><a class="dropdown-item" href="#">Checkout</a></li>
                    </ul>
                </div>
                <div class="dropdown">
                    <?php if (isset($_SESSION['username'])): ?>
                        <a class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="accountDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user top-header-icon me-1"></i> <?= $_SESSION['username'] ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
                            <li><a class="dropdown-item" href="../user/logout.php"><i class="fa fa-sign-out me-2"></i>Logout</a></li>
                        </ul>
                    <?php else: ?>
                        <a class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="accountDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user top-header-icon me-1"></i> My Account
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
                            <li><a class="dropdown-item" href="../user/login.php"><i class="fa fa-sign-in me-2"></i>Login</a></li>
                            <li><a class="dropdown-item" href="../user/register.php"><i class="fa fa-user-plus me-2"></i>Register</a></li>
                        </ul>
                    <?php endif; ?>
                </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
        </div>
    </div>
    <!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->

<!-- NAVIGATION -->
<nav id="navigation" class="navbar navbar-expand-lg navbar-light bg-white border-bottom border-secondary">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Hot Deals</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="produk.php">Product</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="#">Phone Credit</a>
                </li>
                
              </ul>
        </div>
    </div>
</nav>