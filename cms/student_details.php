<?php include_once 'includes/header.php'; ?>
<?php
	error_reporting(E_ERROR | E_PARSE);

	if($getFromU->loggedIn() === false) {
		header("Location: index.php");
	}
?>

<?php
	if (isset($_GET['student_id'])) {
		$student_id = $_GET['student_id'];
		if (!empty($student_id)) {
			$student_id = $getFromU->checkInput($student_id);

			$student = $getFromU->viewStudentsById($student_id);

			$batch = $student->batch;
			$roll  = $student->roll;
		}
	}


?>





<?php include_once 'includes/heading.php'; ?>
<?php include_once 'includes/navbar.php'; ?>



<section class="summary mt-5">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="text-center">Student Details</h2>
				<h4 class="text-center">Batch : <?php echo $batch; ?></h4>
				<h5 class="text-center">Student Name : <?php echo $student->student_name; ?></h5>
				<h6 class="text-center mb-5">Roll : <?php echo $roll; ?></h6>






				<table class="table table-bordered table-hover">
				  <thead class="bg-info text-white">
				    <tr class="text-center">
				      <th scope="col">Serial</th>
				      <th scope="col">Course ID</th>
				      <th scope="col">Teacher Code</th>


				    </tr>
				  </thead>
				  <tbody>

				  	<?php

				  		$rows = $getFromU->view_course_id_teacher_code_by_batch($batch);
				  		$i = 0;
							foreach ($rows as $row) {
								$course_id 				= $row->course_id;
								$teacher_code = $row->teacher_code;
								$i++;

								//$total_student = $getFromU->count_total_student_by_batch($batch);
								$total_class 	 = $getFromU->count_number_of_class_taken($batch, $course_id) - 2;
								$total_tutorial 	 = $getFromU->count_number_of_tutorial_taken($batch, $course_id) - 2;
								$total_assignment 	 = $getFromU->count_number_of_assignment_taken($batch, $course_id) - 2;
								if ($total_class <= 0) {
									$total_class = 0;
								}
								if ($total_tutorial <= 0) {
									$total_tutorial = 0;
								}
								if ($total_assignment <= 0) {
									$total_assignment = 0;
								}

						?>

						<tr class="text-center">
							<td><?php echo $i; ?></td>
							<td><?php echo $course_id; ?></td>
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
