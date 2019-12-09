<?php include_once 'includes/header.php'; ?>
<?php include_once 'includes/heading.php'; ?>
<?php
	$name = "";
	$email = "";

	if (isset($_POST['submit_btn']) && !empty($_POST['submit_btn'])) {
		$ex_type = $_POST['ex_type'] ?? '';
		$ex_date = $_POST['ex_date'] ?? '';
		$st_time = $_POST['st_time'] ?? '';
		$ed_time = $_POST['ed_time'] ?? '';

		if (empty($ex_type)) {
			$error = "Please Enter Exam Type";
		}elseif (empty($ex_date)) {
			$error = "Please Enter Exam Date";
		}elseif (empty($st_time)) {
			$error = "Please Enter Exam Starting Time";
		}elseif (empty($ed_time)) {
			$error = "Please Enter Exam Ending Time";
		}else {
			$routine_info = $getFromU->create('routine', array('ex_type'=>$ex_type, 'ex_date'=>$ex_date, 'st_time'=>$st_time, 'ed_time'=>$ed_time ));

			if (isset($routine_info)) {
				$routine_info_msg = "assignment Added Successfully";
				header('Location: routine.php');
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
								<div class="col-md-12 center-align"><a class='btn btn-info mt-4 mar-left' href='routine.php'>Go Back</a></div><br>
								<div class="card-header text-center h3">Exam Routine </div>
							  <div class="card-body">
							  	<?php if (isset($error)): ?>
							  		<div class="alert alert-danger text-center" role="alert">
											<?php echo $error; ?>
										</div>
							  	<?php endif ?>
									<form method="POST">
										<div class="form-group">
									    <label for="exampleFormControlInput1">Exam Type:</label>
									    <input type="text" name="ex_type" class="form-control" placeholder="Enter Exam Time" value="<?php echo $name; ?>">
									  </div>
										<div class="form-group">
									    <label for="exampleFormControlInput1">Exam Date:</label>
									    <input type="date" name="ex_date" class="form-control" placeholder="Enter Exam Date" value="<?php echo $email; ?>">
									  </div>
									  <div class="form-group">
									    <label for="exampleFormControlInput1">Starting Time:</label>
									    <input type="time" name="st_time" class="form-control" placeholder="Enter Starting Time" value="<?php echo $teacher_code ?? ''; ?>">
									  </div>
										<div class="form-group">
									    <label for="exampleFormControlInput1">Ending Time:</label>
									    <input type="time" name="ed_time" class="form-control" placeholder="Type Ending Time">
									  </div>

									  <input type="submit" name="submit_btn" class="btn btn-success form-control" value="Register">
									</form>
							  </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /home wrapper -->
		</header>
