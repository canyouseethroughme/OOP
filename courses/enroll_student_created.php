<!DOCTYPE html>
<html lang="en">
<?php
/* Include <head></head> */
require_once('../includes/header.php');

/* New object of Students() */
require_once('../includes/Students_class.php');
$students = new Students();

require_once('../includes/Courses_class.php');
$courses = new Courses();

// get name fields from input in new_student.php
$courseId = $_GET['courseId'];
$studentId = $_GET['id'];

// call add method in students object
$res = $courses->check_student_enrollment($studentId, $courseId);
$a = array($res);






?>

<body>
    <?php
    /* Include <head></head> */
    require_once('../includes/menu.php');
    ?>
    <div class="container">
        <div class="row top-buffer">

            <?php

            if (json_encode($a[0][0][0]) == 1) {
                echo '<h3>STUDENT ALREADY ENROLLED</h3>';
            } else {
                echo '<h3>Student enrolled</h3>';
                $ress = $courses->insert_student_enrollment($studentId, $courseId);
                //echo $ress;
            }

            ?>
        </div>
    </div>
</body>

</html>