<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

<div class="p-8 bg-slate-50 min-h-screen">
    <div class="mb-10 flex items-center justify-between max-w-2xl">
        <div>
            <h1 class="text-3xl font-black uppercase tracking-tighter text-slate-800 italic">
                Thêm <span class="text-blue-600">Thương Hiệu</span>
            </h1>
            <p class="text-slate-500 text-sm mt-1 font-medium italic">admin đang hợp tác với những ông lớn nào đây?</p>
        </div>
        <a href="?url=listBrand" class="text-slate-400 hover:text-black transition-colors font-bold text-sm uppercase tracking-widest">
            <i class="fa-solid fa-arrow-left mr-2"></i> Danh sách Brand
        </a>
    </div>

    <div class="max-w-2xl bg-white rounded-[40px] shadow-xl shadow-slate-200/50 border border-slate-100 p-10">
        <form action="?url=addBrandProcess" method="POST" class="space-y-8">
            
            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase tracking-[2px] text-slate-400 ml-4">Tên hãng giày / Brand</label>
                <input type="text" name="brand_name" required autofocus
                       placeholder="Ví dụ: Nike, Adidas, Jordan, Puma..."
                       class="w-full bg-slate-50 border-none rounded-2xl p-4 text-slate-800 font-bold focus:ring-2 focus:ring-blue-600 transition-all outline-none text-lg">
            </div>

            <div class="bg-slate-50/50 p-6 rounded-[32px] border border-slate-100">
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-4 italic">Gợi ý Brand phổ biến:</p>
                <div class="flex flex-wrap gap-2">
                    <span class="px-3 py-1 bg-white text-slate-500 text-[10px] font-bold rounded-lg border border-slate-200">Nike</span>
                    <span class="px-3 py-1 bg-white text-slate-500 text-[10px] font-bold rounded-lg border border-slate-200">Adidas</span>
                    <span class="px-3 py-1 bg-white text-slate-500 text-[10px] font-bold rounded-lg border border-slate-200">New Balance</span>
                    <span class="px-3 py-1 bg-white text-slate-500 text-[10px] font-bold rounded-lg border border-slate-200">Li-Ning</span>
                    <span class="px-3 py-1 bg-white text-slate-500 text-[10px] font-bold rounded-lg border border-slate-200">Mizuno</span>
                </div>
            </div>

            <button type="submit" name="btn_add"
                    class="w-full bg-slate-900 text-white py-5 rounded-3xl font-black uppercase tracking-[3px] hover:bg-blue-600 transition-all shadow-xl shadow-blue-200/20 active:scale-[0.98] flex items-center justify-center gap-2">
                <i class="fa-solid fa-check-double"></i>
                Xác nhận thêm Brand
            </button>

        </form>
    </div>

    <div class="mt-12 opacity-[0.03] select-none pointer-events-none">
        <h2 class="text-9xl font-black italic uppercase tracking-tighter text-slate-900">AUTHENTIC BRAND</h2>
    </div>
</div>