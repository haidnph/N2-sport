<h1 class="text-2xl font-bold mb-5">Thêm Sản Phẩm</h1>
<form method="POST" action="?url=addProductProcess" enctype="multipart/form-data" class="space-y-3">

<input type="text" name="product_name"
       placeholder="Tên sản phẩm"
       required
       minlength="3"
       class="w-full border p-2 rounded focus:outline-none focus:ring-1 focus:ring-black">

<textarea name="description"
          placeholder="Mô tả"
          required
          class="w-full border p-2 rounded h-20 resize-none focus:outline-none focus:ring-1 focus:ring-black"></textarea>

<input type="file" name="image"
       accept="image/*"
       required
       class="w-full text-sm">

<input type="number" name="base_price"
       placeholder="Giá"
       required
       min="0"
       class="w-full border p-2 rounded focus:outline-none focus:ring-1 focus:ring-black">

<!-- ✅ SỬA ĐÚNG THEO DB -->
<div class="flex gap-2">

    <!-- COLOR -->
    <select name="color_id"
            required
            class="w-1/3 border p-2 rounded focus:outline-none focus:ring-1 focus:ring-black">
        <option value="">Màu sắc</option>
        <?php foreach($listColor as $c): ?>
            <option value="<?= $c['color_id'] ?>">
                <?= $c['color_name'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <!-- SIZE -->
<select name="size_id"
        required
        class="w-1/3 border p-2 rounded focus:outline-none focus:ring-1 focus:ring-black">
    <option value="">Size</option>
    <?php foreach($listSize as $s): ?>
        <option value="<?= $s['size_id'] ?>">
            <?= $s['size_value'] ?>
        </option>
    <?php endforeach; ?>
</select>

    <!-- QUANTITY -->
    <input type="number" name="quantity"
           placeholder="Số lượng"
           required
           min="0"
           class="w-1/3 border p-2 rounded focus:outline-none focus:ring-1 focus:ring-black">
</div>

<div class="flex gap-2">
    <select name="category_id"
            required
            class="w-1/2 border p-2 rounded focus:outline-none focus:ring-1 focus:ring-black">
        <option value="">Danh mục</option>
        <?php foreach($listCate as $c): ?>
            <option value="<?= $c['category_id'] ?>">
                <?= $c['category_name'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <select name="brand_id"
            required
            class="w-1/2 border p-2 rounded focus:outline-none focus:ring-1 focus:ring-black">
        <option value="">Brand</option>
        <?php foreach($listBrand as $b): ?>
            <option value="<?= $b['brand_id'] ?>">
                <?= $b['brand_name'] ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>

<button type="submit" name="btn_add"
        class="w-full bg-black text-white py-2 rounded hover:bg-gray-800">
    Thêm
</button>

</form>