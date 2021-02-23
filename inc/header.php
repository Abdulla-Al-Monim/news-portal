<?php
ob_start();
session_start();
include('admin/inc/db.php'); 

 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Website Description -->
    <meta name="description" content="Blue Chip: Corporate Multi Purpose Business Template" />
    <meta name="author" content="Blue Chip" />

    <!--  Favicons / Title Bar Icon  -->
    <link rel="shortcut icon" href="assets/images/favicon/favicon.png" />
    <link rel="apple-touch-icon-precomposed" href="assets/images/favicon/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon/favicon.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon/favicon.png" />
    <?php
    
    ?>

    <title>Blue Chip | Blog Right Sidebar</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <!-- font aswesone bootstrap cdn link -->
    <!-- font aswesone bootstrap cdn link -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Flat Icon CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/flaticon.css">

    <!-- Animate CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/animate.min.css">

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/owl.theme.default.min.css">

    <!-- Fency Box CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.min.css">

    <!-- Theme Main Style CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <!-- Responsive CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
  </head>

  <body>
    <!-- :::::::::: Header Section Start :::::::: -->
    
    <!-- ::::::::::: Header Section End ::::::::: -->
    <!-- nav bar start -->
        <header>
            <div class="container fixed-top">
                <div class="row">
                    <div class="col-md-12"> 
                        <nav class="navbar navbar-expand-lg navbar-light bg-light ">
                          <a class="navbar-brand" href="index.php">Home</a>
                          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                          </button>

                          <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            
                            <ul class="navbar-nav ml-auto">
                                <?php
    
                                    $sql = "SELECT * from category order by cat_name asc"; 
                                    $all_category   = mysqli_query($db, $sql);
                                    while ($rows = mysqli_fetch_assoc($all_category)) {
                                        $cat_id     =$rows['cat_id'];
                                        $cat_name   =$rows['cat_name'];
                                    ?>
                              <li class="nav-item">
                                
                                <a class="nav-link" href="category.php?id=<?php echo $cat_id; ?>"><?php echo $cat_name; ?></a>
                                
                              </li>
                              
                              <?php
                            }
                            ?>
                            <li class="nav-item">
                                <?php
                                if (!empty($_SESSION['sub_id'])) {
                                     ?>

                                    <a class="nav-link" href="logout.php">Logout</a>
                                    <?php
                                 }
                                 else{
                                    ?>
                                    <a class="nav-link" href="#login">login</a>
                                    <?php
                                 } 
                                 ?>
                                
                                
                              </li>
                            </ul>
                          </div>
                        </nav>
                        
                    </div>
                </div>
            </div>
            
        </header>
    <!-- nav bar end -->