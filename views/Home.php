<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .banner {
            width: 100%;
            height: 300px;
            object-fit: cover;
            margin-bottom: 20px;
        }

        .category {
            margin-bottom: 20px;
        }

        .category-item {
            text-align: center;
            padding: 10px;
            background-color: #f8f9fa;
            border-radius: 5px;
            margin: 5px;
            position: relative;
            overflow: hidden;
        }

        .category-item img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .category-item a {
            position: absolute;
            bottom: 10px;
            left: 0;
            right: 0;
            color: #fff;
            background-color: rgba(0, 0, 0, 0.6);
            padding: 5px;
            text-decoration: none;
        }

        .category-item a:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        .product-item {
            border-bottom: 2px solid #000;
            padding: 10px 0;
        }

        .footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
            margin-top: 20px;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 20px;
            padding: 20px;
        }

        .product-item {
            text-align: center;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
            position: relative;
        }

        .product-item img {
            max-width: 150px;
            height: auto;
        }

        .original-price {
            text-decoration: line-through;
            color: #888;
            margin-right: 5px;
        }

        .discount-price {
            color: #000;
            font-weight: bold;
        }

        .discount-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: #ff0000;
            color: white;
            padding: 2px 8px;
            border-radius: 5px;
        }

        .product-item .card-body {
            position: relative;
        }

        .category-item {
            text-align: center;
            margin: 15px;
        }

        .category-item img {
            width: 100px;
            height: 100px;
            object-fit: contain;
            border-radius: 8px;
            display: block;
            margin: 0 auto 12px auto;
        }

        .category-item a {
            display: block;
            margin-top: 12px;
            font-weight: bold;
            text-decoration: none;
            color: #333;
        }

        .category-item a:hover {
            color: #007bff;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="banner">
            <img src="https://thietke6d.com/wp-content/uploads/2021/05/banner-quang-cao-giay-1.webp" alt="" class="img-fluid w-100 h-100">
        </div>

        <div class="category mb-4">
            <h3 class="text-center mb-4">Danh mục</h3>
            <div class="d-flex justify-content-around flex-wrap">
                <?php if (!empty($categories)): ?>
                    <?php foreach ($categories as $cat): ?>
                        <div class="category-item">
                            <img src="<?php echo !empty($cat['imageURL'])
                                            ? htmlspecialchars($cat['imageURL'])
                                            : 'https://via.placeholder.com/100?text=' . urlencode($cat['name']); ?>"
                                alt="<?= htmlspecialchars($cat['name']) ?>">

                            <a href="?action=category&act=show&category_id=<?= htmlspecialchars($cat['category_id']); ?>">
    <?= htmlspecialchars($cat['name']); ?>
</a>

                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Không có danh mục nào.</p>
                <?php endif; ?>
            </div>
        </div>

        <h3 class="text-center mb-4">Sản phẩm nổi bật</h3>
        <div class="product-grid">
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $prod):
                    $discount = !empty($prod['discount']) ? $prod['discount'] : 0;
                    $original_price = $prod['price'];
                    $discounted_price = $original_price - ($original_price * $discount / 100);
                ?>
                    <div class="product-item">
                        <?php if ($discount > 0): ?>
                            <div class="discount-badge">-<?php echo $discount; ?>%</div>
                        <?php endif; ?>

                        <!-- Bọc ảnh bằng link sang chi tiết -->
                        <a href="index.php?action=ProductDetail&id=<?= $prod['product_id'] ?>">
                            <img src="<?= htmlspecialchars($prod['image_product']); ?>" alt="<?= htmlspecialchars($prod['name']); ?>">
                        </a>

                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="index.php?action=ProductDetail&id=<?= $prod['product_id'] ?>" class="text-decoration-none text-dark">
                                    <?= htmlspecialchars($prod['name']); ?>
                                </a>
                            </h5>
                            <p class="card-text">
                                <?php if ($discount > 0): ?>
                                    <span class="original-price"><?= number_format($original_price, 0, ',', '.'); ?>đ</span>
                                <?php endif; ?>
                                <span class="discount-price"><?= number_format($discounted_price, 0, ',', '.'); ?>đ</span>
                            </p>
                            <!-- Thêm nút xem chi tiết -->
                            <a href="index.php?action=ProductDetail&id=<?= $prod['product_id'] ?>" class="btn btn-sm btn-primary mt-2">Xem chi tiết</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Không có sản phẩm nào.</p>
            <?php endif; ?>
        </div>

        <h3 class="text-center mt-5 mb-4">Tin tức mới nhất</h3>
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Bộ sưu tập Giày Mùa Thu 2025</h5>
                        <p class="card-text">Khám phá các mẫu giày mới nhất cho mùa thu này.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ưu đãi đặc biệt cuối tháng</h5>
                        <p class="card-text">Giảm giá lên đến 50% cho các sản phẩm hot.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Hướng dẫn chọn giày thể thao</h5>
                        <p class="card-text">Mẹo chọn giày phù hợp với phong cách của bạn.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer text-center">
            <p>&copy; 2025 Cửa hàng giày XYZ. All rights reserved.</p>
            <p>Liên hệ: email@example.com | Hotline: 0909 123 456</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>