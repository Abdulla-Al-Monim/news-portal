<?php
ob_start();
session_start();
include('inc/db.php'); 

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="dashBord.php"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="POST">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <input type="submit"name="submit" class="btn btn-primary btn-block" value="Sign In" >
            
          </div>
          <!-- /.col -->
        </div>
      </form>
      <?php
        if (isset($_POST['submit'])) {
           # code...
          $email  =$_POST['email'];
          $password  =$_POST['password'];
          $_SESSION['shaPass']  =sha1($password );
          $sql = "SELECT * from users where email = '$email'";
          $athUser = mysqli_query($db,$sql);
          while ($rows = mysqli_fetch_array($athUser)) {
            $_SESSION['id']             = $rows['id'];
            $_SESSION['full_name']      = $rows['full_name'];
            $_SESSION['email']          = $rows['email'];
            $_SESSION['user_name']      = $rows['user_name'];
            $_SESSION['password']       = $rows['password'];
            $_SESSION['phone']          = $rows['phone'];
            $_SESSION['address']        = $rows['address'];
            $_SESSION['role']           = $rows['role'];
            $_SESSION['status']         = $rows['status'];
            $_SESSION['image']          = $rows['image'];
            $_SESSION['join_date']      = $rows['join_date'];
            if ($email == $_SESSION['email']) {
              # code...
              if ($_SESSION['shaPass'] == $_SESSION['password']) {
                # code...
                if ($_SESSION['status'] == 1) {
                  # code...
                  header("location: dashBord.php");
                }
              }
              else{
                header("location: index.php");
              }
            }
            else{
              header("location: index.php");
            }
          }
          

         } 
      ?>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="recoverPassword.php">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.php" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<?php
  ob_end_flush(); 
 ?>
</body>
</html>
