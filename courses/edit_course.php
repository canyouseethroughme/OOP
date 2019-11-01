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

$result = $courses->get_course($id);
?>

<body>
    <?php
    /* Include menu */
    require_once('../includes/menu.php');

    ?>
    <div class="container">
        <div class="row top-buffer">
            <div class="alert alert-success">TASK: Edit course in the Database from the input fields below</div>
            <h3>Edit <?php echo $result['title'] ?></h3>
            <div class="col-xs-8 col-xs-offset-2">
                <form class="form-horizontal" method="POST" action="edited_course.php">

                    <input type="hidden" name="id" value="<?php echo $result['courses_id'] ?>">

                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" placeholder="First Name" name="title" value="<?php echo $result['title'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="etcs" class="col-sm-2 control-label">	ETCS</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="etcs" placeholder="Last Name" name="etcs" value="<?php echo $result['ETCS'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="director" class="col-sm-2 control-label">Start Date</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="director" placeholder="date" name="date" value="<?php echo $result['start_date'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="director" class="col-sm-2 control-label">Teacher</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="director" placeholder="date" name="teacher" value="<?php echo $result['fk_teacher'] ?>">
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