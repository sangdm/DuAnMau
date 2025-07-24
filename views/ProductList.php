<h2>Danh sách sản phẩm</h2>
<ul>
    <?php foreach ($products as $product): ?>
        <li>
            <a href="index.php?action=ProductDetail&id=<?= $product['product_id'] ?>">
                <?= htmlspecialchars($product['name']) ?> - <?= number_format($product['price'], 0, ',', '.') ?> VND
            </a>
        </li>
    <?php endforeach; ?>
</ul>
