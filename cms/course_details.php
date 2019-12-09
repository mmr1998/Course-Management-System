<?php include_once 'includes/header.php'; ?>
<?php
	if($getFromU->loggedIn() === false) {
		header("Location: index.php");
	}
?>

<?php
	if (isset($_GET['course_id'])) {
		$course_id = $_GET['course_id'];
		if (!empty($course_id)) {
			$course_id = $getFromU->checkInput($course_id);

			$course = $getFromU->viewCourseById($course_id);
		}
	}


?>





<?php include_once 'includes/heading.php'; ?>
<?php include_once 'includes/navbar.php'; ?>



<section class="summary mt-5">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="text-center">Course Details</h2>

				<h5 class="text-center">Course Name : <?php echo $course->course_name; ?></h5>
				<h6 class="text-center mb-5">Course Code : <?php echo $course_id; ?></h6>





				<table class="table table-bordered table-hover">
				  <thead class="bg-info text-white">
				    <tr class="text-center">
				      <th scope="col">Batch</th>
				      <th scope="col">Total Students</th>
				      <th scope="col">Teacher Code</th>


				    </tr>
				  </thead>
				  <tbody>

				  	<?php

				  		$rows = $getFromU->view_batch_teacher_code_by_course_id($course_id);

							foreach ($rows as $row) {
								$batch 				= $row->batch;
								$teacher_code = $row->teacher_code;

								$total_student = $getFromU->count_total_student_by_batch($batch);


						?>

						<tr class="text-center">
							<td><?php echo $batch; ?></td>
							<td><?php echo $total_student; ?></td>
              <td><?php echo $teacher_code; ?></td>
							
						</tr>




					<?php } ?>




				  </tbody>
				</table>


			</div>





		</div>
	</div>
</section>













<?php include 'includes/footer.php'; ?>
