<?php
require_once PATH_MODEL . 'CategoryModel.php';

class CategoryController
{
    public $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    // DANH SÁCH DANH MỤC
    public function index()
    {
        $listCate = $this->categoryModel->getAll();
        $title = "Quản lý danh mục";
        $view = PATH_VIEW . 'admin/category/listCate.php';
        require_once PATH_VIEW . 'admin/main.php';
    }

    // FORM THÊM
    public function add()
    {
        $title = "Thêm danh mục";
        $view = PATH_VIEW . 'admin/category/addCate.php';
        require_once PATH_VIEW . 'admin/main.php';
    }

    // XỬ LÝ THÊM
    public function addProcess()
    {
        if (isset($_POST['btn_add'])) {
            $name = $_POST['category_name'];
            $this->categoryModel->insertCate($name);

            header("Location:?url=listCate");
            exit();
        }
    }

    // FORM SỬA
    public function edit()
    {
        $id = $_GET['id'] ?? 0;
        $cate = $this->categoryModel->find($id);
        $title = "Sửa danh mục";
        $view = PATH_VIEW . 'admin/category/editCate.php';
        require_once PATH_VIEW . 'admin/main.php';
    }

    // XỬ LÝ SỬA
    public function editProcess()
    {
        if (isset($_POST['btn_edit'])) {
            $id = $_GET['id'] ?? 0;
            $name = $_POST['category_name'];

            $this->categoryModel->updateCate($id, $name);

            header("Location:?url=listCate");
            exit();
        }
    }

    // XÓA
    public function delete()
    {
        $id = $_GET['id'] ?? 0;
        $this->categoryModel->deleteCate($id);

        header("Location:?url=listCate");
        exit();
    }
}