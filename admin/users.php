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
            <h1 class="m-0 text-dark">User Page</h1>
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
    if ($_SESSION['role'] == 1) {
      # code...
    
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
            <h1 class="card-title">Add New Users</h1>
          </div>
              <div class="card-body">
                <table class="table table-border table-hover table-striped table-responsive">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#sl</th>
                      <th scope="col">image</th>
                      <th scope="col">Full Name</th>
                      <th scope="col">User Name</th>
                      <th scope="col">Emale</th>
                      <th scope="col">Phone</th>
                      <th scope="col">Addres</th>
                      <th scope="col">User Role</th>
                      <!-- <th scope="col">Status</th> -->
                      <!-- <th scope="col">Join Date</th> -->
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $sql = "SELECT * FROM users";
                      $all_users = mysqli_query($db,$sql);
                      $i =0;
                      while ($rows = mysqli_fetch_assoc($all_users)) {
                         # code...
                        $id = $rows['id'];
                        $full_name    = $rows['full_name'];
                        $email        = $rows['email'];
                        $user_name    = $rows['user_name'];
                        $password     = $rows['password'];
                        $phone        = $rows['phone'];
                        $address      = $rows['address'];
                        $role         = $rows['role'];
                        $status       = $rows['status'];
                        $image        = $rows['image'];
                        $join_date    = $rows['join_date'];
                        $i++;
                        ?>

                        <tr>
                          <th scope="row"><?php echo $i; ?></th>
                          <td>
                            <?php
                              if (!empty($image)) {
                                ?>
                                 <img src="img/users/<?php echo $image; ?>" width="35" > 
                                <?php
                               }
                               else{
                                ?>
                                <img src="img/users/default.jpg" width="35" >
                                <?php  
                               } 
                            ?>
                          </td>
                          
                          <td><?php echo $full_name; ?></td>
                          <td><?php echo $user_name; ?></td>
                          <td><?php echo $email; ?></td>
                          <td><?php echo $phone; ?></td>
                          <td><?php echo $address; ?></td>
                          <td><?php 
                            if ($role == 1) { ?>
                              <span class="badge badge-success">Super Admin</span>
                              
                              <?php
                            }
                            else if($role == 2)
                            {
                              ?>
                              <span class="badge badge-primary">Admin</span>
                              <?php
                              
                            }
                           ?></td>
                           <!-- <td><?php 
                            if ($status == 0) { ?>
                              <span class="badge badge-danger">En-Active</span>
                              
                              <?php
                            }
                            else if($status == 1)
                            {
                              ?>
                              <span class="badge badge-success">Active</span>
                              <?php
                              
                            }
                           ?></td> -->
                          <!-- <td><?php echo $join_date; ?></td> -->
                          <td>
                            <div  class="action-bar">
                              <ul style="margin: 0!important;padding: 0!important;">
                                <li style="margin: 0!important;padding: 0!important;"><a href="users.php?do=edit&id=<?php echo $id; ?>"><i class="fa fa-edit"></i></a></li>
                                <li><a href="" data-toggle="modal" data-target="#delete<?php echo $id ?>">
                                <i class="fa fa-trash"></i>
                              </a></li>

                            </ul>
                            </div>
                          </td>  
                    </tr>
                    <div class="modal fade" id="delete<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Do you sure confirm to delete this category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body text-center">
                            <div class="model-confirmation">
                              <ul>
                                <li>
                                  <a href="users.php?do=delete&id=<?php echo $id;?>" class="btn btn-danger">Confirm</a>
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
            <h1 class="card-title">Add New User</h1>
          </div>
              <div class="card-body">
                <form action="users.php?do=Insert" method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="first_name" required="required" class="form-control" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="last_name" required="required" class="form-control" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="user_name" required="required" class="form-control" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" required="required" class="form-control" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label>password</label>
                        <input type="password" name="password" required="required" class="form-control" autocomplete="off">
                      </div>
                     
                      <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="re_password" required="required" class="form-control" autocomplete="off">
                      </div>
                    </div>

                    <div class="col-lg-6"> 
                      <div class="form-group">
                        <label>Phobe</label>
                        <input type="text" name="phone" required="required" class="form-control" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" required="required" class="form-control" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label>User Role</label>
                        <select name="role" class="form-control" required="required">
                          <option value="1">Super Admin</option>
                          <option value="2">Admin</option>
                        </select>
                      </div>
                     <!--  <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" required="required">
                          <option value="1">Active</option>
                          <option value="0">En-active</option>
                        </select>
                      </div> -->
                      <div class="form-group">
                        <label>Profile Picture</label>
                        <input type="file" name="image" required="required" class="form-control-file
                        " >
                      </div>
                      <div class="form-group"> 
                        <input type="submit" name="add_user"  class="btn btn-primary" >
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
          # code...
          $first_name     = $_POST['first_name'];
          $last_name      = $_POST['last_name'];
          $full_name      = $first_name .' '.$last_name;
          $user_name      = $_POST['user_name']; 
          $email          = $_POST['email']; 
          $password       = $_POST['password'];
          $re_password    = $_POST['re_password'];
          $phone          = $_POST['phone'];
          $address        = $_POST['address'];
          $role           = $_POST['role'];
          $status         = $_POST['status'];
          $avater_image   = $_FILES['image']['name'];
          $avater_temp    =$_FILES['image']['tmp_name'];
          
          if ($password == $re_password) {
            // Incryption password
            $shaPassword = sha1($password);
            // change the file name
            if(!empty($avater_image)){
              $image = rand(0,500000). '_'. $avater_image;
              move_uploaded_file($avater_temp, "img/users/" .$image);
              $sql = "INSERT INTO `users` (`full_name`, `email`, `user_name`, `password`, `phone`, `address`, `role`, `status`, `image`, `join_date`) VALUES ('$full_name', '$email', '$user_name', '$shaPassword', '$phone', '$address', '$role', 1, '$image', now());";
              $add_new_user = mysqli_query($db,$sql);
              if ($add_new_user) {
                # code...
                header("location: users.php?do=manage");
              }
              else{
                die."mysqli_error ." . mysqli_error($db);
              }
            }
            else {
              $sql = "INSERT INTO `users` (`full_name`, `email`, `user_name`, `password`, `phone`, `address`, `role`, `status`, `image`, `join_date`) VALUES ('$full_name', '$email', '$user_name', '$shaPassword', '$phone', '$address', '$role', 1, '$image', now());";
              $add_new_user = mysqli_query($db,$sql);
              if ($add_new_user) {
                # code...
                header("location: users.php?do=manage");
              }
              else{
                die."mysqli_error ." . mysqli_error($db);
              }
            }
            

          }

        }

      }
      /* update user start */
      elseif ($do == 'edit') {
        if (isset($_GET['id'])) {
          # code...
          $update_id = $_GET['id'];
          echo $update_id;
          $sql = "SELECT * FROM users where id = '$update_id'";
          $the_user= mysqli_query($db,$sql);
          while($rows = mysqli_fetch_assoc($the_user)){
            $id = $rows['id'];
            $full_name    = $rows['full_name'];
            $email        = $rows['email'];
            $user_name    = $rows['user_name'];
            $password     = $rows['password'];
            $phone        = $rows['phone'];
            $address      = $rows['address'];
            $role         = $rows['role'];
            $status       = $rows['status'];
            $image        = $rows['image'];
            $join_date    = $rows['join_date'];
            ?>
            <!-- body content start -->
            <div class="content">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="card">
                      <div class="card-header">
                    <h1 class="card-title">Update User</h1>
                  </div>
                      <div class="card-body">
                        <form action="users.php?do=update" method="POST" enctype="multipart/form-data">
                          <div class="row">
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" name="full_name" required="required" class="form-control" autocomplete="off" value="<?php echo  $full_name; ?>">
                              </div>
                              <div class="form-group">
                                <label>User Name</label>
                                <input type="text" name="user_name" required="required" class="form-control" autocomplete="off" value="<?php echo  $user_name; ?>"disabled>
                              </div>
                              <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" name="email" required="required" class="form-control" autocomplete="off" value="<?php echo  $email; ?>">
                              </div>
                              <div class="form-group">
                                <label>password</label>
                                <input type="password" name="password" class="form-control" autocomplete="off" placeholder="password">
                              </div>
                             
                              <div class="form-group">
                                <label>Repeat Name</label>
                                <input type="password" name="re_password" class="form-control" autocomplete="off" placeholder="re-passwrd">
                              </div>
                            </div>

                            <div class="col-lg-6"> 
                              <div class="form-group">
                                <label>Phobe</label>
                                <input type="text" name="phone" required="required" class="form-control" autocomplete="off"value="<?php echo $phone; ?>">
                              </div>
                              <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" required="required" class="form-control" autocomplete="off" value="<?php echo  $address; ?>">
                              </div>
                              <div class="form-group">
                                <label>User Role</label>
                                <select name="role" class="form-control" required="required">
                                  <option value="1" <?php if ($role==1) { echo "selected";} ?> >Super Admin</option>
                                  <option value="2"<?php if ($role==2) { echo "selected";} ?>>Admin</option>
                                </select>
                              </div>
                              <!-- <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control" required="required">
                                  <option value="1" <?php if ($status==1) { echo "selected";} ?>>Active</option>
                                  <option value="0" <?php if ($status==0) { echo "selected";} ?>>En-active</option>
                                </select>
                              </div> -->
                              <div class="form-group">
                                <label>Profile Picture</label>
                                <?php
                                  if (!empty($image)) {?>
                                    <img src="img/users/<?php echo $image;?>" width ="35" >
                                    <?php
                                  }
                                  else{ ?>
                                    <img src="img/users/default.jpg" width="35">
                                    <?php
                                  }
                                ?>
                                <input type="file" name="image" class="form-control-file
                                " >
                              </div>
                              <div class="form-group"> 
                                <input type="hidden" name="updateUserId"  class="btn btn-primary" value="<?php echo $id; ?>">
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
          $updateUserId   = $_POST['updateUserId'];
          $full_name      = $_POST['full_name'];
          $email          = $_POST['email']; 
          $password       = $_POST['password'];
          $re_password    = $_POST['re_password'];
          $phone          = $_POST['phone'];
          $address        = $_POST['address'];
          $role           = $_POST['role'];
          //$status         = $_POST['status'];
          $image          = $_FILES['image']['name'];
          $avater_temp    =$_FILES['image']['tmp_name'];
          if (!empty($password)) {
            if ($password == $re_password) {
            // Incryption password
              $shaPassword = sha1($password);
              if (!empty($image)) {
                // change the file name
                $image = rand(0,500000). '_'. $image;
                move_uploaded_file($avater_temp, "img/users/" .$image);
                // dete exiting image
                $query = "SELECT * from users where id = '$updateUserId'";
                
                $read_user_data = mysqli_query($db,$query);
                while($rows = mysqli_fetch_assoc($read_user_data)){
                  $exitingImage = $rows['image'];
                }
                unlink("img/users/". $exitingImage);
                $sql = "UPDATE users SET full_name='$full_name', email='$email', password='$shaPassword', phone='$phone', address='$address', role='$role', status=1, image='$image' where id = '$updateUserId'";
               
                $update_user = mysqli_query($db,$sql);
                echo $sql;
                exit();
                if ($update_user) {
                  header("location: users.php?do=manage");
                }
                else{
                  die."mysqli_error ." . mysqli_error($db);
                }
              }
              // image not change
              else{
                $sql = "UPDATE users SET full_name='$full_name', email='$email', password='$shaPassword', phone='$phone', address='$address', role='$role', status=1 where id = '$updateUserId'";
                
                $update_user = mysqli_query($db,$sql);
                if ($update_user) {
                  header("location: users.php?do=manage");
                }
                else{
                  die."mysqli_error ." . mysqli_error($db);
                }

              }

            }
          }
          
          elseif (!empty($image)) {
            # code..
            //password not change 
              $image = rand(0,500000). '_'. $image;
              move_uploaded_file($avater_temp, "img/users/" .$image);
              // dete exiting image
              $query = "SELECT * from users where id = '$updateUserId'";
              echo $query;
              $read_user_data = mysqli_query($db,$query);
              while($rows = mysqli_fetch_assoc($read_user_data)){
                $exitingImage = $rows['image'];
              }
              unlink("img/users/". $exitingImage);
              $sql = "UPDATE users SET full_name='$full_name', email='$email', phone='$phone', address='$address', role='$role', status=1, image='$image' where id = '$updateUserId'";
              
              $update_user = mysqli_query($db,$sql);
              if ($update_user) {
                # code...
                header("location: users.php?do=manage");
              }
              else{
                die."mysqli_error ." . mysqli_error($db);
              }
          }
          // pass and image note change
          else{
              $sql = "UPDATE users SET full_name='$full_name', email='$email', phone='$phone', address='$address', role='$role', status=1 where id = '$updateUserId'";
              $update_user = mysqli_query($db,$sql);
              if ($update_user) {
                # code...
                header("location: users.php?do=manage");
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

          $the_user_id = $_GET['id'];
          $query = "SELECT * from users where id = '$the_user_id'";
            //delete exiting image    
          $read_user_data = mysqli_query($db,$query);
          while($rows = mysqli_fetch_assoc($read_user_data)){
            $exitingImage = $rows['image'];
          }
          unlink("img/users/". $exitingImage);

          $sql = "DELETE FROM users where id='$the_user_id'";
          $delete_user = mysqli_query($db,$sql);
          if ($delete_user) {
            # code...
            header("location: users.php?do=manage");
           } 
           else
            {
              die("my db error " . mysqli_error($db));
            }
        }
       } 
      // delete user end
    }
    else
    {
      header("location: dashBord.php");
    }
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
