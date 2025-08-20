<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Đăng nhập - Giày Sneaker</title>
    <!-- MDBootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet" />
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
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
    <section class="">
        <form method="post" action="index.php?action=login" onsubmit="console.log('submit!')">
            <?php if (!empty($error)): ?>
                <div class="alert alert-danger">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>
            <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
                <div class="container">
                    <div class="row gx-lg-5 align-items-center">
                        <div class="col-lg-6 mb-5 mb-lg-0">
                            <h1 class="my-5 display-3 fw-bold ls-tight">
                                Welcome Back <br />
                                <span class="text-primary">to Giày Sneaker</span>
                            </h1>
                            <p style="color: hsl(217, 10%, 50.8%)">
                                Nhập email và mật khẩu để đăng nhập vào tài khoản của bạn.
                            </p>
                        </div>

                        <div class="col-lg-6 mb-5 mb-lg-0">
                            <div class="card">
                                <div class="card-body py-5 px-md-5">
                                    <form method="post" action="index.php?action=login">
                                        <div class="form-outline mb-4">
                                            <input type="email" id="email" name="email" class="form-control" required />
                                            <label class="form-label" for="email">Email address</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" id="password" name="password" class="form-control" required />
                                            <label class="form-label" for="password">Password</label>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-block mb-4">
                                            Login
                                        </button>

                                        <div class="text-center">
                                            <p>Don't have an account? <a href="index.php?action=register">Register here</a></p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!-- MDBootstrap JS -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
</body>

</html>