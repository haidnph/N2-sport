<h2 class="text-xl font-bold mb-4">Kết quả tìm kiếm</h2>

<div class="grid grid-cols-4 gap-4">
<?php foreach($listProduct as $p): ?>
    <div class="border p-3 rounded-xl">
        <img src="<?= $p['image'] ?>" class="w-full h-40 object-cover">
        <h3 class="font-semibold"><?= $p['product_name'] ?></h3>
        <p>Danh mục: <?= $p['category_name'] ?></p>
        <p>Thương hiệu: <?= $p['brand_name'] ?></p>
        <p class="text-red-500"><?= number_format($p['base_price']) ?>đ</p>
    </div>
<?php endforeach; ?>
</div>