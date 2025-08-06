<h2>Sửa sản phẩm</h2>

<form action="index.php?action=admin&act=update&id=<?= $product['product_id'] ?>" method="post">
    <label>Tên sản phẩm:</label><br>
    <input type="text" name="name" value="<?= $product['name'] ?>" required><br><br>

    <label>Giá:</label><br>
    <input type="number" name="price" value="<?= $product['price'] ?>" required><br><br>

    <label>Ảnh (URL):</label><br>
    <input type="text" name="image_product" value="<?= $product['image_product'] ?>" required><br><br>

    <label>Mô tả:</label><br>
    <textarea name="description"><?= $product['description'] ?></textarea><br><br>

    <label>Danh mục:</label><br>
    <select name="category_id">
        <?php
        require_once 'models/CategoryModel.php';
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getAll();
        foreach ($categories as $cat) {
            $selected = ($cat['category_id'] == $product['category_id']) ? 'selected' : '';
            echo "<option value='{$cat['category_id']}' $selected>{$cat['name']}</option>";
        }
        ?>
    </select><br><br>

    <button type="submit">Cập nhật</button>
</form>
