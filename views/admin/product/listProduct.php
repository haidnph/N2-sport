<div class="p-8">

<h1 class="text-2xl font-bold mb-5">Danh sách sản phẩm</h1>

<a href="?url=addProduct"
   class="inline-block mb-4 bg-black text-white px-5 py-2 rounded-lg hover:bg-gray-800 transition">
   + Thêm sản phẩm
</a>

<table class="w-full mt-4 bg-white shadow rounded">
    <tr class="bg-gray-800 text-white">
        <th class="p-2">ID</th>
        <th class="p-2">Ảnh</th>
         <th class="p-2">Màu</th>
        <th class="p-2">Size</th>
        <th class="p-2">SL</th>
        <th class="p-2">Tên</th>
        <th class="p-2">Danh mục</th>
        <th class="p-2">Brand</th>
        <th class="p-2">Giá</th>

        <!-- 👉 THÊM MỚI -->
       

        <th class="p-2">Thao tác</th>
    </tr>

    <?php foreach($listProduct as $item): ?>
    <tr class="border-b text-center hover:bg-gray-100">
        <td class="p-2"><?= $item['product_id'] ?></td>

        <td class="p-2">
            <img src="/baseDA1/uploads/<?= $item['image'] ?>" width="60">
        </td>
        <td class="p-2"><?= $item['color_name'] ?></td>
        <td class="p-2"><?= $item['size_value'] ?></td>
        <td class="p-2"><?= $item['quantity'] ?></td>
        <td class="p-2"><?= $item['product_name'] ?></td>
        <td class="p-2"><?= $item['category_name'] ?></td>
        <td class="p-2"><?= $item['brand_name'] ?></td>
        <td class="p-2"><?= number_format($item['base_price']) ?> vnđ</td>

    
    

        <td class="p-2 space-x-2">
            <a href="?url=editProduct&id=<?= $item['product_id'] ?>"
               class="bg-gray-600 text-white px-3 py-1 rounded">
               Sửa
            </a>

            <a href="?url=deleteProduct&id=<?= $item['product_id'] ?>"
               onclick="return confirm('Xóa sản phẩm?')"
               class="bg-gray-700 text-white px-3 py-1 rounded">
               Xóa
            </a>
        </td>
    </tr>
    <?php endforeach; ?>

</table>

</div>