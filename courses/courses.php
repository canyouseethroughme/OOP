<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/app.css" />
    <title>Kea Students management</title>
</head>

<body>
    <?php  /* Include <head></head> */
    require_once('../includes/menu.php');

    require_once('../includes/Courses_class.php');
$courses = new Courses();
/* Get a list of all students in DB */
$result = $courses->list();

?>
    <div class="container">
        
        <div class="row top-buffer">
            <a href="new_course.php" class="btn-primary btn">New course</a>
            <h1>Courses</h1>

            <div class="alert alert-success"> 
            You should at the "view course" page be able to add a teacher to a course, and should be able to enrolle new students. 
            </div>
            <table class=" table table-striped">
                <tr>
                    <th>Course ID</th>
                    <th>Title</th>
                    <th>ECTS</th>
                    <th>Teacher ID</th>
                    <th>Start Date</th>
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
                    echo "<td style='text-align: right'> <a class='btn btn-primary' href='view_course.php?id=" . $val[0] . "'>View</a> 
                    <a class='btn btn-danger' href='delete_course.php?id=" . $val[0] . "'>Delete</a> 
                    <a class='btn btn-primary' href='edit_course.php?id=" . $val[0] . "'>Edit</a> </td>";
                    echo "</tr>";
                }

                ?>
            </table>




        </div>
    </div>
</body>

</html>