<!DOCTYPE html>
<html lang="en">

<?php
require_once('../includes/header.php');

require_once('../includes/Teachers_class.php');

$teachers = new Teachers();

$first = $_POST['firstname'];
$last = $_POST['lastname'];
$email = $_POST['email'];
$cpr = $_POST['cpr'];

$res = $teachers->add($first, $last, $email, $cpr);
echo $res;
?>


<body>
    <?php require_once('../includes/menu.php');



    ?>
    <h3>student created</h3>
</body>

</html>