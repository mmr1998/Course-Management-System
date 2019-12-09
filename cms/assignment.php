<?php include_once 'includes/header.php'; ?>
<?php include_once 'includes/heading.php'; ?>
<?php
	$name = "";
	$email = "";

	if (isset($_POST['submit_btn']) && !empty($_POST['submit_btn'])) {
		$ass_no = $_POST['ass_no'] ?? '';
		$ass_name = $_POST['ass_name'] ?? '';
		$ass_code = $_POST['ass_code'] ?? '';
		$ass_desc = $_POST['ass_desc'] ?? '';
		$sub_date = $_POST['sub_date'] ?? '';

		if (empty($ass_no)) {
			$error = "Please Enter Assignment No";
		}elseif (empty($ass_name)) {
			$error = "Please Enter Assignment No";
		}elseif (empty($ass_code)) {
			$error = "Please Enter Course Code";
		}elseif (empty($sub_date)) {
			$error = "Please Enter assignment submission Date";
		}elseif (empty($ass_desc)) {
			$error = "Please Enter Assignment Description";
		}else {
			$assignment_info = $getFromU->create('assignment', array('ass_No'=>$ass_no, 'ass_name'=>$ass_name, 'course_code'=>$ass_code, 'ass_desc'=>$ass_desc, 'sub_date'=>$sub_date ));

			if (isset($assignment_info)) {
				$$assignment_info_msg = "assignment Added Successfully";
				header('Location: view-assignments.php');
			}
		}


	}
?>






	<header class="home">

			<!-- home wrapper -->
			<div class="signup_section">
				<div class="container">
					<div class="row">
						<div class="col-md-6 offset-3 mt-5">
							<div class="card">
								<div class="col-md-12 center-align"><a class='btn btn-info mt-4 mar-left' href='view-assignments.php'>Go Back</a></div><br>
								<div class="card-header text-center h3">Assignment </div>
							  <div class="card-body">
							  	<?php if (isset($error)): ?>
							  		<div class="alert alert-danger text-center" role="alert">
											<?php echo $error; ?>
										</div>
							  	<?php endif ?>
									<form method="POST">
										<div class="form-group">
									    <label for="exampleFormControlInput1">Assignment No :</label>
									    <input type="text" name="ass_no" class="form-control" placeholder="Enter Assignment No" value="<?php echo $name; ?>">
									  </div>
										<div class="form-group">
									    <label for="exampleFormControlInput1">Assignment Name:</label>
									    <input type="text" name="ass_name" class="form-control" placeholder="Enter Assignment Name" value="<?php echo $email; ?>">
									  </div>
									  <div class="form-group">
									    <label for="exampleFormControlInput1">Course Code :</label>
									    <input type="text" name="ass_code" class="form-control" placeholder="Enter Course Code" value="<?php echo $teacher_code ?? ''; ?>">
									  </div>
									  <div class="form-group">
									    <label for="exampleFormControlInput1">Assignment Description:</label>
									    <textarea type="text" name="ass_desc" class="form-control" placeholder="Describe Assignment Elements"></textarea>
									  </div>
										<div class="form-group">
									    <label for="exampleFormControlInput1">Submittion Deadline:</label>
									    <input type="date" name="sub_date" class="form-control" placeholder="Type Submission Deadline">
									  </div>

									  <input type="submit" name="submit_btn" class="btn btn-success form-control" value="Add New Assignment">
									</form>
							  </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /home wrapper -->
		</header>
