<?php
class CategoryModel {
    private $conn;

    public function __construct() {
        // Khởi tạo kết nối database (thay bằng cấu hình thực tế của bạn)
        $this->conn = new PDO("mysql:host=localhost;dbname=duanmau_db", "root", "");
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM categories");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($data) {
        $stmt = $this->conn->prepare("INSERT INTO categories (name, imageURL) VALUES (:name, :imageURL)");
        $stmt->execute([
            'name' => $data['name'],
            'imageURL' => $data['imageURL']
        ]);
        return $this->conn->lastInsertId();
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM categories WHERE category_id = :id");
        return $stmt->execute(['id' => $id]);
    }

    public function getByCategory($category_id) {
    $sql = "SELECT * FROM products WHERE category_id = :category_id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([':category_id' => $category_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


    public function CategoryPage() {
    $model = new ProductModel();
    $categories = $model->getAll();
    include 'views/layouts/header.php';
    include 'views/Category.php';
    include 'views/layouts/footer.php';
}
}