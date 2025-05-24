<?php
session_start();
require '../config/auth.php';

if(isset($_POST['submit'])){
    register($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Z7N87ApWNUK3d3Q4FEwF+0c6wT+EYjQ+ODZoYXdTYWqDwvHqRS1wz0CtbT8Q2fU9Rp1VcgQXUBdT+2zD8Yc1xw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../asset/css/custom.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <title>Register</title>
</head>
<body>
    <?php if (isset($_SESSION['pesan'])) : ?>
        <div id="pesan" data-pesan="<?= $_SESSION['pesan'] ?>"></div>
        <?php unset($_SESSION['pesan']) ?>
    <?php endif; ?>
    
    <?php if (isset($_SESSION['sukses'])) : ?>
        <div id="sukses" data-sukses="<?= $_SESSION['sukses'] ?>"></div>
        <?php unset($_SESSION['sukses']) ?>
    <?php endif; ?>
<div class="form">
    <form action="" method="POST">
        <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <div class="row border rounded-5 p-3 bg-white shadow box-area">
                <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column">
                    <div class="featured-image">
                        <img src="../img/1.jpg" class="img-fluid" style="width: 500px;">
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="row align-items-center">
                        <div class="header-text text-center mb-4">
                            <h2>Register</h2>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name ='username' class="form-control form-control-lg bg-light fs-6" placeholder="Username">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name ='email' class="form-control form-control-lg bg-light fs-6" placeholder="Email address">
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name = 'password' class="form-control form-control-lg bg-light fs-6" placeholder="Password">
                        </div>                                   
                        <div class="input-group mb-3">
                            <button class="btn btn-lg btn-primary w-100 fs-6" name="submit" type="submit">Register</button>

                        </div>                    
                        <div class="row">
                            <small>Already have an account? <a href="login.php">Sign In</a></small>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </form>
</div>
<script>
    $(document).ready(function () {
    const sukses = $("#sukses").data("sukses");
    if (sukses) {
        Swal.fire({
            icon: "success",
            title: "Berhasil",
            text: sukses,
            timer: 3000,
            showConfirmButton: false
        });

        setTimeout(function () {
            window.location.href = "http://localhost/toko-smartphone/User/login.php";
        }, 3000);
    }
});
</script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    
</body>
</html>