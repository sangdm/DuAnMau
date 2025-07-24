<?php
$action = $_GET['action'] ?? 'home';

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

?>
