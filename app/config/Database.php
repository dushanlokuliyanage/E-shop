<?php

class Database
{
    private $host = "localhost";
    private $db_name = "eshop_oop";
    private $user = "root";
    private $password = "Dushan2006#**";
    public $conn;

    public function setUpConn()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error) {
            die("Database Connection Error: " . $error->getMessage());
        }

        return $this->conn;
    }
}
