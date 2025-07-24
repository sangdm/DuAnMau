<?php
require_once 'models/ProductModel.php';

class ProductController {
    public function index() {
        $productModel = new ProductModel();
        $products = $productModel->getAll();
        include 'views/layouts/header.php';
        include 'views/ProductList.php';
        include 'views/layouts/footer.php';
    }

    public function ProductDetail() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            echo "Không tìm thấy sản phẩm!";
            return;
        }

        $model = new ProductModel();
        $product = $model->getProductById($id);

        if (!$product) {
            echo "Sản phẩm không tồn tại!";
            return;
        }

        require 'views/ProductDetail.php';
    }
}
