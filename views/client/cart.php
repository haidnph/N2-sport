<?php
if (session_status() === PHP_SESSION_NONE) session_start();
// Quan trọng: Phải lấy từ $_SESSION['cart'] để đảm bảo dữ liệu mới nhất
$cart = $_SESSION['cart'] ?? [];
$total = 0;
?>

<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Giỏ hàng N2SPORT — Sải bước tự tin</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap');

    body {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>

<body class="bg-slate-50 min-h-screen">

  <nav class="bg-white border-b border-slate-100 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto flex justify-between items-center p-6">
      <a href="index.php" class="flex items-baseline italic tracking-tighter">
        <span class="text-3xl font-black text-slate-900">N2</span>
        <span class="ml-1 text-xl font-bold uppercase tracking-widest text-slate-400">Sport</span>
      </a>
      <a href="index.php?url=shop" class="text-[10px] font-black uppercase tracking-[2px] text-slate-400 hover:text-black transition-all flex items-center gap-2 italic">
        <i class="fa-solid fa-arrow-left-long"></i> Tiếp tục mua sắm
      </a>
    </div>
  </nav>

  <main class="max-w-7xl mx-auto py-12 px-6">
    <div class="mb-12">
      <h2 class="font-black text-5xl text-slate-900 uppercase italic tracking-tighter leading-none">
        Giỏ hàng <span class="text-blue-600">của bạn</span>
      </h2>
      <p class="text-slate-400 font-bold uppercase text-[10px] tracking-[3px] mt-2 italic">
        Bạn đang có <?= count($cart) ?> siêu phẩm trong danh sách
      </p>
    </div>

    <div class="flex flex-col lg:flex-row gap-10">
      <div class="w-full lg:w-[65%] space-y-6">
        <?php if (empty($cart)): ?>
          <div class="bg-white rounded-[40px] p-20 text-center border border-slate-100 shadow-sm">
            <div class="w-24 h-24 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6">
              <i class="fa-solid fa-cart-shopping text-slate-200 text-4xl"></i>
            </div>
            <p class="text-slate-400 font-bold italic uppercase tracking-widest text-sm">Giỏ hàng đang trống trơn</p>
            <a href="index.php?url=shop" class="inline-block mt-8 bg-black text-white px-10 py-4 rounded-full font-black uppercase italic tracking-widest hover:bg-blue-600 transition-all shadow-xl shadow-blue-200/50">Mua sắm ngay</a>
          </div>
        <?php else: ?>
          <?php foreach ($cart as $cartKey => $item):
            $price = (float)($item['price'] ?? 0);
            $qty = (int)($item['quantity'] ?? 0);
            $subtotal = $price * $qty;
            $total += $subtotal;
          ?>
            <div class="bg-white rounded-[32px] p-6 border border-slate-100 shadow-sm flex flex-col sm:flex-row items-center gap-8 relative group hover:shadow-xl transition-all">

              <div class="w-32 h-32 flex-shrink-0 relative">
                <img src="uploads/<?= htmlspecialchars((string)($item['image'] ?? '')) ?>"
                  class="rounded-2xl w-full h-full object-cover shadow-inner bg-slate-50 border border-slate-50"
                  onerror="this.src='https://placehold.co/400x400?text=No+Image'">
              </div>

              <div class="flex-1 text-center sm:text-left">
                <span class="text-[8px] font-black text-blue-600 uppercase tracking-widest italic px-2 py-1 bg-blue-50 rounded-md">Original Gear</span>
                <h3 class="font-black text-xl text-slate-900 uppercase italic tracking-tight mt-2 leading-none">
                  <?= htmlspecialchars((string)($item['name'] ?? 'Sản phẩm')) ?>
                </h3>
                <p class="text-slate-400 text-[10px] font-bold uppercase tracking-widest mt-2 italic">
                  Size: <span class="text-slate-900"><?= htmlspecialchars((string)($item['size'] ?? $item['size_name'] ?? 'N/A')) ?></span>
                </p>
                <p class="font-black text-blue-600 text-lg mt-3 italic">
                  <?= number_format($price) ?> <span class="text-xs">₫</span>
                </p>
              </div>

              <div class="flex items-center bg-slate-100 rounded-2xl p-1 border border-slate-200 shadow-inner">
                <a href="index.php?url=decrease&id=<?= urlencode($cartKey) ?>"
                  class="w-10 h-10 flex items-center justify-center font-black text-lg hover:bg-white rounded-xl transition-all">-</a>

                <span class="px-6 font-black text-slate-900 italic"><?= $qty ?></span>

                <a href="index.php?url=increase&id=<?= urlencode($cartKey) ?>"
                  class="w-10 h-10 flex items-center justify-center font-black text-lg hover:bg-white rounded-xl transition-all">+</a>
              </div>

              <div class="sm:border-l border-slate-100 sm:pl-8 flex flex-col items-center">
                <p class="hidden sm:block text-[9px] font-black text-slate-300 uppercase italic mb-2 tracking-widest">Xóa ngay</p>
                <a href="index.php?url=remove&id=<?= urlencode($cartKey) ?>"
                  onclick="return confirm('Xóa siêu phẩm này khỏi giỏ hàng?')"
                  class="w-12 h-12 flex items-center justify-center text-rose-400 hover:text-white hover:bg-rose-500 rounded-2xl transition-all">
                  <i class="fa-solid fa-trash-can"></i>
                </a>
              </div>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>

      <?php
      $discountRate = 0.2;
      $discount = $total * $discountRate;
      $delivery = ($total > 0) ? 10000 : 0;
      $final = $total - $discount + $delivery;
      ?>

      <div class="w-full lg:w-[35%]">
        <div class="bg-slate-900 rounded-[40px] p-10 text-white shadow-2xl relative overflow-hidden group">
          <div class="absolute -top-10 -right-10 w-40 h-40 bg-blue-600 rounded-full blur-3xl opacity-20 group-hover:opacity-40 transition-opacity"></div>

          <h2 class="font-black text-2xl uppercase italic tracking-tighter mb-10 border-b border-white/10 pb-6">Thanh toán</h2>

          <div class="space-y-6 relative z-10">
            <div class="flex justify-between items-center">
              <span class="text-[10px] font-bold text-slate-400 uppercase tracking-[2px] italic">Tạm tính</span>
              <p class="font-black italic text-lg"><?= number_format($total) ?> ₫</p>
            </div>

            <div class="flex justify-between items-center">
              <span class="text-[10px] font-bold text-slate-400 uppercase tracking-[2px] italic">Ưu đãi Member (20%)</span>
              <p class="font-black italic text-lg text-blue-400">-<?= number_format($discount) ?> ₫</p>
            </div>

            <div class="flex justify-between items-center">
              <span class="text-[10px] font-bold text-slate-400 uppercase tracking-[2px] italic">Phí vận chuyển</span>
              <p class="font-black italic text-lg"><?= number_format($delivery) ?> ₫</p>
            </div>

            <div class="pt-8 border-t border-white/10 flex justify-between items-end">
              <span class="text-[10px] font-black uppercase tracking-[3px] text-blue-400 italic">Tổng cộng</span>
              <p class="font-black text-4xl italic leading-none tracking-tighter">
                <?= number_format($final) ?> <span class="text-xs">₫</span>
              </p>
            </div>
          </div>

          <?php if (!empty($cart)): ?>
            <a href="index.php?url=checkout"
              class="block text-center w-full mt-12 bg-blue-600 hover:bg-white hover:text-black text-white font-black py-6 rounded-[24px] transition-all shadow-xl active:scale-[0.98] text-sm uppercase tracking-[3px] italic">
              Tiến hành đặt hàng <i class="fa-solid fa-arrow-right-long ml-2"></i>
            </a>
          <?php else: ?>
            <button disabled class="block w-full mt-12 bg-white/5 text-white/20 font-black py-6 rounded-[24px] text-sm uppercase tracking-[3px] italic cursor-not-allowed border border-white/5">
              Giỏ hàng trống
            </button>
          <?php endif; ?>
        </div>
        <p class="text-center mt-6 text-[9px] font-bold text-slate-400 uppercase tracking-widest italic">N2SPORT Security Payment System</p>
      </div>
    </div>
  </main>

</body>

</html>