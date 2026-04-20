<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop.ok - N2 Sport</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <style>
        /* Hiệu ứng nảy trang khi load */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-section {
            animation: fadeInUp 0.8s ease-out forwards;
        }
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        
        /* Hiệu ứng mượt cho các thẻ */
        .card-transition { transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); }
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
                <li><a href="index.php?url=shop" class="block px-3 py-2 rounded-md hover:bg-gray-100 transition-all hover:-translate-y-1">Shop</a></li>
                <?php if (!empty($listCategories)): ?>
                    <?php foreach(array_slice($listCategories, 0, 5) as $cate): ?>
                        <li>
                            <a href="index.php?url=shop&category_id=<?= $cate['category_id'] ?>" 
                               class="block px-3 py-2 rounded-md hover:bg-gray-100 transition-all hover:-translate-y-1">
                               <?= htmlspecialchars($cate['category_name']) ?>
                            </a>
                        </li>
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
                <a href="index.php?url=cart" class="hover:text-blue-500 transition-transform hover:scale-110"><i class="fa-solid fa-cart-shopping"></i></a>
                <?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
                <?php if (isset($_SESSION['user'])): ?>
                    <div class="flex items-center gap-3 border-l pl-4">
                        <div class="flex flex-col text-right">
                            <span class="text-xs text-gray-400">Chào,</span>
                            <span class="font-bold text-sm text-gray-800"><?= htmlspecialchars($_SESSION['user']['name'] ?? 'User') ?></span>
                        </div>
                        <a href="index.php?url=logout" class="text-red-500 hover:rotate-12 transition-transform"><i class="fa-solid fa-right-from-bracket"></i></a>
                    </div>
                <?php else: ?>
                    <a href="index.php?url=login" class="hover:text-blue-500 transition-transform hover:scale-110"><i class="fa-solid fa-user"></i></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>

<main>
    <section class="bg-gray-100 animate-section">
        <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-10 items-center">
            <div class="p-6 flex flex-col gap-6">
                <h1 class="text-4xl font-extrabold uppercase leading-tight tracking-tighter">Sải bước tự tin với đôi giày đúng gu</h1>
                <p class="text-gray-500 text-lg italic">Khám phá bộ sưu tập giày thể thao đa dạng, giúp bạn thể hiện cá tính riêng.</p>
                <a href="index.php?url=shop" class="bg-black text-white px-10 py-3 rounded-full w-fit font-bold hover:bg-blue-600 hover:scale-105 transition-all shadow-lg">Mua ngay</a>
                <div class="flex gap-10 pt-5">
                    <div class="border-r border-gray-300 pr-6">
                        <p class="text-3xl font-bold">200+</p>
                        <p class="text-gray-500 text-sm font-medium">Thương hiệu</p>
                    </div>
                    <div class="border-r border-gray-300 pr-6">
                        <p class="text-3xl font-bold">2,000+</p>
                        <p class="text-gray-500 text-sm font-medium">Sản phẩm</p>
                    </div>
                    <div>
                        <p class="text-3xl font-bold">30,000+</p>
                        <p class="text-gray-500 text-sm font-medium">Khách hàng</p>
                    </div>
                </div>
            </div>
            <div class="flex justify-center items-center p-10 hover:rotate-2 transition-transform duration-700">
                <img src="https://i.ibb.co/4wDz1XZc/5sku86ka.png" class="w-full max-h-[500px] object-contain drop-shadow-2xl">
            </div>
        </div>
    </section>

    <section class="bg-black py-8">
        <div class="max-w-7xl mx-auto flex flex-wrap items-center justify-between px-6 gap-8 grayscale hover:grayscale-0 transition-all duration-1000">
            <img src="https://i.ibb.co/qYKbZqXV/images-1-removebg-preview.png" class="h-10 opacity-70 hover:opacity-100 transition" />
            <img src="https://companieslogo.com/img/orig/2331.HK.D-a5d3f477.png?t=1720244490" class="h-8 opacity-70 hover:opacity-100 transition" />
            <img src="https://i.ibb.co/YFFXLvpx/puma-logo-white-symbol-clothes-design-icon-abstract-football-illustration-with-black-background-free.png" class="h-10 opacity-70 hover:opacity-100 transition" />
            <img src="https://i.ibb.co/FqgLTzDj/5362a828-0f5b-4d17-a6c5-d0677dc89baa-1000x1000-removebg-preview.png" class="h-10 opacity-70 hover:opacity-100 transition" />
            <img src="https://i.ibb.co/HpBHDrwV/adidas-logo-removebg-preview.png" class="h-10 opacity-70 hover:opacity-100 transition" />
        </div>
    </section>

    <section class="max-w-7xl mx-auto py-20 border-b animate-section">
        <h2 class="text-4xl font-black text-center mb-12 uppercase italic tracking-tighter">New Arrivals</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 px-5">
            <?php if (!empty($listProduct)): ?>
                <?php foreach(array_slice($listProduct, 0, 4) as $item): ?>
                    <div class="flex flex-col bg-white p-4 rounded-3xl border hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 relative group">
                        <span class="absolute top-4 left-4 bg-blue-600 text-white text-[10px] font-black px-3 py-1 rounded-full z-10 shadow-sm uppercase">NEW</span>
                        <div class="overflow-hidden rounded-2xl bg-gray-50 mb-4 aspect-square">
                            <img src="uploads/<?= htmlspecialchars($item['image']) ?>" class="w-full h-full object-cover transition duration-700 group-hover:scale-110 group-hover:rotate-2">
                        </div>
                        <p class="font-bold text-gray-800 text-center line-clamp-1 mb-1 px-2 uppercase group-hover:text-blue-600 transition-colors"><?= htmlspecialchars($item['product_name']) ?></p>
                        <p class="text-blue-600 font-black text-center mb-4 text-lg italic"><?= number_format($item['base_price']) ?> đ</p>
                        <a href="?url=productDetail&id=<?= $item['product_id'] ?>" class="bg-black text-white text-xs font-bold py-3 rounded-2xl text-center hover:bg-blue-600 transition mx-2 mb-2 uppercase tracking-widest shadow-md">Xem chi tiết</a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>

    <section class="max-w-7xl mx-auto bg-gray-100 my-20 rounded-[50px] p-10 md:p-20 animate-section">
        <h2 class="font-black text-center mb-16 text-4xl uppercase italic tracking-tighter">Khám phá giày theo danh mục</h2>
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
            <?php if (!empty($listCategories)): ?>
                <?php foreach (array_slice($listCategories, 0, 4) as $index => $cate): ?>
                    <?php $colSpan = ($index % 4 == 0 || $index % 4 == 3) ? 'md:col-span-5' : 'md:col-span-7'; ?>
                    <a href="index.php?url=shop&category_id=<?= $cate['category_id'] ?>" 
                       class="<?= $colSpan ?> relative h-[300px] overflow-hidden rounded-[30px] group shadow-sm bg-white">
                        <img src="<?= !empty($cate['image']) ? 'uploads/'.$cate['image'] : 'https://images.unsplash.com/photo-1542291026-7eec264c27ff' ?>"
                             class="w-full h-full object-cover transition duration-700 group-hover:scale-110 group-hover:rotate-1" />
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/60 group-hover:to-black/80 transition duration-500"></div>
                        <div class="absolute bottom-8 left-8">
                            <p class="text-white text-3xl font-black uppercase italic drop-shadow-lg mb-2"><?= htmlspecialchars($cate['category_name']) ?></p>
                            <span class="inline-block bg-white text-black text-[10px] font-bold px-4 py-2 rounded-full uppercase tracking-widest opacity-0 translate-y-4 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300">Khám phá ngay</span>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>

    <section class="max-w-7xl mx-auto py-20 animate-section">
        <h2 class="text-4xl font-black text-center mb-12 uppercase italic tracking-tighter text-blue-600">Hot Products 🔥</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 px-5">
            <?php if (!empty($hotProducts)): ?>
                <?php foreach(array_slice($hotProducts, 0, 4) as $item): ?>
                    <div class="flex flex-col bg-white p-4 rounded-3xl border hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 relative group">
                        <span class="absolute top-4 left-4 bg-red-600 text-white text-[10px] font-black px-3 py-1 rounded-full z-10 shadow-sm">HOT</span>
                        <div class="overflow-hidden rounded-2xl bg-gray-50 mb-4 aspect-square">
                            <img src="uploads/<?= htmlspecialchars($item['image']) ?>" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                        </div>
                        <p class="font-bold text-gray-800 text-center line-clamp-1 mb-1 px-2 uppercase group-hover:text-blue-600 transition-colors"><?= htmlspecialchars($item['product_name']) ?></p>
                        <p class="text-blue-600 font-black text-center mb-4 text-lg italic"><?= number_format($item['base_price']) ?> đ</p>
                        <a href="?url=productDetail&id=<?= $item['product_id'] ?>" class="bg-black text-white text-xs font-bold py-3 rounded-2xl text-center hover:bg-blue-600 transition mx-2 mb-2 uppercase tracking-widest shadow-md">Xem chi tiết</a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>
</main>

<footer class="bg-gray-100 pt-24 pb-12 border-t mt-20">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-12 pb-16">
            <div class="md:col-span-2">
                <a href="index.php" class="flex items-baseline italic tracking-tighter group">
                    <span class="text-4xl font-black text-slate-900 group-hover:text-blue-600 transition-colors">N2</span>
                    <span class="ml-1 text-2xl font-bold uppercase tracking-widest text-slate-500">Sport</span>
                </a>
                <p class="text-gray-500 mt-6 leading-relaxed max-w-sm italic">Dẫn đầu phong cách thể thao với những mẫu giày hot nhất thị trường.</p>
                <div class="flex gap-4 mt-8">
                    <a href="#" class="w-12 h-12 flex items-center justify-center rounded-full bg-white border hover:bg-black hover:text-white transition-all hover:-translate-y-2 shadow-sm text-xl"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="w-12 h-12 flex items-center justify-center rounded-full bg-white border hover:bg-black hover:text-white transition-all hover:-translate-y-2 shadow-sm text-xl"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="w-12 h-12 flex items-center justify-center rounded-full bg-white border hover:bg-black hover:text-white transition-all hover:-translate-y-2 shadow-sm text-xl"><i class="fa-brands fa-tiktok"></i></a>
                </div>
            </div>

            <div>
                <h3 class="font-black uppercase text-xs tracking-[3px] mb-8 text-slate-900">Khám phá</h3>
                <ul class="space-y-4 text-sm text-gray-500 font-bold uppercase tracking-wider">
                    <li><a href="index.php?url=shop" class="hover:text-black transition">Tất cả giày</a></li>
                    <li><a href="#" class="hover:text-black transition">Thương hiệu</a></li>
                    <li><a href="#" class="hover:text-black transition">Khuyến mãi</a></li>
                </ul>
            </div>
            <div>
                <h3 class="font-black uppercase text-xs tracking-[3px] mb-8 text-slate-900">Hỗ trợ</h3>
                <ul class="space-y-4 text-sm text-gray-500 font-bold uppercase tracking-wider">
                    <li><a href="#" class="hover:text-black transition">Giao hàng</a></li>
                    <li><a href="#" class="hover:text-black transition">Đổi trả</a></li>
                    <li><a href="#" class="hover:text-black transition">Liên hệ</a></li>
                </ul>
            </div>
            <div>
                <h3 class="font-black uppercase text-xs tracking-[3px] mb-8 text-slate-900">FAQ</h3>
                <ul class="space-y-4 text-sm text-gray-500 font-bold uppercase tracking-wider">
                    <li><a href="#" class="hover:text-black transition">Tài khoản</a></li>
                    <li><a href="#" class="hover:text-black transition">Mua hàng</a></li>
                    <li><a href="#" class="hover:text-black transition">Bảo mật</a></li>
                </ul>
            </div>
        </div>

        <div class="pt-10 border-t flex flex-col md:flex-row items-center justify-between gap-6 opacity-60">
            <p class="text-[10px] text-gray-400 font-black uppercase tracking-widest italic">N2 Sport &copy; 2026. Made by hải with ❤️</p>
            <div class="flex items-center gap-6 text-4xl text-gray-300">
                <i class="fa-brands fa-cc-visa"></i>
                <i class="fa-brands fa-cc-mastercard"></i>
                <i class="fa-brands fa-cc-apple-pay"></i>
            </div>
        </div>
    </div>
</footer>

</body>
</html>