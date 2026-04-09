<?php
require_once PATH_MODEL . 'ProductModel.php';
require_once PATH_MODEL . 'CategoryModel.php';
require_once PATH_MODEL . 'BrandModel.php';
require_once PATH_MODEL . 'SizeModel.php';   // ✅ thêm
require_once PATH_MODEL . 'ColorModel.php';  // ✅ thêm

class ProductController
{
    public $productModel;
    public $categoryModel;
    public $brandModel;
    public $sizeModel;   // ✅ thêm
    public $colorModel;  // ✅ thêm

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
        $this->brandModel = new BrandModel();
        $this->sizeModel = new SizeModel();     // ✅ thêm
        $this->colorModel = new ColorModel();   // ✅ thêm
    }

    // ===== DANH SÁCH =====
    public function list()
    {
        $listProduct = $this->productModel->getAll();

        $view = 'admin/product/listProduct.php';
        require_once PATH_VIEW . 'admin/main.php';
    }

    // ===== FORM THÊM =====
    public function add()
    {
        $listCate = $this->categoryModel->getAll();
        $listBrand = $this->brandModel->getAll();
        $listSize = $this->sizeModel->getAll();   // ✅ thêm
        $listColor = $this->colorModel->getAll(); // ✅ thêm

        $view = 'admin/product/addProduct.php';
        require_once PATH_VIEW . 'admin/main.php';
    }

    // ===== XỬ LÝ THÊM =====
    public function addProcess()
    {
        if (isset($_POST['btn_add']))
        {
            $name = $_POST['product_name'] ?? '';
            $desc = $_POST['description'] ?? '';
            $price = $_POST['base_price'] ?? 0;
            $cate_id = $_POST['category_id'] ?? 0;
            $brand_id = $_POST['brand_id'] ?? 0;

            // ✅ sửa đúng theo form
            $color_id = $_POST['color_id'] ?? 0;
            $size_id = $_POST['size_id'] ?? 0;
            $quantity = $_POST['quantity'] ?? 0;

            // ===== UPLOAD ẢNH =====
            $image = '';

            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0)
            {
                $image = time() . '_' . $_FILES['image']['name'];

                move_uploaded_file(
                    $_FILES['image']['tmp_name'],
                    __DIR__ . '/../uploads/' . $image
                );
            }

            $this->productModel->insertProduct(
                $name,
                $desc,
                $image,
                $price,
                $cate_id,
                $brand_id,
                $color_id,   // ✅ sửa
                $size_id,    // ✅ sửa
                $quantity    // ✅ sửa
            );

            header("Location:?url=listProduct");
            exit();
        }
    }

    // ===== FORM SỬA =====
    public function edit()
    {
        $id = $_GET['id'] ?? 0;

        $product = $this->productModel->find($id);
        $listCate = $this->categoryModel->getAll();
        $listBrand = $this->brandModel->getAll();
        $listSize = $this->sizeModel->getAll();   // ✅ thêm
        $listColor = $this->colorModel->getAll(); // ✅ thêm

        $view = 'admin/product/editProduct.php';
        require_once PATH_VIEW . 'admin/main.php';
    }

    // ===== XỬ LÝ SỬA =====
    public function editProcess()
    {
        if (isset($_POST['btn_edit']))
        {
            $id = $_GET['id'] ?? 0;

            $name = $_POST['product_name'] ?? '';
            $desc = $_POST['description'] ?? '';
            $price = $_POST['base_price'] ?? 0;
            $cate_id = $_POST['category_id'] ?? 0;
            $brand_id = $_POST['brand_id'] ?? 0;

            // ✅ sửa đúng
            $color_id = $_POST['color_id'] ?? 0;
            $size_id = $_POST['size_id'] ?? 0;
            $quantity = $_POST['quantity'] ?? 0;

            $product = $this->productModel->find($id);
            $image = $product['image'];

            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0)
            {
                $image = time() . '_' . $_FILES['image']['name'];

                move_uploaded_file(
                    $_FILES['image']['tmp_name'],
                    __DIR__ . '/../uploads/' . $image
                );
            }

            $this->productModel->updateProduct(
                $id,
                $name,
                $desc,
                $image,
                $price,
                $cate_id,
                $brand_id,
                $color_id,
                $size_id,
                $quantity
            );

            header("Location:?url=listProduct");
            exit();
        }
    }

public function detail()
{
    $id = $_GET['id'] ?? 0;

    $product = $this->productModel->find($id);

    if (!$product) {
        echo "Sản phẩm không tồn tại";
        return;
    }

    $sizes = $this->sizeModel->getAll();
    $colors = $this->colorModel->getAll();

    $allProducts = $this->productModel->getAll();

    require_once 'views/client/ctPro.php';
}

    // ===== XOÁ =====
    public function delete()
    {
        $id = $_GET['id'] ?? 0;

        $product = $this->productModel->find($id);
        if ($product && !empty($product['image']))
        {
            $file = __DIR__ . '/../uploads/' . $product['image'];
            if (file_exists($file)) {
                unlink($file);
            }
        }

        $this->productModel->deleteProduct($id);

        header("Location:?url=listProduct");
        exit();
    }
    public function shop() {
    $productModel = new ProductModel();

    // Lấy tất cả sản phẩm
    $products = $productModel->getAll();
    include 'views/client/shop.php';
}

public function cart() {
    include 'views/client/cart.php';
}

public function sale() {
    include 'views/client/shop.php'; // lọc sale sau
}

public function new() {
    include 'views/client/shop.php'; // lọc new sau
}
public function giayBongRo()
{
    $category_id = 6; // id giày bóng rổ

    // gọi model lấy sản phẩm theo category
    $products = $this->productModel->getProductByCategory($category_id);

    // truyền dữ liệu sang view
    include 'views/client/giaybr.php';
}
public function giayChayBo()
{
    $category_id = 7; // Giày chạy

    // lấy sản phẩm theo danh mục
    $products = $this->productModel->getProductByCategory($category_id);

    include 'views/client/giaychaybo.php';
}
public function giayBongChuyen()
{
    $category_id = 9; // Giày bóng chuyền

    // lấy sản phẩm theo danh mục
    $products = $this->productModel->getProductByCategory($category_id);

    include 'views/client/giaybongchuyen.php';
}
public function giayBongDa()
{
    $category_id = 8; // Giày bóng đá
    $products = $this->productModel->getProductByCategory($category_id);

    include 'views/client/giaybongda.php';
}
public function giayCauLong()
{
    $category_id = 10; // Giày cầu lông
    $products = $this->productModel->getProductByCategory($category_id);

    include 'views/client/giaycaulong.php';
}

}