<?php include('inc/header.php'); ?>
<?php include('inc/topBar.php'); ?>
<?php include('inc/menu.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-md-12 col-xl-12">
            <h1 class="m-0 text-dark">Starter Page</h1>
          </div><!-- /.col -->
          <div class="col-md-12 col-xl-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
            <h1 class="card-title">Update User</h1>
          </div>
              <div class="card-body">
                <?php
                if (isset($_GET['id'])) {
                  # code...
                  $update_id = $_GET['id'];
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
                                <form action="" method="POST" enctype="multipart/form-data">
                                  <div class="row">
                                    <div class="col-12">
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
                                        <input type="email" name="email" required="required" class="form-control" autocomplete="off" value="<?php echo  $email; ?>"disabled>
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

                                    <div class="col-12"> 
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
                                        <?php 
                                        if ($role==1){?>

                                          <input type="text" name="address" required="required" class="form-control" autocomplete="off" value="Super Admin"disabled>
                                          <?php
                                        }
                                        elseif ($role==2) {?>
                                          <input type="text" name="address" required="required" class="form-control" autocomplete="off" value="Editor"disabled>
                                           <?php
                                        }
                                         ?>
                                      </div>
                                      <div class="form-group">
                                        <label>Status</label>
                                        <?php 
                                        if ($status==1){?>

                                          <input type="text" name="address" required="required" class="form-control" autocomplete="off" value="Active"disabled>
                                          <?php
                                        }
                                        elseif ($status==0) {?>
                                          <input type="text" name="address" required="required" class="form-control" autocomplete="off" value="En-active"disabled>
                                           <?php
                                        }
                                         ?>
                                      </div>
                                      <div class="form-group">
                                        <label>Profile Picture</label>
                                        <?php
                                          if (!empty($image)) {?>
                                            <img src="img/users/<?php echo $image;?>" width ="35" >
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
                ?>
              <!-- uprate user start -->
              <?php
              
                  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $updateUserId   = $_POST['updateUserId'];
                    $full_name      = $_POST['full_name'];
                    $password       = $_POST['password'];
                    $re_password    = $_POST['re_password'];
                    $phone          = $_POST['phone'];
                    $address        = $_POST['address'];
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
                          $sql = "UPDATE users SET full_name='$full_name', password='$shaPassword', phone='$phone', address='$address', image='$image' where id = '$updateUserId'";
                         
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
                          $sql = "UPDATE users SET full_name='$full_name', password='$shaPassword', phone='$phone', address='$address' where id = '$updateUserId'";
                          
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
                        $sql = "UPDATE users SET full_name='$full_name', phone='$phone', address='$address', image='$image' where id = '$updateUserId'";
                        
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
                        $sql = "UPDATE users SET full_name='$full_name',  phone='$phone', address='$address' where id = '$updateUserId'";
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
                ?>
              <!-- uprate user end -->
              </div>
            </div>

        
          </div>
          <!-- /.col-md-6 -->
          
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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
