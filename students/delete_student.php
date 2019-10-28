<!DOCTYPE html>
<html lang="en">
<?php
/* Include <head></head> */
require_once('../includes/header.php');

/* New object of Students() */
require_once('../includes/Students_class.php');
$students = new Students();

// Get id from parameter in URL
$id = $_GET["id"];

// Call delete method in $students object
$students->delete($id);
?>

<body>
    <?php
    /* Include menu */
    require_once('../includes/menu.php');

    ?>
    <div class="container">
        <div class="row top-buffer">
            <p id="msg" class="alert alert-success">Thank you, student is deleted</p>
        </div>
    </div>

</body>

</html>