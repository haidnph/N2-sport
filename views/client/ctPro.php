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

     <form class="relative">
    <input
        type="text"
        placeholder="Tìm kiếm sản phẩm..."
        class="w-48 md:w-64 lg:w-72 p-2.5 pl-10 rounded-full bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400 transition-all duration-200"
    />
    <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-500"></i>
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
<section class="lg:max-w-7xl mx-auto">

<?php if (!empty($product)): ?>

    <!-- BREADCRUMB -->
    <div class="lg:text-[15px] lg:pt-5 lg:text-gray-500 flex gap-2">
  
  <a href="index.php?url=home" class="hover:underline">
    Home
  </a>

  <span>></span>

  <a href="index.php?url=shop" class="hover:underline">
    Shop
  </a>

  <span>></span>

  <span class="text-black font-medium">
    <?= $product['product_name'] ?>
  </span>

</div>

    <div class="lg:flex lg:items-center lg:mt-10 lg:gap-10">

      <!-- IMAGE -->
      <div class="lg:flex lg:items-center gap-5">

        <div class="lg:flex lg:flex-col lg:gap-4">
          <img src="/baseDA1/uploads/<?= $product['image'] ?>" 
               class="lg:w-[200px] rounded">
        </div>

        <div class="lg:w-[600px]">
          <img src="/baseDA1/uploads/<?= $product['image'] ?>" 
               class="w-full rounded-xl">
        </div>

      </div>

      <!-- INFO -->
      <div>
        <div class="flex flex-col gap-5">

          <div>
            <p class="font-bold text-4xl">
              <?= $product['product_name'] ?>
            </p>
            <p>⭐⭐⭐⭐⭐</p>
          </div>

          <div class="flex items-center gap-5 text-2xl">
            <p class="font-bold text-red-500">
              <?= number_format($product['base_price']) ?> vnđ
            </p>
          </div>

          <p class=" pb-8 text-gray-500">
            <?= $product['description'] ?? 'Không có mô tả' ?>
          </p>

        </div>

        <!-- SIZE -->
     <div class="flex gap-3  pb-5">
<?php foreach($sizes as $s): ?>
    <button 
        class="size-btn px-4 py-2 border rounded-xl 
               hover:bg-black hover:text-white transition"
        data-size="<?= $s['size_value'] ?>">
        <?= $s['size_value'] ?? 'N/A' ?>
    </button>
<?php endforeach; ?>
</div>

<?php if (!empty($colors)): ?>
    <div class="flex gap-3 flex-wrap">
        <?php foreach($colors as $c): ?>
            <div 
                class="w-8 h-8 rounded-full border"
                style="background: <?= $c['color_code'] ?? '#ccc' ?>">
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

        <!-- QUANTITY -->
        <div class="flex items-center gap-10 mt-5">

          <div class="bg-gray-200 w-[150px] rounded-3xl flex items-center justify-between p-1">
    <button id="increase" class="text-2xl ml-3">+</button>

    <input 
        id="quantity"
        type="text" 
        value="1" 
        class="w-10 text-center bg-transparent outline-none" 
        readonly 
    />

    <button id="decrease" class="text-2xl mr-3">-</button>
</div>

          <a href="index.php?url=addToCart&id=<?= $product['product_id'] ?>"
             class="bg-black text-white px-6 py-2 rounded-3xl">
             Add To Cart
          </a>

        </div>
      </div>
    </div>

<?php else: ?>

    <p class="text-center text-red-500">Không có sản phẩm</p>

<?php endif; ?>

</section>

  <!-- RELATED PRODUCTS -->
<section class="lg:max-w-7xl mx-auto mt-10">

<h2 class="font-bold text-4xl text-center mb-10">
  You might also like
</h2>

<div class="grid grid-cols-2 md:grid-cols-3 gap-5">

<?php if (!empty($allProducts)): ?>
<?php foreach($allProducts as $item): ?>

<div class="border p-3 rounded-xl hover:shadow">

  <img src="/baseDA1/uploads/<?= $item['image'] ?>" 
       class="w-full h-[200px] object-cover rounded">

  <p class="mt-2 font-semibold">
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
<script>
const increaseBtn = document.getElementById('increase');
const decreaseBtn = document.getElementById('decrease');
const quantityInput = document.getElementById('quantity');
const hiddenQuantity = document.getElementById('quantityInput');

let quantity = 1;

increaseBtn.onclick = () => {
    quantity++;
    quantityInput.value = quantity;
    hiddenQuantity.value = quantity;
};

decreaseBtn.onclick = () => {
    if (quantity > 1) {
        quantity--;
        quantityInput.value = quantity;
        hiddenQuantity.value = quantity;
    }
};
</script>
</html>