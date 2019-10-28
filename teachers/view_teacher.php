<!DOCTYPE html>
<html lang="en">
<?php
/* Include <head></head> */
require_once('../includes/header.php');

/* New object of Students() */
require_once('../includes/Teachers_class.php');
$teachers = new Teachers();
/* Get students and its enrollments with id = $_GET["id"] */
$result = $teachers->get_teacher_and_enrollments($_GET["id"]);
?>

<body>
    <?php
    /* Include <head></head> */
    require_once('../includes/menu.php');



    ?>
    <div class="container">
        <div class="row top-buffer">
            <div class="alert alert-success">TASK: Finish code so student and his or hers course enrollments are shown. A posibillity to enroll the student at a course should be pressent. </div>
            <h3>Teacher</h3>
            <?php
            $teacher = $result[0];
            echo "<div><b>Teacher ID: </b> " . $teacher[0] . "</div>";
            echo "<div><b>First Name: </b>" . $teacher[1] . "</div>";
            echo "<div><b>Last Name: </b>" . $teacher[2] . "</div>";
            echo "<div><b>Email: </b>" . $teacher[3] . "</div>";
            echo "<div><b>Cpr: </b>" . $teacher[4] . "</div>";

            ?>
            <div class="top-buffer">
                <?php echo "<a class='btn btn-danger' href='enroll_student.php?id=" . $teacher[0] . "'>Enroll Teacher at new Course</a>" ?>
            </div>

            <h4>Enrollments</h4>

            <table class="table table-striped">
                <tr>
                    <th>Course ID</th>
                    <th>Title</th>
                    <th>Start Date</th>
                    <th>ETCS</th>

                </tr>
                <?php
                foreach ($result as $val) {
                    echo "<tr>";
                    echo "<td>" . $val[5] . "</td>";
                    echo "<td>" . $val[6] . "</td>";
                    echo "<td>" . $val[7] . "</td>";
                    echo "<td>" . $val[8] . "</td>";

                    // Check if there is an enrollment and if it is graded

                    echo "</tr>";
                }
                ?>

            </table>


        </div>
    </div>
</body>

</html>