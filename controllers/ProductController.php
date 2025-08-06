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
        include 'views/admin/ProductList.php';
    }

    public function addProduct() {
        include 'views/admin/ProductAdd.php';
    }

    public function storeProduct() {
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
    }

    public function editProduct() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            echo "Không tìm thấy sản phẩm để sửa!";
            return;
        }

        $model = new ProductModel();
        $product = $model->getProductById($id);
        include 'views/admin/ProductEdit.php';
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
        ];

        $model = new ProductModel();
        $success = $model->update($id, $data);

        if ($success) {
            header("Location: index.php?action=admin&act=list");
            exit;
        } else {
            echo "Lỗi khi cập nhật sản phẩm.";
        }
    } else {
        echo "Phương thức gửi dữ liệu không hợp lệ.";
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
        header("Location: index.php?action=admin&act=list");
        exit;
    } else {
        echo "Xoá sản phẩm thất bại.";
    }
}

}
