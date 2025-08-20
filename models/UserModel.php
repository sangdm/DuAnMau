<?php
require_once 'ConnectDB.php';

class UserModel extends ConnectDB
{

    private $table = 'users';

    // Tạo user mới
    public function createUser($data)
    {
        $sql = "INSERT INTO $this->table (role_id, first_name, last_name, address, image_user, email, phone_number, status, password, created_at) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $data['role_id'],
            $data['first_name'],
            $data['last_name'],
            $data['address'] ?? null,
            $data['image_user'] ?? null,
            $data['email'],
            $data['phone_number'] ?? null,
            $data['status'] ?? 'active',
            $data['password'] // đã hash sẵn từ controller
        ]);
    }

    // Lấy user theo email
    public function getUserByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    // Lấy user theo ID
    public function getUserById($user_id)
    {
        $sql = "SELECT * FROM $this->table WHERE user_id = ? AND deleted_at IS NULL";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$user_id]);
        return $stmt->fetch();
    }

    // Cập nhật thông tin user
    public function updateUser($user_id, $data)
    {
        $sql = "UPDATE $this->table 
                SET first_name = ?, last_name = ?, address = ?, image_user = ?, phone_number = ?, status = ?, updated_at = NOW() 
                WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $data['first_name'],
            $data['last_name'],
            $data['address'] ?? null,
            $data['image_user'] ?? null,
            $data['phone_number'] ?? null,
            $data['status'] ?? 'active',
            $user_id
        ]);
    }

    // Xoá mềm user
    public function deleteUser($user_id)
    {
        $sql = "UPDATE $this->table SET deleted_at = NOW() WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$user_id]);
    }

    // Lấy tất cả user (không xoá)
    public function getAllUsers()
    {
        $sql = "SELECT * FROM $this->table WHERE deleted_at IS NULL";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll();
    }
}
