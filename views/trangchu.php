<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Shop.ok</title>

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


<main>


<section class="bg-gray-100">
  <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-10 items-center">
    
    <div class="p-6 flex flex-col gap-6">
      <h1 class="text-4xl font-extrabold">
        SẢI BƯỚC TỰ TIN VỚI ĐÔI GIÀY ĐÚNG GU
      </h1>

      <p class="text-gray-500">
        Khám phá bộ sưu tập giày thể thao đa dạng các sản phẩm được chế tác tỉ mỉ, giúp bạn thể hiện cá tính riêng.
      </p>

      <button class="bg-black text-white px-6 py-2 rounded-3xl w-[150px]">
        Mua ngay
      </button>

      <div class="flex gap-10 pt-5">
        
        <div class="border-r pr-6">
          <p class="text-3xl font-bold">200+</p>
          <p class="text-gray-500 text-sm">Thương hiệu quốc tế</p>
        </div>

        <div class="border-r pr-6">
          <p class="text-3xl font-bold">2,000+</p>
          <p class="text-gray-500 text-sm">Sản phẩm chất lượng cao</p>
        </div>

        <div>
          <p class="text-3xl font-bold">30,000+</p>
          <p class="text-gray-500 text-sm">Khách hàng hài lòng</p>
        </div>

      </div>
    </div>

    <div class="flex justify-center items-center">
      <img 
        src="https://i.ibb.co/4wDz1XZc/5sku86ka.png"
        class="w-full max-h-[500px] object-contain"
      >
    </div>

  </div>
</section>

<!-- BRANDS -->
  <section class="bg-black">
    <div class="lg:max-w-7xl mx-auto lg:flex lg:items-center lg:justify-between lg:p-6">
        <img src="https://i.ibb.co/qYKbZqXV/images-1-removebg-preview.png" alt="logo thương hiệu" class="lg:w-[120px]" />
     
      <img src="https://companieslogo.com/img/orig/2331.HK.D-a5d3f477.png?t=1720244490" alt="logo thương hiệu" class="lg:w-[79px]" />
      <img src="https://i.ibb.co/YFFXLvpx/puma-logo-white-symbol-clothes-design-icon-abstract-football-illustration-with-black-background-free.png" alt="logo thương hiệu" class="lg:w-[120px]" />
       <img src="https://i.ibb.co/FqgLTzDj/5362a828-0f5b-4d17-a6c5-d0677dc89baa-1000x1000-removebg-preview.png" alt="logo thương hiệu" class="lg:w-[120px] h-[20]" />
      <img src="https://i.ibb.co/HpBHDrwV/adidas-logo-removebg-preview.png" alt="logo thương hiệu" class="lg:w-[120px]" />
    </div>
  </section>

<!-- NEW ARRIVALS -->
<section class="max-w-7xl mx-auto py-10 border-b">

<h2 class="text-4xl font-bold text-center mb-10">
NEW ARRIVALS
</h2>

<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

<?php if (!empty($listProduct)): ?>
<?php foreach(array_slice($listProduct, 0, 4) as $item): ?>

<div class="flex flex-col bg-white p-3 rounded-xl shadow hover:scale-105 transition relative">

    <!-- LABEL NEW -->
    <span class="absolute top-2 left-2 bg-blue-500 text-white text-xs px-2 py-1 rounded">
        NEW
    </span>

    <img src="/baseDA1/uploads/<?= $item['image'] ?>" 
         class="rounded-xl h-[250px] w-full object-cover">

    <p class="font-semibold mt-2 text-center line-clamp-1">
        <?= $item['product_name'] ?>
    </p>

    <p class="text-red-500 font-bold text-center">
        <?= number_format($item['base_price']) ?> vnđ
    </p>

    <div class="flex justify-center mt-2">
        <a href="?url=productDetail&id=<?= $item['product_id'] ?>"
           class="bg-black text-white px-4 py-2 rounded-lg hover:bg-gray-800 transition">
           Xem chi tiết
        </a>
    </div>

</div>

<?php endforeach; ?>
<?php endif; ?>

</div>
</section>


<!-- HOT PRODUCTS -->
<section class="max-w-7xl mx-auto py-10">

<h2 class="text-4xl font-bold text-center mb-10">
HOT PRODUCTS 
</h2>

<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

<?php if (!empty($hotProducts)): ?>
<?php foreach(array_slice($hotProducts, 0, 4) as $item): ?>

<div class="flex flex-col bg-white p-3 rounded-xl shadow hover:scale-105 transition relative">

    <!-- LABEL HOT -->
    <span class="absolute top-2 left-2 bg-red-500 text-white text-xs px-2 py-1 rounded">
        HOT
    </span>

    <img src="/baseDA1/uploads/<?= $item['image'] ?>" 
         class="rounded-xl h-[250px] w-full object-cover">

    <p class="font-semibold mt-2 text-center line-clamp-1">
        <?= $item['product_name'] ?>
    </p>

    <p class="text-red-500 font-bold text-center">
        <?= number_format($item['base_price']) ?> vnđ
    </p>

    <div class="flex justify-center mt-2">
        <a href="?url=productDetail&id=<?= $item['product_id'] ?>"
           class="bg-black text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
           Xem chi tiết
        </a>
    </div>

</div>

<?php endforeach; ?>
<?php endif; ?>

</div>

</section>

<!-- BROWSE STYLE -->
<section class="lg:max-w-7xl mx-auto bg-gray-100 mt-10 rounded-3xl p-[55px]">
  <h2 class="Integral font-extrabold text-center pb-10 text-4xl">
    KHÁM PHÁ GIÀY THEO PHONG CÁCH
  </h2>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
    
    <!-- Item -->
<a href="index.php?url=giayBongDa"> <!-- Thay bằng link bạn muốn -->
  <div class="relative h-[250px] overflow-hidden rounded-3xl group cursor-pointer">
    <img src="https://tse1.mm.bing.net/th/id/OIP.MtpNSg04_0jhjlcnvOel4QHaEX?rs=1&pid=ImgDetMain&o=7&rm=3"
         class="w-full h-full object-cover transition duration-500 group-hover:scale-110" />
    <div class="absolute inset-0 bg-black/30 group-hover:bg-black/50 transition duration-500"></div>
    <p class="absolute bottom-5 left-5 text-white text-xl font-bold
              bg-black/40 px-3 py-1 rounded-lg
              transition duration-300 group-hover:translate-y-[-5px]">
      Giày bóng đá
    </p>
  </div>
</a>
<a href="index.php?url=giayChay"> <!-- Thay bằng link bạn muốn -->
  <div class="relative h-[250px] overflow-hidden rounded-3xl group cursor-pointer">
    <img src="https://tse3.mm.bing.net/th/id/OIP.cerT1CU_Ym_hLnlYPWO8JQHaEK?rs=1&pid=ImgDetMain&o=7&rm=3"
         class="w-full h-full object-cover transition duration-500 group-hover:scale-110" />
    <div class="absolute inset-0 bg-black/30 group-hover:bg-black/50 transition duration-500"></div>
    <p class="absolute bottom-5 left-5 text-white text-xl font-bold
              bg-black/40 px-3 py-1 rounded-lg
              transition duration-300 group-hover:translate-y-[-5px]">
      Giày chạy
    </p>
  </div>
</a>
<a href="index.php?url=giay-bong-ro"> <!-- Thay bằng link bạn muốn -->
  <div class="relative h-[250px] overflow-hidden rounded-3xl group cursor-pointer">
    <img src="https://tse2.mm.bing.net/th/id/OIP.jlv60xpWE8ntKFkJg67vFQHaE8?rs=1&pid=ImgDetMain&o=7&rm=3"
         class="w-full h-full object-cover transition duration-500 group-hover:scale-110" />
    <div class="absolute inset-0 bg-black/30 group-hover:bg-black/50 transition duration-500"></div>
    <p class="absolute bottom-5 left-5 text-white text-xl font-bold
              bg-black/40 px-3 py-1 rounded-lg
              transition duration-300 group-hover:translate-y-[-5px]">
      Giày bóng rổ
    </p>
  </div>
</a>
<a href="index.php?url=giayBongChuyen"> <!-- Thay bằng link bạn muốn -->
  <div class="relative h-[250px] overflow-hidden rounded-3xl group cursor-pointer">
    <img src="https://tse2.mm.bing.net/th/id/OIP.Im4YtW_CDVxzQWKr5gPeVAHaHa?w=1080&h=1080&rs=1&pid=ImgDetMain&o=7&rm=3"
         class="w-full h-full object-cover transition duration-500 group-hover:scale-110" />
    <div class="absolute inset-0 bg-black/30 group-hover:bg-black/50 transition duration-500"></div>
    <p class="absolute bottom-5 left-5 text-white text-xl font-bold
              bg-black/40 px-3 py-1 rounded-lg
              transition duration-300 group-hover:translate-y-[-5px]">
       Giày bóng chuyền
    </p>
  </div>
</a>

  </div>
</section>



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