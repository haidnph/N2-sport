<?php
require_once 'models/StatsModel.php';

class StatsController {
    private $model;

    public function __construct() {
        $this->model = new StatsModel();
    }

    public function index() {
        $totalUsers    = $this->model->getTotalUsers();
        $totalOrders   = $this->model->getTotalOrders();
        $totalRevenue  = $this->model->getTotalRevenue();
        $totalProducts = $this->model->getTotalProducts();

        $title = "Thống kê";       // Tiêu đề navbar
        $view  = 'views/admin/stats/stats.php';  // View nội dung
        require 'views/admin/main.php';          // Layout chính
    }
}