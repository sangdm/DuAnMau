<h2 class="mb-4">Danh sách sản phẩm</h2>

<!-- Toast Notification -->
<div class="position-fixed top-0 end-0 p-3" style="z-index: 1100;">
    <div id="deleteToast" class="toast hide toast-custom" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">Thành công</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Xóa sản phẩm thành công!
        </div>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover" style="background-color: #f8f9fa;">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Mô tả</th>
                <th>Ảnh</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php $stt = 1; ?>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $stt++ ?></td>
                <td><?= htmlspecialchars($product['name']) ?></td>
                <td><?= number_format($product['price'], 0, ',', '.') ?> VNĐ</td>
                <td><?= htmlspecialchars($product['total_quantity']) ?></td>
                <td><?= htmlspecialchars($product['description']) ?></td>
                <td><img src="<?= htmlspecialchars($product['image_product']) ?>" alt="<?= $product['name'] ?>" width="80" class="img-fluid"></td>
                <td>
                    <a href="index.php?action=admin&act=edit&id=<?= $product['product_id'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                    <a href="index.php?action=admin&act=delete&id=<?= $product['product_id'] ?>" class="btn btn-danger btn-sm ms-2" onclick="return confirm('Bạn có chắc chắn muốn xoá sản phẩm này?')">Xoá</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- JavaScript để hiển thị Toast -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('success') === 'deleted') {
        const toastLiveExample = document.getElementById('deleteToast');
        const toast = new bootstrap.Toast(toastLiveExample, { delay: 3000 });
        toast.show();
        window.history.replaceState({}, document.title, window.location.pathname);
    }
});
</script>