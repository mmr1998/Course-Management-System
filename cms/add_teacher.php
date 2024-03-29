<?php include_once 'includes/header.php'; ?>
<?php
	if($getFromU->loggedIn() === false) {
		header("Location: index.php");
	}
?>

<?php

if (isset($_POST['add_teacher'])) {

	$teacher_code = $_POST['teacher_code'];
	$teacher_name = $_POST['teacher_name'];
	$t_position = $_POST['t_position'];
	$t_speciality = $_POST['t_speciality'];


	if (empty($teacher_code)) {
		$error = "Teacher Code could not be empty";
	}elseif (empty($teacher_name)) {
		$error = "Teacher Name could not be empty";
	}elseif (empty($t_position)) {
		$error = "Teacher Position could not be empty";
	}elseif (empty($t_speciality)) {
		$error = "Teacher Speciality could not be empty";
	}elseif (!preg_match("/^[a-zA-Z]*$/",$teacher_code)) {
		$error = "Only Letters are allowed for Teacher Code";
	}elseif (!preg_match("/^[a-zA-Z. ]*$/",$teacher_name)) {
		$error = "Only Letters & White Space are allowed for Teacher Name";
	}elseif (!preg_match("/^[a-zA-Z,.& ]*$/",$t_speciality)) {
		$error = "Only Letters & White Space are allowed for Teacher Speciality";
	}
	else {
		$teacher_code = $getFromU->checkInput(strtoupper($teacher_code));
		$teacher_name = $getFromU->checkInput($teacher_name);
		$t_position = $getFromU->checkInput($t_position);
		$t_speciality = $getFromU->checkInput($t_speciality);

		 	$add_teacher = $getFromU->create("teachers", array("teacher_code" => $teacher_code, "teacher_name" => $teacher_name, "t_position" => $t_position, "t_speciality" => $t_speciality));

		 	if (isset($add_teacher)) {
		 		$t_add_msg = "Teacher Added Successfully";
		 		header('Location: teachers.php');
		 	}else {
			$error = "Invalid Format";
		}

	}


}

?>





<?php include_once 'includes/heading.php'; ?>
<?php include_once 'includes/navbar.php'; ?>

<section class="summary mt-5">
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-3 pt-3 pb-3" style="background-color: #E1DFBC">
				<h4 class="text-center">Add Teacher</h4>


					<?php if (isset($error)): ?>
						 <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
            	<?php echo $error; ?>
            	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
          	</div>

					<?php endif ?>

				<form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>

				  <div class="form-group">
				    <label for="exampleFormControlInput1">Teacher Code</label>
				    <input type="text" name="teacher_code" class="form-control" placeholder="Enter Teacher Code" required value="<?php echo $teacher_code ?? ''; ?>">
				    <div class="invalid-feedback">
		          Please Enter Teacher Code.
		        </div>
				  </div>
				  <div class="form-group">
				    <label for="exampleFormControlInput1">Teacher Name</label>
				    <input type="text" name="teacher_name" class="form-control" placeholder="Enter Teacher Name" required value="<?php echo $teacher_name ?? ''; ?>">
				    <div class="invalid-feedback">
		          Please Enter Teacher Name.
		        </div>
				  </div>
				  <div class="form-group">
				    <label for="exampleFormControlSelect1">Teacher Position</label>
				    <select name="t_position" class="form-control" required value="<?php echo $t_position ?? ''; ?>">
				      <option value="">--- Select One ---</option>
				      <option value="Professor">Professor</option>
				      <option value="Associate Professor">Associate Professor</option>
				      <option value="Assistant Professor">Assistant Professor</option>
				      <option value="Lecturer">Lecturer</option>
				    </select>
				    <div class="invalid-feedback">
		          Please choose an Option.
		        </div>
				  </div>

				  <div class="form-group">
				    <label for="exampleFormControlInput1">Speciality</label>
				    <input type="text" name="t_speciality" class="form-control" placeholder="Enter Teacher Speciality" required value="<?php echo $t_speciality ?? ''; ?>">
				    <div class="invalid-feedback">
		          Please Enter Speciality.
		        </div>
				  </div>

					<input type="submit" name="add_teacher" class="btn btn-info form-control mt-3" value="Add Teacher">

				</form>


				<script>
				// Example starter JavaScript for disabling form submissions if there are invalid fields
				(function() {
				  'use strict';
				  window.addEventListener('load', function() {
				    // Fetch all the forms we want to apply custom Bootstrap validation styles to
				    var forms = document.getElementsByClassName('needs-validation');
				    // Loop over them and prevent submission
				    var validation = Array.prototype.filter.call(forms, function(form) {
				      form.addEventListener('submit', function(event) {
				        if (form.checkValidity() === false) {
				          event.preventDefault();
				          event.stopPropagation();
				        }
				        form.classList.add('was-validated');
				      }, false);
				    });
				  }, false);
				})();
				</script>

			</div>




		</div>
	</div>
</section>







<footer class="footer">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 offset-2">
				<p>Copyright: &copy IIT-6<sup>th</sup> Batch, JU</p>
			</div>
		</div>
	</div>
</footer>











<?php include 'includes/footer.php'; ?>
