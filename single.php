<?php
include('inc/header.php'); 
?>

    
    <!-- :::::::::: Page Banner Section Start :::::::: -->
    <section class="blog-bg background-img">
        <div class="container">
            <!-- Row Start -->
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title">Single Blog Page</h2>
                    <!-- Page Heading Breadcrumb Start -->
                    <nav class="page-breadcrumb-item">
                        <ol>
                            <li><a href="index.html">Home <i class="fa fa-angle-double-right"></i></a></li>
                            <li><a href="">Blog <i class="fa fa-angle-double-right"></i></a></li>
                            <!-- Active Breadcrumb -->
                            <li class="active">Single Right Sidebar</li>
                        </ol>
                    </nav>
                    <!-- Page Heading Breadcrumb End -->
                </div>
                  
            </div>
            <!-- Row End -->
        </div>
    </section>
    <!-- ::::::::::: Page Banner Section End ::::::::: -->



    <!-- :::::::::: Blog With Right Sidebar Start :::::::: -->
    <section>
        <div class="container">
            <div class="row">
                <!-- Blog Single Posts -->
                <div class="col-md-8">
                  <?php
                    if (isset($_GET['post_id'])) {
                      $post_id =$_GET['post_id'];
                      $sql = "SELECT * FROM post where post_id = '$post_id'";
                      $readSinglePost = mysqli_query($db,$sql);
                        while ($row = mysqli_fetch_array($readSinglePost)) {
                          $post_id      = $row['post_id'];
                          $_SESSION['post_id'] = $post_id ;
                          $title        = $row['title'];
                          $description  = $row['description'];
                          $image        = $row['image'];
                          $cat_id       = $row['cat_id'];
                          $author_id    = $row['author_id'];
                          $post_date    = $row['post_date'];
                          ?>
                          <!-- Single Item Blog Post Start -->
                    <div class="blog-post">
                        <!-- Blog Banner Image -->
                        <div class="blog-banner">
                            <a href="#">
                                <img src="admin/img/post/<?php echo $image; ?>">
                                <!-- Post Category Names -->
                                <div class="blog-category-name">
                                    <?php
    
                                    $sql = "SELECT cat_name from category where cat_id ='$cat_id'";
                                    $category_name   = mysqli_query($db, $sql);
                                    while ($rows = mysqli_fetch_assoc($category_name)) {
                                        $cat_name   =$rows['cat_name']; 
                                    ?>
                                    <h6><?php echo $cat_name; ?></h6>
                                    <?php
                                  }
                                  ?>
                                </div>
                            </a>
                        </div>
                        <!-- Blog Title and Description -->
                        <div class="blog-description">
                            <a href="#">
                                <h3 class="post-title"><?php echo $title; ?></h3>
                                    </a>
                                    <p><?php echo $description; ?></p>
                                    <!-- Blog Info, Date and Author -->
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="blog-info">
                                                <ul>
                                                    <li><i class="fa fa-calendar"></i><?php echo $post_date; ?></li>
                                                    
                                                    <li><i class="fa fa-user">
                                                        <?php
                                                            $sql = "SELECT full_name FROM users where id = '$author_id'";
                                                            $readAuthorName = mysqli_query($db,$sql);
                                                            while ($row = mysqli_fetch_array($readAuthorName)) {
                                                                $full_name     = $row['full_name'];
                                                            ?>
                                                        </i><?php echo $full_name; ?>
                                                         <?php
                                                            }
                                                        ?>
                                                    </li>
                                                    <li><i class="fa fa-heart"></i>(50)</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- log in form start -->
                                <div class="post-comments">
                                    <div class="row"> 
                                        <div class="col-md-6">
                                            <h4>Get Registered</h4>
                                            <form action="regsitation.php" method="POST">
                                              <!-- First Name Input Field -->
                                                <div class="form-group">
                                                    <input type="text" name="full_name" placeholder="Your Name" class="form-input" autocomplete="off" required="required">
                                                    <i class="fa fa-user-o"></i>
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" name="email" placeholder="Email Address" class="form-input" autocomplete="off" required="required">
                                                    <i class="fa fa-envelope-o"></i>
                                                </div>  
                                                <div class="form-group">
                                                    <input type="password" name="password" placeholder="Password" class="form-input" autocomplete="off" required="required">
                                                    <i class="fa fa-unlock-alt"></i>
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" class="btn-main" name="sign_up" value="Sign up">
                                                </div>
                                            </form>
                                        </div>
                                        
                                       <!-- Email Address Input Field -->
                                        <div class="col-md-6">
                                            <h4>Log in</h4>
                                            <form action="login.php" method="POST">
                                                <div class="form-group">
                                                    <input type="email" name="email" placeholder="Email Address" class="form-input" autocomplete="off" required="required">
                                                    <i class="fa fa-envelope-o"></i>
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" name="password" placeholder="Password" class="form-input" autocomplete="off" required="required">
                                                    <i class="fa fa-unlock-alt"></i>
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" class="btn-main" name="sign_in" value="Sign In">
                                                </div>
                                            </form> 
                                        </div> 
                                    </div>

                                </div>
                                <!-- log in form end -->
                                <?php
                                if (!empty($_SESSION['sub_email'])) {
                                    ?>
                                    <!-- Post New Comment Section Start -->
                                <div class="post-comments">
                                    <h4>Post Your Comments</h4>
                                    <div class="title-border"></div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                    <!-- Form Start -->
                                    <form action="" method="POST" class="contact-form">
                                        <!-- Left Side Start -->
                                            
                                        <!-- Left Side End -->

                                        <!-- Right Side Start -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                   <!-- Comments Textarea Field -->
                                                    <div class="form-group">
                                                        <textarea name="comments" class="form-input" placeholder="Your Comments Here..."></textarea>
                                                        <i class="fa fa-pencil-square-o"></i>
                                                    </div>
                                                    <!-- Post Comment Button -->
                                                    <button type="submit" class="btn-main" name="addComment"><i class="fa fa-paper-plane-o"></i> Post Your Comments</button> 
                                            </div>
                                        </div>
                                        <!-- Right Side End -->
                                    </form>
                                    <!-- Form End -->
                                </div>
                                <?php
                                    if (isset($_POST['addComment'])) {
                                         $comments   = $_POST['comments'];
                                         $id         = $post_id;
                                         $full_name  =$_SESSION['sub_name'];
                                         $sql = "INSERT INTO `comments` (`c_name`, `C_commests`, `post_id`, `c_status`, `c_date`) VALUES ('$full_name', '$comments', '$id', '2', now())";
                                         // echo($sql);
                                         // exit();
                                         $add_comment = mysqli_query($db,$sql);
                                         if ($add_comment) {
                                             header("location: single.php?post_id=$id");
                                         }
                                         else
                                         {
                                            die("system error ".msql_error());
                                         }
                                     } 
                                    ?>
                                <!-- Post New Comment Section End -->  
                                    <?php

                                }
                                else{
                                    echo '<a class="nav-link" href="#login">Please login to post your commmet</a>';
                                }
                                ?>
                                <!-- Single Comment Section Start -->
                                <div class="single-comments">
                                    <!-- Comment Heading Start -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php
                                            $sql = "SELECT * FROM comments WHERE post_id ='$post_id' AND c_status=1 ORDER BY c_id DESC";
                                            $read_comments = mysqli_query($db, $sql);
                                            $commentNumber = mysqli_num_rows($read_comments);
                                                ?>
                                            <h4>All Latest Comments (<?php echo $commentNumber; ?>)</h4>
                                            <div class="title-border"></div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                        </div>
                                    </div>
                                    <!-- Comment Heading End -->
                                    <?php
                                        if ( $commentNumber == 0 ){
                                            echo '<div class="alert alert-warning">Opps!!! No Comments Found Yet.</div>';
                                        }
                                        else {
                                            while( $row = mysqli_fetch_assoc($read_comments) ){
                                                $c_id          = $row['c_id'];
                                                $name           = $row['c_name'];
                                                $comments       = $row['C_commests'];
                                                $post_id        = $row['post_id'];
                                                $status         = $row['c_status'];
                                                $c_date         = $row['c_date'];
                                                ?>
                                    <!-- Single Comment Post Start -->
                                    <div class="row each-comments">
                                        <div class="col-md-2">
                                            <!-- Commented Person Thumbnail -->
                                            <div class="comments-person">
                                                <img src="assets/images/corporate-team/team-1.jpg">
                                            </div>
                                        </div>

                                        <div class="col-md-10 no-padding">
                                            <!-- Comment Box Start -->
                                            <div class="comment-box">
                                                <div class="comment-box-header">
                                                    <ul>
                                                        <li class="post-by-name"><?php echo $name; ?></li>
                                                        <li class="post-by-hour"><?php echo $c_date; ?></li>
                                                    </ul>
                                                </div>
                                                <p><?php echo $comments; ?></p>
                                            </div> 
                                            <a href="single.php?post_id=<?php echo $post_id; ?>&reply=<?php echo $c_id;?>&cat_id=<?php echo $post_id?>"><i class="fa fa-comments"></i> Reply</a>
                                            <!-- Comment Reply Post Start -->
                                            <?php
                                            $sql = "SELECT * FROM replycomment WHERE c_id ='$c_id' AND c_status=1 ORDER BY c_id DESC";
                                            $read_reply_comments = mysqli_query($db, $sql);
                                            $commentNumberReply = mysqli_num_rows($read_reply_comments);
                                            if ($commentNumberReply == 0) {
                                                # code...
                                            }
                                            else{
                                                while( $row = mysqli_fetch_assoc($read_reply_comments) ){
                                                $c_id          = $row['c_id'];
                                                $name           = $row['c_name'];
                                                $comments       = $row['C_commests'];
                                                $post_id        = $row['post_id'];
                                                $post_id = $post_id ;
                                                $status         = $row['c_status'];
                                                $c_date         = $row['c_date'];
                                                ?>
                                                <div class="row each-comments">
                                                    <div class="col-md-2 offset-md-2">
                                                        <!-- Commented Person Thumbnail -->
                                                        <div class="comments-person">
                                                            <img src="assets/images/corporate-team/team-2.jpg">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-8 no-padding">
                                                        <!-- Comment Box Start -->
                                                        <div class="comment-box">
                                                            <div class="comment-box-header">
                                                                <ul>
                                                                    <li class="post-by-name"><?php echo $name; ?></li>
                                                                    <li class="post-by-hour"><?php echo $c_date; ?></li>
                                                                </ul>
                                                            </div>
                                                            <p><?php echo $comments; ?></p>
                                                        </div>
                                                        <!-- Comment Box Start -->
                                                    </div>
                                                </div>
                                    <!-- Comment Reply Post End -->
                                                <?php

                                                }

                                            }
                                                ?>
                                                
                                            <!-- Comment Box End -->
                                            <?php
                                                if ( isset($_GET['reply']) ){
                                                    $replyID = $_GET['reply'];
                                                    $post_id = $_GET['cat_id'];
                                                    echo $post_id;
                                                    echo $replyID;
                                                    
                                                    ?>
                                                    <form action="reply.php?cat_id=<?php echo $post_id ?>" method="POST" class="contact-form">
                                                        <!-- Right Side Start -->
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <!-- Comments Textarea Field -->
                                                                <div class="form-group">
                                                                    <textarea name="comments" class="form-input" placeholder="Your Comments Here..." rows="2"></textarea>
                                                                    <i class="fa fa-pencil-square-o"></i>
                                                                </div>
                                                                <!-- Post Comment Button -->
                                                                <input type="hidden" name="reply_id" value="<?php echo $replyID; ?>">
                                                                <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                                                                <button type="submit" class="btn-main" name="replyPostComment"><i class="fa fa-paper-plane-o"></i> Post Your Comments</button>
                                                            </div>
                                                        </div>
                                                        <!-- Right Side End -->
                                                    </form>


                                            <?php     }
                                            ?>

                            
<?php

    // if ( isset($_POST['replyPostComment']) ){
    //     $post_id       = $_POST['post_id'];
    //     $name       = $_SESSION['sub_name'];
    //     $comments   = mysqli_real_escape_string($db, $_POST['comments']);
    //     $r_id       = $_POST['reply_id'];

    //     $sql = "INSERT INTO replycomment (c_id, c_name, C_commests, post_id, c_status, c_date) VALUES ('$r_id', '$name', '$comments', '$post_id', '1', now())";

    //     $addReply = mysqli_query($db, $sql);

    //     if ( $addReply ){
    //         header("Location: single.php?post_id=$post_id");
    //     }
    //     else{
    //         die("System Error. Please Contact with Web Administrator." . mysqli_error() );
    //     }
    // }
?>
                                        </div>
                                    </div>
                                    <!-- Single Comment Post End -->
                                    <?php

                                    ?>

                                    

                                   
                                    <?php    }
                            }
                            
                        ?>  
                                </div>
                                <!-- Single Comment Section End -->
                                          
                            </div>

                          <?php
                        }
                    }
                  ?>
                          
                </div>




                <!-- Blog Right Sidebar -->
               <?php include('inc/sidebar.php');  ?>
                <!-- Sidebar End -->
            </div>
        </div>
    </section>
    <!-- ::::::::::: Blog With Right Sidebar End ::::::::: -->
    


<?php include('inc/footer.php');  ?>    
    