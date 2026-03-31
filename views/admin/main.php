<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>ASM_Hieuhtph52241</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white">

<div class="flex min-h-screen">
  
<aside class="w-64 bg-black text-white p-6 flex flex-col justify-between">
  
  <!-- MENU -->
  <div>
<a href="?url=admin" class="block mb-6 text-center">
  <img src="https://i.ibb.co/JFS8G2Zz/t-i-xu-ng-2.png" 
       alt="Logo"
       class="mx-auto w-48 h-auto">
</a>

    <nav class="space-y-3">

      <a href="?url=listCate" class="block hover:text-gray-300">
        Quản lý danh mục
      </a>

      <a href="?url=listBrand" class="block hover:text-gray-300">
        Quản lý Thương Hiệu
      </a>

      <a href="?url=listProduct" class="block hover:text-gray-300">
        Quản lý sản phẩm
      </a>
      <a href="?url=admin" class="block hover:text-gray-300">
        Quản lí đơn hàng
      </a>
      
      <a href="?url=admin" class="block hover:text-gray-300">
        Thống kê
      </a>

    </nav>
  </div>

  <!-- LOGOUT -->
  <div>
    <a href="?url=logout"
       class="block text-center bg-red-600 hover:bg-red-700 text-white py-2 rounded-lg">
       Đăng xuất
    </a>
  </div>

</aside>

  <main class="flex-1 p-6 bg-white">

    <?php
    if (isset($view)) {
        require PATH_VIEW . $view;
    }
    ?>

  </main>

</div>

</body>
</html>