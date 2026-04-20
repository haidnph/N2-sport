<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

<div class="p-8 bg-slate-50 min-h-screen">
    <div class="flex flex-col md:flex-row justify-between items-center mb-10 gap-4">
        <div>
            <h1 class="text-3xl font-black uppercase tracking-tighter text-slate-800 italic leading-none">
                Quản lý <span class="text-blue-600">Siêu phẩm</span>
            </h1>
            <p class="text-slate-500 text-[10px] mt-2 font-bold uppercase tracking-[3px] italic">
                N2SPORT Dashboard — <?= count($listProduct ?? []) ?> mặt hàng đang lên kệ
            </p>
        </div>
        
        <a href="?url=addProduct"
           class="bg-slate-900 text-white px-8 py-4 rounded-[20px] font-black hover:bg-blue-600 hover:scale-105 transition-all shadow-xl shadow-blue-200/20 flex items-center gap-3 uppercase text-xs tracking-widest">
            <i class="fa-solid fa-plus-circle text-lg"></i> Nhập hàng mới
        </a>
    </div>

    <div class="bg-white rounded-[40px] border border-slate-100 shadow-2xl shadow-slate-200/40 overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-900 text-white uppercase text-[9px] font-black tracking-[3px]">
                <tr>
                    <th class="px-8 py-7 text-center w-20">ID</th>
                    <th class="px-8 py-7">Hình ảnh</th>
                    <th class="px-8 py-7">Thông tin giày</th>
                    <th class="px-8 py-7">Biến thể & Tồn kho</th>
                    <th class="px-8 py-7">Giá bán</th>
                    <th class="px-8 py-7 text-center w-40">Thao tác</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                <?php foreach($listProduct as $item): ?>
                <?php 
                    // Lấy toàn bộ biến thể để tính toán hiển thị
                    $variants = $this->productModel->getVariantByProduct($item['product_id']);
                    $totalStock = 0;
                    $colors = [];
                    $sizes = [];
                    
                    foreach($variants as $v) {
                        $totalStock += $v['quantity']; // Tổng tồn từ nhiều size
                        $colors[$v['color_id']] = ['name' => $v['color_name'], 'code' => $v['color_code']];
                        $sizes[] = $v['size_value'];
                    }
                    $sizes = array_unique($sizes);
                    sort($sizes);
                ?>
                <tr class="hover:bg-blue-50/30 transition-all group">
                    <td class="px-8 py-6 text-center font-black text-slate-300 group-hover:text-blue-600 transition-colors italic">#<?= $item['product_id'] ?></td>

                    <td class="px-8 py-6">
                        <div class="relative w-24 h-24 bg-slate-50 rounded-[30px] overflow-hidden border-2 border-slate-100 group-hover:border-blue-400 transition-all shadow-sm">
                            <img src="uploads/<?= $item['image'] ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <?php if($totalStock <= 0): ?>
                                <div class="absolute inset-0 bg-black/60 flex items-center justify-center">
                                    <span class="text-[8px] font-black text-white uppercase tracking-widest -rotate-12 border border-white px-2 py-1">Hết hàng</span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </td>

                    <td class="px-8 py-6">
                        <p class="text-[10px] text-blue-600 font-black uppercase tracking-widest mb-1 italic"><?= $item['brand_name'] ?></p>
                        <p class="font-black text-slate-800 uppercase italic tracking-tighter text-lg leading-none group-hover:text-blue-900 transition-colors"><?= $item['product_name'] ?></p>
                        <div class="mt-3 flex items-center gap-2">
                            <span class="px-3 py-1 bg-slate-100 text-slate-500 rounded-lg text-[9px] font-black uppercase tracking-wider italic border border-slate-200">
                                <?= $item['category_name'] ?>
                            </span>
                        </div>
                    </td>

                    <td class="px-8 py-6">
                        <div class="space-y-4">
                            <div class="flex flex-wrap gap-2">
                                <?php foreach($colors as $c): ?>
                                <div class="flex items-center gap-1.5 bg-white border border-slate-200 pl-1 pr-2.5 py-1 rounded-full shadow-sm hover:border-blue-400 transition cursor-default">
                                    <div class="w-3.5 h-3.5 rounded-full border border-slate-100 shadow-inner" style="background:<?= $c['code'] ?>"></div>
                                    <span class="text-[9px] font-black text-slate-600 uppercase italic tracking-tighter"><?= $c['name'] ?></span>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            
                            <div class="flex flex-wrap items-center gap-1.5">
                                <?php foreach($sizes as $sz): ?>
                                    <span class="px-2 py-0.5 bg-slate-900 text-white rounded-md text-[9px] font-black italic shadow-sm group-hover:bg-blue-600 transition-colors">
                                        <?= $sz ?>
                                    </span>
                                <?php endforeach; ?>
                                <span class="mx-2 text-slate-200">|</span>
                                <span class="text-[10px] font-black uppercase italic <?= $totalStock < 10 ? 'text-rose-500 animate-pulse' : 'text-emerald-500' ?>">
                                    Kho: <?= number_format($totalStock) ?> đôi
                                </span>
                            </div>
                        </div>
                    </td>

                    <td class="px-8 py-6">
                        <div class="flex flex-col">
                            <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Giá niêm yết</span>
                            <p class="font-black text-slate-900 text-2xl italic tracking-tighter">
                                <?= number_format($item['base_price']) ?><span class="text-xs font-medium ml-1 tracking-normal italic text-slate-400">đ</span>
                            </p>
                        </div>
                    </td>

                    <td class="px-8 py-6">
                        <div class="flex justify-center gap-3">
                            <a href="?url=editProduct&id=<?= $item['product_id'] ?>" 
                               class="w-11 h-11 bg-slate-50 text-slate-400 rounded-2xl flex items-center justify-center hover:bg-blue-600 hover:text-white hover:rotate-6 transition-all shadow-sm"
                               title="Chỉnh sửa sản phẩm">
                                <i class="fa-solid fa-pen-to-square text-sm"></i>
                            </a>
                            <a href="?url=deleteProduct&id=<?= $item['product_id'] ?>" 
                               onclick="return confirm('⚠️ CẢNH BÁO N2SPORT: Tiến chắc chắn muốn xóa vĩnh viễn sản phẩm này?')"
                               class="w-11 h-11 bg-rose-50 text-rose-400 rounded-2xl flex items-center justify-center hover:bg-rose-500 hover:text-white hover:-rotate-6 transition-all shadow-sm"
                               title="Xoá sản phẩm">
                                <i class="fa-solid fa-trash-can text-sm"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="mt-10 opacity-[0.03] select-none pointer-events-none hidden lg:block">
        <h2 class="text-[120px] font-black italic uppercase tracking-tighter text-slate-900 leading-none">N2SPORT STOCK</h2>
    </div>
</div>