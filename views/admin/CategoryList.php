<h2 class="mb-4">Danh sách danh mục</h2>

<div class="table-responsive">
    <table class="table table-striped table-hover" style="background-color: #f8f9fa;">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên danh mục</th>
                <th>Ảnh</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php $stt = 1; ?>
            <?php foreach ($categories as $category): ?>
            <tr>
                <td><?= $stt++ ?></td>
                <td><?= htmlspecialchars($category['name']) ?></td>
                <td>
                    <?php if (!empty($category['imageURL'])): ?>
                        <img src="<?= htmlspecialchars($category['imageURL']) ?>" alt="<?= htmlspecialchars($category['name']) ?>" width="80" class="img-fluid">
                    <?php else: ?>
                        <span class="text-muted">Chưa có ảnh</span>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="index.php?action=category&act=delete&id=<?= $category['category_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xoá danh mục này?')">Xoá</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<!-- Toast Notification -->
<div class="position-fixed top-0 end-0 p-3" style="z-index: 1100;">
    <div id="deleteToast" class="toast hide toast-custom" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">Thành công</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Xóa danh mục thành công!
        </div>
    </div>
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