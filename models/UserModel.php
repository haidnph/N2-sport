<?php
require_once 'models/BaseModel.php';

class UserModel extends BaseModel {

    protected $table = 'users';

    // ================= GET USER BY EMAIL =================
    public function getByEmail($email) {
        $sql = "SELECT * FROM $this->table WHERE email = ?";
        return $this->selectOne($sql, [$email]);
    }

    // ================= CREATE USER =================
    public function create($data) {
        $sql = "INSERT INTO $this->table (name, email, password, phone, address, role)
                VALUES (?, ?, ?, ?, ?, ?)";

        return $this->insert($sql, [
            $data['name'],
            $data['email'],
            $data['password'],
            $data['phone'],
            $data['address'],
            $data['role']
        ]);
    }
}