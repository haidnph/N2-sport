<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

  <!-- Users -->
  <div class="bg-white p-6 rounded shadow flex items-center space-x-4">
    <div class="text-blue-500 text-3xl">👤</div>
    <div>
      <p class="text-gray-500 text-sm">Người dùng</p>
      <p class="text-2xl font-bold"><?= $totalUsers ?></p>
    </div>
  </div>

  <!-- Orders -->
  <div class="bg-white p-6 rounded shadow flex items-center space-x-4">
    <div class="text-green-500 text-3xl">📦</div>
    <div>
      <p class="text-gray-500 text-sm">Đơn hàng</p>
      <p class="text-2xl font-bold"><?= $totalOrders ?></p>
    </div>
  </div>

  <!-- Revenue -->
  <div class="bg-white p-6 rounded shadow flex items-center space-x-4">
    <div class="text-yellow-500 text-3xl">💰</div>
    <div>
      <p class="text-gray-500 text-sm">Doanh thu</p>
      <p class="text-2xl font-bold"><?= number_format($totalRevenue) ?> VND</p>
    </div>
  </div>

  <!-- Products -->
  <div class="bg-white p-6 rounded shadow flex items-center space-x-4">
    <div class="text-purple-500 text-3xl">👟</div>
    <div>
      <p class="text-gray-500 text-sm">Sản phẩm</p>
      <p class="text-2xl font-bold"><?= $totalProducts ?></p>
    </div>
  </div>

</div>