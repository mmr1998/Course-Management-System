<?php include_once 'includes/header.php'; ?>
<?php
	if($getFromU->loggedIn() === false) {
		header("Location: index.php");
	}
?>

<?php include_once 'includes/heading.php'; ?>
<?php include_once 'includes/navbar.php'; ?>





<section class="summary mt-5">
	<div class="container">
		<h3 class="text-center mb-4">All Batches</h3>
		<div class="row">
			<div class="col-md-4 col-sm-6 mb-4">
				<div class="card">
				  <h5 class="card-header text-center">1620 Batch</h5>
				  <div class="card-body">
				    <a href="view_students.php?batch=1620" class="btn btn-info form-control">Details</a>
				  </div>
				</div>
			</div>

			<div class="col-md-4 col-sm-6 mb-4">
				<div class="card">
				  <h5 class="card-header text-center">1810 Batch</h5>
				  <div class="card-body">
				    <a href="view_students.php?batch=1810" class="btn btn-info form-control">Details</a>
				  </div>
				</div>
			</div>
		</div>
	</div>
</section>















<?php include 'includes/footer.php'; ?>
