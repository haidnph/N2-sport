<?php
require_once 'BaseModel.php';

class sizeModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    // ===== LẤY TẤT CẢ SIZE =====
    public function getAll()
    {
        $sql = "SELECT * FROM sizes ORDER BY size_id DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // ===== THÊM SIZE =====
    public function insertSize($value)
    {
        $sql = "INSERT INTO sizes(size_value) VALUES(:value)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':value', $value);
        return $stmt->execute();
    }

    // ===== TÌM 1 SIZE =====
    public function find($id)
    {
        $sql = "SELECT * FROM sizes WHERE size_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

   
    // ===== XOÁ SIZE =====
    public function deleteSize($id)
    {
        $sql = "DELETE FROM sizes WHERE size_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}