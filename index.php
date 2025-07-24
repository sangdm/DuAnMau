<?php
$action = $_GET['action'] ?? 'home';

switch ($action) {
    case 'products':
        require_once 'controllers/ProductController.php';
        $controller = new ProductController();
        $controller->index();
        break;
    case 'product-detail':
        require_once 'controllers/ProductController.php';
        $controller = new ProductController();
        $controller->detail($_GET['id']);
        break;
    default:
        require_once 'controllers/HomeController.php';
        $controller = new HomeController();
        $controller->index();
        break;
}
?>
