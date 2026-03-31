<div class="max-w-lg mx-auto mt-10 bg-white p-5 rounded-lg shadow">

<h1 class="text-xl font-bold mb-4">Sửa sản phẩm</h1>

<form method="POST"
      action="?url=editProductProcess&id=<?= $product['product_id'] ?>"
      enctype="multipart/form-data"
      class="space-y-3">

<input type="text" name="product_name"
       value="<?= $product['product_name'] ?>"
       class="w-full border p-2 rounded focus:outline-none focus:ring-1 focus:ring-black">

<textarea name="description"
          class="w-full border p-2 rounded h-20 resize-none focus:outline-none focus:ring-1 focus:ring-black"><?= $product['description'] ?></textarea>

<!-- Ảnh hiện tại -->
<div>
    <p class="text-sm text-gray-500 mb-1">Ảnh hiện tại:</p>
    <img src="/baseDA1/uploads/<?= $product['image'] ?>"
         class="w-20 h-20 object-cover rounded border mb-2">
</div>

<!-- Upload ảnh mới -->
<input type="file" name="image" class="w-full text-sm">

<input type="number" name="base_price"
       value="<?= $product['base_price'] ?>"
       class="w-full border p-2 rounded focus:outline-none focus:ring-1 focus:ring-black">

<div class="flex gap-2">

    <!-- COLOR -->
    <select name="color_id"
            class="w-1/3 border p-2 rounded focus:outline-none focus:ring-1 focus:ring-black">
        <?php foreach($listColor as $c): ?>
            <option value="<?= $c['color_id'] ?>"
                <?= $c['color_id'] == $product['color_id'] ? 'selected' : '' ?>>
                <?= $c['color_name'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <!-- SIZE -->
    <select name="size_id"
            class="w-1/3 border p-2 rounded focus:outline-none focus:ring-1 focus:ring-black">
        <?php foreach($listSize as $s): ?>
            <option value="<?= $s['size_id'] ?>"
                <?= $s['size_id'] == $product['size_id'] ? 'selected' : '' ?>>
                <?= $s['size_values'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <!-- QUANTITY -->
    <input type="number" name="quantity"
           value="<?= $product['quantity'] ?>"
           min="0"
           class="w-1/3 border p-2 rounded focus:outline-none focus:ring-1 focus:ring-black">
</div>

<!-- Category + Brand -->
<div class="flex gap-2">
    <select name="category_id"
            class="w-1/2 border p-2 rounded focus:outline-none focus:ring-1 focus:ring-black">
        <?php foreach($listCate as $c): ?>
            <option value="<?= $c['category_id'] ?>"
                <?= $c['category_id'] == $product['category_id'] ? 'selected' : '' ?>>
                <?= $c['category_name'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <select name="brand_id"
            class="w-1/2 border p-2 rounded focus:outline-none focus:ring-1 focus:ring-black">
        <?php foreach($listBrand as $b): ?>
            <option value="<?= $b['brand_id'] ?>"
                <?= $b['brand_id'] == $product['brand_id'] ? 'selected' : '' ?>>
                <?= $b['brand_name'] ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>

<button type="submit" name="btn_edit"
        class="w-full bg-black text-white py-2 rounded hover:bg-gray-800">
    Cập nhật
</button>

</form>

</div>