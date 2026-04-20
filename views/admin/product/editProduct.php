<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

<div class="p-8 bg-slate-50 min-h-screen">
    <div class="mb-10 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-black uppercase tracking-tighter text-slate-800 italic leading-none">
                Cập nhật <span class="text-blue-600">Siêu Phẩm</span>
            </h1>
            <p class="text-slate-500 text-[10px] mt-2 font-bold uppercase tracking-[3px] italic">
                Mã giày hệ thống: #<?= $product['product_id'] ?>
            </p>
        </div>
        <a href="?url=listProduct" class="flex items-center gap-2 text-slate-400 hover:text-slate-900 transition-all font-bold text-xs uppercase tracking-widest">
            <i class="fa-solid fa-arrow-left-long"></i> Quay lại danh sách
        </a>
    </div>

    <div class="max-w-5xl mx-auto bg-white rounded-[40px] shadow-2xl shadow-slate-200/50 border border-slate-100 p-10 relative overflow-hidden">
        
        <form method="POST" action="?url=editProcess&id=<?= $product['product_id'] ?>" enctype="multipart/form-data" class="space-y-8 relative z-10">
            
            <input type="hidden" name="old_image" value="<?= $product['image'] ?>">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-[2px] text-slate-400 ml-4 italic">Tên đôi giày</label>
                    <input type="text" name="product_name" value="<?= htmlspecialchars($product['product_name']) ?>" required
                           class="w-full bg-slate-50 border-2 border-transparent rounded-2xl p-4 text-slate-800 font-black focus:border-blue-600 focus:bg-white transition-all outline-none">
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-[2px] text-slate-400 ml-4 italic">Giá bán hiện tại (VNĐ)</label>
                    <input type="number" name="base_price" value="<?= $product['base_price'] ?>" required min="0"
                           class="w-full bg-slate-50 border-2 border-transparent rounded-2xl p-4 text-blue-600 font-black focus:border-blue-600 focus:bg-white transition-all outline-none italic">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-[2px] text-slate-400 ml-4 italic">Mô tả chi tiết</label>
                    <textarea name="description" required
                              class="w-full bg-slate-50 border-2 border-transparent rounded-3xl p-5 text-slate-600 font-bold h-48 focus:border-blue-600 focus:bg-white transition-all outline-none resize-none"><?= htmlspecialchars($product['description']) ?></textarea>
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-[2px] text-slate-400 ml-4 italic">Quản lý hình ảnh</label>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-2 text-center">
                            <span class="text-[8px] font-black text-slate-400 uppercase italic">Ảnh đang dùng</span>
                            <div class="h-32 bg-slate-50 rounded-2xl overflow-hidden border border-slate-100 shadow-inner">
                                <?php 
                                    // Fix đường dẫn ảnh: Nếu không thấy, hãy thử thêm ../ trước uploads/
                                    $imagePath = "uploads/" . $product['image']; 
                                ?>
                                <img src="<?= $imagePath ?>" 
                                     class="w-full h-full object-cover"
                                     onerror="this.src='https://placehold.co/400x400?text=No+Image+Found'">
                            </div>
                        </div>
                        <div class="space-y-2 text-center">
                            <span class="text-[8px] font-black text-blue-500 uppercase italic">Ảnh thay thế</span>
                            <div class="relative group h-32 bg-blue-50/50 rounded-2xl border-2 border-dashed border-blue-200 flex items-center justify-center overflow-hidden hover:border-blue-600 transition-all">
                                <img id="preview" class="absolute inset-0 w-full h-full object-cover hidden">
                                <div id="placeholder" class="text-center">
                                    <i class="fa-solid fa-camera-rotate text-blue-300 text-xl"></i>
                                    <p class="text-[8px] font-bold text-blue-400 uppercase mt-1">Upload mới</p>
                                </div>
                                <input type="file" name="image" accept="image/*" onchange="previewImage(this)" class="absolute inset-0 opacity-0 cursor-pointer">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 bg-slate-900 p-8 rounded-[32px] text-white">
                <div class="space-y-2">
                    <label class="text-[10px] font-bold uppercase tracking-widest text-slate-400 ml-2 italic">Màu sắc</label>
                    <select name="color_id" required class="w-full bg-slate-800 border-none rounded-xl p-3 text-sm font-black text-white outline-none focus:ring-2 focus:ring-blue-600">
                        <?php foreach($listColor as $c): ?>
                            <option value="<?= $c['color_id'] ?>" <?= $c['color_id'] == ($product['color_id'] ?? '') ? 'selected' : '' ?>>
                                <?= $c['color_name'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-bold uppercase tracking-widest text-slate-400 ml-2 italic">Danh mục</label>
                    <select name="category_id" required class="w-full bg-slate-800 border-none rounded-xl p-3 text-sm font-black text-white outline-none focus:ring-2 focus:ring-blue-600">
                        <?php foreach($listCate as $c): ?>
                            <option value="<?= $c['category_id'] ?>" <?= $c['category_id'] == $product['category_id'] ? 'selected' : '' ?>>
                                <?= $c['category_name'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-bold uppercase tracking-widest text-slate-400 ml-2 italic">Thương hiệu</label>
                    <select name="brand_id" required class="w-full bg-slate-800 border-none rounded-xl p-3 text-sm font-black text-white outline-none focus:ring-2 focus:ring-blue-600">
                        <?php foreach($listBrand as $b): ?>
                            <option value="<?= $b['brand_id'] ?>" <?= $b['brand_id'] == $product['brand_id'] ? 'selected' : '' ?>>
                                <?= $b['brand_name'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="space-y-4 bg-blue-50/50 p-8 rounded-[40px] border border-blue-100/50">
                <div class="flex items-center justify-between mb-4">
                    <label class="text-[10px] font-black uppercase tracking-[2px] text-blue-600 ml-4 italic">Điều chỉnh kho biến thể</label>
                    <span class="text-[9px] font-black text-slate-400 uppercase italic">* Check để kích hoạt Size</span>
                </div>
                
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <?php foreach($listSize as $s): ?>
                        <?php 
                            $currentQty = 0; $isChecked = '';
                            foreach($currentVariants as $v) {
                                if($v['size_id'] == $s['size_id']) {
                                    $currentQty = $v['quantity']; $isChecked = 'checked'; break;
                                }
                            }
                        ?>
                        <div class="flex flex-col gap-3 bg-white p-5 rounded-3xl shadow-sm border <?= $isChecked ? 'border-blue-600 ring-4 ring-blue-50' : 'border-transparent' ?> hover:border-blue-400 transition-all group">
                            <div class="flex items-center gap-3">
                                <input type="checkbox" name="size_ids[]" value="<?= $s['size_id'] ?>" <?= $isChecked ?>
                                       class="w-5 h-5 rounded border-slate-300 text-blue-600 focus:ring-blue-600 cursor-pointer size-checkbox">
                                <span class="font-black text-slate-700 italic uppercase text-xs tracking-tighter">Size <?= $s['size_value'] ?></span>
                            </div>
                            
                            <div class="flex flex-col gap-1">
                                <span class="text-[8px] font-black text-slate-400 uppercase ml-1 italic">Số lượng:</span>
                                <input type="number" name="quantities[<?= $s['size_id'] ?>]" value="<?= $currentQty ?>" min="0" <?= $isChecked ? '' : 'disabled' ?>
                                       class="w-full <?= $isChecked ? 'bg-slate-50' : 'bg-slate-100 cursor-not-allowed' ?> border-none rounded-xl px-4 py-2 text-sm font-black text-slate-900 outline-none focus:ring-2 focus:ring-blue-600 transition-all qty-input">
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <button type="submit" name="btn_edit"
                    class="w-full bg-slate-900 text-white py-6 rounded-[32px] font-black uppercase tracking-[5px] hover:bg-blue-600 transition-all shadow-2xl shadow-blue-200 active:scale-[0.98] flex items-center justify-center gap-3 italic">
                <i class="fa-solid fa-cloud-arrow-up text-lg"></i>
                Lưu siêu phẩm
            </button>

        </form>
    </div>
</div>

<script>
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