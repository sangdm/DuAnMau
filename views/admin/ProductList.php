<h2>Danh sách sản phẩm (Admin)</h2>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Giá</th>
        <th>Ảnh</th>
        <th>Hành động</th>
    </tr>
    <?php foreach ($products as $product): ?>
    <tr>
        <td><?= $product['product_id'] ?></td>
        <td><?= $product['name'] ?></td>
        <td><?= $product['price'] ?></td>
        <td><img src="<?= $product['image_product'] ?>" width="80"></td>
        <td>
            <a href="index.php?action=admin&act=edit&id=<?= $product['product_id'] ?>">Sửa</a> |
           <a href="index.php?action=admin&act=delete&id=<?= $product['product_id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xoá sản phẩm này?')">Xoá</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
