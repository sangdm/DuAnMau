<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Quản Lý Sản Phẩm</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            /* Ngăn cuộn ngang */
        }

        .sidebar {
            background-color: #343a40;
            height: 100vh;
            /* Chiều cao toàn màn hình */
            position: fixed;
            /* Cố định sidebar */
            width: 250px;
            top: 56px;
            /* Đẩy xuống dưới header (56px là chiều cao mặc định của navbar Bootstrap) */
            left: 0;
            z-index: 1000;
            /* Đảm bảo sidebar hiển thị trên content */
        }

        .navbar {
            position: fixed;
            /* Cố định header */
            top: 0;
            width: 100%;
            z-index: 1100;
            /* Đảm bảo header trên sidebar */
        }

        .content {
            margin-left: 250px;
            /* Khoảng cách bằng chiều rộng sidebar */
            padding: 20px;
            padding-top: 76px;
            /* Đẩy content xuống dưới header + padding */
            min-height: 100vh;
            /* Đảm bảo content chiếm toàn bộ chiều cao */
            overflow-y: auto;
            /* Cho phép cuộn dọc */
        }

        footer {
            margin-left: 250px;
            /* Giữ footer thẳng hàng với content */
            width: calc(100% - 250px);
            /* Điều chỉnh chiều rộng */
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
        }

        .table-responsive {
            width: 100%;
        }

        .form-control {
            background-color: #f8f9fa;
        }

        .btn-primary {
            width: 100%;
            max-width: 200px;
        }

        td:nth-child(5) {
            /* Cột Mô tả */
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .toast-custom {
            background-color: #ffffff;
            border: 1px solid #28a745;
            /* Viền màu xanh lá (thành công) */
            border-radius: 8px;
            /* Bo góc mềm mại */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            /* Hiệu ứng bóng */
            max-width: 300px;
            /* Giới hạn chiều rộng */
        }

        .toast-custom .toast-header {
            background-color: #28a745;
            /* Màu nền header xanh lá */
            color: #ffffff;
            /* Văn bản trắng */
            border-bottom: 1px solid #218838;
            /* Viền dưới header */
            border-radius: 7px 7px 0 0;
            /* Bo góc header */
        }

        .toast-custom .toast-body {
            color: #155724;
            /* Văn bản trong body màu xanh lá đậm */
            font-size: 14px;
        }

        .toast-custom .btn-close {
            color: #ffffff;
            /* Màu nút đóng trắng */
            opacity: 0.8;
        }

        .toast-custom .btn-close:hover {
            opacity: 1;
        }

        .collapse.show {
            background-color: #495057;
        }

        .nav-link:hover {
            background-color: #495057;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="?action=admin">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="?action=home">Trang Chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?action=logout">Đăng Xuất</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>