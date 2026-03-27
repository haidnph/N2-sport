<h1>Quản lý đơn hàng</h1>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>User</th>
    <th>Date</th>
    <th>Total</th>
    <th>Status</th>
    <th>Payment</th>
    <th>Action</th>
</tr>

<?php foreach ($orders as $o): ?>
<tr>
    <td><?= $o['order_id'] ?></td>
    <td><?= $o['user_id'] ?></td>
    <td><?= $o['order_date'] ?></td>
    <td>$<?= $o['total_price'] ?></td>
    <td><?= $o['status'] ?></td>
    <td><?= $o['payment_status'] ?></td>
    <td>
        <a href="index.php?url=admin-orders-detail&id=<?= $o['order_id'] ?>">Xem</a>
        <a href="index.php?url=admin-orders-delete&id=<?= $o['order_id'] ?>">Xóa</a>
    </td>
</tr>
<?php endforeach; ?>
</table>