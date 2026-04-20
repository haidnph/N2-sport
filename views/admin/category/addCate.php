<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

<div class="p-8 bg-slate-50 min-h-screen">
    <div class="mb-10 flex items-center justify-between max-w-2xl">
        <div>
            <h1 class="text-3xl font-black uppercase tracking-tighter text-slate-800 italic">
                Thêm <span class="text-blue-600">Danh Mục Mới</span>
            </h1>
            <p class="text-slate-500 text-sm mt-1 font-medium italic">Admin đang mở rộng kho hàng của N2 Sport</p>
        </div>
        <a href="?url=listCate" class="text-slate-400 hover:text-black transition-colors font-bold text-sm uppercase tracking-widest">
            <i class="fa-solid fa-arrow-left mr-2"></i> Quay lại danh sách
        </a>
    </div>

    <div class="max-w-2xl bg-white rounded-[40px] shadow-xl shadow-slate-200/50 border border-slate-100 p-10">
        <form action="?url=addCateProcess" method="POST" class="space-y-8">
            
            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase tracking-[2px] text-slate-400 ml-4">Tên danh mục sản phẩm</label>
                <input type="text" name="category_name" required autofocus
                       placeholder="Ví dụ: Giày đá bóng, Giày Tennis..."
                       class="w-full bg-slate-50 border-none rounded-2xl p-4 text-slate-800 font-bold focus:ring-2 focus:ring-blue-600 transition-all outline-none text-lg">
            </div>

            <div class="flex items-start gap-4 bg-emerald-50/50 p-5 rounded-[24px] border border-emerald-100/50">
                <div class="w-8 h-8 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fa-solid fa-lightbulb text-sm"></i>
                </div>
                <p class="text-xs text-slate-500 leading-relaxed italic">
                    <strong class="text-emerald-600 uppercase not-italic tracking-wider">Mẹo nhỏ:</strong> 
                    Hãy chọn những cái tên ngắn gọn, súc tích (dưới 20 ký tự) để menu trang chủ của Tiến trông thật cân đối và chuyên nghiệp.
                </p>
            </div>

            <button type="submit" name="btn_add"
                    class="w-full bg-slate-900 text-white py-5 rounded-3xl font-black uppercase tracking-[3px] hover:bg-blue-600 transition-all shadow-xl shadow-blue-200/20 active:scale-[0.98] flex items-center justify-center gap-2">
                <i class="fa-solid fa-plus-circle"></i>
                Tạo danh mục ngay
            </button>

        </form>
    </div>

    <div class="mt-12 opacity-5">
        <h2 class="text-8xl font-black italic uppercase tracking-tighter text-slate-900">N2 SPORT CATEGORY</h2>
    </div>
</div>