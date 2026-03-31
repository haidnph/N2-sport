<div class="p-8">

<h1 class="text-2xl font-bold mb-5">Danh sách Brand</h1>

<a href="?url=addBrand"
   class="inline-block mb-4 bg-black text-white px-5 py-2 rounded-lg hover:bg-gray-800 transition">
   + Thêm brand
</a>

<table class="w-full mt-4 bg-white shadow rounded">
    <tr class="bg-gray-800 text-white">
        <th class="p-2">ID</th>
        <th class="p-2">Tên brand</th>
        <th class="p-2">Thao tác</th>
    </tr>

    <?php if (!empty($listBrand)): ?>
        <?php foreach($listBrand as $item): ?>
        <tr class="border-b text-center">
            <td class="p-2"><?= $item['brand_id'] ?></td>
            <td class="p-2"><?= $item['brand_name'] ?></td>

            <td class="p-2 space-x-2">
                <a href="?url=editBrand&id=<?= $item['brand_id'] ?>"
                   class="bg-gray-600 text-white px-3 py-1 rounded hover:bg-gray-700">
                   Sửa
                </a>

                <a href="?url=deleteBrand&id=<?= $item['brand_id'] ?>"
                   onclick="return confirm('Xóa brand?')"
                   class="bg-gray-700 text-white px-3 py-1 rounded hover:bg-gray-600">
                   Xóa
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="3" class="p-4 text-center text-gray-500">
                Chưa có brand nào
            </td>
        </tr>
    <?php endif; ?>

</table>

</div>