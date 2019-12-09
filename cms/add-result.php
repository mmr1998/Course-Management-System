<?php include_once 'includes/header.php'; ?>
<?php include_once 'includes/heading.php'; ?>
<?php
	$name = "";
	$email = "";

	if (isset($_POST['submit_btn']) && !empty($_POST['submit_btn'])) {
		$stu_id = $_POST['stu_id'] ?? '';
		$cou_id = $_POST['cou_id'] ?? '';
		$mark = $_POST['mark'] ?? '';
		$grade = $_POST['grade'] ?? '';

		if (empty($stu_id)) {
			$error = "Please Enter Student ID";
		}elseif (empty($cou_id)) {
			$error = "Please Enter Course Code";
		}elseif (empty($mark)) {
			$error = "Please Enter Marks";
		}elseif (empty($grade)) {
			$error = "Please Enter Grade";
		}else {
			$result_info = $getFromU->create('result', array('stu_id'=>$stu_id, 'course_id'=>$cou_id, 'mark'=>$mark, 'grade'=>$grade ));

			if (isset($result_info)) {
				$result_info_msg = "Result Published Successfully";
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
                <div class="col-md-12 center-align"><a class='btn btn-info mt-4 mar-left' href='result.php'>Go Back</a></div><br>
								<div class="card-header text-center h3">Publish New Result </div>
							  <div class="card-body">
							  	<?php if (isset($error)): ?>
							  		<div class="alert alert-danger text-center" role="alert">
											<?php echo $error; ?>
										</div>
							  	<?php endif ?>
									<form method="POST">
										<div class="form-group">
									    <label for="exampleFormControlInput1">Student ID :</label>
									    <input type="text" name="stu_id" class="form-control" placeholder="Enter Student ID" value="<?php echo $name; ?>">
									  </div>
										<div class="form-group">
									    <label for="exampleFormControlInput1">Course Code:</label>
									    <input type="text" name="cou_id" class="form-control" placeholder="Enter Course Code" value="<?php echo $email; ?>">
									  </div>
									  <div class="form-group">
									    <label for="exampleFormControlInput1">Marks :</label>
									    <input type="text" name="mark" class="form-control" placeholder="Enter Marks" value="<?php echo $teacher_code ?? ''; ?>">
									  </div>
									  <div class="form-group">
									    <label for="exampleFormControlInput1">Grade:</label>
									    <input type="text" name="grade" class="form-control" placeholder="Enter Grade" value="<?php echo $teacher_code ?? ''; ?>">
									  </div>

									  <input type="submit" name="submit_btn" class="btn btn-success form-control" value="Publish">
									</form>
							  </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /home wrapper -->
		</header>
