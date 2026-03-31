<h1 class="text-2xl font-bold mb-5">Danh sách Size</h1>

<a href="?url=addSize"
   class="inline-block mb-4 bg-black text-white px-5 py-2 rounded-lg hover:bg-gray-800 transition">
   Thêm Size
</a>

<table class="w-full bg-white shadow rounded">
    <thead class="bg-gray-100">
        <tr>
            <th class="p-3 text-left">ID</th>
            <th class="p-3 text-left">Size</th>
            <th class="p-3 text-center">Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listSize as $item): ?>
        <tr class="border-t">
            <td class="p-3"><?= $item['size_id'] ?></td>
            <td class="p-3"><?= $item['size_value'] ?></td>
            <td class="p-3 text-center">
            

                <a href="?url=deleteSize&id=<?= $item['size_id'] ?>"
                   onclick="return confirm('Xoá size này?')"
                   class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 ml-2">
                   Xoá
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>