<?php
ob_start();
session_start();
include('admin/inc/db.php');
//get total number of row 
$total_page = $db->query('select * from pagination')->num_rows;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
// $page = isset( $_GET['page'] ) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
// // each page data

$num_result_per_page = 5;
if ($stmt = $db->prepare( 'SELECT * from pagination order by id limit ?, ?' )) {
	// if ( $stmt = $db->prepare('SELECT * FROM users ORDER BY id LIMIT ?, ?') ){
	$cat_page = ($page-1) * $num_result_per_page;
	$stmt->bind_param('ii', $cal_page,$num_result_per_page);
	//$stmt->bind_param('ii', $cal_page, $num_result_per_page);
		$stmt->execute()
	$result = $stmt->get_result();
}

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Pagination Example Using PHP</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  </head>

  <body>


  	<section>
  		<div class="container">
  			<div class="row">
  				<div class="col-md-12"> 
  					<!-- Table Start -->
  					<table class="table">
					  <thead>
					    <tr>
					      <th scope="col">#Sl.</th>
					      <th scope="col">Name</th>
					      <th scope="col">Email</th>
					      <th scope="col">Date</th>
					    </tr>
					  </thead>

					  <tbody>

					  	<?php
					  		$i = 0;
					  		while( $row = $result->fetch_assoc() ):
					  		$i++;
					  	?>

						    <tr>
						      <th scope="row"><?php echo $i; ?></th>
						      <td><?php echo $row['name']; ?></td>
						      <td><?php echo $row['email']; ?></td>
						      <td><?php echo $row['join_date']; ?></td>
						    </tr>

					    <?php
					    	endwhile;
					    ?>
					    
					  </tbody>
					</table>
					<!-- Table End -->

  				</div>


  				<div class="col-md-12 text-center">
  					<!-- Pagination Start -->

  					<?php if ( ceil( $total_page / $num_result_per_page ) > 0 ) : ?>
	  					<nav aria-label="Page navigation example">
						  <ul class="pagination">

						  	<?php if ( $page > 1 ): ?>
						    	<li class="page-item"><a class="page-link" href="index.php?page=<?php echo $page-1; ?>">Previous</a></li>
						    <?php else: ?>
						    	<li class="page-item disabled"><a class="page-link disabled" href="">Previous</a></li>
						    <?php endif; ?>







						    <?php if ( $page > 3 ): ?>
						    	<li class="page-item">
						    		<a class="page-link" href="index.php?page=1">1</a>
						    	</li>
						    	<li class="page-item">
						    		<a class="page-link" href="">...</a>
						    	</li>
							<?php endif; ?>

							<!-- Previous 2 Page Button Start -->
							<?php if ( $page-2 > 0 ): ?>
						    	<li class="page-item">
						    		<a class="page-link" href="index.php?page=<?php echo $page-2 ?>"><?php echo $page-2; ?></a>
						    	</li>
							<?php endif; ?>

							<?php if ( $page-1 > 0 ): ?>
						    	<li class="page-item">
						    		<a class="page-link" href="index.php?page=<?php echo $page-1 ?>"><?php echo $page-1; ?></a>
						    	</li>
							<?php endif; ?>
							<!-- Previous 2 Page Button End -->


							<!-- Current Page Start -->
						    <li class="page-item active"><a class="page-link" href="index.php?page=<?php echo $page; ?>"><?php echo $page; ?></a></li>
						    <!-- Current Page End -->

						    <!-- Next 2 Page Button Start -->

						    <?php if ( $page+1 < ceil( $total_page / $num_result_per_page ) + 1 ): ?>
						    	<li class="page-item">
						    		<a class="page-link" href="index.php?page=<?php echo $page+1 ?>"><?php echo $page+1; ?></a>
						    	</li>
							<?php endif; ?>

							<?php if ( $page+2 < ceil( $total_page / $num_result_per_page ) + 2 ): ?>
						    	<li class="page-item">
						    		<a class="page-link" href="index.php?page=<?php echo $page+2 ?>"><?php echo $page+2; ?></a>
						    	</li>
							<?php endif; ?>
							<!-- Next 2 Page Button End -->

							<?php if ( $page+3 < ceil( $total_page / $num_result_per_page ) + 3 ): ?>
						    	<li class="page-item">
						    		<a class="page-link" href="index.php?page=<?php echo $page+3 ?>"><?php echo $page+3; ?></a>
						    	</li>
							<?php endif; ?>
							<!-- Next 2 Page Button End -->


						    <?php if ( $page < ceil( $total_page / $num_result_per_page )-2 ): ?>
						    	<li class="page-item">
						    		<a class="page-link" href="index.php?page=1">...</a>
						    	</li>
							<?php endif; ?>








						    <?php if ( $page < ceil( $total_page / $num_result_per_page ) ) : ?>
						    	<li class="page-item"><a class="page-link" href="index.php?page=<?php echo $page+1; ?>">Next</a></li>
						    <?php else: ?>
						    	<li class="page-item disabled"><a class="page-link disabled" href="">Next</a></li>
						    <?php endif; ?>


						  </ul>
						</nav>
					<?php endif; ?>
					<!-- Pagination End -->
  				</div>
  			</div>
  		</div>
  	</section>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>