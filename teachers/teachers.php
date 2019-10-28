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

    require_once('../includes/Teachers_class.php');
    $teachers = new Teachers();
    $result = $teachers->list();
    ?>
    <div class="container">
        <div class="row top-buffer">
            <a href="new_teacher.php" class="btn-primary btn">New Teacher</a>
            <h3>Teachers</h3>
            <table class="table table-striped">
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
                    echo "<td style='text-align: right'> <a class='btn btn-primary' href='view_teacher.php?id=" . $val[0] . "'>View</a> 
                    <a class='btn btn-danger' href='delete_teacher.php?id=" . $val[0] . "'>Delete</a> 
                    <a class='btn btn-primary' href='edit_teacher.php?id=" . $val[0] . "'>Edit</a> </td>";
                    echo "</tr>";
                }

                ?>
            </table>

            <div class="alert alert-success">TASK: Show list of all Teachers like you see it in the <a href="students.php">students.php</a> page. And with a "View", "Edit", "Delete" functionality. "View" should show details and a list of all course the teacher teaches and you should be able to add the taecher to a course.</div>



        </div>
    </div>
</body>

</html>