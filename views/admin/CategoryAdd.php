<h2 class="mb-4">Thêm danh mục mới</h2>

<form action="index.php?action=category&act=store" method="post" class="row g-3">
    <div class="col-12">
        <label for="name" class="form-label">Tên danh mục:</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>

    <div class="col-12">
        <label for="image_url" class="form-label">Ảnh (URL):</label>
        <input type="text" name="imageURL" id="imageURL" class="form-control" required>
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Thêm danh mục</button>
    </div>
</form>