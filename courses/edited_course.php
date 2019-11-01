<!DOCTYPE html>
<html lang="en">
<?php
/* Include <head></head> */
require_once('../includes/header.php');

/* New object of Students() */
require_once('../includes/Courses_class.php');
$courses = new Courses();

// Get id from POST 
$id = $_POST["id"];
$title = $_POST['title'];
$ETCS = $_POST['etcs'];
$start_date= $_POST['date'];
$teacher = $_POST['teacher'];

// Call update method in $students object
$courses->update($id, $title, $ETCS, $start_date, $teacher);
?>

<body>
    <?php
    /* Include menu */
    require_once('../includes/menu.php');

    ?>
    <div class="container">
        <div class="row top-buffer">
            <p class="alert alert-success">Thank you, course is updated</p>
        </div>
    </div>

</body>

</html>