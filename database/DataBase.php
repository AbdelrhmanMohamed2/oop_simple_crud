<?php

class DataBase
{
    public $host_name = 'localhost';
    public $user_name = 'root';
    public $password = '';
    public $data_base = 'oop_crud';
    public $conn;


    public function __construct()
    {
        $this->conn = mysqli_connect($this->host_name, $this->user_name, $this->password, $this->data_base);
        if (!$this->conn) {
            die('Error : ' . mysqli_connect_error());
        }
    }


    public function __destruct()
    {
        mysqli_close($this->conn);
    }
}
