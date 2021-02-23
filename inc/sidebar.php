                <!-- Blog Right Sidebar -->
                <div class="col-md-4">
                    
                    <!-- Latest News -->
                    <div class="widget">
                        <h4>Latest News</h4>
                        <div class="title-border"></div>
                        
                        <!-- Sidebar Latest News Slider Start -->
                        <div class="sidebar-latest-news owl-carousel owl-theme">
                            <!-- First Latest News Start -->
                            <?php
                                $sql = "SELECT * FROM post order by post_id desc LIMIT 3";
                                $readRecentPost = mysqli_query($db,$sql);
                                while ($row = mysqli_fetch_array($readRecentPost)) {
                                  $post_id      = $row['post_id'];
                                  $title        = $row['title'];
                                  $description  = $row['description'];
                                  $image        = $row['image'];
                                  $cat_id       = $row['cat_id'];
                                  $author_id    = $row['author_id'];
                                  $post_date    = $row['post_date'];
                            ?>
                            <div class="item">
                                <div class="latest-news">
                                    <!-- Latest News Slider Image -->
                                    <div class="latest-news-image">
                                        <a href="single.php?post_id=<?php echo $post_id; ?>">
                                            <img src="admin/img/post/<?php echo $image; ?>">
                                        </a>
                                    </div>
                                    <!-- Latest News Slider Heading -->
                                    <h5><?php echo $title; ?></h5>
                                    <!-- Latest News Slider Paragraph -->
                                    <p><?php echo substr($description,0,275) ?></p>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                            <!-- First Latest News End -->
                        </div>
                        <!-- Sidebar Latest News Slider End -->
                    </div>


                    <!-- Search Bar Start -->
                    <div class="widget"> 
                            <!-- Search Bar -->
                            <h4>Blog Search</h4>
                            <div class="title-border"></div>
                            <div class="search-bar">
                                <!-- Search Form Start -->
                                <form action="search.php" method="POST">
                                    <div class="form-group">
                                        <input type="text" name="search" placeholder="Search Here" autocomplete="off" class="form-input">
                                        <i class="fa fa-paper-plane-o"></i>
                                    </div>
                                </form>
                                <!-- Search Form End -->
                            </div>
                    </div>
                    <!-- Search Bar End -->

                    <!-- Recent Post -->
                    <div class="widget">
                        <h4>Recent Posts</h4>
                        <div class="title-border"></div>
                        <div class="recent-post">
                            <?php
                            $sql = "SELECT * FROM post LIMIT 4";
                            $readRecentPost = mysqli_query($db,$sql);
                            while ($row = mysqli_fetch_array($readRecentPost)) {
                              $post_id      = $row['post_id'];
                              $title        = $row['title'];
                              $description  = $row['description'];
                              $image        = $row['image'];
                              $cat_id       = $row['cat_id'];
                              $author_id    = $row['author_id'];
                              $post_date    = $row['post_date'];
                            ?>
               
                            <!-- Recent Post Item Content Start -->
                            <div class="recent-post-item">
                                <div class="row">
                                    <!-- Item Image -->
                                    <div class="col-md-4">
                                        <img src="admin/img/post/<?php echo $image; ?>">
                                    </div>
                                    <!-- Item Tite -->
                                    <div class="col-md-8 no-padding">
                                        <h5><?php echo $title; ?></h5>
                                        <ul>
                                            <li><i class="fa fa-clock-o"></i><?php echo $post_date; ?></li>
                                            <li><i class="fa fa-comment-o"></i>15</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Recent Post Item Content End -->
                            <?php
                            }
                            ?>
                        </div>
                    </div>

                    <!-- All Category -->
                    <div class="widget">
                        <h4>Blog Categories</h4>
                        <div class="title-border"></div>
                        <!-- Blog Category Start -->
                        <div class="blog-categories">
                            <ul>
                                <?php
                                    $sql = "SELECT * from category order by cat_name asc";
                                    $all_category   = mysqli_query($db, $sql);

                                    while ($rows = mysqli_fetch_assoc($all_category)) {
                                        $cat_id     =$rows['cat_id'];
                                        $cat_name   =$rows['cat_name'];
                                        $count = 0;
                                        $sql = "SELECT * FROM post where cat_id = '$cat_id'";
                                        $readCategoryPost = mysqli_query($db,$sql);
                                        while ($row = mysqli_fetch_array($readCategoryPost)) {
                                            $count ++;
                                        }
                                ?>
                                <!-- Category Item -->
                                <li>
                                    <i class="fa fa-check"></i>
                                    <?php echo $cat_name; ?>
                                    <span>[<?php echo $count; ?>]</span>
                                </li>
                                <?php
                            }
                            ?>
                            </ul>
                        </div>
                        <!-- Blog Category End -->
                    </div>

                    <!-- Recent Comments -->
                    <div class="widget">
                        <h4>Recent Comments</h4>
                        <div class="title-border"></div>
                        <div class="recent-comments">
                            
                            <!-- Recent Comments Item Start -->
                            <div class="recent-comments-item">
                                <div class="row">
                                    <!-- Comments Thumbnails -->
                                    <div class="col-md-4">
                                        <i class="fa fa-comments-o"></i>
                                    </div>
                                    <!-- Comments Content -->
                                    <div class="col-md-8 no-padding">
                                        <h5>admin on blog posts</h5>
                                        <!-- Comments Date -->
                                        <ul>
                                            <li>
                                                <i class="fa fa-clock-o"></i>Dec 15, 2018
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Recent Comments Item End -->

                            <!-- Recent Comments Item Start -->
                            <div class="recent-comments-item">
                                <div class="row">
                                    <!-- Comments Thumbnails -->
                                    <div class="col-md-4">
                                        <i class="fa fa-comments-o"></i>
                                    </div>
                                    <!-- Comments Content -->
                                    <div class="col-md-8 no-padding">
                                        <h5>admin on blog posts</h5>
                                        <!-- Comments Date -->
                                        <ul>
                                            <li>
                                                <i class="fa fa-clock-o"></i>Dec 15, 2018
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Recent Comments Item End -->

                            <!-- Recent Comments Item Start -->
                            <div class="recent-comments-item">
                                <div class="row">
                                    <!-- Comments Thumbnails -->
                                    <div class="col-md-4">
                                        <i class="fa fa-comments-o"></i>
                                    </div>
                                    <!-- Comments Content -->
                                    <div class="col-md-8 no-padding">
                                        <h5>admin on blog posts</h5>
                                        <!-- Comments Date -->
                                        <ul>
                                            <li>
                                                <i class="fa fa-clock-o"></i>Dec 15, 2018
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Recent Comments Item End -->

                        </div>
                    </div>

                    <!-- Meta Tag -->
                    <div class="widget">
                        <h4>Tags</h4>
                        <div class="title-border"></div>
                        <!-- Meta Tag List Start -->
                        <div class="meta-tags">
                            <span>Business</span>
                            <span>Technology</span>
                            <span>Corporate</span>
                            <span>Web Design</span>
                            <span>Development</span>
                            <span>Graphic</span>
                            <span>Digital Marketing</span>
                            <span>SEO</span> 
                            <span>Social Media</span>          
                        </div>
                        <!-- Meta Tag List End -->
                    </div>
                    <!-- Meta Tag -->
                    <div class="widget" id="login">
                        <h4>Login</h4>
                        <div class="title-border"></div>
                        <!-- Meta Tag List Start -->
                        <div class="meta-tags">
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
                            <span>Social Media</span>          
                        </div>
                        <!-- Meta Tag List End -->
                    </div>

                </div>
                <!-- Right Sidebar End -->