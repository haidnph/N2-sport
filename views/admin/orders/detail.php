<a href="index.php?url=admin-orders"
   class="inline-block mb-4 bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300">
   ← Quay lại
</a>
<div class="bg-white p-6 rounded-2xl shadow">

    <h2 class="text-xl font-bold mb-5">Chi tiết đơn #<?= $order['order_id'] ?></h2>

    <p><b>User:</b> <?= $order['user_id'] ?></p>
    <p><b>Ngày:</b> <?= $order['order_date'] ?></p>
    <p><b>Tổng:</b> <?= number_format($order['total_price']) ?>₫</p>

    <h3 class="mt-5 font-bold">Sản phẩm</h3>

    <ul class="mt-2 space-y-2">
        <?php foreach ($items as $i): ?>
        <li class="border p-2 rounded">
            <?= $i['product_name'] ?> - SL: <?= $i['quantity'] ?>
        </li>
        <?php endforeach; ?>
    </ul>

</div>