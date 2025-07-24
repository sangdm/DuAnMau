<h2>Danh sách sản phẩm</h2>
<ul>
    <?php foreach ($products as $product): ?>
        <li>
            <a href="index.php?action=product-detail&id=<?= $product['id'] ?>">
                <?= htmlspecialchars($product['name']) ?> - <?= number_format($product['price'], 0, ',', '.') ?> VND
            </a>
        </li>
    <?php endforeach; ?>
</ul>
