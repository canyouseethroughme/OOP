<!DOCTYPE html>
<html lang="en">
<?php
/* Include <head></head> */
require_once('../includes/header.php');

/* New object of Students() */
require_once('../includes/Courses_class.php');
$courses = new Courses();

// Get id from parameter in URL
$id = $_GET["id"];

// Call delete method in $students object
$courses->delete($id);
?>

<body>
    <?php
    /* Include menu */
    require_once('../includes/menu.php');

    ?>
    <div class="container">
        <div class="row top-buffer">
            <p id="msg" class="alert alert-success">Thank you, course is deleted</p>
        </div>
    </div>

</body>

</html>