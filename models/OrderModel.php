<?php
require_once 'models/BaseModel.php';

class OrderModel extends BaseModel {

    // lấy danh sách
    public function getAll() {
        return $this->selectAll("SELECT * FROM orders ORDER BY order_id DESC");
    }

    // lấy 1 đơn
    public function getById($id) {
        return $this->selectOne(
            "SELECT * FROM orders WHERE order_id = ?",
            [$id]
        );
    }

    // item
    public function getItems($order_id) {
        return $this->selectAll(
            "SELECT * FROM order_items WHERE order_id = ?",
            [$order_id]
        );
    }

    // update status đơn
    public function updateStatus($id, $status) {
        return $this->update(
            "UPDATE orders SET status=? WHERE order_id=?",
            [$status, $id]
        );
    }

    // update thanh toán

    // xóa
    public function deleteOrder($id) {
        return $this->delete(
            "DELETE FROM orders WHERE order_id=?",
            [$id]
        );
    }
public function updatePaymentStatus($id, $status) {
    return $this->update(
        "UPDATE orders SET payment_status=? WHERE order_id=?",
        [$status, $id]
    );
}
}
