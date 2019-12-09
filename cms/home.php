<?php include_once 'includes/header.php'; ?>
<?php
	if($getFromU->loggedIn() === false) {
		header("Location: index.php");
	}
?>

<?php include_once 'includes/heading.php'; ?>
<?php include_once 'includes/navbar.php'; ?>



<section class="about_section">
	<div class="container-fluid">
	<div class="row">
		<div class="col-8 offset-2 text-center">
			<h3>About Project</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis molestias qui ipsum, autem laudantium? Repellendus quis molestias accusamus aperiam eum assumenda doloremque magnam enim, consectetur architecto, optio. Deleniti ducimus quaerat eos quam doloribus, minima vel, laboriosam itaque quidem veniam laborum ex veritatis beatae ut magnam, ipsa tempora debitis. Aspernatur, at!</p>
		</div>
	</div>
</div>
</section>


<section class="summary mt-5">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-6 mb-4">
				<div class="card">
				  <h5 class="card-header text-center">Teacher's Panel</h5>
				  <div class="card-body">
				    <h5 class="card-title">Special title treatment</h5>
				    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
				    <a href="teachers.php" class="btn btn-info form-control">Go somewhere</a>
				  </div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 mb-4">
				<div class="card">
				  <h5 class="card-header text-center">Student's Panel</h5>
				  <div class="card-body">
				    <h5 class="card-title">Special title treatment</h5>
				    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
				    <a href="batches.php" class="btn btn-info form-control">Go somewhere</a>
				  </div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 mb-4">
				<div class="card">
				  <h5 class="card-header text-center">Courses</h5>
				  <div class="card-body">
				    <h5 class="card-title">Special title treatment</h5>
				    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
				    <a href="view_courses.php" class="btn btn-info form-control">Go somewhere</a>
				  </div>
				</div>
			</div>


		</div>
	</div>
</section>









<?php include 'includes/footer.php'; ?>
