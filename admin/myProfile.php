<?php include('inc/header.php'); ?>
<?php include('inc/topBar.php'); ?>
<?php include('inc/menu.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0 text-dark">Starter Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-12">
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
            <h1 class="card-title">My Profile</h1>
          </div>
              <div class="card-body">
                <table class="table ble-borderd table-hover table-striped table-responsive">
                  <tbody style="width: 100%;">
                    <?php 
                    $authId = $_SESSION['id'];
                    $sql = "SELECT * FROM users where id = '$authId'";
                    $user = mysqli_query($db,$sql);
                      while ($rows = mysqli_fetch_assoc($user)) {
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
                     <tr>
                      <th scope="row">Id</th>
                      <td><?php echo $authId; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">image</th>
                      <td><img src="img/users/<?php echo $image; ?>" width="35"></td>
                    </tr>
                    <tr>
                      <th scope="row">Full Name</th>
                      <td><?php echo $full_name; ?></td>
                    <tr>
                      <th scope="row">User Name</th>
                      <td><?php echo $user_name; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Emale</th>
                      <td><?php echo $email; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Phone</th>
                      <td><?php echo $phone; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Addres</th>
                      <td><?php echo $address; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">User Role</th>
                      <td><?php echo $role; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Status</th>
                      <td><?php echo $status; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Join Date</th>
                      <td><?php echo $join_date; ?></td>
                    </tr>
                    <?php

                    }
                     ?>
                  </tbody>
                </table>
              </div>
            </div>

        
          </div>
          <!-- /.col-md-6 -->
          
          <!-- /.col-md-6 -->
        </div>
        <div class="row">
          <div class="col-md-12">
            <a href="updateUser.php?id=<?php echo $authId;?>" class="btn btn-primary">Update</a>
          </div>
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
