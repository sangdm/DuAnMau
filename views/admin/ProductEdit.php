<h2 class="mb-4">Sửa sản phẩm</h2>

<form action="index.php?action=admin&act=update&id=<?= $product['product_id'] ?>" method="post" class="row g-3">
    <div class="col-md-6">
        <label for="name" class="form-label">Tên sản phẩm:</label>
        <input type="text" name="name" id="name" value="<?= htmlspecialchars($product['name']) ?>" class="form-control" required>
    </div>

    <div class="col-md-6">
        <label for="price" class="form-label">Giá:</label>
        <input type="number" name="price" id="price" value="<?= htmlspecialchars($product['price']) ?>" step="0.01" class="form-control" required>
    </div>

    <div class="col-md-6">
        <label for="total_quantity" class="form-label">Số lượng:</label>
        <input type="number" name="total_quantity" id="total_quantity" value="<?= htmlspecialchars($product['total_quantity']) ?>" class="form-control" required>
    </div>

    <div class="col-12">
        <label for="image_product" class="form-label">Ảnh (URL):</label>
        <input type="text" name="image_product" id="image_product" value="<?= htmlspecialchars($product['image_product']) ?>" class="form-control" required>
    </div>

    <div class="col-12">
        <label for="description" class="form-label">Mô tả:</label>
        <textarea name="description" id="description" rows="4" class="form-control"><?= htmlspecialchars($product['description']) ?></textarea>
    </div>

    <div class="col-md-6">
        <label for="category_id" class="form-label">Danh mục:</label>
        <select name="category_id" id="category_id" class="form-select" required>
            <?php
            require_once 'models/CategoryModel.php';
            $categoryModel = new CategoryModel();
            $categories = $categoryModel->getAll();
            foreach ($categories as $cat) {
                $selected = ($cat['category_id'] == $product['category_id']) ? 'selected' : '';
                echo "<option value='{$cat['category_id']}' $selected>{$cat['name']}</option>";
            }
            ?>
        </select>
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </div>
</form>