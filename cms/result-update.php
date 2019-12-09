<?php include_once 'includes/header.php'; ?>
<?php
  if($getFromU->loggedIn() === false) {
    header("Location: index.php");
  }
?>

<?php
  if (isset($_GET['r_id'])) {
    $r_id = $_GET['r_id'];
    if (!empty($r_id)) {
      $r_id = $getFromU->checkInput($teacher_code);

      $row = $getFromU->viewResultByID($r_id);

      $stu_id = $row->stu_id;
      $course_id = $row->course_id;
      $mark = $row->mark;
      $grade = $row->grade;
    }
  }
?>

<?php

if (isset($_POST['update_result'])) {

  $stu_id = $_POST['stu_id'];
  $course_id = $_POST['course_id'];
  $mark = $_POST['mark'];
  $grade = $_POST['grade'];





  if (empty($stu_id)) {
    $error = "Student ID could not be empty";
  }elseif (empty($course_id)) {
    $error = "Course Code could not be empty";
  }elseif (empty($mark)) {
    $error = "Marks could not be empty";
  }elseif (empty($grade)) {
    $error = "Grade could not be empty";
  }
  else {
    $stu_id = $getFromU->checkInput(strtoupper($stu_id));
    $course_id = $getFromU->checkInput($course_id);
    $mark = $getFromU->checkInput($mark);
    $grade = $getFromU->checkInput($grade);



      //var_dump($move);

      $result_update = $getFromU->result_update($stu_id, $course_id, $mark, $grade, $r_id);

      //var_dump($update_teacher);
if (isset($result_update)) {
      $r_update_msg = "Teacher Updated Successfully";
      header('Location: result.php');


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
      <div class="col-8 offset-2">
        <h2 class="text-center">Update Result</h2>


          <?php if (isset($error)): ?>
            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
              <?php echo $error; ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php endif ?>


        <form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>

          <div class="form-group">
            <input type="hidden" name="teacher_code" required value="<?php echo $r_id ?? ''; ?>">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Student ID</label>
            <input type="text" name="stu_id" class="form-control" placeholder="Enter Student ID" required value="<?php echo $stu_id ?? ''; ?>">
            <div class="invalid-feedback">
              Please Enter Student ID.
            </div>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Course Code</label>
            <input type="text" name="course_id" class="form-control" placeholder="Enter Course Code" required value="<?php echo $course_id ?? ''; ?>">
            <div class="invalid-feedback">
              Please Enter Course Code.
            </div>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Marks</label>
            <input type="text" name="mark" class="form-control" placeholder="Enter Marks" required value="<?php echo $mark ?? ''; ?>">
            <div class="invalid-feedback">
              Please Enter Marks.
            </div>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Grade</label>
            <input type="text" name="grade" class="form-control" placeholder="Enter Student ID" required value="<?php echo $grade ?? ''; ?>">
            <div class="invalid-feedback">
              Please Enter Grade.
            </div>
          </div>




          <input type="submit" name="update_result" class="btn btn-info form-control mt-3" value="Update Teacher">

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















<?php include 'includes/footer.php'; ?>
