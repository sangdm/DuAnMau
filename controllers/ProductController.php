<?php
require_once 'models/ProductModel.php';

class ProductController {

    // Trang user
    public function index() {
        $model = new ProductModel();
        $products = $model->getAll();
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

        include 'views/ProductDetail.php';
    }

    // Admin
    public function adminIndex() {
        $model = new ProductModel();
        $products = $model->getAll();
        $view = 'views/admin/ProductList.php';
        $data['products'] = $products;
        include 'views/admin/layout.php';
    }

    public function addProduct() {
        $view = 'views/admin/ProductAdd.php';
        include 'views/admin/layout.php';
    }

    public function storeProduct() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'category_id' => $_POST['category_id'],
                'name' => $_POST['name'],
                'total_quantity' => $_POST['total_quantity'],
                'description' => $_POST['description'],
                'title' => $_POST['title'],
                'status' => $_POST['status'],
                'price' => $_POST['price'],
                'image_product' => $_POST['image_product']
            ];

            $model = new ProductModel();
            $model->insert($data);

            header("Location: index.php?action=admin&act=list");
            exit;
        } else {
            $view = 'views/admin/ProductAdd.php';
            include 'views/admin/layout.php';
        }
    }

    public function editProduct() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            echo "Không tìm thấy sản phẩm để sửa!";
            return;
        }

        $model = new ProductModel();
        $product = $model->getProductById($id);
        if (!$product) {
            echo "Sản phẩm không tồn tại!";
            return;
        }

        $view = 'views/admin/ProductEdit.php';
        $data['product'] = $product;
        include 'views/admin/layout.php';
    }

    public function updateProduct() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            echo "Thiếu ID sản phẩm!";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'] ?? '',
                'price' => $_POST['price'] ?? 0,
                'image_product' => $_POST['image_product'] ?? '',
                'description' => $_POST['description'] ?? '',
                'category_id' => $_POST['category_id'] ?? 0,
                'total_quantity' => $_POST['total_quantity'] ?? 0,
                'title' => $_POST['title'] ?? '',
            ];

            $model = new ProductModel();
            $success = $model->update($id, $data);

            if ($success) {
                header("Location: index.php?action=admin&act=list");
                exit;
            } else {
                echo "Lỗi khi cập nhật sản phẩm.";
                $view = 'views/admin/ProductEdit.php';
                $data['product'] = $data; // Trả lại dữ liệu vừa nhập để hiển thị lại form
                include 'views/admin/layout.php';
            }
        } else {
            $model = new ProductModel();
            $product = $model->getProductById($id);
            if ($product) {
                $view = 'views/admin/ProductEdit.php';
                $data['product'] = $product;
                include 'views/admin/layout.php';
            } else {
                echo "Sản phẩm không tồn tại!";
            }
        }
    }

    public function deleteProduct() {
    $id = $_GET['id'] ?? null;

    if (!$id) {
        echo "Thiếu ID sản phẩm cần xoá!";
        return;
    }

    $model = new ProductModel();
    $success = $model->delete($id);

    if ($success) {
        header("Location: index.php?action=admin&act=list&success=deleted");
        exit;
    } else {
        echo "Xoá sản phẩm thất bại.";
        $view = 'views/admin/ProductList.php'; // Quay lại danh sách để thông báo lỗi
        include 'views/admin/layout.php';
    }
}

}