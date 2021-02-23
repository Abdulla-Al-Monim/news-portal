<?php include('inc/header.php'); ?>
<?php include('inc/topBar.php'); ?>
<?php include('inc/menu.php'); ?>
<div class="content-wrapper">
	<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="conent">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<!-- ADD CATEGORY start -->
				<div class="card card-primary card-outline">
					
					<div class="card-header">
						<h1 class="card-title">Add New category</h1>
					</div>
					<div class="card-body">	
						
						<!-- add category form -->
						<form action="" method="POST">
							<div class="form-group">
								<label>Category Name</label>
								<input type="text" name="cat_name" required="required" class="form-control">
							</div>
							<div class="form-group">
								<label>Category Description</label>
								<textarea class="form-control" rows="4" name="cat_desc"></textarea>
							</div>
							<div class="form-group">
								<label>Category Status</label>
								<select name="cat_status" class="form-control" required="required">
									<option value="1">Active</option>
									<option value="0">En-Active</option>
								</select>
							</div>
							<div class="form-group">
								<input type="submit" name="add_category" class="btn btn-primary" value="Add Category">
							</div>
						</form>
					</div>
				</div>
				<?php 
					if (isset($_POST['add_category'])) {
						# code...
						$cat_name 	=$_POST['cat_name'];
			    		$cat_desc	=$_POST['cat_desc'];
			    		$cat_status =$_POST['cat_status'];
			    		$sql = "INSERT INTO category (cat_name, cat_desc, cat_status) values('$cat_name','$cat_desc','$cat_status')";
			    		echo($sql); 
			    		$add_new_category = mysqli_query($db,$sql);
			    		if ($add_new_category) {
			    			# code...
			    			header("location: manageCategory.php");
			    		}
			    		else
			    		{
			    			die("my db error " . mysqli_error($db));
			    		}
					}
				 ?>
				<!-- card design end -->
				</div>
				<!-- add category end -->
				<!-- category manage start -->
				<div class="col-md-6">
				<!-- card design start -->
				<div class="card card-primary card-outline">
					<div class="card-header">
						<h5 class="card-title">Manage all category</h5>
					</div>
					<div class="card-body">
						<table class="table">
						  <thead>
						  	
						    <tr>
						      <th scope="col">#Sl</th>
						      <th scope="col">Category Name</th>
						      <th scope="col">Status</th>
						      <th scope="col">Actin</th>
						      
						    </tr>
						  </thead>
						  <tbody>

		    
							<tr>
								<?php
						    
						    $sql = "select * from category"; 
						    $all_category 	= mysqli_query($db, $sql);
						    $total_cat 		= mysqli_num_rows($all_category);
						    $i              =0;
						    if($total_cat == 0){
						    	echo "No category found";
						    }
						    else {
						    	# code...
						    	while ($rows = mysqli_fetch_assoc($all_category)) {
						    		$cat_id 	=$rows['cat_id'];
						    		$cat_name 	=$rows['cat_name'];
						    		$cat_desc	=$rows['cat_desc'];
						    		$cat_status =$rows['cat_status'];
						    		$i++;
						?>
						  	  <td><?php echo $i; ?></td>	
						      <td><?php echo $cat_name; ?></td>
						      <td><?php 
						      	if ($cat_status == 1) { ?>
						      		<span class="badge badge-primary">Active</span>
						      		
						      		<?php
						      	}
						      	else
						      	{
						      		?>
						      		<span class="badge badge-danger">En-active</span>
						      		<?php
						      		
						      	}
						       ?></td>
						      <td>
						      	<div  class="action-bar">
						      		<ul style="margin: 0!important;padding: 0!important;">
						      			<li style="margin: 0!important;padding: 0!important;"><a href="manageCategory.php?edit=<?php echo $cat_id ?>"><i class="fa fa-edit"></i></a></li>
						      			<li><a href="" data-toggle="modal" 	data-target="#delete<?php echo $cat_id ?>">
											  <i class="fa fa-trash"></i>
											</a></li>
										</ul>
						      	</div>
						      </td>  
						    </tr>
							<!-- Modal -->
							<div class="modal fade" id="delete<?php echo $cat_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
							      				<a href="manageCategory.php?delete=<?php echo $cat_id;?>" class="btn btn-danger">Confirm</a>
							      			</li>
							      			<li><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></li>
							      		</ul>
							      	</div>
							        
							      </div>  
							      <div class="modal-footer">
							        
							      </div>
							    </div>
							  </div>
							</div>

						    		<?php
						    	}
						    }
						    
						     ?>
						    
						    
						  </tbody>
						</table>
						
					</div>
				</div>
				<!-- card design end -->


				</div>
				<!-- category manage end -->


				<!-- card design start  -->
				<?php
					if (isset($_GET['edit'])) {
						$the_cat_id = $_GET['edit'];
						$sql = "select * from category where cat_id = '$the_cat_id'"; 
    					$all_category_info 	= mysqli_query($db, $sql);
    					while ($rows = mysqli_fetch_assoc($all_category_info)) {
			    		$cat_id 	=$rows['cat_id'];
			    		$cat_name 	=$rows['cat_name'];
			    		$cat_desc	=$rows['cat_desc'];
			    		$cat_status =$rows['cat_status'];
					 	?>
			<div class="col-md-6">
				<!-- Update CATEGORY start -->
				<div class="card card-primary card-outline">
					
					<div class="card-header">
						<h1 class="card-title">Update category  info</h1>
					</div>
					<div class="card-body">	
						
						<!-- Update category form -->
						<form action="" method="POST">
							<div class="form-group">
								<label>Category Name</label>
								<input type="text" name="cat_name" required="required" class="form-control" value="<?php echo $cat_name ?>">
							</div>
							<div class="form-group">
								<label>Category Description</label>
								<textarea class="form-control" rows="4" name="cat_desc"><?php echo $cat_desc; ?></textarea>
							</div>
							<div class="form-group">
								<label>Category Status</label>
								<select name="cat_status" class="form-control" required="required">
									<option value="1" <?php if ($cat_status == 1){
										echo "selected";
									}   ?>>Active</option>
									<option value="0"<?php if ($cat_status == 0){
										echo "selected";
									}   ?> >En-Active</option>
								</select>
							</div>
							<div class="form-group">
								<input type="submit" name="save_change" class="btn btn-primary" value="Save Change">
							</div>
						</form>
					</div>
				</div>
				
				<!-- card design end -->
				</div>

						 	<?php
						 	}
						 	if (isset($_POST['save_change'])) {
							# code...
							$cat_name 	=$_POST['cat_name'];
				    		$cat_desc	=$_POST['cat_desc'];
				    		$cat_status =$_POST['cat_status'];
				    		$sql = "UPDATE category SET cat_name='$cat_name', cat_desc='$cat_desc', cat_status='$cat_status' where cat_id ='$the_cat_id'";
				    		echo($sql); 
				    		$update_category = mysqli_query($db,$sql);
				    		if ($update_category) {
				    			# code...
				    			header("location: manageCategory.php");
				    		}
				    		else
				    		{
				    			die("my db error " . mysqli_error($db));
				    		}
						}
					 } 
				 ?>
			</div>


			<!-- delete category -->
			<?php 
				if (isset($_GET['delete'])) {
					# code...
					$delete_id = $_GET['delete'];
					$sql = "DELETE FROM category where cat_id='$delete_id'";
					$delete_the_category = mysqli_query($db,$sql);
					if ($delete_the_category) {
					 	# code...
					 	header("location: manageCategory.php");
					 } 
					 else
		    		{
		    			die("my db error " . mysqli_error($db));
		    		}
				}
			?>
		</div>
	</section>
</div>


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