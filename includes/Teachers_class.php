<?php

require_once('connection.php');

class Teachers
{
    public function add($first, $last, $email, $cpr)
    {
        $db = new DB();
        $con = $db->connect();
        if ($con) {
            try {
                $stmt = $con->prepare("INSERT INTO teachers (first_name, last_name, email, cpr) VALUES(:firstname, :lastname, :email, :cpr)");
                $stmt->bindParam(':firstname', $first);
                $stmt->bindParam('lastname', $last);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':cpr', $cpr);
                $ok = $stmt->execute();

                $stmt = null;

                $db->disconnect($con);
                return ($ok);
            } catch (PDOException $e) {
                echo $e;
            }
        } else {
            $stmt = null;
            $db->disconnect($con);
            return false;
        }
    }


    function list()
    {
        $db = new DB();

        $con = $db->connect();

        if ($con) {
            $results = array();
            $stmt = $con->prepare("SELECT * FROM teachers ORDER BY teachers_id");
            $stmt->execute();

            while ($row = $stmt->fetch())
                $results[] = [$row['teachers_id'], $row['first_name'], $row['last_name'], $row['email'], $row['cpr']];



            $stmt = null;

            $db->disconnect($con);

            return $results;
        } else
            return false;
    }

    function get_teacher($id)
    {
        $db = new DB();
        $con = $db->connect();

        if ($con) {
            $stmt = $con->prepare('SELECT * FROM teachers WHERE teachers_id=:id');
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $row = $stmt->fetch();

            $stmt = null;
            $db->disconnect($con);

            return $row;
        } else {
            $stmt = null;
            $db->disconnect($con);
            return false;
        }
    }

    function get_teacher_and_enrollments($id)
    {

        $db = new DB();
        $con = $db->connect();
        if ($con) {

            $results = array();
            $stmt = $con->prepare("SELECT teachers.*, courses.* FROM teachers" .
                " LEFT JOIN courses_teachers ON teachers.teachers_id = courses_teachers.fk_teachers" .
                " LEFT JOIN courses ON courses.courses_id = courses_teachers.fk_courses" .
                " WHERE teachers.teachers_id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            while ($row = $stmt->fetch()) {
                $results[] = [$row["teachers_id"], $row["first_name"], $row["last_name"], $row["email"], $row["cpr"], $row["courses_id"], $row["title"], $row["start_date"], $row["ETCS"]];
            }

            $stmt = null;
            $db->disconnect($con);

            return $results;
        } else { }
    }

    function update($id, $first_name, $last_name, $email, $cpr)
    {
        $db = new DB();
        $con = $db->connect();
        if ($con) {
            $stmt = $con->prepare('UPDATE teachers SET first_name = :firstname, last_name = :lastname, email = :email, cpr = :cpr WHERE teachers_id = :id');

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':firstname', $first_name);
            $stmt->bindParam(':lastname', $last_name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':cpr', $cpr);
            $ok = $stmt->execute();

            $stmt = null;
            $db->disconnect($con);

            return $ok;
        } else return false;
    }

    function delete($id)
    {
        $db = new DB();
        $con = $db->connect();

        if ($con) {
            $stmt = $con->prepare('DELETE FROM teachers WHERE teachers_id = :id');
            $stmt->bindParam(':id', $id);
            $ok = $stmt->execute();

            $stmt = null;
            $db->disconnect($con);
            return $ok;
        } else return false;
    }
}
