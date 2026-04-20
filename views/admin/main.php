<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title><?= $title ?? 'Admin' ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="flex min-h-screen">
  
  <!-- SIDEBAR -->
  <aside class="w-64 bg-gray-900 text-white flex flex-col">
    
    <div class="p-6 text-2xl font-bold border-b border-gray-700">
      ADMIN
    </div>

    <nav class="flex-1 p-4 space-y-2 text-sm">

      <a href="?url=listCate" 
         class="block px-3 py-2 rounded hover:bg-gray-700 transition">
         📂 Quản lý danh mục
      </a>

      <a href="?url=/" 
         class="block px-3 py-2 rounded hover:bg-gray-700 transition">
         👟 Quản lý sản phẩm
      </a>

      <a href="?url=admin-orders"
         class="block px-3 py-2 rounded hover:bg-gray-700 transition">
         📦 Quản lý đơn hàng
      </a>
      
      <a href="?url=admin-stats" 
         class="block px-3 py-2 rounded hover:bg-gray-700 transition">
         📊 Thống kê
      </a>
      
      <a href="?url=logout" 
         class="block px-3 py-2 rounded hover:bg-red-600 transition">
         🚪 Đăng xuất
      </a>

    </nav>

    <div class="p-4 border-t border-gray-700 text-sm text-gray-400">
      Xin chào, Admin
    </div>

  </aside>

  <!-- MAIN -->
  <main class="flex-1 p-6">

    <!-- NAVBAR -->
    <div class="flex justify-between items-center mb-6">

      <h1 class="text-2xl font-bold text-gray-800">
        <?= $title ?? '' ?>
      </h1>

      <div class="flex items-center space-x-3">
        <span class="text-gray-600 text-sm">Admin</span>
        <img src="https://i.pravatar.cc/40"
             class="w-10 h-10 rounded-full">
      </div>

    </div>

    <!-- CONTENT -->
    <?php include $view; ?>

  </main>

</div>

</body>
</html>