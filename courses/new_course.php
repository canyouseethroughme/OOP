<!DOCTYPE html>
<html lang="en">
<?php
/* Include <head></head> */
require_once('../includes/header.php');


/* New object of Courses() */
//require_once(dirname(__FILE__) . '/includes/Courses_class.php');
//$courses = new Course();
/* Get a list of all courses in DB */
//$result = $courses->list();
?>

<body>
    <?php
    /* Include <head></head> */
    require_once('../includes/menu.php');
    ?>
    <div class="container">
        <div class="row top-buffer">
            <div class="alert alert-success">TASK: Create new course in the Database from the input fields below</div>
            <h3>New Course</h3>
            <div class="col-xs-8 col-xs-offset-2">
                <form class="form-horizontal" method="POST" action="new_course_created.php">
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" placeholder="Course Title" name="title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ects" class="col-sm-2 control-label">ECTS</label>
                        <div class="col-sm-10">
                            <input type="text"  class="form-control" id="ects" placeholder="ECTS" name="ECTS">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="teacher" class="col-sm-2 control-label">Teacher ID</label>
                        <div class="col-sm-10">
                            <input type="number"  class="form-control" id="teacher" placeholder="Teacher ID" name="teacher">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="plot" class="col-sm-2 control-label">Start Date</label>
                        <div class="col-sm-10">
                            <input type="date"  class="form-control" id="plot" placeholder="Start Date" name="startDate">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-primary" value="Save">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>