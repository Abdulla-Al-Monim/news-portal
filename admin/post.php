<?php include('inc/header.php'); ?>
<?php include('inc/topBar.php'); ?>
<?php include('inc/menu.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Post Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <?php
      $do = isset($_GET['do'])? $_GET['do'] : 'manage';
      if ($do == 'manage') {
        ?>
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
            <h1 class="card-title">Manage Post</h1>
          </div>
              <div class="card-body">
                <table class="table table-border table-hover table-striped table-responsive">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#sl</th>
                      <th scope="col">Title</th>
                      <th scope="col">Image</th>
                      <th scope="col">Description</th>
                      <th scope="col">Cat Name</th>
                      <th scope="col">Author Name</th>
                      <th scope="col">Post Date</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $sql = "SELECT * FROM post";
                      $all_post = mysqli_query($db,$sql);
                      $i =0;
                      while ($rows = mysqli_fetch_assoc($all_post)) {
                         # code...
                        $post_id      = $rows['post_id'];
                        $title        = $rows['title'];
                        $description  = $rows['description'];
                        $image        = $rows['image'];
                        $cat_id       = $rows['cat_id'];
                        $author_id    = $rows['author_id'];
                        $post_date    = $rows['post_date'];
                        $i++;
                        ?>

                        <tr>
                          <th scope="row"><?php echo $i; ?></th>
                          <td><?php echo $title; ?></td>
                          <td>
                            <?php
                              if (!empty($image)) {
                                ?>
                                 <img src="img/post/<?php echo $image; ?>" width="35" > 
                                <?php
                               }
                               else{
                                ?>
                                <img src="img/post/default.png" width="35" >
                                <?php  
                               } 
                            ?>
                          </td>
                          
                          
                          <td><?php echo $description; ?></td>
                          <td><?php 
                          $sql = "SELECT * from category where cat_id = '$cat_id'";
                          $category_name   = mysqli_query($db, $sql);
                          while ($rows = mysqli_fetch_assoc($category_name)) {
                          $cat_name   =$rows['cat_name'];
                          echo $cat_name;
                          } 
                           ?></td>
                          <td><?php
                          $sql = "SELECT * from users where id = '$author_id'";
                          $author_name   = mysqli_query($db, $sql);
                          while ($rows = mysqli_fetch_assoc($author_name)) {
                          $full_name   =$rows['full_name'];
                          echo $full_name;
                          } 
                           ?></td>
                          <td><?php echo $post_date; ?></td>
                          <td>
                            <div  class="action-bar">
                              <ul style="margin: 0!important;padding: 0!important;">
                                <li style="margin: 0!important;padding: 0!important;"><a href="post.php?do=edit&id=<?php echo $post_id; ?>"><i class="fa fa-edit"></i></a></li>
                                <li><a href="" data-toggle="modal" data-target="#delete<?php echo $post_id; ?>">
                                <i class="fa fa-trash"></i>
                              </a></li>

                            </ul>
                            </div>
                          </td>  
                    </tr>
                    <div class="modal fade" id="delete<?php echo $post_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Do you sure confirm to delete this Post</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body text-center">
                            <div class="model-confirmation">
                              <ul>
                                <li>
                                  <a href="post.php?do=delete&id=<?php echo $post_id;?>" class="btn btn-danger">Confirm</a>
                                </li>
                                <li><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></li>
                              </ul>
                            </div>
                            
                          </div>  
                        </div>
                      </div>
                    </div>
                  </tbody>
                  <?php  

                       } 
                    ?>
                </table>
              </div>
            </div>

        
          </div>
          <!-- /.col-md-6 -->
          
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <?php
      }
      elseif ($do == 'add') {
        # code...
        ?>

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
            <h1 class="card-title">Add New Post</h1>
          </div>
              <div class="card-body">
                <form action="post.php?do=Insert" method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" required="required" class="form-control" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="15"></textarea>
                      </div>
                      <div class="form-group">
                        <label>Add Category</label>
                        <select name="cat_id" class="form-control" required="required">
                          <option>Please select category</option>
                          <?php 
                          $sql = "SELECT * from category order by cat_name ASC";
                          $all_category   = mysqli_query($db, $sql);
                          while ($rows = mysqli_fetch_assoc($all_category)) {
                          $cat_id   =$rows['cat_id'];
                          $cat_name   =$rows['cat_name'];
                          ?>
                          <option value="<?php echo $cat_id; ?>"><?php echo $cat_name; ?></option>
                          <?php

                          } 
                           ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" required="required" class="form-control-file
                        " >
                      </div>
                      <div class="form-group"> 
                        <input type="submit" name="add_post"  class="btn btn-primary" >
                      </div>
                    </div>

                  </div>
                </form>
              </div>
            </div>

        
          </div>
          <!-- /.col-md-6 -->
          
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

        <?php
      }
      elseif ($do=='Insert') {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $title              = mysqli_real_escape_string($db,$_POST['title']);
          $description        = mysqli_real_escape_string($db,$_POST['description']);
          $cat_id             = mysqli_real_escape_string($db,$_POST['cat_id']);
          $author_id          = $_SESSION['id'];
          $avater_image   = $_FILES['image']['name'];
          $avater_temp    =$_FILES['image']['tmp_name'];
            // change the file name
            if(!empty($avater_image)){
              $image = rand(0,500000). '_'. $avater_image;
              move_uploaded_file($avater_temp, "img/post/" .$image);
              $sql = "INSERT INTO `post` (`title`, `description`, `image`, `cat_id`, `author_id`, `post_date`) VALUES ('$title', '$description','$image', '$cat_id', '$author_id', now())";
              $add_new_post = mysqli_query($db,$sql);
              if ($add_new_post) {
                # code...
                header("location: post.php?do=manage");
              }
              else{
                die."mysqli_error ." . mysqli_error($db);
              }
            }
            else {
              $sql = "INSERT INTO `post` (`title`, `description`, `image`, `cat_id`, `author_id`, `post_date`) VALUES ('$title', '$description', '$cat_id', '$author_id','$image', now())";
              $add_new_post = mysqli_query($db,$sql);
              if ($add_new_post) {
                # code...
                header("location: post.php?do=manage");
              }
              else{
                die."mysqli_error ." . mysqli_error($db);
              }
            }
        }

      }
      /* update user start */
      elseif ($do == 'edit') {
        if (isset($_GET['id'])) {
          # code...
          $update_id = $_GET['id'];
          $sql = "SELECT * FROM post where post_id = '$update_id'";
          $the_user= mysqli_query($db,$sql);
          while($rows = mysqli_fetch_assoc($the_user)){
            $post_id = $rows['post_id'];
            $title    = $rows['title'];
            $description        = $rows['description'];
            $image    = $rows['image'];
            $cat_id     = $rows['cat_id'];
            ?>
            <!-- body content start -->
            <div class="content">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="card">
                      <div class="card-header">
                    <h1 class="card-title">Update post</h1>
                  </div>
                      <div class="card-body">
                        <form action="post.php?do=update" method="POST" enctype="multipart/form-data">
                          <div class="row">
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" required="required" class="form-control" autocomplete="off" value="<?php echo  $title; ?>">
                              </div>
                              <div class="form-group">
                                <label>category</label>
                                <select name="cat_id" class="form-control" required="required">
                                  <?php 
                                  $sql = "SELECT * from category where cat_id = '$cat_id'";

                                  $category_name   = mysqli_query($db, $sql);
                                  while ($rows = mysqli_fetch_assoc($category_name)) {
                                  $cat_id   =$rows['cat_id'];
                                  $cat_name   =$rows['cat_name'];
                                  echo $cat_name;
                                  ?>
                                  <option value="<?php echo $cat_id; ?>" <?php echo "selected";?> ><?php echo $cat_name; ?></option>

                                  <?php
                                  } 
                                  
                                  $sql = "SELECT * from category order by cat_name ASC";

                                  $all_category   = mysqli_query($db, $sql);
                                  while ($rows = mysqli_fetch_assoc($all_category)) {
                                  $cat_id   =$rows['cat_id'];
                                  $cat_name   =$rows['cat_name'];
                                  ?>
                                  <option value="<?php echo $cat_id; ?>"><?php echo $cat_name; ?></option>
                                  <?php

                                  } 
                                   ?>
                              </select>
                              </div>
                             
                             
                             
                              <div class="form-group">
                                <label>Image</label>
                                <?php
                                  if (!empty($image)) {?>
                                    <img src="img/post/<?php echo $image;?>" width ="35" >
                                    <?php
                                  }
                                  else{ ?>
                                    <img src="img/users/default.png">
                                    <?php
                                  }
                                ?>
                                <input type="file" name="image" class="form-control-file
                                " >
                              </div>

                            <div class="col-lg-6"> 
                             
                              <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="15"><?php echo $description; ?></textarea>
                              </div>
                              
                              
                              
                              <div class="form-group"> 
                                <input type="hidden" name="updatePostId"  class="btn btn-primary" value="<?php echo $post_id; ?>">
                                <input type="submit" name="update_user"  class="btn btn-primary" value="Save change">
                              </div>
                            </div>

                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- /.col-md-6 -->
                  
                  <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
              </div><!-- /.container-fluid -->
            </div>
            <!-- body content end-->
          <?php
          }
        }
      }
      /* update user start */
      /* update date user start */
      elseif ($do =='update') {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $post_id        = $_POST['updatePostId'];
          $title          = $_POST['title'];
          $cat_id         = $_POST['cat_id'];
          $description    = $_POST['description']; 
          $image          = $_FILES['image']['name'];
          $avater_temp    =$_FILES['image']['tmp_name'];
              if (!empty($image)) {
                // change the file name
                $image = rand(0,500000). '_'. $image;
                move_uploaded_file($avater_temp, "img/post/" .$image);
                // dete exiting image
                $query = "SELECT * from post where post_id = '$post_id'";
                
                $read_user_data = mysqli_query($db,$query);
                while($rows = mysqli_fetch_assoc($read_user_data)){
                  $exitingImage = $rows['image'];
                }
                unlink("img/post/". $exitingImage);
                $sql = "UPDATE post SET title='$title',description='$description',image='$image', cat_id='$cat_id'  where post_id = '$post_id'";
               
                $update_post = mysqli_query($db,$sql);
                if ($update_post) {
                  header("location: post.php?do=manage");
                }
                else{
                  die."mysqli_error ." . mysqli_error($db);
                }
              }
              // image not change
              else{
                $sql = "UPDATE post SET title='$title',description='$description', cat_id='$cat_id'  where post_id = '$post_id'";
                
                $update_post = mysqli_query($db,$sql);
                if ($update_post) {
                  header("location: post.php?do=manage");
                }
                else{
                  die."mysqli_error ." . mysqli_error($db);
                }

              }

        }
      }
      /* update date user start */
      // delete user start
      elseif ($do == 'delete') {

        if ($_GET['id']) {

          $the_post_id = $_GET['id'];
          $query = "SELECT * from post where post_id = '$the_post_id'";

            //delete exiting image    
          $read_post_data = mysqli_query($db,$query);
          while($rows = mysqli_fetch_assoc($read_post_data)){
            $exitingImage = $rows['image'];
          }
          unlink("img/post/". $exitingImage);

          $sql = "DELETE FROM post where post_id ='$the_post_id'";
          $delete_post = mysqli_query($db,$sql);
          if ($delete_post) {
            # code...
            header("location: post.php?do=manage");
           } 
           else
            {
              die("my db error " . mysqli_error($db));
            }
        }
       } 
      // delete user end
  ?>
  </div>
 

  <!-- Control Sidebar -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0-pre
    </div>
  </footer>
  <?php include('inc/options.php'); ?>
 
</div>
<!-- ./wrapper -->
  <?php include('inc/footer.php'); ?>
