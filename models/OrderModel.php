<?php
require_once PATH_MODEL . 'BaseModel.php';

class OrderModel extends BaseModel {

    // ==========================================
    // CLIENT: TẠO ĐƠN HÀNG
    // ==========================================

    public function createOrder($user_id, $name = null, $phone = null, $address = null, $total = 0, $payment_method = null) {
        $sql = "INSERT INTO orders 
                (user_id, receiver_name, phone, address, order_date, total_price, status, payment_status, payment_method) 
                VALUES (?, ?, ?, ?, NOW(), ?, 'pending', 'unpaid', ?)";

        $this->insert($sql, [
            $user_id,
            $name,
            $phone,
            $address,
            $total,
            $payment_method
        ]);

        return $this->pdo->lastInsertId();
    }

    // Lưu chi tiết đơn hàng (Cập nhật để lưu đủ thông tin trừ kho)
    public function addOrderItem($order_id, $product_id, $color_id, $size_id, $quantity, $price) {
        $sql = "INSERT INTO order_details (order_id, product_id, color_id, size_id, quantity, price)
                VALUES (?, ?, ?, ?, ?, ?)";
        return $this->insert($sql, [$order_id, $product_id, $color_id, $size_id, $quantity, $price]);
    }

    // ==========================================
    // ADMIN: QUẢN LÝ ĐƠN HÀNG
    // ==========================================

  public function getAll() {
    return $this->selectAll(
        "SELECT o.*, u.name AS user_name
         FROM orders o
         LEFT JOIN users u ON o.user_id = u.user_id
         ORDER BY o.order_id DESC"
    );
}

    public function getById($id) {
        return $this->selectOne(
            "SELECT * FROM orders WHERE order_id = ?",
            [$id]
        );
    }

    // Lấy danh sách sản phẩm trong đơn (Dùng để hiển thị & Hoàn kho)
    public function getItems($order_id) {
        $sql = "SELECT 
                    od.*, 
                    p.product_name, 
                    p.image,
                    c.color_name,
                    s.size_value AS size_name
                FROM order_details od
                JOIN products p ON od.product_id = p.product_id 
                LEFT JOIN colors c ON od.color_id = c.color_id
                LEFT JOIN sizes s ON od.size_id = s.size_id
                WHERE od.order_id = ?";
                
        return $this->selectAll($sql, [$order_id]);
    }

    public function getOrderWithItems($order_id) {
        $order = $this->getById($order_id);
        if ($order) {
            $order['items'] = $this->getItems($order_id);
        }
        return $order;
    }

    public function updateStatus($order_id, $status) {
        return $this->update(
            "UPDATE orders SET status = ? WHERE order_id = ?",
            [$status, $order_id]
        );
    }

    public function updatePaymentStatus($order_id, $payment_status) {
        return $this->update(
            "UPDATE orders SET payment_status = ? WHERE order_id = ?",
            [$payment_status, $order_id]
        );
    }

    public function cancelOrder($order_id) {
        return $this->update(
            "UPDATE orders SET status = 'cancel' WHERE order_id = ?",
            [$order_id]
        );
    }
    public function deleteOrder($order_id) {
        // Xóa chi tiết trước để tránh lỗi ràng buộc (Foreign Key)
        $sqlDetail = "DELETE FROM order_details WHERE order_id = ?";
        $this->update($sqlDetail, [$order_id]);

        // Sau đó mới xóa đơn hàng chính
        $sqlOrder = "DELETE FROM orders WHERE order_id = ?";
        return $this->update($sqlOrder, [$order_id]);
    }
}