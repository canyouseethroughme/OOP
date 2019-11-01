<!DOCTYPE html>
<html lang="en">
<?php
require_once('../includes/header.php');

require_once('../includes/Courses_class.php');

$courses = new Courses();

// get name fields from input in new_course.php
$title = $_POST["title"];
$ects =  $_POST["ECTS"];
$teacher = $_POST["teacher"];
$startDate = $_POST["startDate"];
// call add method in Course object
$res = $courses->add($title, $ects, $teacher, $startDate);
echo $res;
?>

<body>
    <?php
     require_once('../includes/menu.php');

    ?>
    <div class="container">
        <div class="row top-buffer">
            <h3>New Course created</h3>
            <div class="col-xs-8 col-xs-offset-2">
            <div><?php echo $title ?></div>
            <div><?php echo $ects ?></div>
            <div><?php echo $teacher ?></div>
            <div><?php echo $startDate ?></div>
            </div>
        </div>
    </div>
</body>

</html>