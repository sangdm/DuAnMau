<?php
require_once 'models/Product.php';

class ProductController {
    public function index() {
        $productModel = new Product();
        $products = $productModel->getAll();
        include 'views/layout/header.php';
        include 'views/product_list.php';
        include 'views/layout/footer.php';
    }

    public function detail($id) {
        $productModel = new Product();
        $product = $productModel->getById($id);
        include 'views/layout/header.php';
        include 'views/product_detail.php';
        include 'views/layout/footer.php';
    }
}
