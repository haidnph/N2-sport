<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Tailwind -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- Font Awesome -->
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
</head>

<body class="bg-white">
    <!-- HEADER -->
<header class="shadow-sm">

<!-- TOP BAR -->



<div class="max-w-7xl mx-auto flex justify-between items-center p-5">

<div class="flex items-center gap-10">

    <div class="flex items-center flex-shrink-0 gap-2 group">
        <a href="index.php" class="flex items-baseline italic tracking-tighter transition-opacity duration-300 hover:opacity-80">
            <span class="text-3xl font-black text-slate-900">N<span class="text-black">2</span></span>
            <span class="ml-1 text-xl font-bold uppercase tracking-widest text-slate-500">Sport</span>
        </a>
    </div>

    <!-- MENU -->
   <ul class="flex gap-6 flex-nowrap overflow-x-auto scrollbar-hide whitespace-nowrap">
    <li class="relative group">
        <a href="index.php?url=shop" class="block px-3 py-2 rounded-md transition-all duration-300 group-hover:bg-gray-100 group-hover:text-black transform group-hover:-translate-y-1">
            Shop
        </a>
    </li>
    <li class="relative group">
        <a href="index.php?url=giayCauLong" class="block px-3 py-2 rounded-md transition-all duration-300 group-hover:bg-gray-100 group-hover:text-black transform group-hover:-translate-y-1">
            Giày cầu lông
        </a>
    </li>
    <li class="relative group">
        <a href="index.php?url=giayBongDa" class="block px-3 py-2 rounded-md transition-all duration-300 group-hover:bg-gray-100 group-hover:text-black transform group-hover:-translate-y-1">
            Giày bóng đá
        </a>
    </li>
    <li class="relative group">
        <a href="index.php?url=giay-bong-ro" class="block px-3 py-2 rounded-md transition-all duration-300 group-hover:bg-gray-100 group-hover:text-black transform group-hover:-translate-y-1">
            Giày bóng rổ
        </a>
    </li>
    <li class="relative group">
        <a href="index.php?url=giayChay" class="block px-3 py-2 rounded-md transition-all duration-300 group-hover:bg-gray-100 group-hover:text-black transform group-hover:-translate-y-1">
            Giày chạy bộ
        </a>
    </li>
    <li class="relative group">
        <a href="index.php?url=giayBongChuyen" class="block px-3 py-2 rounded-md transition-all duration-300 group-hover:bg-gray-100 group-hover:text-black transform group-hover:-translate-y-1">
            Giày bóng chuyền
        </a>
    </li>
</ul>

</div>

<div class="flex items-center gap-6">

 <form class="relative" method="GET" action="index.php">
    <input type="hidden" name="url" value="search">

    <input
        type="text"
        name="keyword"
        placeholder="Tìm kiếm sản phẩm..."
        class="w-48 md:w-64 lg:w-72 p-2.5 pl-10 pr-10 rounded-full bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400 transition-all duration-200"
    />

    <!-- Nút submit -->
    <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500">
        <i class="fa-solid fa-magnifying-glass"></i>
    </button>
</form>

    <div class="flex gap-4 text-xl">
    <a href="index.php?url=cart">
    <i class="fa-solid fa-cart-shopping cursor-pointer"></i>
</a>
<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>

<?php if (isset($_SESSION['user'])): ?>

    <!-- Đã login -->
    <div class="flex items-center gap-2 text-sm">
        <span class="font-semibold text-gray-700">
            <?= $_SESSION['user']['name'] ?>
        </span>

        <a href="index.php?url=logout"
           class="text-red-500 hover:underline">
           Đăng xuất
        </a>
    </div>

<?php else: ?>

    <!-- Chưa login -->
    <a href="index.php?url=login">
        <i class="fa-solid fa-user cursor-pointer"></i>
    </a>

<?php endif; ?>
</div>

</div>

</div>

</header>
    <main class="lg:max-w-7xl mx-auto">
  <div class="lg:text-[15px] text-gray-500 lg:mt-5">
    Home > <span class="text-black">Giày chạy bộ</span>
  </div>

  <div class="flex gap-10">
    
    <!-- FILTER -->
  <section class="border border-gray-500 w-[25%] rounded-3xl mt-10">
  <form method="GET" action="index.php" class="w-[250px] mx-auto">

    <input type="hidden" name="url" value="giayChay">

    <!-- HEADER -->
    <div class="flex items-center justify-between border-b border-gray-500 pt-5 pb-5">
      <p class="font-bold">Filters</p>
      <i class="fa-solid fa-sliders"></i>
    </div>

    <!-- BRAND -->
    <div class="pt-5 pb-5 border-b border-gray-500">
      <p class="font-bold mb-3">Brand</p>

      <div class="flex flex-col gap-2">
        <?php foreach($listBrand as $b): ?>
          <label class="flex items-center gap-2 cursor-pointer group">
            <input 
              type="checkbox" 
              name="brand[]" 
              value="<?= $b['brand_id'] ?>"
              class="hidden peer"
            >

            <!-- custom checkbox -->
            <div class="w-4 h-4 border border-gray-400 rounded 
                        peer-checked:bg-black peer-checked:border-black 
                        transition"></div>

            <span class="text-gray-600 group-hover:text-black 
                         peer-checked:text-black transition">
              <?= $b['brand_name'] ?>
            </span>
          </label>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- SIZE -->
    <div>
      <div class="flex justify-between pt-5 pb-5">
        <p class="font-bold">Size</p>
      </div>

      <!-- GRID đều nhau -->
      <div class="grid grid-cols-4 gap-3 border-b border-gray-500 pb-5">
        <?php foreach($listSize as $s): ?>
          <label class="cursor-pointer">
            <input 
              type="checkbox" 
              name="size[]" 
              value="<?= $s['size_id'] ?>" 
              class="hidden peer"
            >

            <div class="text-center py-2 rounded-2xl border 
                        text-gray-500 
                        hover:border-black hover:text-black
                        peer-checked:bg-black peer-checked:text-white peer-checked:border-black
                        transition">
              <?= $s['size_value'] ?>
            </div>
          </label>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- BUTTON -->
    <div class="pb-5 pt-5">
      <button type="submit" class="w-full p-3 text-white text-[18px] bg-black rounded-3xl hover:opacity-80 transition">
        Apply filters
      </button>
    </div>

  </form>
</section>

<!-- PRODUCTS -->
<section class="mt-10 w-[75%]">

  <div class="flex justify-between pl-5">
    <h2 class="font-bold text-2xl">Giày chạy bộ chính hãng</h2>
    <p class="text-gray-500">
      Showing <?= count($products ?? []) ?> Products
    </p>
  </div>

  <!-- GRID -->
  <div class="grid grid-cols-3 gap-5 pt-5 pl-5">

    <?php if (!empty($products)): ?>
      <?php foreach ($products as $p): ?>

        <a href="index.php?url=productDetail&id=<?= $p['product_id'] ?>" 
           class="flex flex-col bg-white p-3 rounded-xl shadow hover:scale-105 transition-transform duration-300 relative">

          <img 
            src="/baseDA1/uploads/<?= $p['image'] ?>" 
            class="rounded-lg mb-3 w-full h-[250px] object-cover transition-transform duration-300 hover:scale-105">

          <h3 class="font-semibold">
            <?= $p['product_name'] ?>
          </h3>

          <p class="text-red-500 font-bold">
            <?= number_format($p['base_price']) ?> vnđ
          </p>

        </a>

      <?php endforeach; ?>
    <?php else: ?>
      <p class="text-gray-500 pl-5">Không có sản phẩm</p>
    <?php endif; ?>

  </div>

</section>


  </div>
  
</main>
<footer class="relative mt-20"> <div class="bg-gray-100 py-12"> <div class="max-w-7xl mx-auto px-4"> <div class="grid grid-cols-1 md:grid-cols-5 gap-8 pb-10"> <div class="md:col-span-1">
          <a href="index.php" class="flex items-baseline italic tracking-tighter hover:opacity-80 transition-opacity">
            <span class="text-3xl font-black text-slate-900">N2</span>
            <span class="ml-1 text-xl font-bold uppercase tracking-widest text-slate-500">Sport</span>
          </a>
          <p class="text-gray-600 mt-4 text-sm leading-relaxed">
            Chúng tôi cung cấp những đôi giày phù hợp với phong cách của bạn và khiến bạn tự tin khi mang.
          </p>
          <div class="flex items-center gap-4 mt-6 text-xl text-gray-700">
            <a href="#"><i class="fa-brands fa-facebook"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-github"></i></a>
          </div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 md:col-span-4 gap-8">
          <div>
            <h3 class="font-bold text-sm uppercase tracking-wider">Công ty</h3>
            <ul class="mt-4 space-y-2 text-sm text-gray-600">
              <li><a href="#" class="hover:text-black">Giới thiệu</a></li>
              <li><a href="#" class="hover:text-black">Tính năng</a></li>
              <li><a href="#" class="hover:text-black">Dự án</a></li>
              <li><a href="#" class="hover:text-black">Tuyển dụng</a></li>
            </ul>
          </div>

          <div>
            <h3 class="font-bold text-sm uppercase tracking-wider">Hỗ trợ</h3>
            <ul class="mt-4 space-y-2 text-sm text-gray-600">
              <li><a href="#" class="hover:text-black">Trung tâm trợ giúp</a></li>
              <li><a href="#" class="hover:text-black">Chính sách</a></li>
              <li><a href="#" class="hover:text-black">Hướng dẫn</a></li>
              <li><a href="#" class="hover:text-black">Liên hệ</a></li>
            </ul>
          </div>

          <div>
            <h3 class="font-bold text-sm uppercase tracking-wider">FAQ</h3>
            <ul class="mt-4 space-y-2 text-sm text-gray-600">
              <li><a href="#" class="hover:text-black">Về chúng tôi</a></li>
              <li><a href="#" class="hover:text-black">Mua hàng</a></li>
              <li><a href="#" class="hover:text-black">Thanh toán</a></li>
              <li><a href="#" class="hover:text-black">Vận chuyển</a></li>
            </ul>
          </div>

          <div>
            <h3 class="font-bold text-sm uppercase tracking-wider">Tài nguyên</h3>
            <ul class="mt-4 space-y-2 text-sm text-gray-600">
              <li><a href="#" class="hover:text-black">Blog</a></li>
              <li><a href="#" class="hover:text-black">Tin tức</a></li>
              <li><a href="#" class="hover:text-black">Cộng đồng</a></li>
            </ul>
          </div>
        </div>
      </div>

      <div class="flex flex-col md:flex-row items-center justify-between border-t border-gray-300 pt-8 mt-2">
        <p class="text-sm text-gray-500 italic">Shop.co &copy; 2000-2025 Bản quyền thuộc về N2 Sport</p>
        <div class="flex items-center gap-4 mt-4 md:mt-0 text-3xl text-gray-700">
          <i class="fa-brands fa-cc-visa"></i>
          <i class="fa-brands fa-cc-mastercard"></i>
          <i class="fa-brands fa-cc-paypal"></i>
          <i class="fa-brands fa-cc-apple-pay"></i>
        </div>
      </div>

    </div>
  </div>
</footer>
</body>
</html>