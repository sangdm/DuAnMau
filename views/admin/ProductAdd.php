<h2>Thêm sản phẩm mới</h2>

<form action="index.php?action=admin&act=store" method="post">
    <label>Danh mục:</label><br>
<select name="category_id">
    <?php
    require_once 'models/CategoryModel.php';
    $categoryModel = new CategoryModel();
    $categories = $categoryModel->getAll();
    foreach ($categories as $cat) {
        echo "<option value='{$cat['category_id']}'>{$cat['name']}</option>";
    }
    ?>
</select><br><br>


    <label>Tên sản phẩm:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Số lượng:</label><br>
    <input type="number" name="total_quantity" required><br><br>

    <label>Giá:</label><br>
    <input type="number" step="0.01" name="price" required><br><br>

    <label>Ảnh sản phẩm (link ảnh):</label><br>
    <input type="text" name="image_product" required><br><br>

    <label>Tiêu đề:</label><br>
    <input type="text" name="title"><br><br>

    <label>Mô tả:</label><br>
    <textarea name="description" rows="4"></textarea><br><br>

    <button type="submit">Thêm sản phẩm</button>
</form>

