

<div class="ml-64 p-8">

<div class="bg-white p-6 rounded shadow max-w-md mx-auto">

<h1 class="text-xl font-bold mb-4">Sửa danh mục</h1>

<form method="POST"
      action="?url=editCateProcess&id=<?= $cate['category_id'] ?>">

<input type="text"
       name="category_name"
       value="<?= $cate['category_name']?>"
       class="w-full border p-2 rounded mb-3">

<button type="submit" name="btn_edit"
        class="bg-black text-white px-4 py-2 rounded">
    Update
</button>

</form>

</div>
</div>