<?php
require_once 'BaseModel.php';

class ProductModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    // ===== LẤY TẤT CẢ SẢN PHẨM (Admin & Shop tổng) =====
    public function getAll()
    {
        $sql = "SELECT p.*, c.category_name, b.brand_name
                FROM products p
                LEFT JOIN categories c ON p.category_id = c.category_id
                LEFT JOIN brands b ON p.brand_id = b.brand_id
                WHERE p.is_deleted = 0
                ORDER BY p.product_id DESC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // ===== LẤY SẢN PHẨM THEO DANH MỤC =====
    public function getByCategory($cate_id)
    {
        $sql = "SELECT p.*, c.category_name, b.brand_name
                FROM products p
                LEFT JOIN categories c ON p.category_id = c.category_id
                LEFT JOIN brands b ON p.brand_id = b.brand_id
                WHERE p.category_id = :cate_id AND p.is_deleted = 0
                ORDER BY p.product_id DESC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['cate_id' => $cate_id]);
        return $stmt->fetchAll();
    }

    // ===== THÊM SẢN PHẨM =====
    public function insertProduct($name, $desc, $image, $price, $cate_id, $brand_id)
    {
        $sql = "INSERT INTO products(product_name, description, image, base_price, category_id, brand_id, is_deleted)
                VALUES(:name, :desc, :image, :price, :cate_id, :brand_id, 0)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'name' => $name,
            'desc' => $desc,
            'image' => $image,
            'price' => $price,
            'cate_id' => $cate_id,
            'brand_id' => $brand_id
        ]);

        return $this->pdo->lastInsertId();
    }

    // ===== THÊM BIẾN THỂ (KÈM SỐ LƯỢNG) =====
    public function insertVariant($product_id, $size_id, $color_id, $quantity)
    {
        $sql = "INSERT INTO product_variants (product_id, size_id, color_id, quantity)
                VALUES (:product_id, :size_id, :color_id, :quantity)";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'product_id' => $product_id,
            'size_id'    => $size_id,
            'color_id'   => $color_id,
            'quantity'   => $quantity
        ]);
    }

    // ===== XOÁ BIẾN THỂ THEO SẢN PHẨM =====
    public function deleteVariantByProduct($product_id)
    {
        $sql = "DELETE FROM product_variants WHERE product_id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $product_id]);
    }

    // ===== LẤY BIẾN THỂ (LẤY CẢ QUANTITY ĐỂ HIỂN THỊ KHO) =====
    public function getVariantByProduct($product_id) {
        $sql = "SELECT pv.*, c.color_name, c.color_code, s.size_value 
                FROM product_variants pv
                JOIN colors c ON pv.color_id = c.color_id
                JOIN sizes s ON pv.size_id = s.size_id
                WHERE pv.product_id = :id";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $product_id]);
        return $stmt->fetchAll();
    }

    // ===== TÌM 1 SẢN PHẨM =====
    public function find($id)
    {
        $sql = "SELECT * FROM products WHERE product_id = :id AND is_deleted = 0";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    // ===== CẬP NHẬT SẢN PHẨM =====
    public function updateProduct($id, $name, $desc, $image, $price, $cate_id, $brand_id)
    {
        $sql = "UPDATE products 
                SET product_name = :name,
                    description = :desc,
                    image = :image,
                    base_price = :price,
                    category_id = :cate_id,
                    brand_id = :brand_id
                WHERE product_id = :id";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'name' => $name,
            'desc' => $desc,
            'image' => $image,
            'price' => $price,
            'cate_id' => $cate_id,
            'brand_id' => $brand_id,
            'id' => $id
        ]);
    }

    // ===== XOÁ MỀM =====
    public function deleteProduct($id) {
        $sql = "UPDATE products SET is_deleted = 1 WHERE product_id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }

    // ===== LOGIC TRỪ KHO KHI MUA HÀNG (QUAN TRỌNG) =====
    public function minusStock($product_id, $size_id, $quantity) {
        $sql = "UPDATE product_variants 
                SET quantity = quantity - :qty 
                WHERE product_id = :p_id AND size_id = :s_id AND quantity >= :qty";
        
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'qty'  => $quantity,
            'p_id' => $product_id,
            's_id' => $size_id
        ]);
    }

    // ===== LOGIC CỘNG LẠI KHO KHI HUỶ ĐƠN =====
    public function plusStock($product_id, $size_id, $quantity) {
        $sql = "UPDATE product_variants 
                SET quantity = quantity + :qty 
                WHERE product_id = :p_id AND size_id = :s_id";
        
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'qty'  => $quantity,
            'p_id' => $product_id,
            's_id' => $size_id
        ]);
    }

    // ===== LẤY SẢN PHẨM GIỚI HẠN (Trang chủ) =====
    public function getAllLimit($limit = 8)
    {
        $sql = "SELECT * FROM products WHERE is_deleted = 0 ORDER BY product_id DESC LIMIT :limit";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    // ===== LẤY SẢN PHẨM HOT/MỚI (Dùng cho trang chủ HomeController) =====
    public function getHotProducts($limit = 8)
    {
        // Tớ dùng luôn logic lấy sản phẩm mới nhất làm sản phẩm HOT
        $sql = "SELECT p.*, c.category_name 
                FROM products p
                LEFT JOIN categories c ON p.category_id = c.category_id
                WHERE p.is_deleted = 0 
                ORDER BY p.product_id DESC 
                LIMIT :limit";

        $stmt = $this->pdo->prepare($sql);
        // Ép kiểu (int) cho limit để PDO không bắt lỗi bindValue
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
}