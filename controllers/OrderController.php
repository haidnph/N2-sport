<?php
require_once 'models/OrderModel.php';
require_once 'models/ProductModel.php'; 

class OrderController {

    private $model;
    private $productModel;

    public function __construct() {
        $this->model = new OrderModel();
        $this->productModel = new ProductModel();
    }

    // ==========================================
    // ADMIN: QUẢN LÝ ĐƠN HÀNG
    // ==========================================

    public function index() {
        $orders = $this->model->getAll();
        $title = "Quản lý đơn hàng";
        $view = "views/admin/orders/index.php";
        require "views/admin/main.php";
    }

    public function detail($id = null) {
        $id = $id ?? $_GET['id'] ?? null; 
        if (!$id) {
            header("Location: index.php?url=admin-orders&error=NoID");
            exit();
        }

        $order = $this->model->getOrderWithItems($id);
        if (!$order) {
            header("Location: index.php?url=admin-orders&error=NotFound");
            exit();
        }

        $title = "Chi tiết đơn hàng #" . $id;
        $view = "views/admin/orders/detail.php";
        require "views/admin/main.php";
    }

    public function cancel() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: index.php?url=admin-orders&error=MissingID");
            exit();
        }

        $order = $this->model->getById($id);
        if (!$order || in_array($order['status'], ['done', 'shipping'])) {
            header("Location: index.php?url=admin-order-detail&id=$id&error=CannotCancel");
            exit();
        }

        // HOÀN KHO KHI HUỶ
        $items = $this->model->getItems($id);
        foreach ($items as $item) {
            if (!empty($item['size_id']) && !empty($item['product_id'])) {
                $this->productModel->plusStock((int)$item['product_id'], (int)$item['size_id'], (int)$item['quantity']);
            }
        }

        $this->model->cancelOrder($id);
        header("Location: index.php?url=admin-order-detail&id=$id&success=Cancelled");
        exit();
    }

public function delete() {
    $id = $_GET['id'] ?? null;

    if ($id) {

        $items = $this->model->getItems($id);


        foreach ($items as $item) {
            if (!empty($item['size_id']) && !empty($item['product_id'])) {
                $this->productModel->plusStock(
                    (int)$item['product_id'], 
                    (int)$item['size_id'], 
                    (int)$item['quantity']
                );
            }
        }

        // BƯỚC 3: Sau khi hoàn kho xong mới thực hiện xoá đơn hàng
        $this->model->deleteOrder($id); 
        
        header("Location: index.php?url=admin-orders&success=1");
        exit();
    }
}

    public function updateStatus() {
        $id = $_GET['id'] ?? null;
        $status = $_POST['status'] ?? null;
        if ($id && $status) {
            $this->model->updateStatus($id, $status);
            header("Location: index.php?url=admin-order-detail&id=$id&success=StatusUpdated");
            exit();
        }
    }

    public function markAsPaid() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->model->updatePaymentStatus($id, 'paid');
            header("Location: index.php?url=admin-order-detail&id=$id&success=Paid");
            exit();
        }
    }

    // ==========================================
    // CLIENT: ĐẶT HÀNG & GIỎ HÀNG
    // ==========================================

    public function store() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?url=login");
            exit();
        }

        $user_id = $_SESSION['user']['user_id'] ?? $_SESSION['user']['id'] ?? 0;
        $cart = $_SESSION['cart'] ?? [];
        if (empty($cart)) {
            header("Location: index.php?url=cart&error=empty");
            exit();
        }

        $receiver_name  = $_POST['receiver_name'] ?? 'Khách không tên';
        $phone          = $_POST['phone'] ?? '';
        $address        = $_POST['address'] ?? '';
        $payment_method = $_POST['payment_method'] ?? 'cod';

        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += ($item['price'] * $item['quantity']);
        }
        
        $total_final = ($subtotal - ($subtotal * 0.2)) + 10000;

        $orderId = $this->model->createOrder($user_id, $receiver_name, $phone, $address, $total_final, $payment_method);

        if ($orderId) {
            foreach ($cart as $item) {
                $product_id = (int)($item['product_id'] ?? $item['id'] ?? 0);
                $size_id = (int)($item['size_id'] ?? 0);
                $quantity = (int)($item['quantity'] ?? 1);
                
                if ($product_id > 0) {
                    $this->model->addOrderItem($orderId, $product_id, $item['color_id'] ?? null, $size_id, $quantity, $item['price'] ?? 0);
                    if ($size_id > 0) {
                        $this->productModel->minusStock($product_id, $size_id, $quantity);
                    }
                }
            }
            unset($_SESSION['cart']);
            header("Location: index.php?url=checkout&success=1");
            exit();
        }
    }

    public function addToCart() {
        if (session_status() === PHP_SESSION_NONE) session_start();

        $product_id = $_POST['product_id'] ?? null;
        $size_id    = $_POST['size_id'] ?? null;
        $quantity   = (int)($_POST['quantity'] ?? 1);

        if (!$product_id || !$size_id) {
            header("Location: index.php?url=shop");
            exit();
        }

        $cart = $_SESSION['cart'] ?? [];
        $cartKey = $product_id . '_' . $size_id;

        if (isset($cart[$cartKey])) {
            $cart[$cartKey]['quantity'] += $quantity;
        } else {
            $cart[$cartKey] = [
                'product_id' => (int)$product_id,
                'color_id'   => $_POST['color_id'] ? (int)$_POST['color_id'] : null,
                'size_id'    => (int)$size_id,
                'name'       => $_POST['name'] ?? 'Sản phẩm',
                'image'      => $_POST['image'] ?? '',
                'price'      => (float)($_POST['price'] ?? 0),
                'quantity'   => $quantity,
                'size'       => $_POST['size_name'] ?? 'N/A'
            ];
        }

        $_SESSION['cart'] = $cart;
        header("Location: index.php?url=cart");
        exit();
    }

public function increase() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        
        // Lấy ID từ URL (đây phải là chuỗi 'productID_sizeID')
        $id = $_GET['id'] ?? null; 
        
        if ($id && isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity'] += 1;
        }
        
        // Quay về trang cart.php thông qua route
        header("Location: index.php?url=cart");
        exit();
    }

    public function decrease() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        
        $id = $_GET['id'] ?? null;
        
        if ($id && isset($_SESSION['cart'][$id])) {
            if ($_SESSION['cart'][$id]['quantity'] > 1) {
                $_SESSION['cart'][$id]['quantity'] -= 1;
            } else {
                unset($_SESSION['cart'][$id]);
            }
        }
        
        header("Location: index.php?url=cart");
        exit();
    }

    public function remove() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        
        $id = $_GET['id'] ?? null;
        
        if ($id && isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
        }
        
        header("Location: index.php?url=cart");
        exit();
    }
}