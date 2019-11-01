<!DOCTYPE html>
<html lang="en">
<?php
/* Include <head></head> */
require_once('../includes/header.php');

/* New object of Students() */
require_once('../includes/Students_class.php');
$students = new Students();
/* Get a list of all students in DB */
$result = $students->list();

$courseId = $_GET['courseId'];
//echo $courseId;
?>

<body>
    <?php
    /* Include <head></head> */
    require_once('../includes/menu.php');
    ?>
    <div class="container">
        <div class="row top-buffer">
            <h3>Students</h3>
            <table class=" table table-striped">
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>CPR</th>
                    <th></th>
                </tr>

                <?php

                foreach ($result as $val) {

                    echo "<tr>";
                    echo "<td>" . $val[0] . "</td>";
                    echo "<td>" . $val[1] . "</td>";
                    echo "<td>" . $val[2] . "</td>";
                    echo "<td>" . $val[3] . "</td>";
                    echo "<td>" . $val[4] . "</td>";
                    echo "<td style='text-align: right'> 
                    <a class='btn btn-primary' href='enroll_student_created.php?courseId=" . $courseId . "&id=" . $val[0] . "'>Enroll</a> 
                    ";
                    echo "</tr>";
                }

                ?>
            </table>
        </div>
    </div>
</body>

</html>