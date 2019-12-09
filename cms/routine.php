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

  if (isset($_GET['ex_id'])) {
  	$ex_id = $_GET['ex_id'];
  	if (!empty($ex_id)) {
  		$ex_id = $getFromU->checkInput($ex_id);

  		$delete_routine = $getFromU->delete('routine', $ex_id);
  		$delete_msg = "Deleted";

  		header('Location: routine.php');



  	}
  }



?>








<?php include_once 'includes/heading.php'; ?>
<?php include_once 'includes/navbar.php'; ?>



<section class="summary mt-5">
	<div class="container">
		<div class="row">
			<div class="col-10 offset-1">
				<h2 class="text-center">Exam Routine</h2>
        <?php if ($getFromU->admin_only() === true) {?>
          <div class="row">
            <div class="col-md-6"><a class='btn btn-info mt-4 float-left' href='exam-routine.php'>Add New Exam Schedule</a></div>
          </div>
        <?php } ?>
					<?php if (isset($add_course)): ?>
						 <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            	<?php echo "Course Added Successfully"; ?>
            	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
          	</div>

					<?php endif ?>

					<?php if (isset($update_course)): ?>
	          <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
	            <?php echo $update_msg; ?>
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
	          </div>
        	<?php endif ?>

        	<?php if (isset($delete_course)): ?>
	          <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
	            <?php echo $delete_msg; ?>
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
	          </div>
        	<?php endif ?>

					<?php if (isset($error)): ?>
	          <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
	            <?php echo $error; ?>
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
	          </div>
        	<?php endif ?>




				<table class="table table-bordered table-hover">
				  <thead style="background-color: #B7CDDA">
				    <tr class="text-center">
				      <th scope="col">Serial</th>
				      <th scope="col">Exam Type</th>
				      <th scope="col">Exam Date</th>
              <th scope="col">Exam time</th>
              <?php if ($getFromU->admin_only() === true): ?>
                <th scope="col">Actions</th>
              <?php endif ?>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php

				  		$rows = $getFromU->viewRoutine();
				  		$i = 0;
							foreach ($rows as $row) {
                $ex_id = $row->ex_id;
								$ex_type = $row->ex_type;
								$ex_date = $row->ex_date;
                $st_time = $row->st_time;
                $ed_time = $row->ed_time;
								$i++;
						?>

							<tr class="text-center">
					      <th scope="row"><?php echo $i; ?></th>
					      <td><?php echo $ex_type ?></td>
					      <td><?php echo $ex_date ?></td>
                <td><?php echo $st_time ." to ". $st_time ?></td>
                <?php if ($getFromU->admin_only() === true): ?>
                <td class="text-center">
					      		<a href="course_update.php?course_id=<?php echo $ex_id; ?>" class="btn btn-sm btn-warning">Update</a>
					      		<a href="routine.php?ex_id=<?php echo $ex_id; ?>" class="btn btn-sm btn-danger">Delete</a>
					      </td>
                <?php endif ?>
				   		 </tr>



						<?php  	} ?>


				  </tbody>
				</table>


			</div>





		</div>
	</div>
</section>















<?php include 'includes/footer.php'; ?>
