<?php
require_once PATH_MODEL . 'ColorModel.php';

class ColorController
{
    public $colorModel;

    public function __construct()
    {
        $this->colorModel = new ColorModel();
    }

    // ===== DANH SÁCH =====
    public function list()
    {
        $listColor = $this->colorModel->getAll();

        $view = 'admin/color/listColor.php';
        require_once PATH_VIEW . 'admin/main.php';
    }

    // ===== FORM THÊM =====
    public function add()
    {
        $view = 'admin/color/addColor.php';
        require_once PATH_VIEW . 'admin/main.php';
    }

    // ===== XỬ LÝ THÊM =====
    public function addProcess()
    {
        if (isset($_POST['btn_add'])) {
            $name = $_POST['color_name'] ?? '';

            if (empty($name)) {
                echo "Tên màu không được để trống";
                return;
            }

            $this->colorModel->insertColor($name);

            header("Location:?url=listColor");
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

        $color = $this->colorModel->find($id);

        if (!$color) {
            echo "Màu không tồn tại";
            return;
        }

        $view = 'admin/color/editColor.php';
        require_once PATH_VIEW . 'admin/main.php';
    }

    // ===== XỬ LÝ SỬA =====
    public function editProcess()
    {
        if (isset($_POST['btn_edit'])) {
            $id = $_GET['id'] ?? 0;
            $name = $_POST['color_name'] ?? '';

            if (!$id) {
                echo "Thiếu ID";
                return;
            }

            if (empty($name)) {
                echo "Tên màu không được để trống";
                return;
            }

            $this->colorModel->updateColor($id, $name);

            header("Location:?url=listColor");
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

        $this->colorModel->deleteColor($id);

        header("Location:?url=listColor");
        exit();
    }
}