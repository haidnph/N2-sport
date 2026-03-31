<?php
require_once PATH_MODEL . 'sizeModel.php';

class SizeController
{
    public $sizeModel;

    public function __construct()
    {
        $this->sizeModel = new sizeModel();
    }

    // ===== DANH SÁCH =====
    public function list()
    {
        $listSize = $this->sizeModel->getAll();

        $view = 'admin/size/listSize.php';
        require_once PATH_VIEW . 'admin/main.php';
    }

    // ===== FORM THÊM =====
    public function add()
    {
        $view = 'admin/size/addSize.php';
        require_once PATH_VIEW . 'admin/main.php';
    }

    // ===== XỬ LÝ THÊM =====
    public function addProcess()
    {
        if (isset($_POST['btn_add']))
        {
            $name = $_POST['size_value'] ?? '';

            // validate
            if (empty($name)) {
                echo "Tên size không được để trống";
                return;
            }

            $this->sizeModel->insertSize($name);

            header("Location:?url=listSize");
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

        $this->sizeModel->deleteSize($id);

        header("Location:?url=listSize");
        exit();
    }
}