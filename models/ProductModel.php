<?php
require_once 'ConnectDB.php';

class ProductModel extends ConnectDB {

    // Lấy tất cả sản phẩm
    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM products ORDER BY product_id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy sản phẩm theo ID
    public function getProductById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM products WHERE product_id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Thêm sản phẩm
    public function insert($data) {
        $sql = "INSERT INTO products (category_id, name, total_quantity, description, title, price, image_product, created_at, updated_at)
                VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $data['category_id'],
            $data['name'],
            $data['total_quantity'],
            $data['description'],
            $data['title'],
            $data['price'],
            $data['image_product']
        ]);
    }

    // Cập nhật sản phẩm
    public function update($id, $data) {
    $sql = "UPDATE products 
            SET name = ?, price = ?, image_product = ?, description = ?, category_id = ?, total_quantity = ?, title = ?
            WHERE product_id = ?";
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute([
        $data['name'],
        $data['price'],
        $data['image_product'],
        $data['description'],
        $data['category_id'],
        $data['total_quantity'],
        $data['title'],
        $id
    ]);
}


   public function delete($id) {
    $sql = "DELETE FROM products WHERE product_id = ?";
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute([$id]);
}


}
?>
