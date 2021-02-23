<?php
ob_start();
session_start();
include('admin/inc/db.php'); 
    if ( isset($_POST['replyPostComment']) ){
        $post_id = $_GET['cat_id'];
        $name       = $_SESSION['sub_name'];
        $comments   = mysqli_real_escape_string($db, $_POST['comments']);
        $r_id       = $_POST['reply_id'];

        $sql = "INSERT INTO replycomment (c_id, c_name, C_commests, post_id, c_status, c_date) VALUES ('$r_id', '$name', '$comments', '$post_id', '1', now())";

        $addReply = mysqli_query($db, $sql);

        if ( $addReply ){
            header("Location: single.php?post_id=$post_id;");
        }
        else{
            die("System Error. Please Contact with Web Administrator." . mysqli_error() );
        }
    }
?>