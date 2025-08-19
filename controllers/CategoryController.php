<?php
require_once 'models/CategoryModel.php';

class CategoryController {

    public function index() {
        // Chuyển hướng mặc định đến danh sách danh mục
        header("Location: index.php?action=category&act=list");
        exit;
    }

    // Danh sách danh mục
    public function list() {
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getAll();
        $view = 'views/admin/CategoryList.php';
        $data['categories'] = $categories;
        include 'views/admin/layout.php';
    }

    // Form thêm danh mục
    public function add() {
        $view = 'views/admin/CategoryAdd.php';
        include 'views/admin/layout.php';
    }

    // Lưu danh mục mới
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'],
                'image_url' => $_POST['image_url']
            ];

            $categoryModel = new CategoryModel();
            $categoryModel->insert($data);

            header("Location: index.php?action=category&act=list");
            exit;
        } else {
            $view = 'views/admin/CategoryAdd.php';
            include 'views/admin/layout.php';
        }
    }

    // Xóa danh mục
    public function delete() {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            echo "Thiếu ID danh mục cần xoá!";
            return;
        }

        $categoryModel = new CategoryModel();
        $success = $categoryModel->delete($id);

        if ($success) {
            header("Location: index.php?action=category&act=list&success=deleted");
            exit;
        } else {
            echo "Xoá danh mục thất bại.";
            $view = 'views/admin/CategoryList.php';
            include 'views/admin/layout.php';
        }
    }

     public function show() {
        $category_id = $_GET['category_id'] ?? null;
        if (!$category_id) {
            echo "Danh mục không tồn tại!";
            return;
        }

        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getAll(); // để hiển thị sidebar danh mục

        $products = $categoryModel->getByCategory($category_id);

        include 'views/layouts/header.php';
        include 'views/Categories.php'; // file hiển thị sản phẩm theo danh mục
        include 'views/layouts/footer.php';
    }

    
}