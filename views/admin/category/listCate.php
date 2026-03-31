<div class="p-8">

<h1 class="text-2xl font-bold mb-5">Danh sách Size</h1>

<a href="?url=addSize"
   class="inline-block mb-4 bg-black text-white px-5 py-2 rounded-lg hover:bg-gray-800 transition">
   + Thêm Size
</a>

<table class="w-full mt-4 bg-white shadow rounded">
    <tr class="bg-gray-800 text-white">
        <th class="p-2">ID</th>
        <th class="p-2">Size</th>
        <th class="p-2">Thao tác</th>
    </tr>

    <?php if (!empty($listSize)): ?>
        <?php foreach($listSize as $size): ?>
        <tr class="border-b text-center">
            <td class="p-2"><?= $size['size_id'] ?></td>
            <td class="p-2"><?= $size['size_value'] ?></td>

            <td class="p-2 space-x-2">
                <a href="?url=editSize&id=<?= $size['size_id'] ?>"
                   class="bg-gray-600 text-white px-3 py-1 rounded hover:bg-gray-700">
                   Sửa
                </a>

                <a href="?url=deleteSize&id=<?= $size['size_id'] ?>"
                   class="bg-gray-700 text-white px-3 py-1 rounded hover:bg-gray-600"
                   onclick="return confirm('Xóa size?')">
                   Xóa
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="3" class="p-4 text-center text-gray-500">
                Chưa có size nào
            </td>
        </tr>
    <?php endif; ?>

</table>

</div>