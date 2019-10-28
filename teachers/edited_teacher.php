<!DOCTYPE html>
<html lang="en">
<?php
/* Include <head></head> */
require_once('../includes/header.php');

/* New object of Students() */
require_once('../includes/Teachers_class.php');
$teachers = new Teachers();

// Get id from POST 
$id = $_POST["id"];
$fname = $_POST["firstname"];
$lname = $_POST["lastname"];
$email = $_POST["email"];
$cpr = $_POST["cpr"];

// Call update method in $students object
$teachers->update($id, $fname, $lname, $email, $cpr);
?>

<body>
    <?php
    /* Include menu */
    require_once('../includes/menu.php');

    ?>
    <div class="container">
        <div class="row top-buffer">
            <p class="alert alert-success">Thank you, teacher is updated</p>
        </div>
    </div>

</body>

</html>