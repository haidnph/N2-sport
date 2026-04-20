<?php

require_once PATH_MODEL . 'ProductModel.php';

class HomeController
{
    public $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function index() 
    {
        // lấy dữ liệu
        $listProduct = $this->productModel->getAllLimit(8);
        $hotProducts = $this->productModel->getHotProducts(8);

        // debug thử (nếu vẫn lỗi)
        // var_dump($listProduct); die();

        require_once PATH_VIEW . 'trangchu.php';
    }
}