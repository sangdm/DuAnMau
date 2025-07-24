<h2>Chi tiết sản phẩm</h2>
<p><strong>Tên:</strong> <?= htmlspecialchars($product['name']) ?></p>
<p><strong>Giá:</strong> <?= number_format($product['price'], 0, ',', '.') ?> VND</p>
<p><strong>Mô tả:</strong> <?= htmlspecialchars($product['description']) ?></p>
<a href="index.php?action=products">Quay lại danh sách</a>
