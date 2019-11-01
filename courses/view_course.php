<!DOCTYPE html>
<html lang="en">
<?php
/* Include <head></head> */
require_once('../includes/header.php');

/* New object of Students() */
require_once('../includes/Courses_class.php');
$courses = new Courses();
/* Get students and its enrollments with id = $_GET["id"] */
$result = $courses-> get_course_details($_GET["id"]);
?>

<body>
    <?php
    /* Include <head></head> */
    require_once('../includes/menu.php');



    ?>
    <div class="container">
        <div class="row top-buffer">
          
            <?php
            $course = $result[0];
            echo "<div><h3>Course:  " . $course[7] . "</h3></div>";
            ?>
            <a href="add_teacher.php" class="btn-primary btn">Add teacher</a>
            <?php
            echo "<div><b>Course ID: </b> " . $course[0] . "</div>";
            echo "<div><b>Teacher ID:</b>" . $course[6] . "</div>";
           
            ?>
            <a href="add_new_student.php" class="btn-primary btn"> Enrolle New Student</a>
      
            <h4>Enrollments</h4>

            <table class="table table-striped">
                <tr>
                    <th>Course ID</th>
                    <th>Student ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>CPR</th>
                </tr>
                <?php
                foreach ($result as $val) {
                    echo "<tr>";
                    echo "<td>" . $val[0] . "</td>";
                    echo "<td>" . $val[1] . "</td>";
                    echo "<td>" . $val[2] . "</td>";
                    echo "<td>" . $val[3] . "</td>";
                    echo "<td>" . $val[4] . "</td>";
                    echo "<td>" . $val[5] . "</td>";

                    echo "</tr>";
                }
                ?>

            </table>


        </div>
    </div>
</body>

</html>