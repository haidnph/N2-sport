<div class="bg-white p-6 rounded-2xl shadow">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold">Danh sách đơn hàng</h2>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full">

            <thead>
                <tr class="bg-gray-100 text-sm">
                    <th class="p-3 text-left">ID</th>
                    <th class="p-3 text-center">User</th>
                    <th class="p-3 text-center">Ngày</th>
                    <th class="p-3 text-center">Tổng</th>
                    <th class="p-3 text-center">Trạng thái</th>
                    <th class="p-3 text-center">Hành động</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($orders as $o): ?>
                <tr class="border-b hover:bg-gray-50">

                    <td class="p-3 font-semibold">#<?= $o['order_id'] ?></td>

                    <td class="text-center"><?= $o['user_id'] ?></td>

                    <td class="text-center text-sm text-gray-500">
                        <?= date('d/m/Y', strtotime($o['order_date'])) ?>
                    </td>

                    <td class="text-center text-green-600 font-bold">
                        <?= number_format($o['total_price']) ?>₫
                    </td>

                    <td class="text-center">

    <form action="index.php?url=admin-orders-update&id=<?= $o['order_id'] ?>" method="POST">

        <?php
        $color = match($o['status']) {
            'pending' => 'bg-yellow-100 text-yellow-700',
            'shipping' => 'bg-blue-100 text-blue-700',
            'done' => 'bg-green-100 text-green-700',
            default => 'bg-gray-100'
        };
        ?>

        <select name="status"
    onchange="changeStatus(this, '<?= $o['status'] ?>')"
    class="px-3 py-1 rounded-full text-xs font-semibold border cursor-pointer <?= $color ?>">

            <option value="pending" <?= $o['status']=='pending'?'selected':'' ?>>
                Pending
            </option>

            <option value="shipping" <?= $o['status']=='shipping'?'selected':'' ?>>
                Shipping
            </option>

            <option value="done" <?= $o['status']=='done'?'selected':'' ?>>
                Done
            </option>

        </select>

    </form>

</td>

 <td class="p-3">
  <div class="flex items-center space-x-2">

    <a href="index.php?url=admin-orders-detail&id=<?= $o['order_id'] ?>"
       class="bg-blue-500 text-white px-3 py-1 rounded text-sm">
       Xem
    </a>

    <a href="index.php?url=admin-orders-delete&id=<?= $o['order_id'] ?>"
       onclick="return confirm('Xóa đơn?')"
       class="bg-red-500 text-white px-3 py-1 rounded text-sm">
       Xóa
    </a>

    <?php if($o['status']=='done' && $o['payment_status']=='unpaid'): ?>
        <a href="index.php?url=admin-orders-pay&id=<?= $o['order_id'] ?>"
           onclick="return confirm('Đánh dấu là đã thu tiền?')"
           class="bg-green-500 text-white px-3 py-1 rounded text-sm">
           💵 Thu tiền
        </a>
    <?php elseif($o['payment_status']=='paid'): ?>
        <span class="text-gray-500 text-sm">Đã thu tiền</span>
    <?php endif; ?>

  </div>
</td>

                </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>

</div>
<script>
function changeStatus(el, oldValue) {
    if (confirm('Đổi trạng thái đơn?')) {
        el.form.submit();
    } else {
        el.value = oldValue; // 🔥 quay lại giá trị cũ
    }
}
</script>