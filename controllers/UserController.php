<?php
require_once 'models/UserModel.php';

class UserController
{

    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // Hiển thị form đăng ký
    public function showRegisterForm()
    {
        require 'views/Register.php'; // form HTML đăng ký
    }

    // Xử lý đăng ký
    public function register()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];

            // Kiểm tra email trùng
            if ($this->userModel->getUserByEmail($email)) {
                // Email đã tồn tại
                $error = "Email này đã được đăng ký! Vui lòng dùng email khác.";
                include "views/register.php";
                return;
            }

            // Nếu không trùng, hash password và insert
            $data = [
                'role_id' => 2, // user
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'email' => $email,
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                'address' => $_POST['address'] ?? null,
                'phone_number' => $_POST['phone_number'] ?? null,
                'status' => 'active',
            ];

            $this->userModel->createUser($data);


            // Redirect hoặc thông báo thành công
            header("Location: index.php?action=login");
            exit;
        }


        include "views/Register.php";
    }

    // Hiển thị form đăng nhập
    public function showLoginForm()
    {
        require 'views/Login.php'; // form HTML đăng nhập
    }

    // Xử lý đăng nhập
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email']);
            $password = $_POST['password'];

            $user = $this->userModel->getUserByEmail($email);
            if (!$user) {
                $error = "Email không tồn tại!";
                include "views/Login.php";
                return;
            }

            if (password_verify($password, $user['password'])) {
                // Lưu session
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['first_name'] = $user['first_name'];
                $_SESSION['role_id'] = $user['role_id'];



                // Chuyển hướng theo role
                if ($user['role_id'] == 1) {
                    header("Location: index.php?action=admin");
                } else {
                    header("Location: index.php");
                }
                exit;
            } else {
                $error = "Sai mật khẩu!";
                include "views/Login.php";
            }
        } else {
            include "views/Login.php";
        }
        var_dump($password, $user['password'], password_verify($password, $user['password']));
        exit;
    }

    // Đăng xuất
    public function logout()
    {
        session_unset();   // Xóa toàn bộ biến session
        session_destroy(); // Hủy session

        // Chuyển hướng về trang login (hoặc home tuỳ ý)
        header("Location: index.php");
        exit;
    }
}
