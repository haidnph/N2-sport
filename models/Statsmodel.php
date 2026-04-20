<?php
class StatsModel extends BaseModel {

    // 1. Tổng doanh thu (Lọc theo ngày + Chỉ tính đơn hàng 'done')
    public function getTotalRevenue($startDate = null, $endDate = null) {
        $sql = "SELECT SUM(total_price) as total FROM orders WHERE status = 'done'";
        $params = [];

        if ($startDate && $endDate) {
            $sql .= " AND DATE(order_date) BETWEEN ? AND ?";
            $params = [$startDate, $endDate];
        }

        $result = $this->selectOne($sql, $params);
        return $result['total'] ?? 0;
    }

    // 2. Tổng số đơn hàng (Lọc theo ngày)
    public function getOrderCount($startDate = null, $endDate = null) {
        $sql = "SELECT COUNT(*) as total FROM orders WHERE 1=1";
        $params = [];

        if ($startDate && $endDate) {
            $sql .= " AND DATE(order_date) BETWEEN ? AND ?";
            $params = [$startDate, $endDate];
        }

        $result = $this->selectOne($sql, $params);
        return $result['total'] ?? 0;
    }

    // 3. Tổng số sản phẩm đang kinh doanh (Giữ nguyên vì là tổng kho)
    public function getProductCount() {
        $sql = "SELECT COUNT(*) as total FROM products";
        $result = $this->selectOne($sql);
        return $result['total'] ?? 0;
    }

    // 4. Doanh thu 7 ngày gần nhất (Để vẽ biểu đồ tuần)
    public function getWeeklyRevenue() {
        // Lấy dữ liệu 7 ngày qua tính từ hôm nay
        $sql = "SELECT DATE(order_date) as date, SUM(total_price) as total 
                FROM orders 
                WHERE status = 'done' 
                AND order_date >= DATE_SUB(CURDATE(), INTERVAL 6 DAY)
                GROUP BY DATE(order_date)
                ORDER BY DATE(order_date) ASC";
        return $this->selectAll($sql);
    }

public function getTopSellingProducts($startDate, $endDate) {
    $sql = "SELECT 
                p.product_name, 
                p.image, 
                SUM(od.quantity) as total_qty, -- Đổi total_sold thành total_qty ở đây
                SUM(od.quantity * od.price) as total_revenue
            FROM order_details od
            JOIN products p ON od.product_id = p.product_id 
            JOIN orders o ON od.order_id = o.order_id
            WHERE o.order_date BETWEEN ? AND ? 
              AND o.status = 'done' 
            GROUP BY p.product_id
            ORDER BY total_qty DESC
            LIMIT 5";

    return $this->selectAll($sql, [$startDate, $endDate]);
}
}