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

	if (isset($_GET['f_id'])) {
		$ass_id = $_GET['f_id'];
		if (!empty($ass_id)) {
			$f_id = $getFromU->checkInput($f_id);
			$result = $getFromU->f_delete('ass_feedback', $f_id);

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
				<h2 class="text-center">Assignment Feedback</h2>
        <?php if (isset($delete_msg)): ?>
          <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <?php echo $delete_msg; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif ?>


				<table class="table table-bordered table-hover">
				  <thead style="background-color: #B7CDDA">
				    <tr class="text-center">
				      <th scope="col">Serial</th>
				      <th scope="col">assignment No</th>
				      <th scope="col">Student ID</th>
              <th scope="col">Course code</th>
              <th scope="col">Submitted</th>
				      <th scope="col">Actions</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php

				  		$rows = $getFromU->viewassfedback();
				  		$i = 0;
							foreach ($rows as $row) {
                $f_id = $row->f_id;
                $ass_No = $row->f_ass_no;
                $stu_id = $row->f_stu_id;
                $stu_name = $row->f_stu_name;
                $course_code = $row->f_course_code;
                $ass_name = $row->f_ass_name;
								$sub_date = $row->f_ass_date;
								$ass_desc = $row->f_ass_desc;
								$i++;
						?>

							<tr class="text-center">
					      <th scope="row"><?php echo $i; ?></th>
					      <td><?php echo $ass_No ?></td>
                <td><?php echo $stu_id ?></td>
                <td><?php echo $course_code ?></td>
					      <td><?php echo $sub_date ?></td>
					      <td class="text-center">
					      	<button type="button" class="custom-view-btn btn btn-info form-control" data-toggle="modal" data-target="#exampleModalCenter2">View</button>
					      	<?php if ($getFromU->admin_only() === true): ?>
					      		<a href="assignmentfeedback.php?ass_id=<?php echo $f_id; ?>" class="btn btn-sm btn-danger">Delete</a>
					      	<?php endif ?>

					      </td>

								<!-- Modal -->
								<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
								  <div class="modal-dialog modal-dialog-centered" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLongTitle">Assignment Feedback</h5>
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
														<div class="col col-6">
															<h4>Student ID: <?php echo $stu_id; ?> </h4>

														</div>
														<div class="col col-6">
															<h4 class="float-right">Student Name: <?php echo $stu_name; ?> </h4>
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
