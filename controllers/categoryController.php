<?php
require_once PATH_MODEL . 'CategoryModel.php';

class CategoryController
{
    public $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    // Danh sách
   public function list()
{
    $listCate = $this->categoryModel->getAll();

    $view = 'admin/category/listCate.php'; // truyền view
    require_once PATH_VIEW . 'admin/main.php';
}

    // Form thêm
  public function add()
{
    $view = 'admin/category/addCate.php';
    require_once PATH_VIEW . 'admin/main.php';
}
    // Xử lý thêm
    public function addProcess()
    {
        if (isset($_POST['btn_add']))
        {
            $name = $_POST['category_name'];
            $this->categoryModel->insertCate($name);

            header("Location:?url=listCate");
            exit();
        }
    }

    // Form sửa
  public function edit()
{
    $id = $_GET['id'];
    $cate = $this->categoryModel->find($id);

    $view = 'admin/category/editCate.php';
    require_once PATH_VIEW . 'admin/main.php';
}

    // Xử lý sửa
    public function editProcess()
    {
        if (isset($_POST['btn_edit']))
        {
            $id = $_GET['id'];
            $name = $_POST['category_name'];

            $this->categoryModel->updateCate($id, $name);

            header("Location:?url=listCate");
            exit();
        }
    }

    // Xoá
    public function delete()
    {
        $id = $_GET['id'];
        $this->categoryModel->deleteCate($id);

        header("Location:?url=listCate");
        exit();
    }
}
