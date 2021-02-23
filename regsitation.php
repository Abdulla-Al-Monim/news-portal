<?php
ob_start();
session_start();
include('admin/inc/db.php'); 
	

	if (isset($_POST['sign_up'])) {
		$sign_up 		      = $_POST['sign_up'];
		$full_name 			  = $_POST['full_name'];
    $email            = $_POST['email'];
		$password 		    = $_POST['password'];
		$shaPass          =sha1($password);

    $sql = "INSERT INTO subscriber (sub_name, sub_email, sub_pass) values('$full_name','$email','$shaPass')";
    $add_new_sub_user = mysqli_query($db,$sql);
    if ($add_new_sub_user) {
      # code...
      header("location: index.php");
    }
    else
    {
      die("my db error " . mysqli_error($db));
    }
	}
 ?>