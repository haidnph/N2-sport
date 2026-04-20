<?php
require_once PATH_MODEL . 'BrandModel.php';

class BrandController
{
    public $brandModel;

    public function __construct()
    {
        $this->brandModel = new BrandModel();
    }

    // ===== DANH SÁCH =====
    public function list()
    {
        $listBrand = $this->brandModel->getAll();

        $view = 'admin/brand/listBrand.php';
        require_once PATH_VIEW . 'admin/main.php';
    }

    // ===== FORM THÊM =====
    public function add()
    {
        $view = 'admin/brand/addBrand.php';
        require_once PATH_VIEW . 'admin/main.php';
    }

    // ===== XỬ LÝ THÊM =====
    public function addProcess()
    {
        if (isset($_POST['btn_add']))
        {
            $name = $_POST['brand_name'] ?? '';

            // validate
            if (empty($name)) {
                echo "Tên brand không được để trống";
                return;
            }

            $this->brandModel->insertBrand($name);

            header("Location:?url=listBrand");
            exit();
        }
    }

    // ===== FORM SỬA =====
    public function edit()
    {
        $id = $_GET['id'] ?? 0;

        if (!$id) {
            echo "Thiếu ID";
            return;
        }

        $brand = $this->brandModel->find($id);

        if (!$brand) {
            echo "Brand không tồn tại";
            return;
        }

        $view = 'admin/brand/editBrand.php';
        require_once PATH_VIEW . 'admin/main.php';
    }
    public function clientList() {
    include 'views/client/brands.php';
}

    // ===== XỬ LÝ SỬA =====
    public function editProcess()
    {
        if (isset($_POST['btn_edit']))
        {
            $id = $_GET['id'] ?? 0;
            $name = $_POST['brand_name'] ?? '';

            if (!$id) {
                echo "Thiếu ID";
                return;
            }

            if (empty($name)) {
                echo "Tên brand không được để trống";
                return;
            }

            $this->brandModel->updateBrand($id, $name);

            header("Location:?url=listBrand");
            exit();
        }
    }

    // ===== XOÁ =====
    public function delete()
    {
        $id = $_GET['id'] ?? 0;

        if (!$id) {
            echo "Thiếu ID";
            return;
        }

        $this->brandModel->deleteBrand($id);

        header("Location:?url=listBrand");
        exit();
    }
}