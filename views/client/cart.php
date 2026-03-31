<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
<img src="https://i.ibb.co/pvnBxVx4/t-i-xu-ng-1.png">
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
    <main class="max-w-7xl mx-auto">
  <div class="lg:text-[15px] text-gray-500 lg:mt-5">
    Home > <span class="lg:text-black">Cart</span>
  </div>

  <section>
    <h2 class="Integral font-extrabold text-3xl p-5">
      YOUR CART (3 items)
    </h2>

    <div class="flex justify-between gap-5">
      
      <!-- CART LIST -->
      <div class="w-[65%] mx-auto border border-gray-500 rounded-2xl pt-2 pb-2 pl-10">

        <!-- ITEM -->
        <div class="flex items-center gap-5 border-b py-5">
          <img src="https://via.placeholder.com/100" class="rounded-xl">
          <div class="flex-1">
            <h3 class="font-bold">T-Shirt</h3>
            <p class="text-gray-500">Size: L | Color: Black</p>
            <p class="font-bold">$120</p>
          </div>
          <input type="number" value="1" class="w-16 border rounded p-1">
        </div>

        <!-- ITEM -->
        <div class="flex items-center gap-5 border-b py-5">
          <img src="https://via.placeholder.com/100" class="rounded-xl">
          <div class="flex-1">
            <h3 class="font-bold">Hoodie</h3>
            <p class="text-gray-500">Size: M | Color: Gray</p>
            <p class="font-bold">$200</p>
          </div>
          <input type="number" value="1" class="w-16 border rounded p-1">
        </div>

        <!-- ITEM -->
        <div class="flex items-center gap-5 py-5">
          <img src="https://via.placeholder.com/100" class="rounded-xl">
          <div class="flex-1">
            <h3 class="font-bold">Jeans</h3>
            <p class="text-gray-500">Size: XL | Color: Blue</p>
            <p class="font-bold">$150</p>
          </div>
          <input type="number" value="1" class="w-16 border rounded p-1">
        </div>

      </div>

      <!-- SUMMARY -->
      <div class="w-[35%] h-[440px] border border-gray-500 rounded-3xl p-5">
        <h2 class="font-bold text-2xl">Order Summary</h2>

        <div class="flex flex-col gap-7">
          <div class="border-b border-gray-500 flex flex-col gap-5 mt-5 pb-5">
            
            <div class="flex justify-between">
              <span class="text-gray-500">SubTotal</span>
              <p class="font-bold">$470</p>
            </div>

            <div class="flex justify-between">
              <span class="text-gray-500">Discount (-20%)</span>
              <p class="font-bold">$94</p>
            </div>

            <div class="flex justify-between">
              <span class="text-gray-500">Delivery Fee</span>
              <p class="font-bold">$10</p>
            </div>

          </div>

          <div class="flex justify-between">
            <span>Total</span>
            <p class="font-bold">$386</p>
          </div>
        </div>

        <div class="flex justify-between mt-7 mb-7">
          <input
            type="text"
            placeholder="Apply promo code"
            class="bg-gray-200 p-2 rounded-3xl placeholder:text-gray-500 w-[70%]"
          />
          <button class="bg-black text-white p-2 w-[25%] rounded-3xl">
            Apply
          </button>
        </div>

        <button class="w-full bg-black text-white p-4 rounded-3xl">
          Go to checkout <i class="fa-solid fa-arrow-right-long"></i>
        </button>
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
                        <img src="https://i.ibb.co/pvnBxVx4/t-i-xu-ng-1.png" alt="logo shop">
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