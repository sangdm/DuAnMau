<?php
class HomeController {
    public function index() {
        include 'views/layouts/header.php';
        include 'views/Home.php';
        include 'views/layouts/footer.php';
    }
}
