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
            <h1 class="m-0 text-dark">Comment Page</h1>
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

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
            <h1 class="card-title">Manage Comment</h1>
          </div>
              <div class="card-body">
                <table class="table table-border table-hover table-striped table-responsive" width="100%">
                  <thead class="thead-dark"  width="100%">
                    <tr>
                      <th scope="col">#sl</th>
                      <th scope="col">Comments</th>
                      <th scope="col">Post Title</th>
                      <th scope="col">Name</th>
                      <th scope="col">Status</th>
                      <th scope="col">Date</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $sql = "SELECT * FROM comments";
                      $all_commests = mysqli_query($db,$sql);
                      $i =0;
                      while ($rows = mysqli_fetch_assoc($all_commests)) {
                         # code...
                        $c_id      = $rows['c_id'];
                        $c_name        = $rows['c_name'];
                        $C_commests  = $rows['C_commests'];
                        $post_id        = $rows['post_id'];
                        $c_status       = $rows['c_status'];
                        $c_date    = $rows['c_date'];
                        $i++;
                        ?>

                        <tr>
                          <th scope="row"><?php echo $i; ?></th>
                          <td><?php echo $C_commests; ?></td>
                          <td>
                            <?php
                              $sql = "SELECT  title FROM post where post_id = '$post_id'";
                              $post_title = mysqli_query($db,$sql);
                              while ($rows = mysqli_fetch_assoc($post_title)) {
                                $title        = $rows['title'];
                                 echo $C_commests;
                               }

                            ?>
                          </td>
                          
                          
                          <td><?php echo $c_name; ?></td>
                          <td>
                            <?php
                            if ($c_status==1) {
                              ?>
                                <span class="badge badge-success">Aprove</span>
                                <?php
                            }
                            else{
                              ?>
                              <span class="badge badge-danger">Panding</span>
                              <?php
                            }
                            ?>                            
                          </td>
                          
                          <td><?php echo $c_date; ?></td>
                          <td>
                            <div  class="action-bar">
                              <ul style="margin: 0!important;padding: 0!important;">
                                <li style="margin: 0!important;padding: 0!important;"><a href="" data-toggle="modal" data-target="#update<?php echo $c_id; ?>"><i class="fa fa-edit"></i></a></li>
                                <li><a href="" data-toggle="modal" data-target="#delete<?php echo $c_id; ?>">
                                <i class="fa fa-trash"></i>
                              </a></li>

                            </ul>
                            </div>
                          </td>  
                    </tr>
                    <div class="modal fade" id="delete<?php echo $c_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Do you sure confirm to delete this Comment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body text-center">
                            <div class="model-confirmation">
                              <ul>
                                <li>
                                  <a href="comments.php?delete=<?php echo $c_id;?>" class="btn btn-danger">Confirm</a>
                                </li>
                                <li><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></li>
                              </ul>
                            </div>
                            
                          </div>  
                        </div>
                      </div>
                    </div>
                    <div class="modal fade" id="update<?php echo $c_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Do you sure active this Comment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body text-center">
                            <div class="model-confirmation">
                              <ul>
                                <li>
                                  <a href="comments.php?update=<?php echo $c_id;?>" class="btn btn-danger">Confirm</a>
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

              <?php 
              //delete coment
                      if (isset($_GET['delete'])) {
                        # code...
                        $delete_id = $_GET['delete'];
                        $sql = "DELETE FROM comments where  c_id='$delete_id'";
                        $delete_the_comment = mysqli_query($db,$sql);
                        if ($delete_the_comment) {
                          header("location: comments.php");
                         } 
                         else
                          {
                            die("my db error " . mysqli_error($db));
                          }
                      }
                    ?>
                    <?php 
              //update coment
                      if (isset($_GET['update'])) {
                        $update_id = $_GET['update'];
                        $sql = "UPDATE comments SET c_status= 1  where c_id = '$update_id'";
                        $update_the_comment = mysqli_query($db,$sql);
                        if ($update_the_comment) {
                          header("location: comments.php");
                         } 
                         else
                          {
                            die("my db error " . mysqli_error($db));
                          }
                      }
                    ?>
        
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
