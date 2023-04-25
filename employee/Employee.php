<?php

require_once __DIR__ . '/../database/DataBase.php';

class Employee extends DataBase
{
    public $employee_id;
    public $employee_name;
    public $employee_email;
    public $employee_password;
    public $employee_department;

    public function createEmployee()
    {
        $sql = 'INSERT INTO `employees` (`name`, `email`, `password`, `department_id`) VALUES (?, ?, ?, ?)';
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, 'sssi', $this->employee_name, $this->employee_email, $this->employee_password, $this->employee_department);
        mysqli_stmt_execute($stmt);
        $num_rows = mysqli_stmt_affected_rows($stmt);

        return $num_rows == 1;
    }


    public function getInfo()
    {
        $sql = 'SELECT `name`, `email`, `password`, `department_id`, `created_at` FROM `employees` WHERE `id` = ? ';
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $this->employee_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $data;
    }


    public function updateEmployee()
    {
        $sql = 'UPDATE `employees` SET `name` = ?, `email` = ?, `password` = ?, `department_id` = ? WHERE `id` = ?';
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, 'sssii', $this->employee_name, $this->employee_email, $this->employee_password, $this->employee_department, $this->employee_id);
        mysqli_stmt_execute($stmt);
        $num_rows = mysqli_stmt_affected_rows($stmt);

        return $num_rows != 1;
    }

    public function deleteEmployee()
    {
        $sql = 'DELETE FROM `employees` WHERE `id` = ?';
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $this->employee_id);
        mysqli_stmt_execute($stmt);
        $num_rows = mysqli_stmt_affected_rows($stmt);

        return $num_rows == 1;
    }



    public function getAllEmployee()
    {
        $sql = 'SELECT e.id AS employee_id,  e.name AS employee_name, `email`, `password`, `created_at`, d.name AS `department_name`  FROM `employees` AS e
        INNER JOIN `departments` AS d
        ON e.department_id = d.id ';
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        return $result;
    }
}
