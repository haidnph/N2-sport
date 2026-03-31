<?php
require_once 'BaseModel.php';

class BrandModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    // Lấy tất cả brand
    public function getAll()
    {
        $sql = "SELECT * FROM brands ORDER BY brand_id DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Thêm brand
    public function insertBrand($name)
    {
        $sql = "INSERT INTO brands(brand_name) VALUES(:name)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        return $stmt->execute();
    }

    // Tìm 1 brand
    public function find($id)
    {
        $sql = "SELECT * FROM brands WHERE brand_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    // Cập nhật brand
    public function updateBrand($id, $name)
    {
        $sql = "UPDATE brands 
                SET brand_name = :name 
                WHERE brand_id = :id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Xoá brand
    public function deleteBrand($id)
    {
        $sql = "DELETE FROM brands WHERE brand_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}