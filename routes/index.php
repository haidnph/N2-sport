<?php
require_once 'controllers/AuthController.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/OrderController.php';
require_once 'controllers/StatsController.php';


$url = $_GET['url'] ?? '/';

$auth = new AuthController();
$home = new HomeController();
$order = new OrderController();
$stats = new StatsController();

switch ($url) {
    case 'login':
        $auth->login();
        break;

    case 'register':
        $auth->register();
        break;

    case 'logout':
        $auth->logout();
        break;

case 'admin':
    AuthController::checkAdmin();
    $title = "Admin Dashboard";
    $view = "views/admin/dashboard.php";
    require 'views/admin/main.php';
    
    break;
    case 'admin-stats':
    AuthController::checkAdmin();
    $stats->index();
    break;

   case 'cart':
    require 'views/client/cart.php';
    break;
case 'admin-orders':
    AuthController::checkAdmin();
    $order->index();
    break;

case 'admin-orders-detail':
    AuthController::checkAdmin();
    $order->detail();
    break;

case 'admin-orders-update':
    AuthController::checkAdmin();
    $order->updateStatus();
    break;
case 'admin-orders-pay':
    AuthController::checkAdmin();
    $order->markAsPaid();
    break;


case 'admin-orders-delete':
    AuthController::checkAdmin();
    $order->delete();
    break;
    default:
        $home->index();
        break;
}