<?php
require_once 'ConnectDB.php';

class ProductModel extends ConnectDB {
    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM products");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductById($id) {
    $sql = "SELECT * FROM products WHERE product_id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
