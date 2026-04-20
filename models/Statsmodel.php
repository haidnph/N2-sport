<?php
class StatsModel {
    private $conn;

    public function __construct() {
        $host = 'localhost';
        $db   = 'n2_sportt';
        $user = 'root';
        $pass = '';

        try {
            $this->conn = new PDO(
                "mysql:host=$host;dbname=$db;charset=utf8",
                $user,
                $pass
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public function getTotalUsers() {
        return $this->conn->query("SELECT COUNT(*) FROM users")->fetchColumn();
    }

    public function getTotalOrders() {
        return $this->conn->query("SELECT COUNT(*) FROM orders")->fetchColumn();
    }

    // Doanh thu thực nhận: chỉ đơn done + đã thanh toán
    public function getTotalRevenue() {
        return $this->conn
            ->query("SELECT SUM(total_price) FROM orders WHERE status='done' AND payment_status='paid'")
            ->fetchColumn() ?? 0;
    }

    public function getTotalProducts() {
        return $this->conn->query("SELECT COUNT(*) FROM products")->fetchColumn();
    }
}