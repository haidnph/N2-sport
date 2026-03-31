<?php
require_once 'BaseModel.php';

class colorModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    // ===== LẤY TẤT CẢ COLOR =====
    public function getAll()
    {
        $sql = "SELECT * FROM colors ORDER BY color_id DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // ===== THÊM COLOR =====
    public function insertColor($name)
    {
        $sql = "INSERT INTO colors(color_name) VALUES(:name)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        return $stmt->execute();
    }

    // ===== TÌM 1 COLOR =====
    public function find($id)
    {
        $sql = "SELECT * FROM colors WHERE color_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    // ===== CẬP NHẬT COLOR =====
    public function updateColor($id, $name)
    {
        $sql = "UPDATE colors 
                SET color_name = :name 
                WHERE color_id = :id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // ===== XOÁ COLOR =====
    public function deleteColor($id)
    {
        $sql = "DELETE FROM colors WHERE color_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}