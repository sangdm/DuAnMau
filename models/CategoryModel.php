<?php
require_once 'ConnectDB.php';

class CategoryModel extends ConnectDB {
    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM categories");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
