<!DOCTYPE html>
<html lang="en">
<?php
/* Include <head></head> */
require_once('../includes/header.php');

/* New object of Students() */
require_once('../includes/Students_class.php');
$students = new Students();


$sid = $_POST["sid"];
$cid = $_POST["cid"];
$grade = $_POST["grade"];

$students->grade_student($sid, $cid, $grade);
?>

<body>
    <?php
    /* Include <head></head> */
    require_once('../includes/menu.php');

    ?>
    <div class="container">
        <div class="row top-buffer">
            <p>Thank you, student graded</p>
        </div>
    </div>
</body>

</html>