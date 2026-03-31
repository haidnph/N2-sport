<div class="ml-64 p-8">

<div class="bg-white p-6 rounded shadow max-w-md mx-auto">

<h1 class="text-xl font-bold mb-4">Sửa Brand</h1>

<form method="POST"
      action="?url=editBrandProcess&id=<?= $brand['brand_id'] ?>">

<input type="text"
       name="brand_name"
       value="<?= $brand['brand_name'] ?>"
       class="w-full border p-2 rounded mb-3">

<button type="submit"
        name="btn_edit"
        class="bg-black text-white px-4 py-2 rounded w-full">
    Cập nhật
</button>

</form>

</div>
</div>