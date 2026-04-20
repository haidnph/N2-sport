<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

<div class="p-8 bg-slate-50 min-h-screen">
    <div class="flex flex-col md:flex-row justify-between items-center mb-10 gap-4">
        <div>
            <h1 class="text-3xl font-black uppercase tracking-tighter text-slate-800 italic">
                Quản lý <span class="text-blue-600">Thương Hiệu</span>
            </h1>
            <p class="text-slate-500 text-sm mt-1 font-medium italic">N2SPORT đang hợp tác với <?= count($listBrand ?? []) ?> nhãn hàng quốc tế</p>
        </div>
        
        <a href="?url=addBrand"
           class="bg-black text-white px-6 py-3 rounded-2xl font-bold hover:bg-blue-600 hover:scale-105 transition-all shadow-lg shadow-black/20 flex items-center gap-2 uppercase text-xs tracking-widest">
            <i class="fa-solid fa-copyright"></i> Thêm Brand mới
        </a>
    </div>

    <div class="max-w-4xl bg-white rounded-[40px] border border-slate-100 shadow-xl shadow-slate-200/50 overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-900 text-white uppercase text-[10px] font-black tracking-[2px]">
                <tr>
                    <th class="px-8 py-6 text-center w-24">ID</th>
                    <th class="px-8 py-6">Tên nhãn hiệu / Brand</th>
                    <th class="px-8 py-6 text-center w-40">Thao tác</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                <?php if (!empty($listBrand)): ?>
                    <?php foreach($listBrand as $item): ?>
                        <tr class="hover:bg-slate-50/80 transition-colors group">
                            <td class="px-8 py-5 text-center font-bold text-slate-400">#<?= $item['brand_id'] ?></td>

                            <td class="px-8 py-5">
                                <div class="flex items-center gap-3">
                                    <div class="w-1.5 h-6 bg-blue-600 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300"></div>
                                    <span class="font-black text-slate-700 uppercase italic tracking-tight text-lg group-hover:text-blue-600 transition-colors">
                                        <?= htmlspecialchars($item['brand_name']) ?>
                                    </span>
                                </div>
                            </td>

                            <td class="px-8 py-5">
                                <div class="flex justify-center gap-3">
                                    <a href="?url=editBrand&id=<?= $item['brand_id'] ?>" 
                                       class="w-10 h-10 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center hover:bg-blue-600 hover:text-white transition-all shadow-sm"
                                       title="Chỉnh sửa">
                                        <i class="fa-solid fa-pen-to-square text-xs"></i>
                                    </a>
                                    <a href="?url=deleteBrand&id=<?= $item['brand_id'] ?>" 
                                       onclick="return confirm('Tiến chắc chắn muốn xóa thương hiệu này không? Hành động này không thể hoàn tác!')"
                                       class="w-10 h-10 bg-rose-50 text-rose-500 rounded-2xl flex items-center justify-center hover:bg-rose-500 hover:text-white transition-all shadow-sm shadow-rose-100"
                                       title="Xóa Brand">
                                        <i class="fa-solid fa-trash-can text-xs"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="py-24 text-center">
                            <div class="flex flex-col items-center">
                                <div class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center mb-4">
                                    <i class="fa-solid fa-tag text-slate-300 text-3xl"></i>
                                </div>
                                <p class="text-slate-400 font-medium italic">Hiện tại chưa có nhãn hiệu nào trong kho</p>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="fixed bottom-10 right-10 opacity-[0.03] select-none pointer-events-none hidden lg:block">
        <h2 class="text-9xl font-black italic uppercase tracking-tighter text-slate-900">BRANDS</h2>
    </div>
</div>