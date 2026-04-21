<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($product['product_name']) ?> | N2Sport</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <style>
    .size-active {
      background-color: black !important;
      color: white !important;
      border-color: black !important;
    }

    /* Style cho size hết hàng */
    .size-out-of-stock {
      background-color: #f3f4f6 !important;
      color: #d1d5db !important;
      border-color: #e5e7eb !important;
      cursor: not-allowed !important;
      position: relative;
      overflow: hidden;
    }

    .size-out-of-stock::after {
      content: "";
      position: absolute;
      top: 50%;
      left: 0;
      width: 100%;
      height: 1px;
      background: #d1d5db;
      transform: rotate(45deg);
    }
  </style>
</head>

<body class="bg-white">
  <header class="shadow-sm">
    <div class="max-w-7xl mx-auto flex justify-between items-center p-5">
      <div class="flex items-center gap-10">
        <div class="flex items-center flex-shrink-0 gap-2 group">
          <a href="index.php" class="flex items-baseline italic tracking-tighter transition-opacity duration-300 hover:opacity-80">
            <span class="text-3xl font-black text-slate-900">N2</span>
            <span class="ml-1 text-xl font-bold uppercase tracking-widest text-slate-500">Sport</span>
          </a>
        </div>
        <ul class="flex gap-6 font-bold text-sm uppercase">
          <li><a href="index.php?url=shop" class="hover:text-blue-500">Shop</a></li>
          <li><a href="index.php?url=giayCauLong" class="hover:text-blue-500">Giày cầu lông</a></li>
          <li><a href="index.php?url=giayBongDa" class="hover:text-blue-500">Giày bóng đá</a></li>
        </ul>
      </div>
      <div class="flex items-center gap-6">
        <div class="flex gap-4 text-xl">
          <a href="index.php?url=cart" class="relative">
            <i class="fa-solid fa-cart-shopping"></i>
          </a>
          <?php if (isset($_SESSION['user'])): ?>
            <span class="text-sm font-bold border-l pl-4"><?= $_SESSION['user']['name'] ?></span>
          <?php else: ?>
            <a href="index.php?url=login"><i class="fa-solid fa-user"></i></a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </header>

  <main class="lg:max-w-7xl mx-auto p-5">
    <?php if (!empty($product)): ?>
      <div class="text-gray-400 flex gap-2 text-[10px] font-bold uppercase tracking-widest pt-5">
        <a href="index.php">Home</a> <span class="text-slate-200">/</span> <a href="index.php?url=shop">Shop</a> <span class="text-slate-200">/</span> <span class="text-black"><?= $product['product_name'] ?></span>
      </div>

      <div class="lg:flex lg:mt-10 lg:gap-16">
        <div class="lg:w-3/5 flex gap-4">
          <div class="hidden lg:flex flex-col gap-4">
            <img src="uploads/<?= $product['image'] ?>" class="w-24 h-24 object-cover rounded-2xl border-2 border-blue-500 p-1">
          </div>
          <div class="relative w-full">
            <img src="uploads/<?= $product['image'] ?>" class="w-full rounded-[40px] shadow-2xl border border-slate-50">
          </div>
        </div>

        <div class="lg:w-2/5 mt-10 lg:mt-0">
          <p class="text-blue-600 font-black uppercase tracking-[4px] text-[10px] mb-2">N2SPORT Exclusive</p>
          <h1 class="font-black text-5xl italic uppercase tracking-tighter text-slate-900 mb-4 leading-none"><?= $product['product_name'] ?></h1>

          <div class="flex items-center gap-4 mb-6">
            <p class="font-black text-3xl text-rose-600 italic"><?= number_format($product['base_price']) ?> ₫</p>
            <span class="px-3 py-1 bg-emerald-100 text-emerald-600 rounded-full text-[10px] font-black uppercase tracking-widest">Đang kinh doanh</span>
          </div>

          <div class="prose prose-slate mb-8">
            <p class="text-slate-500 font-medium leading-relaxed italic border-l-4 border-slate-100 pl-4"><?= $product['description'] ?? 'Mô tả đang cập nhật...' ?></p>
          </div>

          <form action="index.php?url=addToCart" method="POST" id="add-to-cart-form">
            <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
            <input type="hidden" name="name" value="<?= htmlspecialchars($product['product_name']) ?>">
            <input type="hidden" name="image" value="<?= $product['image'] ?>">
            <input type="hidden" name="price" value="<?= $product['base_price'] ?>">

            <input type="hidden" name="size_id" id="input-size-id" value="">
            <input type="hidden" name="size_name" id="input-size-name" value="">

            <div class="mb-10">
              <div class="flex justify-between items-end mb-4">
                <h3 class="font-black uppercase text-[10px] tracking-[3px] text-slate-400">Chọn kích cỡ:</h3>
                <a href="#" class="text-[9px] font-black uppercase text-blue-600 underline tracking-widest italic">Bảng size</a>
              </div>

              <div class="flex flex-wrap gap-3">
                <?php
                // $productVariants chứa thông tin biến thể từ database (size_value, quantity)
                foreach ($productVariants as $v):
                  $isOutOfStock = ($v['quantity'] <= 0);
                ?>
                  <button type="button"
                    class="size-btn px-6 py-3 border-2 rounded-2xl font-black italic transition-all active:scale-95 
                                           <?= $isOutOfStock ? 'size-out-of-stock' : 'border-slate-100 text-slate-800 hover:border-black' ?>"
                    data-id="<?= $v['size_id'] ?>"
                    data-name="<?= $v['size_value'] ?>"
                    data-stock="<?= $v['quantity'] ?>"
                    <?= $isOutOfStock ? 'disabled' : '' ?>>
                    <?= $v['size_value'] ?>
                  </button>
                <?php endforeach; ?>
              </div>
              <p id="stock-warning" class="mt-4 text-[10px] font-bold uppercase italic text-emerald-500 hidden tracking-widest"></p>
            </div>

            <div class="flex items-center gap-6 pt-6 border-t border-slate-50">
              <div class="bg-slate-100 rounded-2xl flex items-center p-1 border border-slate-200 shadow-inner">
                <button type="button" id="decrease" class="w-12 h-12 flex items-center justify-center font-black text-xl hover:bg-white rounded-xl transition">-</button>
                <input name="quantity" id="quantity-input" type="number" value="1" min="1" class="w-12 text-center bg-transparent outline-none font-black text-slate-900" readonly />
                <button type="button" id="increase" class="w-12 h-12 flex items-center justify-center font-black text-xl hover:bg-white rounded-xl transition">+</button>
              </div>

              <button type="submit" class="flex-1 bg-slate-900 text-white h-14 rounded-2xl font-black uppercase tracking-[3px] hover:bg-blue-600 transition-all shadow-2xl shadow-blue-200/20 active:scale-[0.98] flex items-center justify-center gap-3 italic">
                Mua ngay <i class="fa-solid fa-arrow-right-long"></i>
              </button>
            </div>
          </form>
        </div>
      </div>
    <?php else: ?>
      <div class="py-40 text-center">
        <i class="fa-solid fa-ghost text-7xl text-slate-100 mb-6"></i>
        <p class="text-slate-400 font-black uppercase italic tracking-widest">Sản phẩm này đã "bay màu" khỏi kho.</p>
      </div>
    <?php endif; ?>
  </main>

  <script>
    const quantityDisplay = document.getElementById('quantity-input');
    const sizeBtns = document.querySelectorAll('.size-btn:not(.size-out-of-stock)');
    const inputSizeId = document.getElementById('input-size-id');
    const inputSizeName = document.getElementById('input-size-name');
    const stockWarning = document.getElementById('stock-warning');
    const form = document.getElementById('add-to-cart-form');

    let maxStock = 99; // Mặc định

    // 1. Xử lý tăng giảm số lượng
    document.getElementById('increase').onclick = () => {
      if (parseInt(quantityDisplay.value) < maxStock) {
        quantityDisplay.value = parseInt(quantityDisplay.value) + 1;
      } else {
        alert('⚠️ N2SPORT: Số lượng đã đạt giới hạn tồn kho!');
      }
    };

    document.getElementById('decrease').onclick = () => {
      if (parseInt(quantityDisplay.value) > 1) {
        quantityDisplay.value = parseInt(quantityDisplay.value) - 1;
      }
    };

    // 2. Xử lý chọn Size
    sizeBtns.forEach(btn => {
      btn.onclick = function() {
        sizeBtns.forEach(b => b.classList.remove('size-active'));
        this.classList.add('size-active');

        inputSizeId.value = this.getAttribute('data-id');
        inputSizeName.value = this.getAttribute('data-name');

        // Cập nhật giới hạn tồn kho cho sản phẩm này
        maxStock = parseInt(this.getAttribute('data-stock'));
        quantityDisplay.value = 1; // Reset số lượng về 1 khi đổi size

        stockWarning.innerText = `CÒN LẠI ${maxStock} ĐÔI TRONG KHO`;
        stockWarning.classList.remove('hidden');
      };
    });

    form.onsubmit = (e) => {
      if (!inputSizeId.value) {
        e.preventDefault();
        alert('chọn Size giày đã nhé!');
      }
    };
  </script>
</body>

</html>