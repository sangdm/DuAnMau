<?php
session_start();
$action = $_GET['action'] ?? 'home';

if ($action === 'admin') {
    if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
        // Nếu không đăng nhập hoặc không phải admin
        echo "<h2>Không có quyền truy cập trang này!</h2>";
        exit;
    }
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
} elseif ($action === 'category') {
    $act = $_GET['act'] ?? 'list';

    require_once 'controllers/CategoryController.php';
    $controller = new CategoryController();

    switch ($act) {
        case 'list': // Admin list
            $controller->list();
            break;
        case 'add':
            $controller->add();
            break;
        case 'store':
            $controller->store();
            break;
        case 'delete':
            $controller->delete();
            break;
        case 'show': // ✅ Trang user: hiển thị sản phẩm theo danh mục
            $controller->show();
            break;
        default:
            echo "<h2>Trang quản trị danh mục</h2>";
    }
} elseif (in_array($action, ['login', 'register', 'logout'])) {
    require_once 'controllers/UserController.php';
    $controller = new UserController();

    switch ($action) {
        case 'login':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller->login();
            } else {
                $controller->showLoginForm();
            }
            break;

        case 'register':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller->register();
            } else {
                $controller->showRegisterForm();
            }
            break;

        case 'logout':
            $controller->logout();
            break;
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
        case 'category':
            $act = $_GET['act'] ?? 'list';
            if ($act === 'list') {
                $controller->CategoryPage();
            }
            break;

        default:
            require_once 'controllers/HomeController.php';
            $controller = new HomeController();
            $controller->index();
            break;
    }
}
