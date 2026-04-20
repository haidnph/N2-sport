<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

<div class="p-8 bg-slate-50 min-h-screen">
    <div class="flex flex-col md:flex-row justify-between items-center mb-10 gap-4">
        <div>
            <h1 class="text-3xl font-black uppercase tracking-tighter text-slate-800 italic">
                Quản lý <span class="text-blue-600">Danh Mục</span>
            </h1>
            <p class="text-slate-500 text-sm mt-1 font-medium italic">admin đang có <?= count($listCate ?? []) ?> danh mục sản phẩm</p>
        </div>
        
        <a href="?url=addCate"
           class="bg-black text-white px-6 py-3 rounded-2xl font-bold hover:bg-blue-600 hover:scale-105 transition-all shadow-lg shadow-black/20 flex items-center gap-2 uppercase text-xs tracking-widest">
            <i class="fa-solid fa-folder-plus"></i> Thêm danh mục mới
        </a>
    </div>

    <div class="max-w-4xl bg-white rounded-[40px] border border-slate-100 shadow-xl shadow-slate-200/50 overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-900 text-white uppercase text-[10px] font-black tracking-[2px]">
                <tr>
                    <th class="px-8 py-6 text-center w-24">ID</th>
                    <th class="px-8 py-6">Tên danh mục sản phẩm</th>
                    <th class="px-8 py-6 text-center w-40">Thao tác</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                <?php if (!empty($listCate)): ?>
                    <?php foreach($listCate as $cate): ?>
                        <tr class="hover:bg-slate-50/80 transition-colors group">
                            <td class="px-8 py-5 text-center font-bold text-slate-400">#<?= $cate['category_id'] ?></td>

                            <td class="px-8 py-5">
                                <div class="flex items-center gap-3">
                                    <div class="w-2 h-8 bg-blue-600 rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                    <span class="font-black text-slate-700 uppercase italic tracking-tight text-lg">
                                        <?= htmlspecialchars($cate['category_name']) ?>
                                    </span>
                                </div>
                            </td>

                            <td class="px-8 py-5">
                                <div class="flex justify-center gap-3">
                                    <a href="?url=editCate&id=<?= $cate['category_id'] ?>" 
                                       class="w-10 h-10 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center hover:bg-blue-600 hover:text-white transition-all shadow-sm"
                                       title="Chỉnh sửa">
                                        <i class="fa-solid fa-pen-to-square text-xs"></i>
                                    </a>
                                    <a href="?url=deleteCate&id=<?= $cate['category_id'] ?>" 
                                       onclick="return confirm('Tiến có chắc muốn xoá danh mục này? Các sản phẩm thuộc danh mục cũng sẽ bị ảnh hưởng!')"
                                       class="w-10 h-10 bg-rose-50 text-rose-500 rounded-2xl flex items-center justify-center hover:bg-rose-500 hover:text-white transition-all shadow-sm shadow-rose-100"
                                       title="Xoá danh mục">
                                        <i class="fa-solid fa-trash-can text-xs"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="py-20 text-center">
                            <div class="flex flex-col items-center">
                                <i class="fa-solid fa-folder-open text-slate-200 text-6xl mb-4"></i>
                                <p class="text-slate-400 font-medium italic">Chưa có danh mục nào được tạo Tiến ơi!</p>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    
    <p class="mt-6 text-[10px] text-slate-400 font-bold uppercase tracking-[2px] ml-4">
        <i class="fa-solid fa-circle-info mr-1"></i> 
    </p>
</div>