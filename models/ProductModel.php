<?php
require_once 'BaseModel.php';

class ProductModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    // ===== LẤY TẤT CẢ SẢN PHẨM (JOIN FULL) =====
    public function getAll()
    {
        $sql = "SELECT p.*, 
                       c.category_name, 
                       b.brand_name,
                       co.color_name,
                       s.size_value
                FROM products p
                LEFT JOIN categories c ON p.category_id = c.category_id
                LEFT JOIN brands b ON p.brand_id = b.brand_id
                LEFT JOIN colors co ON p.color_id = co.color_id
                LEFT JOIN sizes s ON p.size_id = s.size_id
                ORDER BY p.product_id DESC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // ===== THÊM SẢN PHẨM =====
    public function insertProduct($name, $desc, $image, $price, $cate_id, $brand_id, $color_id, $size_id, $quantity)
    {
        $sql = "INSERT INTO products(
                    product_name, 
                    description, 
                    image, 
                    base_price, 
                    category_id, 
                    brand_id,
                    color_id,
                    size_id,
                    quantity
                )
                VALUES(
                    :name, 
                    :desc, 
                    :image, 
                    :price, 
                    :cate_id, 
                    :brand_id,
                    :color_id,
                    :size_id,
                    :quantity
                )";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':desc', $desc);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':cate_id', $cate_id);
        $stmt->bindParam(':brand_id', $brand_id);
        $stmt->bindParam(':color_id', $color_id);
        $stmt->bindParam(':size_id', $size_id);
        $stmt->bindParam(':quantity', $quantity);

        return $stmt->execute();
    }

    // ===== TÌM 1 SẢN PHẨM =====
    public function find($id)
    {
        $sql = "SELECT * FROM products WHERE product_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    // ===== CẬP NHẬT =====
    public function updateProduct($id, $name, $desc, $image, $price, $cate_id, $brand_id, $color_id, $size_id, $quantity)
    {
        $sql = "UPDATE products 
                SET product_name = :name,
                    description = :desc,
                    image = :image,
                    base_price = :price,
                    category_id = :cate_id,
                    brand_id = :brand_id,
                    color_id = :color_id,
                    size_id = :size_id,
                    quantity = :quantity
                WHERE product_id = :id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':desc', $desc);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':cate_id', $cate_id);
        $stmt->bindParam(':brand_id', $brand_id);
        $stmt->bindParam(':color_id', $color_id);
        $stmt->bindParam(':size_id', $size_id);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }
public function getAllLimit($limit = 8) {
    $sql = "SELECT p.*, c.category_name, b.brand_name
            FROM products p
            LEFT JOIN categories c ON p.category_id = c.category_id
            LEFT JOIN brands b ON p.brand_id = b.brand_id
            ORDER BY p.product_id DESC
            LIMIT $limit";

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
public function getHotProducts($limit = 8)
{
    $sql = "SELECT * FROM products ORDER BY quantity DESC LIMIT $limit";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
// ===== SẢN PHẨM LIÊN QUAN =====
public function getRelated($category_id, $current_id, $limit = 6)
{
    $sql = "SELECT p.*, 
                   c.category_name, 
                   b.brand_name
            FROM products p
            LEFT JOIN categories c ON p.category_id = c.category_id
            LEFT JOIN brands b ON p.brand_id = b.brand_id
            WHERE p.category_id = :cate_id
            AND p.product_id != :current_id
            ORDER BY p.product_id DESC
            LIMIT $limit";

    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':cate_id', $category_id);
    $stmt->bindParam(':current_id', $current_id);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
public function getProductByCategory($category_id)
{
    $sql = "SELECT * FROM products WHERE category_id = ?";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([$category_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

    // ===== XOÁ =====
    public function deleteProduct($id)
    {
        $sql = "DELETE FROM products WHERE product_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}