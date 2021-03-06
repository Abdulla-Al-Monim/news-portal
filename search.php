<?php
include('inc/header.php'); 
?>

    
    <!-- :::::::::: Page Banner Section Start :::::::: -->
    <section class="blog-bg background-img">
        <div class="container">
            <!-- Row Start -->
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title">Search Page</h2>
                    <!-- Page Heading Breadcrumb Start -->
                    <nav class="page-breadcrumb-item">
                        <ol>
                            <li><a href="index.html">Search <i class="fa fa-angle-double-right"></i></a></li>
                            <!-- Active Breadcrumb -->
                            <li class="active">Blog</li>
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
                <!-- Blog Posts Start -->
                <div class="col-md-8">
                    <?php
                        if (isset($_POST['search'])) {
                            $search = $_POST['search'];
                            $sql = "SELECT * from post where title like '%$search%' or description like '%$search%'";
                            $searchPost = mysqli_query($db,$sql);
                            $totalPost  = mysqli_num_rows($searchPost);
                            if ($totalPost == 0){
                        ?>
                            <div class="alert alert-warning">
                                <strong>Opps!No Post Find Out</strong>
                            </div>
                        <?php
                    }
                    else{
                        while ($row = mysqli_fetch_array($searchPost)) {
                          $post_id      = $row['post_id'];
                          $title        = $row['title'];
                          $description  = $row['description'];
                          $image        = $row['image'];
                          $cat_id       = $row['cat_id'];
                          $author_id    = $row['author_id'];
                          $post_date    = $row['post_date'];
                          ?>
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
                                    <p><?php echo substr($description,0,275) ?></p>
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

                                        <div class="col-md-4 read-more-btn">
                                            <button type="button" class="btn-main">Read More <i class="fa fa-angle-double-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                }
            ?>
                </div>

                <?php include('inc/sidebar.php');  ?>
            </div>
        </div>
    </section>
    <!-- ::::::::::: Blog With Right Sidebar End ::::::::: -->
<?php include('inc/footer.php');  ?>    
    

