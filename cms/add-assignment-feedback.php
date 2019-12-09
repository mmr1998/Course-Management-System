<?php include_once 'includes/header.php'; ?>
<?php include_once 'includes/heading.php'; ?>
<?php include_once 'includes/navbar.php'; ?>
<?php
	$name = "";
	$email = "";

	if (isset($_POST['submit_btn']) && !empty($_POST['submit_btn'])) {
		$ass_no = $_POST['ass_no'] ?? '';
		$ass_name = $_POST['ass_name'] ?? '';
		$ass_code = $_POST['ass_code'] ?? '';
    $stu_id = $_POST['stu_id'] ?? '';
    $stu_name = $_POST['stu_name'] ?? '';
    $sub_date = $_POST['sub_date'] ?? '';
		$ass_fdbk = $_POST['ass_fdbk'] ?? '';

		if (empty($ass_no)) {
			$error = "Please Enter Assignment No";
		}elseif (empty($ass_name)) {
			$error = "Please Enter Assignment No";
		}elseif (empty($ass_code)) {
			$error = "Please Enter Course Code";
		}elseif (empty($sub_date)) {
			$error = "Please Enter assignment submission Date";
		}elseif (empty($stu_id)) {
			$error = "Please Enter Student ID";
		}elseif (empty($stu_name)) {
			$error = "Please Enter Student Name";
		}elseif (empty($ass_fdbk)) {
			$error = "Please Enter Assignment Description";
		}else {
			$ass_sub_info = $getFromU->create('ass_feedback', array('f_ass_No'=>$ass_no, 'f_ass_name'=>$ass_name, 'f_course_code'=>$ass_code, 'f_stu_id'=>$stu_id,'f_stu_name'=>$stu_name, 'f_ass_desc'=>$ass_fdbk, 'f_ass_date'=>$sub_date ));

			if (isset($ass_sub_info)) {
				$ass_sub_info_msg = "assignment Added Successfully";
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
								<div class="card-header text-center h3">Submit Assignment Feedback</div>
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
									    <label for="exampleFormControlInput1">Submitting Date:</label>
									    <input type="date" name="sub_date" class="form-control" placeholder="Type Submission Deadline">
									  </div>
                    <div class="form-group">
									    <label for="exampleFormControlInput1">Student ID:</label>
									    <input type="text" name="stu_id" class="form-control" placeholder="Enter Student ID" value="<?php echo $teacher_code ?? ''; ?>">
									  </div>
                    <div class="form-group">
									    <label for="exampleFormControlInput1">Student Name:</label>
									    <input type="text" name="stu_name" class="form-control" placeholder="Enter Student Name" value="<?php echo $teacher_code ?? ''; ?>">
									  </div>
									  <div class="form-group">
									    <label for="exampleFormControlInput1">Assignment Feedback:</label>
									    <textarea type="text" name="ass_fdbk" class="form-control" placeholder="Describe Assignment Elements"></textarea>
									  </div>


									  <input type="submit" name="submit_btn" class="btn btn-success form-control" value="Submit">
									</form>
							  </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /home wrapper -->
		</header>
