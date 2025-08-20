<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Đăng ký - Giày Sneaker</title>
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
        <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
            <div class="container">
                <div class="row gx-lg-5 align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <h1 class="my-5 display-3 fw-bold ls-tight">
                            The best offer <br />
                            <span class="text-primary">for your business</span>
                        </h1>
                        <p style="color: hsl(217, 10%, 50.8%)">
                            Nhập thông tin cá nhân để tạo tài khoản mới. Chúng tôi cam kết bảo mật thông tin của bạn.
                        </p>
                    </div>

                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <div class="card">
                            <div class="card-body py-5 px-md-5">
                                <form method="post" action="index.php?action=register">
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="text" id="first_name" name="first_name" class="form-control" required />
                                                <label class="form-label" for="first_name">First name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="text" id="last_name" name="last_name" class="form-control" required />
                                                <label class="form-label" for="last_name">Last name</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="email" id="email" name="email" class="form-control" required />
                                        <label class="form-label" for="email">Email address</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" id="password" name="password" class="form-control" required />
                                        <label class="form-label" for="password">Password</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="text" id="address" name="address" class="form-control" />
                                        <label class="form-label" for="address">Address</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="text" id="phone_number" name="phone_number" class="form-control" />
                                        <label class="form-label" for="phone_number">Phone number</label>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block mb-4">
                                        Sign up
                                    </button>

                                    <div class="text-center">
                                        <p>Already have an account? <a href="index.php?action=login">Log in here</a></p>
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