<?php include_once 'includes/header.php'; ?>
<?php
	if($getFromU->loggedIn() === false) {
		header("Location: index.php");
	}
?>



<?php
  $course_name = "";
  $teacher_code = "";

?>

<?php

	if (isset($_GET['ass_id'])) {
		$ass_id = $_GET['ass_id'];
		if (!empty($ass_id)) {
			$ass_id = $getFromU->checkInput($ass_id);
			$result = $getFromU->a_delete('assignment', $ass_id);

				$delete_msg = "assignment Deleted Successfully";


		}
	}


?>
<?php include_once 'includes/heading.php'; ?>
<?php include_once 'includes/navbar.php'; ?>



<section class="summary mt-5">
	<div class="container">
		<div class="row">
			<div class="col-10 offset-1">
				<h2 class="text-center">View assignment</h2>
        <?php if (isset($delete_msg)): ?>
          <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <?php echo $delete_msg; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif ?>

        <?php if ($getFromU->admin_and_teacher_only() === true) {?>
					<div class="row">
						<div class="col-md-6"><a class='btn btn-info mt-4 float-left' href='assignment.php'>Add Assignment</a></div>
						<div class="col-md-6"><a class='btn btn-info mt-4 float-right' href='assignment-feedback.php'>Assignment Feedback</a></div>
					</div>
        <?php } ?>
				<table class="table table-bordered table-hover">
				  <thead style="background-color: #B7CDDA">
				    <tr class="text-center">
				      <th scope="col">Serial</th>
				      <th scope="col">assignment No</th>
				      <th scope="col">assignment Name</th>
              <th scope="col">Course code</th>
              <th scope="col">Submission Deadline</th>
				      <th scope="col">Actions</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php

				  		$rows = $getFromU->viewassignment();
				  		$i = 0;
							foreach ($rows as $row) {
                $ass_id = $row->ass_ID;
                $ass_No = $row->ass_No;
                $course_code = $row->course_code;
                $ass_name = $row->ass_name;
								$sub_date = $row->sub_date;
								$ass_desc = $row->ass_desc;
								$i++;
						?>

							<tr class="text-center">
					      <th scope="row"><?php echo $i; ?></th>
					      <td><?php echo $ass_No ?></td>
                <td><?php echo $ass_name ?></td>
                <td><?php echo $course_code ?></td>
					      <td><?php echo $sub_date ?></td>
					      <td class="text-center">
					      	<button type="button" class="custom-view-btn btn btn-info form-control" data-toggle="modal" data-target="#exampleModalCenter2">View</button>
					      	<?php if ($getFromU->admin_only() === true): ?>
					      		<a href="course_update.php?ass_id=<?php echo $course_id; ?>" class="btn btn-sm btn-warning">Update</a>
					      		<a href="view-assignments.php?ass_id=<?php echo $ass_id; ?>" class="btn btn-sm btn-danger">Delete</a>
					      	<?php endif ?>

					      </td>

								<!-- Modal -->
								<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
								  <div class="modal-dialog modal-dialog-centered" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLongTitle">view assignment</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
												<div class="row">
													<div class="col-12">
														<div class="col col-6">
															<h4>Assignment No: <?php echo $ass_No; ?> </h4>

														</div>
														<div class="col col-6">
															<h4 class="float-right">Submission Deadline: <?php echo $sub_date; ?> </h4>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-12">
														<div class="col col-9">
															<h4>Assignment Name: <?php echo $ass_name; ?> </h4>

														</div>
														<div class="col col-3">
															<h4 class="float-right">Course Code: <?php echo $course_code; ?> </h4>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-12">
														<div class="col col-12">
															<u><h4>Assignment Description </h4></u><br>
															<p><?php echo $ass_desc; ?>  </p>
														</div>
													</div>
												</div>
												<?php if ($getFromU->student_only() === true): ?>
								      		<a href="add-assignment-feedback.php" class="btn btn-info mt-4 align-center">Submit Assignment Feedback</a>
								      	<?php endif ?>

				   		 </tr>



						<?php  	} ?>


				  </tbody>
				</table>


			</div>





		</div>
	</div>
</section>











      </div>

    </div>
  </div>
</div>











<?php include 'includes/footer.php'; ?>
