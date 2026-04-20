<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

<div class="p-8 bg-slate-50 min-h-screen">
    <div class="mb-10 flex items-center justify-between max-w-2xl mx-auto md:mx-0">
        <div>
            <h1 class="text-3xl font-black uppercase tracking-tighter text-slate-800 italic">
                Sửa <span class="text-blue-600">Thương Hiệu</span>
            </h1>
            <p class="text-slate-500 text-sm mt-1 font-medium italic">Hệ thống quản trị N2SPORT - Cập nhật thông tin đối tác</p>
        </div>
        <a href="?url=listBrand" class="text-slate-400 hover:text-black transition-colors font-bold text-sm uppercase tracking-widest">
            <i class="fa-solid fa-arrow-left mr-2"></i> Quay lại
        </a>
    </div>

    <div class="max-w-2xl bg-white rounded-[40px] shadow-xl shadow-slate-200/50 border border-slate-100 p-10 mx-auto md:mx-0">
        <form action="?url=editBrandProcess&id=<?= $brand['brand_id'] ?>" method="POST" class="space-y-8">
            
            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase tracking-[2px] text-slate-400 ml-4">Mã định danh Brand</label>
                <div class="w-full bg-slate-100 rounded-2xl p-4 text-slate-400 font-bold cursor-not-allowed border border-slate-50">
                    ID: #<?= $brand['brand_id'] ?>
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase tracking-[2px] text-slate-400 ml-4">Tên thương hiệu hiện tại</label>
                <input type="text" name="brand_name" value="<?= htmlspecialchars($brand['brand_name']) ?>" 
                       required placeholder="Nhập tên thương hiệu mới..."
                       class="w-full bg-slate-50 border-none rounded-2xl p-4 text-slate-800 font-bold focus:ring-2 focus:ring-blue-600 transition-all outline-none text-lg">
            </div>

            <div class="flex items-start gap-4 bg-slate-900 p-6 rounded-[28px] text-white">
                <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fa-solid fa-shield-halved text-sm"></i>
                </div>
                <div>
                    <p class="text-[10px] font-black uppercase tracking-widest text-blue-400 mb-1 italic">N2SPORT Security</p>
                    <p class="text-[11px] text-slate-300 leading-relaxed font-medium">
                        Việc thay đổi tên thương hiệu sẽ ảnh hưởng trực tiếp đến bộ lọc tìm kiếm tại trang cửa hàng. Vui lòng kiểm tra kỹ chính tả trước khi xác nhận.
                    </p>
                </div>
            </div>

            <button type="submit" name="btn_edit"
                    class="w-full bg-slate-900 text-white py-5 rounded-3xl font-black uppercase tracking-[3px] hover:bg-blue-600 transition-all shadow-xl shadow-blue-200/20 active:scale-[0.98] flex items-center justify-center gap-2">
                <i class="fa-solid fa-rotate"></i>
                Lưu thay đổi thương hiệu
            </button>

        </form>
    </div>

    <div class="mt-12 opacity-[0.05] select-none pointer-events-none hidden md:block">
        <h2 class="text-9xl font-black italic uppercase tracking-tighter text-slate-900">UPDATE BRAND</h2>
    </div>
</div>