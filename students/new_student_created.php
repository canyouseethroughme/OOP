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
$first = $_POST["firstname"];
$last =  $_POST["lastname"];
$email = $_POST["email"];
$cpr = $_POST["cpr"];
// call add method in students object
$res = $students->add($first, $last, $email, $cpr);
echo $res;

?>

<body>
    <?php
    /* Include <head></head> */
    require_once('../includes/menu.php');
    ?>
    <div class="container">
        <div class="row top-buffer">
            <h3>New Student created</h3>
            <div class="col-xs-8 col-xs-offset-2">
                <div><?php echo $first ?></div>
                <div><?php echo $last ?></div>
                <div><?php echo $email ?></div>
                <div><?php echo $cpr ?></div>
            </div>
        </div>
    </div>
</body>

</html>