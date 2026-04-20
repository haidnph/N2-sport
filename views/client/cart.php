<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
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
            class="w-48 md:w-64 lg:w-72 p-2.5 pl-10 rounded-full bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400 transition-all duration-200" />
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
  <?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  $cart = $_SESSION['cart'] ?? [];

  $subtotal = 0;
  $totalQuantity = 0;
  ?>

  <main class="max-w-7xl mx-auto">
    <div class="lg:text-[15px] text-gray-500 lg:mt-5">
      Home > <span class="lg:text-black">Cart</span>
    </div>
    <section>
      <h2 class="Integral font-extrabold text-3xl p-5">
        YOUR CART (<?= $totalQuantity ?> items)
      </h2>

      <div class="flex justify-between gap-5">

        <!-- CART LIST -->
        <div class="w-[65%] mx-auto border border-gray-500 rounded-2xl pt-2 pb-2 pl-10">

          <?php if (!empty($cart)): ?>
            <?php foreach ($cart as $id => $item): ?>

              <?php if (!is_array($item)) continue; ?>

              <?php
              $price = $item['price'] ?? 0;
              $quantity = $item['quantity'] ?? 0;

              $subtotal += $price * $quantity;
              $totalQuantity += $quantity;
              ?>
              

              <div class="flex items-center gap-5 border-b py-5">

                <img src="/baseDA1/uploads/<?= $item['image'] ?? 'default.jpg' ?>" 
     onerror="this.src='/baseDA1/uploads/default.jpg'"
     class="rounded-xl w-[100px] h-[100px] object-cover">

                <div class="flex-1">
                  <h3 class="font-bold"><?= $item['name'] ?></h3>
                  <p class="font-bold"><?= number_format($item['price']) ?>đ</p>
                </div>
                

                <input type="number"
                  value="<?= $item['quantity'] ?>"
                  min="1"
                  max="10"
                  class="w-16 border rounded p-1">

                <!-- NÚT XÓA -->
                <a href="index.php?url=remove-from-cart&id=<?= $id ?>"
                  class="text-red-500 text-lg ml-3 hover:scale-110 transition">
                  <i class="fa-solid fa-trash"></i>
                </a>

              </div>


            <?php endforeach; ?>
          <?php else: ?>
            <p class="p-5">Giỏ hàng trống</p>
          <?php endif; ?>

        </div>

        <!-- SUMMARY -->
        <div class="w-[35%] h-[440px] border border-gray-500 rounded-3xl p-5">

          <h2 class="font-bold text-2xl">Order Summary</h2>

          <?php
          $discount = $subtotal * 0.2;
          $shipping = 10000;
          $total = $subtotal - $discount + $shipping;
          ?>

          <div class="flex flex-col gap-7">
            <div class="border-b border-gray-500 flex flex-col gap-5 mt-5 pb-5">

              <div class="flex justify-between">
                <span class="text-gray-500">SubTotal</span>
                <p class="font-bold"><?= number_format($subtotal) ?>đ</p>
              </div>

              <div class="flex justify-between">
                <span class="text-gray-500">Discount (-20%)</span>
                <p class="font-bold"><?= number_format($discount) ?>đ</p>
              </div>

              <div class="flex justify-between">
                <span class="text-gray-500">Delivery Fee</span>
                <p class="font-bold"><?= number_format($shipping) ?>đ</p>
              </div>

            </div>

            <div class="flex justify-between">
              <span>Total</span>
              <p class="font-bold"><?= number_format($total) ?>đ</p>
            </div>
          </div>

          <div class="flex justify-between mt-7 mb-7">
            <input
              type="text"
              placeholder="Apply promo code"
              class="bg-gray-200 p-2 rounded-3xl w-[70%]" />
            <button class="bg-black text-white p-2 w-[25%] rounded-3xl">
              Apply
            </button>
          </div>

          <button class="w-full bg-black text-white p-4 rounded-3xl">
            Go to checkout
          </button>

        </div>

      </div>
    </section>
  </main>
  <footer class="relative mt-20">
    <div class="bg-gray-100 py-12">
      <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-8 pb-10">
          <div class="md:col-span-1">
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