<h1 class="text-2xl font-bold mb-5">Sửa Màu</h1>

<form action="?url=editColorProcess&id=<?= $color['color_id'] ?>"
      method="POST"
      class="bg-white p-6 rounded shadow w-1/2">

    <label class="block mb-2 font-semibold">Tên màu</label>
    <input type="text" name="color_name"
           value="<?= $color['color_name'] ?>"
           class="w-full border p-2 rounded mb-4"
           required>

    <button type="submit" name="btn_edit"
            class="bg-black text-white px-5 py-2 rounded hover:bg-gray-800">
        Cập nhật
    </button>

    <a href="?url=listColor"
       class="ml-3 text-gray-600 hover:underline">Quay lại</a>
</form>