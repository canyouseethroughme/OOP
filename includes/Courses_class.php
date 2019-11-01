<?php

/**
 * Students class
 * 
 * @author Claus Bové
 * @date  October 2019
 */
require_once("connection.php");

class Courses
{
    function list()
    {

        $db = new DB();
        $con = $db->connect();
        if ($con) {
            $results = array();

            $stmt = $con->prepare("SELECT * FROM courses ORDER BY courses_id");
            $stmt->execute();

            while ($row = $stmt->fetch())
                $results[] = [$row["courses_id"], $row["title"], $row["ETCS"], $row["fk_teacher"], $row["start_date"]];

            $stmt = null;
            $db->disconnect($con);

            return $results;
        } else
            return false;
    }

    function get_course($id)
    {

        $db = new DB();
        $con = $db->connect();
        if ($con) {

            $result = array();
            $stmt = $con->prepare("SELECT * FROM courses WHERE courses_id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $row = $stmt->fetch();

      
            $stmt = null;
            $db->disconnect($con);

            return $row;
           // return $result;
        } else {
            $stmt = null;
            $db->disconnect($con);
            return false;
         }
    }



    /**
     * Retrieves specific student and its enrollments based on the id
     * 
     * @param id of the student
     * @return all students fields (students_id, first_name, last_name, enrollment_date, cpr) as an array
     */

     
 

    function get_course_details($id)
    {

        $db = new DB();
        $con = $db->connect();
        if ($con) {
            $results = array();
            $stmt = $con->prepare("SELECT  courses.*, students.*, courses_students.fk_courses FROM students" .
                " LEFT JOIN courses_students ON students.students_id = courses_students.fk_students" .
                " LEFT JOIN courses ON courses.courses_id = courses_students.fk_courses" .
                " WHERE courses.courses_id  = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            while ($row = $stmt->fetch()) {
                $results[] = [$row["courses_id"], $row["students_id"], $row["first_name"], $row["last_name"], $row["email"], $row["cpr"], $row["fk_teacher"], $row["title"], $row["start_date"], $row["ETCS"]];
            }

            $stmt = null;
            $db->disconnect($con);

            return $results;
        } else { }
    }

    /**
     * Inserts a new course
     * 
     * @param title, last_name, enrollment_date, cpr of the new student
     * @return true if the insertion was correct, false if there was an error
     */
    function add($title, $ECTC, $teacher, $start_date)
    {
        $db = new DB();
        $con = $db->connect();
        if ($con) {
            try {
                $stmt = $con->prepare("INSERT INTO courses (title, ETCS, fk_teacher, start_date)
                        VALUES (:title, :ETCS, :teacher, :startDate)");
                $stmt->bindParam(':title', $title);
                $stmt->bindParam(':ETCS', $ECTC);
                $stmt->bindParam(':teacher', $teacher);
                $stmt->bindParam(':startDate', $start_date);
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

 
    function update($id, $title, $ETCS, $start_date, $teacher)
    {
        $db = new DB();
        $con = $db->connect();

        if ($con) {
            $stmt = $con->prepare('UPDATE courses SET title = :title, start_date = :start_date, ETCS = :ETCS, fk_teacher = :teacher WHERE courses_id = :id');

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':ETCS', $ETCS);
            $stmt->bindParam(':start_date', $start_date);
            $stmt->bindParam(':teacher', $teacher);
            $ok = $stmt->execute();

            $stmt = null;
            $db->disconnect($con);

            return ($ok);
        } else
            return false;
    }

 
    function delete($id)
    {
        $db = new DB();
        $con = $db->connect();
        if ($con) {

            $stmt = $con->prepare('DELETE FROM courses WHERE courses_id = :id');
            $stmt->bindParam(':id', $id);
            $ok = $stmt->execute();

            $stmt = null;
            $db->disconnect($con);

            return ($ok);
        } else
            return false;
    }

    
}
