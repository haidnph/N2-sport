<?php
$total = 0;

foreach ($_SESSION['cart'] as $item) {
    $total += $item['price'] * $item['quantity'];
}

$this->model->insert(
    "INSERT INTO orders (user_id, total_price, status, payment_status)
     VALUES (?, ?, 'pending', 'unpaid')",
    [$_SESSION['user']['id'], $total]
);
?>