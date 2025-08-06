<?php
$action = $_GET['action'] ?? 'home';

if ($action === 'admin') {
    $act = $_GET['act'] ?? 'list';

    require_once 'controllers/ProductController.php';
    $controller = new ProductController();

    switch ($act) {
        case 'list':
            $controller->adminIndex(); // Danh sách sản phẩm
            break;
        case 'add':
            $controller->addProduct(); // Form thêm sản phẩm
            break;
        case 'store':
            $controller->storeProduct(); // Xử lý thêm mới (POST)
            break;
        case 'edit':
            $controller->editProduct(); // Form sửa sản phẩm
            break;
        case 'update':
            $controller->updateProduct(); // Xử lý cập nhật (POST)
            break;
        case 'delete':
            $controller->deleteProduct(); // Xử lý xoá
            break;
        default:
            echo "<h2>Trang quản trị sản phẩm</h2>";
    }

} else {
    switch ($action) {
        case 'products':
            require_once 'controllers/ProductController.php';
            $controller = new ProductController();
            $controller->index(); 
            break;

        case 'ProductDetail':
            require_once 'controllers/ProductController.php';
            $controller = new ProductController();
            $controller->ProductDetail();
            break;

        default:
            require_once 'controllers/HomeController.php';
            $controller = new HomeController();
            $controller->index(); 
            break;
    }
}
