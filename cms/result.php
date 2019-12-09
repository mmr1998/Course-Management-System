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

  if (isset($_GET['r_id'])) {
  	$r_id = $_GET['r_id'];
  	if (!empty($r_id)) {
  		$r_id = $getFromU->checkInput($r_id);

  		$delete_result = $getFromU->delete('result', $r_id);
  		$delete_msg = "Deleted";

  		header('Location: result.php');



  	}
  }



?>








<?php include_once 'includes/heading.php'; ?>
<?php include_once 'includes/navbar.php'; ?>



<section class="summary mt-5">
	<div class="container">
		<div class="row">
			<div class="col-10 offset-1">
				<h2 class="text-center">Result</h2>
        <?php if ($getFromU->admin_only() === true) {?>
          <div class="row">
            <div class="col-md-6"><a class='btn btn-info mt-4 float-left' href='add-result.php'>Publish New Result</a></div>
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
				      <th scope="col">Student ID</th>
				      <th scope="col">Course Code</th>
              <th scope="col">Marks</th>
              <th scope="col">Grade</th>
              <?php if ($getFromU->admin_only() === true): ?>
                <th scope="col">Actions</th>
              <?php endif ?>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php

				  		$rows = $getFromU->viewResult();
				  		$i = 0;
							foreach ($rows as $row) {
                $r_id = $row->r_id;
								$stu_id = $row->stu_id;
								$course_id = $row->course_id;
                $mark = $row->mark;
                $grade = $row->grade;
								$i++;
						?>

							<tr class="text-center">
					      <th scope="row"><?php echo $i; ?></th>
					      <td><?php echo $stu_id ?></td>
					      <td><?php echo $course_id ?></td>
                <td><?php echo $mark ?></td>
                <td><?php echo $grade ?></td>
                <?php if ($getFromU->admin_only() === true): ?>
                <td class="text-center">
					      		<a href="result_update.php?r_id=<?php echo $r_id; ?>" class="btn btn-sm btn-warning">Update</a>
					      		<a href="result.php?r_id=<?php echo $r_id; ?>" class="btn btn-sm btn-danger">Delete</a>
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
