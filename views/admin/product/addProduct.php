<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

<div class="p-8 bg-slate-50 min-h-screen">
    <div class="mb-10 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-black uppercase tracking-tighter text-slate-800 italic">
                Thêm <span class="text-blue-600">Siêu Phẩm Mới</span>
            </h1>
            <p class="text-slate-500 text-sm mt-1 font-medium italic">Hệ thống nhập kho N2SPORT - Tối ưu hóa biến thể</p>
        </div>
        <a href="?url=listProduct" class="text-slate-400 hover:text-black transition-colors font-bold text-sm uppercase tracking-widest">
            <i class="fa-solid fa-arrow-left mr-2"></i> Quay lại danh sách
        </a>
    </div>

    <div class="max-w-5xl mx-auto bg-white rounded-[40px] shadow-xl shadow-slate-200/50 border border-slate-100 p-10">
        <form method="POST" action="?url=addProcess" enctype="multipart/form-data" class="space-y-8">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-[2px] text-slate-400 ml-4">Tên đôi giày</label>
                    <input type="text" name="product_name" placeholder="Ví dụ: Nike Air Force 1 '07" required
                           class="w-full bg-slate-50 border-none rounded-2xl p-4 text-slate-800 font-bold focus:ring-2 focus:ring-blue-600 transition-all outline-none">
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-[2px] text-slate-400 ml-4">Giá niêm yết (VNĐ)</label>
                    <input type="number" name="base_price" placeholder="Nhập giá tiền..." required min="0"
                           class="w-full bg-slate-50 border-none rounded-2xl p-4 text-blue-600 font-black focus:ring-2 focus:ring-blue-600 transition-all outline-none italic">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-[2px] text-slate-400 ml-4">Mô tả sản phẩm</label>
                    <textarea name="description" placeholder="Mô tả chất liệu, cảm giác mang..." required
                              class="w-full bg-slate-50 border-none rounded-3xl p-5 text-slate-600 font-medium h-48 focus:ring-2 focus:ring-blue-600 transition-all outline-none resize-none"></textarea>
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-[2px] text-slate-400 ml-4">Hình ảnh sản phẩm</label>
                    <div class="relative group h-48 bg-slate-50 rounded-3xl border-2 border-dashed border-slate-200 flex flex-col items-center justify-center overflow-hidden hover:border-blue-400 transition-colors">
                        <img id="preview" class="absolute inset-0 w-full h-full object-cover hidden">
                        <div id="placeholder" class="text-center">
                            <i class="fa-solid fa-cloud-arrow-up text-3xl text-slate-300 group-hover:text-blue-400 transition-colors mb-2"></i>
                            <p class="text-[10px] font-bold text-slate-400 uppercase">Click để tải ảnh lên</p>
                        </div>
                        <input type="file" name="image" accept="image/*" required onchange="previewImage(this)"
                               class="absolute inset-0 opacity-0 cursor-pointer">
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 bg-slate-50 p-8 rounded-[32px]">
                <div class="space-y-2">
                    <label class="text-[10px] font-bold uppercase text-slate-400 ml-2">Màu sắc chủ đạo</label>
                    <select name="color_id" required class="w-full bg-white border-none rounded-xl p-3 text-sm font-bold text-slate-700 shadow-sm focus:ring-2 focus:ring-blue-600 outline-none">
                        <option value="">Chọn màu...</option>
                        <?php foreach($listColor as $c): ?>
                            <option value="<?= $c['color_id'] ?>"><?= $c['color_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-bold uppercase text-slate-400 ml-2">Danh mục</label>
                    <select name="category_id" required class="w-full bg-white border-none rounded-xl p-3 text-sm font-bold text-slate-700 shadow-sm focus:ring-2 focus:ring-blue-600 outline-none">
                        <option value="">Chọn danh mục...</option>
                        <?php foreach($listCate as $c): ?>
                            <option value="<?= $c['category_id'] ?>"><?= $c['category_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-bold uppercase text-slate-400 ml-2">Thương hiệu</label>
                    <select name="brand_id" required class="w-full bg-white border-none rounded-xl p-3 text-sm font-bold text-slate-700 shadow-sm focus:ring-2 focus:ring-blue-600 outline-none">
                        <option value="">Chọn Brand...</option>
                        <?php foreach($listBrand as $b): ?>
                            <option value="<?= $b['brand_id'] ?>"><?= $b['brand_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="space-y-4 bg-blue-50/50 p-8 rounded-[40px] border border-blue-100/50">
                <div class="flex items-center justify-between mb-4">
                    <label class="text-[10px] font-black uppercase tracking-[2px] text-blue-600 ml-4">Quản lý kho biến thể (Size & Số lượng)</label>
                    <span class="text-[9px] font-bold text-slate-400 italic">* Tích chọn Size để nhập số lượng</span>
                </div>
                
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <?php foreach($listSize as $s): ?>
                    <div class="flex flex-col gap-3 bg-white p-5 rounded-3xl shadow-sm border border-transparent hover:border-blue-400 transition-all group relative overflow-hidden">
                        <div class="flex items-center gap-3">
                            <input type="checkbox" name="size_ids[]" value="<?= $s['size_id'] ?>" 
                                   class="w-5 h-5 rounded border-slate-300 text-blue-600 focus:ring-blue-600 cursor-pointer size-checkbox">
                            <span class="font-black text-slate-700 italic uppercase text-sm">Size <?= $s['size_value'] ?></span>
                        </div>
                        
                        <div class="flex flex-col gap-1">
                            <span class="text-[9px] font-bold text-slate-400 uppercase ml-1">Số lượng nhập:</span>
                            <input type="number" name="quantities[<?= $s['size_id'] ?>]" value="0" min="0" disabled
                                   class="w-full bg-slate-100 border-none rounded-xl px-4 py-2 text-sm font-black text-slate-900 outline-none focus:ring-2 focus:ring-blue-600 transition-all qty-input cursor-not-allowed">
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <button type="submit" name="btn_add"
                    class="w-full bg-slate-900 text-white py-6 rounded-[32px] font-black uppercase tracking-[3px] hover:bg-blue-600 transition-all shadow-xl shadow-blue-200/20 active:scale-[0.98] flex items-center justify-center gap-3">
                <i class="fa-solid fa-plus-circle text-lg"></i>
                Hoàn tất nhập kho siêu phẩm
            </button>

        </form>
    </div>
</div>

<script>
    // Logic Preview ảnh
    function previewImage(input) {
        const preview = document.getElementById('preview');
        const placeholder = document.getElementById('placeholder');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                placeholder.classList.add('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Logic Bật/Tắt ô nhập số lượng theo Size
    document.querySelectorAll('.size-checkbox').forEach((checkbox) => {
        checkbox.addEventListener('change', function() {
            const parent = this.closest('.group');
            const qtyInput = parent.querySelector('.qty-input');
            
            if (this.checked) {
                qtyInput.disabled = false;
                qtyInput.classList.replace('bg-slate-100', 'bg-slate-50');
                qtyInput.classList.remove('cursor-not-allowed');
                parent.classList.add('border-blue-600', 'ring-4', 'ring-blue-50');
                qtyInput.focus();
            } else {
                qtyInput.disabled = true;
                qtyInput.classList.replace('bg-slate-50', 'bg-slate-100');
                qtyInput.classList.add('cursor-not-allowed');
                parent.classList.remove('border-blue-600', 'ring-4', 'ring-blue-50');
                qtyInput.value = 0;
            }
        });
    });
</script>