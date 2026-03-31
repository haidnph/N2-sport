<?php
require_once 'BaseModel.php';

class CategoryModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    // Lấy tất cả danh mục
    public function getAll()
    {
        $sql = "SELECT * FROM categories ORDER BY category_id DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Thêm danh mục (đổi tên để không đụng BaseModel)
    public function insertCate($name)
    {
        $sql = "INSERT INTO categories(category_name) VALUES(:name)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        return $stmt->execute();
    }

    // Tìm 1 danh mục
    public function find($id)
    {
        $sql = "SELECT * FROM categories WHERE category_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    // Cập nhật
    public function updateCate($id, $name)
    {
        $sql = "UPDATE categories 
                SET category_name = :name 
                WHERE category_id = :id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Xoá
    public function deleteCate($id)
    {
        $sql = "DELETE FROM categories WHERE category_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}