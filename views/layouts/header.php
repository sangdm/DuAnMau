<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>DỰ ÁN MẪU - Đỗ Minh Sáng</title>
  <!-- Link FontAwesome để có icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
    }
    header {
      background: #111;
      color: #fff;
      padding: 10px 30px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .logo {
      display: flex;
      align-items: center;
      font-size: 20px;
      font-weight: bold;
    }
    .logo i {
      margin-right: 8px;
      color: #ff4d4d;
    }
    nav a {
      color: #fff;
      text-decoration: none;
      margin: 0 12px;
      font-weight: 500;
    }
    nav a:hover {
      color: #ff4d4d;
    }
    .login-btn {
      color: #fff;
      text-decoration: none;
      font-weight: bold;
      background: #ff4d4d;
      padding: 6px 14px;
      border-radius: 20px;
      display: flex;
      align-items: center;
      transition: 0.3s;
    }
    .login-btn i {
      margin-right: 6px;
    }
    .login-btn:hover {
      background: #e63939;
    }
  </style>
</head>
<body>
  <header>
    <div class="logo">
      <i class="fa-solid fa-shoe-prints"></i> Giày Sneaker
    </div>
    <nav>
      <a href="index.php">Trang chủ</a>
      <a href="index.php?action=products">Sản phẩm</a>
    </nav>
    <a href="index.php?action=login" class="login-btn">
      <i class="fa-solid fa-user"></i> Login
    </a>
  </header>
</body>
</html>
