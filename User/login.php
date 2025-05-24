<?php

// use Google\Service\SecurityCommandCenter\Access;

    session_start();
    require '../config/auth.php';

    if(isset($_POST['submit'])){
        login($_POST);
    }
    

    $judul = 'Daftarkan akun anda dan bergabung dengan komunitas';

    //authenticate code from google OAuth Flow
    if(isset($_GET['code'])){
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

        if (!isset($token['error'])) {
        $client->setAccessToken($token['access_token']);

        // Pastikan autoload sudah disertakan sebelumnya
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();

        $g_name = $google_account_info['name'];
        $g_email = $google_account_info['email'];
        $g_id = $google_account_info['id'];
        
        $query_check = 'SELECT * FROM users WHERE oauth_id = "'.$g_id.'" ';
        $run_query_check = mysqli_query($con, $query_check);
        $d = mysqli_fetch_object($run_query_check);
        if ($d) {
            $query_update = 'UPDATE users SET username = "'.$g_name.'", email = "'.$g_email.'" WHERE oauth_id = "'.$g_id.'" ';
            $run_query_update = mysqli_query($con, $query_update);
        } else {
            $query_insert = 'INSERT INTO users (username, email, oauth_id) VALUES ("'.$g_name.'", "'.$g_email.'", "'.$g_id.'") ';
            $run_query_insert = mysqli_query($con, $query_insert);
        }
       //echo "login berhasil";
        $_SESSION['logged_in'] = true;
        $_SESSION['access_token'] = $token['access_token'];
        $_SESSION['username'] = $g_name;

        header('location: index.php');
    } else {
        echo "eror";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../img/2.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Z7N87ApWNUK3d3Q4FEwF+0c6wT+EYjQ+ODZoYXdTYWqDwvHqRS1wz0CtbT8Q2fU9Rp1VcgQXUBdT+2zD8Yc1xw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../asset/css/custom.css">

   

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- <script src="../asset/js/main.js"></script> -->
    <title>Log In</title>
</head>
<body>
<?php if (isset($_SESSION['pesan'])) : ?>
        <div id="pesan" data-pesan="<?= $_SESSION['pesan'] ?>"></div>
        <?php unset($_SESSION['pesan']) ?>
    <?php endif; ?>


<div class="form">
    <form action="" method="POST">
        <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <div class="row border rounded-5 p-3 bg-white shadow box-area">
                <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box">
                    <div class="featured-image">
                        <img src="../img/1.jpg" class="img-fluid" style="width: 500px;">
                    </div>
                </div> 
                <div class="col-md-6 right-box">
                    <div class="row align-items-center">
                        <div class="header-text text-center mb-4">
                            <h2>Login</h2>
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" name ='email' class="form-control form-control-lg bg-light fs-6" placeholder="Email address" required>
                        </div>
                        <div class="input-group mb-1">
                            <input type="password" name = 'password' class="form-control form-control-lg bg-light fs-6" placeholder="Password" required>
                        </div>
                        <div class="input-group mb-5 d-flex justify-content-between">                       
                            <div class="forgot">
                                <small><a href="#">Forgot Password?</a></small>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <button class="btn btn-lg btn-primary w-100 fs-6" name ='submit' style="text-decoration: none;" >Login</button>
                        </div>
                        <div class="input-group mb-3">
                        <a href="<?php echo $client->createAuthUrl(); ?>" class="btn btn-lg btn-light w-100 fs-6" style="text-decoration: none;">
                            <img src="../img/google.png" style="width:20px" class="me-2">
                            <small>Sign In with Google</small>
                        </a>
                        </div>
                        <div class="row">
                            <small>Don't have account? <a href="register.php">Sign Up</a></small>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </form>
</div>
<!-- <script>
  $(document).ready(function () {
    const pesan = $("#pesan").data("pesan");
    if (pesan) {
      Swal.fire({
        icon: "error",  
        title: "login gagal",
        text: pesan,
        timer: 3000,
        showConfirmButton: false
      });
    }
  });
      document.addEventListener("DOMContentLoaded", function () {
        feather.replace();
      });
</script> -->
     <script src="../asset/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

    
    

</body>
</html>

