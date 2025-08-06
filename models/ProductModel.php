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
        $sql = "INSERT INTO products (category_id, name, total_quantity, description, title, status, price, image_product, created_at, updated_at)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $data['category_id'],
            $data['name'],
            $data['total_quantity'],
            $data['description'],
            $data['title'],
            $data['status'],
            $data['price'],
            $data['image_product']
        ]);
    }

    // Cập nhật sản phẩm
    public function update($id, $data) {
        $sql = "UPDATE products SET 
                    category_id = ?, name = ?, total_quantity = ?, description = ?, 
                    title = ?, status = ?, price = ?, image_product = ?, updated_at = NOW()
                WHERE product_id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $data['category_id'],
            $data['name'],
            $data['total_quantity'],
            $data['description'],
            $data['title'],
            $data['price'],
            $data['image_product'],
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
