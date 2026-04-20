<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cửa hàng - N2 Sport</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <style>
        /* Hiệu ứng nảy trang khi mới load */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-item { animation: fadeInUp 0.5s ease-out forwards; }
        
        /* Tạo độ trễ để sản phẩm hiện lần lượt */
        <?php for($i = 1; $i <= 12; $i++): ?>
        .delay-<?= $i ?> { animation-delay: <?= $i * 0.08 ?>s; opacity: 0; }
        <?php endfor; ?>
        
        .scrollbar-hide::-webkit-scrollbar { display: none; }

        /* Custom style cho Modal */
        .modal-active { display: flex !important; animation: fadeIn 0.3s ease-out; }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
    </style>
</head>

<body class="bg-white">

<header class="shadow-sm sticky top-0 bg-white z-50">
    <div class="max-w-7xl mx-auto flex justify-between items-center p-5">
        <div class="flex items-center gap-10">
            <div class="flex items-center flex-shrink-0 gap-2 group">
                <a href="index.php" class="flex items-baseline italic tracking-tighter transition-opacity duration-300 hover:opacity-80">
                    <span class="text-3xl font-black text-slate-900">N<span class="text-black">2</span></span>
                    <span class="ml-1 text-xl font-bold uppercase tracking-widest text-slate-500">Sport</span>
                </a>
            </div>
            <ul class="flex gap-6 flex-nowrap overflow-x-auto scrollbar-hide whitespace-nowrap">
                <li><a href="index.php?url=shop" class="block px-3 py-2 rounded-md hover:bg-gray-100 transition">Shop</a></li>
                <?php if (!empty($listCate)): ?>
                    <?php foreach(array_slice($listCate, 0, 5) as $cate): ?>
                        <li><a href="index.php?url=shop&category_id=<?= $cate['category_id'] ?>" class="block px-3 py-2 rounded-md hover:bg-gray-100 transition"><?= htmlspecialchars($cate['category_name']) ?></a></li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>
        <div class="flex items-center gap-6">
            <form class="relative">
                <input type="text" placeholder="Tìm kiếm sản phẩm..." class="w-48 md:w-64 lg:w-72 p-2.5 pl-10 rounded-full bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400 transition-all duration-200" />
                <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-500"></i>
            </form>
            <div class="flex gap-4 text-xl items-center">
                <a href="index.php?url=cart" class="hover:text-blue-500 transition"><i class="fa-solid fa-cart-shopping cursor-pointer"></i></a>
                <?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
                <?php if (isset($_SESSION['user'])): ?>
                    <div class="flex items-center gap-3 border-l pl-4">
                        <div class="flex flex-col text-right">
                            <span class="text-xs text-gray-400">Chào,</span>
                            <span class="font-bold text-sm text-gray-800"><?= htmlspecialchars($_SESSION['user']['name'] ?? 'User') ?></span>
                        </div>
                        <a href="index.php?url=logout" class="text-red-500 hover:text-red-700 transition"><i class="fa-solid fa-right-from-bracket text-lg"></i></a>
                    </div>
                <?php else: ?>
                    <a href="index.php?url=login" class="hover:text-blue-500 transition"><i class="fa-solid fa-user cursor-pointer"></i></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>

<main class="max-w-7xl mx-auto py-16 px-5 min-h-screen">
    <div class="mb-12 border-b pb-8 flex justify-between items-end animate-item">
        <div>
            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 italic">Home / Shop</p>
            <h1 class="text-5xl font-black uppercase italic tracking-tighter">SẢN PHẨM <span class="text-blue-600">N2 SPORT</span></h1>
        </div>
        <p class="text-gray-400 italic font-medium text-sm">Hiển thị <?= count($listProduct ?? []) ?> sản phẩm</p>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        <?php if (!empty($listProduct)): ?>
            <?php foreach($listProduct as $index => $item): ?>
                <div class="flex flex-col bg-white p-4 rounded-[2.5rem] border hover:shadow-2xl hover:-translate-y-3 transition-all duration-500 relative group animate-item delay-<?= ($index % 12) + 1 ?>">
                    <span class="absolute top-6 left-6 bg-blue-600 text-white text-[10px] font-black px-3 py-1 rounded-full z-10 shadow-sm uppercase italic">Available</span>
                    <div class="overflow-hidden rounded-[2rem] bg-gray-50 mb-4 aspect-square relative">
                        <img src="uploads/<?= htmlspecialchars($item['image']) ?>" class="w-full h-full object-cover transition duration-700 group-hover:scale-110 group-hover:rotate-2">
                        <div class="absolute inset-0 bg-black/10 opacity-0 group-hover:opacity-100 transition-all duration-500 flex items-end justify-center p-4">
                             <a href="?url=productDetail&id=<?= $item['product_id'] ?>" class="w-full bg-white text-black text-[10px] font-black py-3 rounded-2xl text-center hover:bg-black hover:text-white transition-all transform translate-y-10 group-hover:translate-y-0 duration-500 uppercase tracking-widest">Xem chi tiết</a>
                        </div>
                    </div>
                    <p class="font-bold text-gray-800 text-center line-clamp-1 mb-1 px-2 uppercase tracking-tight transition-colors group-hover:text-blue-600"><?= htmlspecialchars($item['product_name']) ?></p>
                    <p class="text-blue-600 font-black text-center mb-4 text-xl italic tracking-tighter"><?= number_format($item['base_price']) ?> <span class="text-sm font-medium italic">đ</span></p>
                    
                    <div class="px-2 mt-auto">
                        <button type="button" 
                                onclick="openQuickSelect('<?= $item['product_id'] ?>', '<?= htmlspecialchars($item['product_name']) ?>', '<?= $item['base_price'] ?>', '<?= $item['image'] ?>')"
                                class="w-full border-2 border-black text-black text-[10px] font-black py-3 rounded-2xl hover:bg-black hover:text-white transition-all duration-300 uppercase tracking-widest active:scale-95 shadow-md">
                            <i class="fa-solid fa-cart-plus mr-2"></i> Mua ngay
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-span-full py-40 text-center bg-gray-50 rounded-[50px] border-4 border-dashed border-gray-100 animate-item">
                <h2 class="text-3xl font-black text-gray-300 uppercase italic">Hết giày rồi b ơi!</h2>
                <a href="index.php?url=shop" class="text-blue-600 font-bold underline mt-4 inline-block">Quay lại cửa hàng</a>
            </div>
        <?php endif; ?>
    </div>
</main>

<div id="size-modal" class="fixed inset-0 z-[100] hidden items-center justify-center p-4 bg-black/60 backdrop-blur-sm">
    <div class="bg-white rounded-[2.5rem] w-full max-w-sm p-8 shadow-2xl scale-95 transition-transform duration-300" id="modal-content">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-black uppercase italic tracking-tighter">Chọn Size Giày</h3>
            <button onclick="closeQuickSelect()" class="text-gray-400 hover:text-black transition-colors"><i class="fa-solid fa-xmark text-2xl"></i></button>
        </div>

        <div class="flex gap-4 mb-8 items-center bg-gray-50 p-4 rounded-3xl">
            <img id="modal-img" src="" class="w-16 h-16 object-cover rounded-xl shadow-sm">
            <div>
                <p id="modal-name" class="font-bold text-xs line-clamp-1 uppercase text-gray-500"></p>
                <p id="modal-price" class="text-blue-600 font-black italic"></p>
            </div>
        </div>

<form action="index.php?url=addToCart" method="POST">
    <input type="hidden" name="product_id" id="modal-id">
    <input type="hidden" name="quantity" value="1">
    
    <div class="mb-8 text-center">
        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-4 italic">Chọn kích cỡ:</p>
        <div class="flex flex-wrap justify-center gap-2">
            <?php 
            $sizes = ['38', '39', '40', '41', '42', '43']; 
            foreach($sizes as $s): 
            ?>
                <label class="cursor-pointer group">
                    <input type="radio" name="size_name" value="<?= $s ?>" class="hidden peer" required>
                    <span class="inline-block w-12 py-2 border-2 border-gray-100 rounded-xl font-bold text-sm peer-checked:border-black peer-checked:bg-black peer-checked:text-white transition-all group-hover:border-gray-300">
                        <?= $s ?>
                    </span>
                </label>
            <?php endforeach; ?>
        </div>
    </div>

    <button type="submit" class="w-full bg-blue-600 text-white font-black py-4 rounded-2xl hover:bg-blue-700 transition-all shadow-lg uppercase tracking-widest active:scale-95">
        Xác nhận mua ngay
    </button>
</form>
    </div>
</div>

<footer class="bg-gray-100 pt-24 pb-12 border-t mt-20">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-12 pb-16">
            <div class="md:col-span-2">
                <a href="index.php" class="flex items-baseline italic tracking-tighter">
                    <span class="text-4xl font-black text-slate-900">N2</span>
                    <span class="ml-1 text-2xl font-bold uppercase tracking-widest text-slate-500">Sport</span>
                </a>
                <p class="text-gray-500 mt-6 leading-relaxed max-w-sm italic">Dẫn đầu phong cách thể thao với những mẫu giày hot nhất thị trường.</p>
                <div class="flex gap-4 mt-8">
                    <a href="#" class="w-12 h-12 flex items-center justify-center rounded-full bg-white border hover:bg-black hover:text-white transition shadow-sm text-xl"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="w-12 h-12 flex items-center justify-center rounded-full bg-white border hover:bg-black hover:text-white transition shadow-sm text-xl"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="w-12 h-12 flex items-center justify-center rounded-full bg-white border hover:bg-black hover:text-white transition shadow-sm text-xl"><i class="fa-brands fa-tiktok"></i></a>
                </div>
            </div>
            <div><h3 class="font-black uppercase text-xs tracking-[3px] mb-8 text-slate-900">Khám phá</h3><ul class="space-y-4 text-sm text-gray-500 font-bold uppercase tracking-wider"><li><a href="index.php?url=shop" class="hover:text-black transition">Tất cả giày</a></li></ul></div>
            <div><h3 class="font-black uppercase text-xs tracking-[3px] mb-8 text-slate-900">Hỗ trợ</h3><ul class="space-y-4 text-sm text-gray-500 font-bold uppercase tracking-wider"><li><a href="#" class="hover:text-black transition">Giao hàng</a></li></ul></div>
            <div><h3 class="font-black uppercase text-xs tracking-[3px] mb-8 text-slate-900">FAQ</h3><ul class="space-y-4 text-sm text-gray-500 font-bold uppercase tracking-wider"><li><a href="#" class="hover:text-black transition">Bảo mật</a></li></ul></div>
        </div>
        <div class="pt-10 border-t flex flex-col md:flex-row items-center justify-between gap-6">
            <p class="text-xs text-gray-400 font-black uppercase tracking-widest italic">N2 Sport &copy; 2026. Made by hải with ❤️</p>
            <div class="flex items-center gap-6 text-4xl text-gray-300"><i class="fa-brands fa-cc-visa"></i><i class="fa-brands fa-cc-apple-pay"></i></div>
        </div>
    </div>
</footer>

<script>
    function openQuickSelect(id, name, price, img) {
        const modal = document.getElementById('size-modal');
        const content = document.getElementById('modal-content');
        
        // Gán dữ liệu vào Modal
        document.getElementById('modal-id').value = id;
        document.getElementById('modal-name').innerText = name;
        document.getElementById('modal-price').innerText = new Intl.NumberFormat('vi-VN').format(price) + ' đ';
        document.getElementById('modal-img').src = 'uploads/' + img;

        // Hiện Modal
        modal.classList.remove('hidden');
        modal.classList.add('modal-active');
        setTimeout(() => content.classList.replace('scale-95', 'scale-100'), 10);
    }

    function closeQuickSelect() {
        const modal = document.getElementById('size-modal');
        const content = document.getElementById('modal-content');
        content.classList.replace('scale-100', 'scale-95');
        setTimeout(() => {
            modal.classList.add('hidden');
            modal.classList.remove('modal-active');
        }, 200);
    }

    // Đóng khi click ngoài vùng modal
    window.onclick = function(e) {
        const modal = document.getElementById('size-modal');
        if (e.target == modal) closeQuickSelect();
    }
</script>

</body>
</html>