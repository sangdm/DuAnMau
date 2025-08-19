<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container py-5">
  <h2 class="text-center mb-4">Sản phẩm theo danh mục</h2>
  <div class="row g-4">
    <?php if (!empty($products)): ?>
      <?php foreach ($products as $product): ?>
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="card h-100 shadow-sm border-0">
            <img src="<?= !empty($product['image_product']) ? htmlspecialchars($product['image_product']) : 'https://via.placeholder.com/300?text=No+Image' ?>"
                 class="card-img-top" alt="<?= htmlspecialchars($product['name']) ?>">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title"><?= htmlspecialchars($product['name']) ?></h5>
              <p class="card-text text-danger fw-bold mb-4"><?= number_format($product['price'], 0, ',', '.') ?> VNĐ</p>
              <a href="?action=ProductDetail&id=<?= $product['product_id'] ?>"
                 class="btn btn-primary mt-auto">Xem chi tiết</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="col-12">
        <p class="text-center">Không có sản phẩm nào trong danh mục này.</p>
      </div>
    <?php endif; ?>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
