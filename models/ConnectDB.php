<?php
class ConnectDB {
    protected $conn;

    public function __construct() {
        $this->conn = new PDO("mysql:host=localhost;dbname=duanmau_db", "root", "");
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
?>
