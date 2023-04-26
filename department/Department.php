<?php

require_once __DIR__ . '/../database/DataBase.php';

class Department extends DataBase
{
    public $department_id;
    public $department_name;


    public function createDepartment()
    {
        $sql = 'INSERT INTO `departments` (`name`) VALUES (?)';
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, 's', $this->department_name);
        mysqli_stmt_execute($stmt);
        $num_rows = mysqli_stmt_affected_rows($stmt);

        return $num_rows == 1;
    }


    public function getInfo()
    {
        $sql = 'SELECT `id`, `name` FROM `departments` WHERE `id` = ? ';
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $this->department_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $data;
    }


    public function updateDepartment()
    {
        $sql = 'UPDATE `departments` SET `name` = ? WHERE `id` = ?';
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, 'si', $this->department_name, $this->department_id);
        mysqli_stmt_execute($stmt);
        $num_rows = mysqli_stmt_affected_rows($stmt);

        return $num_rows == 1;
    }

    public function deleteDepartment()
    {
        $sql = 'DELETE FROM `departments` WHERE `id` = ?';
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $this->department_id);
        mysqli_stmt_execute($stmt);
        $num_rows = mysqli_stmt_affected_rows($stmt);

        return $num_rows == 1;
    }



    public function getAllDepartments()
    {
        $sql = 'SELECT d.id AS department_id, d.name AS department_name, COUNT(department_id) AS number_of_employee
        FROM departments AS d
        LEFT JOIN employees AS e
        ON d.id = e.department_id
        GROUP BY department_name
        ORDER BY number_of_employee DESC';
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        return $result;
    }
}
