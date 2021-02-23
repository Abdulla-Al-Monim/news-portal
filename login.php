<?php
ob_start();
session_start();
include('admin/inc/db.php'); 
	

	if (isset($_POST['sign_in'])) {
		$sign_in 		= $_POST['sign_in'];
		$email 			= $_POST['email'];
		$password 		= $_POST['password'];
		$shaPass  =sha1($password);
          $sql = "SELECT * from subscriber where sub_email = '$email' AND sub_pass = '$shaPass'";
          $athUser = mysqli_query($db,$sql);
          while ($rows = mysqli_fetch_array($athUser)) {
            $_SESSION['sub_id']             = $rows['sub_id'];
            $_SESSION['sub_name']      = $rows['sub_name'];
            $_SESSION['sub_email']          = $rows['sub_email'];
            $_SESSION['sub_pass']       = $rows['sub_pass'];
            if ($email == $_SESSION['sub_email']) {
              # code...
              if ($_SESSION['shaPass'] == $_SESSION['sub_pass']) {
               
                header("location: index.php");
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