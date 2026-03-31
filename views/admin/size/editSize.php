<h1 class="text-2xl font-bold mb-5">Sửa Size</h1>

<form action="?url=editSizeProcess&id=<?= $size['size_id'] ?>"
      method="POST"
      class="bg-white p-6 rounded shadow w-1/2">

    <label class="block mb-2 font-semibold">Size</label>
    <input type="text" name="size_value"
           value="<?= $size['size_value'] ?>"
           class="w-full border p-2 rounded mb-4"
           required>

    <button type="submit" name="btn_edit"
            class="bg-black text-white px-5 py-2 rounded hover:bg-gray-800">
        Cập nhật
    </button>

    <a href="?url=listSize"
       class="ml-3 text-gray-600 hover:underline">Quay lại</a>
</form>