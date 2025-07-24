<?php
require_once 'models/ProductModel.php';

class ProductController {
    public function index() {
        $productModel = new Product();
        $products = $productModel->getAll();
        include 'views/layouts/header.php';
        include 'views/ProductList.php';
        include 'views/layouts/footer.php';
    }

    public function detail($id) {
        $productModel = new Product();
        $product = $productModel->getById($id);
        include 'views/layouts/header.php';
        include 'views/ProductDetail.php';
        include 'views/layouts/footer.php';
    }
}
