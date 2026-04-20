<?php
class StatsController {
    public $statsModel;

    public function __construct() {
        $this->statsModel = new StatsModel();
    }

    public function index() {
        // 1. Nhận ngày lọc từ URL (mặc định từ đầu tháng đến hôm nay)
        $startDate = $_GET['start_date'] ?? date('Y-m-01');
        $endDate = $_GET['end_date'] ?? date('Y-m-d');

        // 2. Lấy các chỉ số tổng quan (có lọc theo ngày)
        $totalRevenue = $this->statsModel->getTotalRevenue($startDate, $endDate);
        $orderCount = $this->statsModel->getOrderCount($startDate, $endDate);
        $productCount = $this->statsModel->getProductCount();

        // 3. Lấy Top 5 sản phẩm bán chạy (có lọc theo ngày)
        $topProducts = $this->statsModel->getTopSellingProducts($startDate, $endDate);

        // 4. Xử lý dữ liệu biểu đồ tuần (Thay thế cho cái getRevenueByMonth cũ bị lỗi)
        $weeklyData = $this->statsModel->getWeeklyRevenue();
        
        $days = [];
        $weeklyRevenues = [];
        
        if (!empty($weeklyData)) {
            foreach ($weeklyData as $row) {
                // Chuyển định dạng ngày sang d/m để hiển thị trên biểu đồ cho đẹp
                $days[] = date('d/m', strtotime($row['date']));
                $weeklyRevenues[] = $row['total'];
            }
        }

        // 5. Truyền dữ liệu sang View
        $view = "views/admin/stats/index.php";
        require_once 'views/admin/main.php';
    }
}