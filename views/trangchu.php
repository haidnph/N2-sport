
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

<div class="w-[110px]">
<img src="https://i.ibb.co/HLJyfnTz/SHOP-CO.jpg">
</div>

<ul class="flex gap-8">
<li class="flex items-center gap-1">
<a href="#">Shop</a>
<i class="fa-solid fa-angle-down"></i>
</li>

<li><a href="#">On Sale</a></li>
<li><a href="#">New Arrivals</a></li>
<li><a href="#">Brands</a></li>
</ul>

</div>

<div class="flex items-center gap-6">

    <form class="relative">
    <input
    type="text"
    placeholder="Tìm kiếm sản phẩm..."
    class="w-[400px] p-2 rounded-3xl pl-10 bg-gray-200 focus:outline-none"
    />

    <i class="fa-solid fa-magnifying-glass absolute left-3 top-3 text-gray-500"></i>
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

<h1 class="text-5xl font-extrabold">
FIND CLOTHES THAT MATCHES YOUR STYLE
</h1>

<p class="text-gray-500">
Browse through our diverse range of meticulously crafted garments,
designed to bring out your individuality.
</p>

<button class="bg-black text-white px-6 py-2 rounded-3xl w-[150px]">
Shop Now
</button>

<div class="flex gap-10 pt-5">

<div class="border-r pr-6">
<p class="text-3xl font-bold">200+</p>
<p class="text-gray-500 text-sm">International Brands</p>
</div>

<div class="border-r pr-6">
<p class="text-3xl font-bold">2,000+</p>
<p class="text-gray-500 text-sm">High-Quality Products</p>
</div>

<div>
<p class="text-3xl font-bold">30,000+</p>
<p class="text-gray-500 text-sm">Happy Customers</p>
</div>

</div>

</div>

<div>
<img src="https://i.ibb.co/0yNcc3b1/banner1.png" class="w-full">
</div>

</div>
</section>

<!-- BRANDS -->
  <section class="bg-black">
    <div class="lg:max-w-7xl mx-auto lg:flex lg:items-center lg:justify-between lg:p-6">
      <img src="https://i.ibb.co/bjtBZ9sh/prada-logo-1-1.png" alt="logo thương hiệu" class="lg:w-[120px]" />
      <img src="https://i.ibb.co/mYQhZrk/Group.png" alt="logo thương hiệu" class="lg:w-[79px]" />
      <img src="https://i.ibb.co/GfprfBN6/Vector-1.png" alt="logo thương hiệu" class="lg:w-[120px]" />
      <img src="https://i.ibb.co/7tVg0TjJ/Vector-2.png" alt="logo thương hiệu" class="lg:w-[120px]" />
      <img src="https://i.ibb.co/mCYDmTYg/Vector.png" alt="logo thương hiệu" class="lg:w-[120px]" />
    </div>
  </section>

<!-- NEW ARRIVALS -->
<section class="max-w-7xl mx-auto py-10 border-b">

<h2 class="text-4xl font-extrabold text-center mb-10">
NEW ARRIVALS
</h2>

<div class="grid grid-cols-2 lg:grid-cols-4 gap-6">

<!-- PRODUCT -->
<div class="flex flex-col gap-2">
<img src="/public/banner/Frame61.jpg" class="rounded-xl">
<p class="font-semibold">T-Shirt</p>
<p class="text-gray-500">$120</p>
</div>

<div class="flex flex-col gap-2">
<img src="banner/Frame62.jpg" class="rounded-xl">
<p class="font-semibold">Jeans</p>
<p class="text-gray-500">$240</p>
</div>

<div class="flex flex-col gap-2">
<img src="banner/Frame63.jpg" class="rounded-xl">
<p class="font-semibold">Jacket</p>
<p class="text-gray-500">$320</p>
</div>

<div class="flex flex-col gap-2">
<img src="banner/Frame 64.jpg" class="rounded-xl">
<p class="font-semibold">Shoes</p>
<p class="text-gray-500">$200</p>
</div>

</div>

<div class="text-center mt-8">
<button class="border px-6 py-2 rounded-3xl">View All</button>
</div>

</section>

<!-- BROWSE STYLE -->
  <section class="lg:max-w-7xl mx-auto bg-gray-100 mt-10 rounded-3xl p-[55px]">
    <h2 class="Integral font-extrabold text-center pb-10 text-4xl">BROWSE BY dress STYLE</h2>
    <div class="w-full ml-6 mx-auto lg:flex-col lg:flex lg:gap-5">
      <div class="lg:flex lg:gap-5 lg:items-center">
        <img src="https://i.ibb.co/gCPfRRB/Frame-61.jpg" alt="banner" class="rounded-3xl" />
        <img src="https://i.ibb.co/yBR039Bz/Frame-62.jpg" alt="banner" class="rounded-3xl" />
      </div>
      <div class="lg:flex lg:gap-5 lg:items-center">
        <img src="https://i.ibb.co/jvkWRX7B/Frame-63.jpg" alt="banner" class="rounded-3xl" />
        <img src="https://i.ibb.co/j9bNLCmP/Frame-64.jpg" alt="banner" class="rounded-3xl" />
      </div>
    </div>
  </section>

<!-- CUSTOMER -->
<section class="max-w-7xl mx-auto py-10">

<div class="flex justify-between items-center mb-10">

<h2 class="text-4xl font-extrabold">
OUR HAPPY CUSTOMERS
</h2>

<div class="flex gap-5 text-2xl">
<i class="fa-solid fa-circle-arrow-left"></i>
<i class="fa-solid fa-circle-arrow-right"></i>
</div>

</div>

<div class="grid lg:grid-cols-3 gap-6">

<div class="p-6 border rounded-3xl">
<p>⭐⭐⭐⭐⭐</p>
<p class="font-bold mt-2">Sarah M.</p>
<p class="text-gray-500 mt-2">
"I'm blown away by the quality and style of the clothes."
</p>
</div>

<div class="p-6 border rounded-3xl">
<p>⭐⭐⭐⭐⭐</p>
<p class="font-bold mt-2">Alex K.</p>
<p class="text-gray-500 mt-2">
"Every piece I've bought exceeded expectations."
</p>
</div>

<div class="p-6 border rounded-3xl">
<p>⭐⭐⭐⭐⭐</p>
<p class="font-bold mt-2">James L.</p>
<p class="text-gray-500 mt-2">
"Fantastic service and amazing quality."
</p>
</div>

</div>

</section>

</main>
<footer class="relative mt-[150px]">
    <div>
        <div class="absolute top-[-81px] left-[185px] z-100 bg-black lg:max-w-7xl w-full mx-auto lg:h-[150px] rounded-3xl lg:flex lg:items-center lg:justify-around">
            <div class="w-[500px] text-4xl text-gray-100">
                <span class="font-extrabold">STAY UP TO DATE ABOUT OUR LATEST OFFERS</span>
            </div>
            <div class="text-white">
                <form class="relative flex flex-col gap-4">
                    <input 
                        type="text"
                        placeholder="Gửi email phản hồi..."
                        class="w-[300px] bg-white p-[7px] rounded-3xl placeholder:text-gray-600 placeholder:pl-7"
                        />
                    <i class="fa-regular fa-envelope absolute top-3 left-3 text-gray-500"></i>
                    <button class="bg-white text-black p-[7px] rounded-3xl">Xác nhận gửi gmail</button>
                </form>
            </div>
        </div>
        <div class="bg-gray-100 pt-32">
            <div class="max-w-7xl mx-auto flex gap-10 justify-between pt-30 pb-10">
                <div class="w-[200px] flex flex-col gap-6">
                    <div class="w-[140px]">
                        <img src="https://i.ibb.co/HLJyfnTz/SHOP-CO.jpg" alt="logo shop">
                    </div>
                    <p class="text-gray-600">
                        We have clothes that suits your style and which you’re proud to wear. From women to men.
                    </p>
                    <div class="flex items-center gap-2 text-2xl">
                        <i class="fa-brands fa-wikipedia-w"></i>
                        <i class="fa-brands fa-facebook"></i>
                        <i class="fa-brands fa-instagram"></i>
                        <i class="fa-brands fa-github"></i>
                    </div>
                </div>
                <div>
                    <h3 class="font-bold">COMPANY</h3>
                    <ul class="mt-5 flex-col gap-2 text-gray-600">
                        <li><a href="">About</a></li>
                        <li><a href="">Features</a></li>
                        <li><a href="">Works</a></li>
                        <li><a href="">Career</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold">HELP</h3>
                    <ul class="mt-5 flex-col gap-2 text-gray-600">
                        <li><a href="">About</a></li>
                        <li><a href="">Features</a></li>
                        <li><a href="">Works</a></li>
                        <li><a href="">Career</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold">PQA</h3>
                    <ul class="mt-5 flex-col gap-2 text-gray-600">
                        <li><a href="">About</a></li>
                        <li><a href="">Features</a></li>
                        <li><a href="">Works</a></li>
                        <li><a href="">Career</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold">RESOURCES</h3>
                    <ul class="mt-5 flex-col gap-2 text-gray-600">
                        <li><a href="">About</a></li>
                        <li><a href="">Features</a></li>
                        <li><a href="">Works</a></li>
                        <li><a href="">Career</a></li>
                    </ul>
                </div>
            </div>
            <div class="max-w-7xl mx-auto flex items-center justify-between border-t-2 border-t-gray-400 pt-10 pb-10">
                <p class="text-gray-400">Shop.co &copy; 2000-2025 All Rights Reserved</p>
                <div class="flex items-center gap-2 text-4xl">
                    <i class="fa-brands fa-cc-visa"></i>
                    <i class="fa-brands fa-cc-mastercard"></i>
                    <i class="fa-brands fa-cc-paypal"></i>
                    <i class="fa-brands fa-cc-apple-pay"></i>
                    <i class="fa-brands fa-google-pay"></i>
                </div>
            </div>
        </div>
    </div>
</footer>

</body>
</html>