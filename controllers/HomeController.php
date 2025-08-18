<?php
require_once 'models/ProductModel.php';
require_once 'models/CategoryModel.php';

class HomeController {
    public function index() {
        $productModel = new ProductModel();
        $categoryModel = new CategoryModel();

        // Lấy danh sách sản phẩm trực tiếp từ ProductModel
        $products = $productModel->getAll();

        // Lấy danh sách danh mục trực tiếp từ CategoryModel
        $categories = $categoryModel->getAll();

        // Truyền dữ liệu vào view
        include 'views/layouts/header.php';
        include 'views/Home.php';
        include 'views/layouts/footer.php';
    }
}
?>