<div class="p-8">

<h1 class="text-2xl font-bold mb-5">Danh sách Category</h1>

<a href="?url=addCate"
   class="inline-block mb-4 bg-black text-white px-5 py-2 rounded-lg hover:bg-gray-800 transition">
   + Thêm Category
</a>

<table class="w-full mt-4 bg-white shadow rounded">
    <tr class="bg-gray-800 text-white">
        <th class="p-2">ID</th>
        <th class="p-2">Tên Category</th>
        <th class="p-2">Thao tác</th>
    </tr>

    <?php if (!empty($listCate)): ?>
        <?php foreach($listCate as $cate): ?>
        <tr class="border-b text-center">
            <td class="p-2"><?= $cate['category_id'] ?></td>
            <td class="p-2"><?= $cate['category_name'] ?></td>

            <td class="p-2 space-x-2">
                <a href="?url=editCate&id=<?= $cate['category_id'] ?>"
                   class="bg-gray-600 text-white px-3 py-1 rounded hover:bg-gray-700">
                   Sửa
                </a>

                <a href="?url=deleteCate&id=<?= $cate['category_id'] ?>"
                   class="bg-gray-700 text-white px-3 py-1 rounded hover:bg-gray-600"
                   onclick="return confirm('Xóa category?')">
                   Xóa
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="3" class="p-4 text-center text-gray-500">
                Chưa có category nào
            </td>
        </tr>
    <?php endif; ?>

</table>

</div>