<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

<div class="p-8 bg-slate-50 min-h-screen">
    <div class="mb-10 flex items-center justify-between max-w-2xl">
        <div>
            <h1 class="text-3xl font-black uppercase tracking-tighter text-slate-800 italic">
                Sửa <span class="text-blue-600">Danh Mục</span>
            </h1>
            <p class="text-slate-500 text-sm mt-1 font-medium italic">Cập nhật lại tên gọi cho phân loại sản phẩm</p>
        </div>
        <a href="?url=listCate" class="text-slate-400 hover:text-black transition-colors font-bold text-sm uppercase tracking-widest">
            <i class="fa-solid fa-arrow-left mr-2"></i> Quay lại
        </a>
    </div>

    <div class="max-w-2xl bg-white rounded-[40px] shadow-xl shadow-slate-200/50 border border-slate-100 p-10">
        <form action="?url=editCateProcess&id=<?= $cate['category_id'] ?>" method="POST" class="space-y-8">
            
            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase tracking-[2px] text-slate-400 ml-4">Mã danh mục</label>
                <div class="w-full bg-slate-100 rounded-2xl p-4 text-slate-400 font-bold cursor-not-allowed border border-slate-50">
                    #<?= $cate['category_id'] ?> (Hệ thống tự tạo)
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase tracking-[2px] text-slate-400 ml-4">Tên danh mục mới</label>
                <input type="text" name="category_name" value="<?= htmlspecialchars($cate['category_name']) ?>" 
                       required placeholder="Ví dụ: Giày bóng rổ, Phụ kiện..."
                       class="w-full bg-slate-50 border-none rounded-2xl p-4 text-slate-800 font-bold focus:ring-2 focus:ring-blue-600 transition-all outline-none text-lg">
            </div>

            <div class="flex items-start gap-4 bg-blue-50/50 p-5 rounded-[24px] border border-blue-100/50">
                <i class="fa-solid fa-circle-info text-blue-500 mt-1"></i>
                <p class="text-xs text-slate-500 leading-relaxed italic">
                    <strong class="text-blue-600 uppercase not-italic">Lưu ý:</strong> Khi Tiến đổi tên danh mục, tất cả sản phẩm đang thuộc danh mục này sẽ được cập nhật hiển thị theo tên mới ngay lập tức.
                </p>
            </div>

            <button type="submit" name="btn_edit"
                    class="w-full bg-slate-900 text-white py-5 rounded-3xl font-black uppercase tracking-[3px] hover:bg-blue-600 transition-all shadow-xl shadow-blue-200/20 active:scale-[0.98]">
                Lưu thay đổi ngay
            </button>

        </form>
    </div>
</div>