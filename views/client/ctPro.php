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
    <main class="lg:max-w-7xl mx-auto">
  <section class="lg:max-w7xl mx-auto">
    <div class="lg:text-[15px] lg:pt-5 lg:text-gray-500">
      Home > Shop > Men > <span class="lg:text-black">Product Name</span>
    </div>

    <div class="lg:flex lg:items-center lg:mt-10 lg:gap-10">
      <div class="lg:flex lg:items-center gap-5">
        <div class="lg:flex lg:flex-col lg:gap-4">
          <img src="https://via.placeholder.com/200" class="lg:w-[200px]" />
        </div>

        <div class="lg:w-[600px]">
          <img src="https://via.placeholder.com/600" class="w-full" />
        </div>
      </div>

      <div>
        <div class="flex flex-col gap-5">
          <div>
            <p class="Integral lg:font-bold lg:text-4xl">Product Name</p>
            <p>⭐⭐⭐⭐⭐ 4/5</p>
          </div>

          <div class="flex items-center gap-5 text-2xl">
            <p class="font-bold">$120</p>
            <p class="text-red-600 bg-red-300 w-[45px] rounded-3xl text-[15px] text-center">
              -40%
            </p>
          </div>

          <p class="border-b pb-8 border-b-gray-500">
            Category Name
          </p>
        </div>

        <!-- COLOR -->
        <div class="mt-5">
          <p>Select Color:</p>
          <div class="flex items-center gap-3 mt-2 border-b pb-8 border-b-gray-500">
            <p class="w-[25px] h-[25px] rounded-full bg-amber-900 text-center text-white cursor-pointer">✓</p>
            <p class="w-[25px] h-[25px] rounded-full bg-green-900 cursor-pointer"></p>
            <p class="w-[25px] h-[25px] rounded-full bg-violet-900 cursor-pointer"></p>
          </div>
        </div>

        <!-- SIZE -->
        <div class="mt-5 w-full">
          <p>Choose size:</p>
          <div class="flex items-center gap-3 mt-2 border-b pb-8 border-b-gray-500">
            <p class="w-[75px] text-center border rounded-3xl p-2 cursor-pointer">Small</p>
            <p class="w-[75px] text-center border rounded-3xl p-2 cursor-pointer">Medium</p>
            <p class="w-[75px] text-center border rounded-3xl p-2 bg-black text-white cursor-pointer">Large</p>
            <p class="w-[75px] text-center border rounded-3xl p-2 cursor-pointer">X-Large</p>
          </div>
        </div>

        <!-- QUANTITY -->
        <div class="flex items-center gap-10 mt-5">
          <div class="bg-gray-200 w-[150px] rounded-3xl flex items-center justify-between p-1">
            <button class="text-2xl ml-3">+</button>
            <input type="text" value="1" class="w-10 text-center" readonly />
            <button class="text-2xl ml-3">-</button>
          </div>

          <button class="bg-black text-white lg:w-[470px] p-2 rounded-3xl">
            Add To Cart
          </button>
        </div>
      </div>
    </div>
  </section>

  <!-- RELATED PRODUCTS -->
  <section class="lg:max-w7xl mx-auto mt-15">
    <h2 class="Integral font-bold text-5xl text-center mt-8 mb-10">
      You might also like
    </h2>

    <div class="grid grid-cols-3 gap-5 pt-5 pl-5">
      <div class="border p-3">
        <img src="https://via.placeholder.com/300" />
        <p>Product 1</p>
        <p>$100</p>
      </div>

      <div class="border p-3">
        <img src="https://via.placeholder.com/300" />
        <p>Product 2</p>
        <p>$120</p>
      </div>

      <div class="border p-3">
        <img src="https://via.placeholder.com/300" />
        <p>Product 3</p>
        <p>$150</p>
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