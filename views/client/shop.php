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
<i class="fa-solid fa-cart-shopping cursor-pointer"></i>
<i class="fa-solid fa-user cursor-pointer"></i>
</div>

</div>

</div>

</header>
    <main class="lg:max-w-7xl mx-auto">
  <div class="lg:text-[15px] text-gray-500 lg:mt-5">
    Home > <span class="text-black">Casual</span>
  </div>

  <div class="flex gap-10">
    
    <!-- FILTER -->
    <section class="border border-gray-500 w-[25%] rounded-3xl mt-10">
      <form class="w-[250px] mx-auto">
        
        <div class="flex items-center justify-between border-b border-gray-500 pt-5 pb-5">
          <p class="font-bold">Filters</p>
          <i class="fa-solid fa-sliders"></i>
        </div>

        <!-- CATEGORY -->
        <div class="pt-5 pb-5 border-b border-gray-500">
          <ul class="flex flex-col gap-5 text-gray-500">
            <li><a href="#" class="flex justify-between">T-Shirts <i class="fa-solid fa-angle-right"></i></a></li>
            <li><a href="#" class="flex justify-between">Short <i class="fa-solid fa-angle-right"></i></a></li>
            <li><a href="#" class="flex justify-between">Shirts <i class="fa-solid fa-angle-right"></i></a></li>
            <li><a href="#" class="flex justify-between">Hoodie <i class="fa-solid fa-angle-right"></i></a></li>
            <li><a href="#" class="flex justify-between">Jeans <i class="fa-solid fa-angle-right"></i></a></li>
          </ul>
        </div>

        <!-- PRICE -->
        <div>
          <div class="flex justify-between pt-5 pb-5">
            <p class="font-bold">Price</p>
            <i class="fa-solid fa-angle-up"></i>
          </div>
          <div class="border-b border-gray-500 pb-5">
            <div class="h-1 bg-gray-300 rounded"></div>
            <div class="flex justify-between pt-2">
              <p>$50</p>
              <p>$200</p>
            </div>
          </div>
        </div>

        <!-- COLOR -->
        <div>
          <div class="flex justify-between pt-5 pb-5">
            <p class="font-bold">Color</p>
            <i class="fa-solid fa-angle-up"></i>
          </div>
          <div class="flex flex-wrap gap-2 border-b border-gray-500 pb-5">
            <div class="w-10 h-10 bg-green-500 rounded-full"></div>
            <div class="w-10 h-10 bg-red-500 rounded-full"></div>
            <div class="w-10 h-10 bg-amber-300 rounded-full"></div>
            <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center text-white">✓</div>
            <div class="w-10 h-10 bg-black rounded-full"></div>
          </div>
        </div>

        <!-- SIZE -->
        <div>
          <div class="flex justify-between pt-5 pb-5">
            <p class="font-bold">Size</p>
            <i class="fa-solid fa-angle-up"></i>
          </div>
          <div class="flex flex-wrap gap-3 border-b border-gray-500 pb-5">
            <span class="bg-gray-100 p-2 rounded-3xl text-gray-500">S</span>
            <span class="bg-gray-100 p-2 rounded-3xl text-gray-500">M</span>
            <span class="bg-black p-2 rounded-3xl text-white">L</span>
            <span class="bg-gray-100 p-2 rounded-3xl text-gray-500">XL</span>
          </div>
        </div>

        <!-- BUTTON -->
        <div class="pb-5 pt-5">
          <button class="w-full p-3 text-white text-[18px] bg-black rounded-3xl">
            Apply filters
          </button>
        </div>

      </form>
    </section>

    <!-- PRODUCTS -->
    <section class="mt-10 w-[75%]">
      
      <div class="flex justify-between pl-5">
        <h2 class="font-bold text-2xl">Casual</h2>
        <p class="text-gray-500">Showing 1-10 of 100 Products</p>
      </div>

      <!-- GRID -->
      <div class="grid grid-cols-3 gap-5 pt-5 pl-5">
        
        <!-- ITEM -->
        <a href="#" class="border p-3 rounded-xl hover:shadow">
          <img src="https://via.placeholder.com/300" class="rounded-lg mb-3">
          <h3 class="font-semibold">Product Name</h3>
          <p class="text-gray-500">$120</p>
        </a>

        <a href="#" class="border p-3 rounded-xl hover:shadow">
          <img src="https://via.placeholder.com/300" class="rounded-lg mb-3">
          <h3 class="font-semibold">Product Name</h3>
          <p class="text-gray-500">$150</p>
        </a>

        <a href="#" class="border p-3 rounded-xl hover:shadow">
          <img src="https://via.placeholder.com/300" class="rounded-lg mb-3">
          <h3 class="font-semibold">Product Name</h3>
          <p class="text-gray-500">$200</p>
        </a>

      </div>

    </section>


  </div>
  
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