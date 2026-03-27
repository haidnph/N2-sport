<?php
require_once 'models/OrderModel.php';

class OrderController {

    private $model;

    public function __construct() {
        $this->model = new OrderModel();
    }

    // LIST
    public function index() {
        $orders = $this->model->getAll();

        $title = "Quản lý đơn hàng";
        $view = "views/admin/orders/index.php";

        require "views/admin/main.php"; // layout admin
    }

    // DETAIL
    public function detail() {
        $id = $_GET['id'];
        $order = $this->model->getById($id);
        $items = $this->model->getItems($id);

        $title = "Chi tiết đơn hàng";
        $view = "views/admin/orders/detail.php";

        require "views/admin/main.php";
    }

    // DELETE
    public function delete() {
        $id = $_GET['id'];
        $this->model->deleteOrder($id);

        header("Location: ?url=admin-orders");
        exit();
    }

    // UPDATE STATUS
    public function updateStatus() {
        $id = $_GET['id'];
        $status = $_POST['status'];

        $this->model->updateStatus($id, $status);

        header("Location: ?url=admin-orders");
        exit();
    }

    // MARK AS PAID
    public function markAsPaid() {
        $id = $_GET['id'] ?? 0;
        if ($id) {
            $this->model->updatePaymentStatus($id, 'paid');
        }
        header("Location: ?url=admin-orders");
        exit();
    }
}