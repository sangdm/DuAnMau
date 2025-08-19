<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

<!-- Custom CSS -->
<style>
    .product-image {
        max-height: 400px;
        object-fit: cover;
    }
</style>

<div class="container mt-5">
    <div class="row">
        <!-- Cột chứa ảnh sản phẩm -->
        <div class="col-md-6 mb-4 d-flex flex-column align-items-center"
            style="min-height: 400px; background:#f9f9f9; border-radius:12px; padding: 20px;">

            <!-- Ảnh sản phẩm -->
            <img src="<?= htmlspecialchars($product['image_product']) ?>"
                alt="<?= htmlspecialchars($product['name']) ?>"
                class="img-fluid rounded mb-3 product-image"
                style="max-height: 350px; object-fit: contain;">

            <!-- Nhúng comment -->
            <div class="w-100 mt-3">
                <?php include 'comment.php'; ?>
            </div>
        </div>



        <!-- Thông tin sản phẩm -->
        <div class="col-md-6">
            <h2 class="mb-3"><?= htmlspecialchars($product['name']) ?></h2>

            <div class="mb-3">
                <span class="h4 me-2 text-danger">
                    <?= number_format($product['price'], 0, ',', '.') ?> đ
                </span>
            </div>

            <p class="mb-4"><?= nl2br(htmlspecialchars($product['description'])) ?></p>

            <div class="mb-4">
                <label for="quantity" class="form-label">Số lượng:</label>
                <input type="number" class="form-control" id="quantity" value="1" min="1" style="width: 80px;">
            </div>

            <button class="btn btn-primary btn-lg mb-3 me-2">
                <i class="bi bi-cart-plus"></i> Thêm vào giỏ
            </button>
            <button class="btn btn-outline-secondary btn-lg mb-3">
                <i class="bi bi-heart"></i> Yêu thích
            </button>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>