<?php
require_once PATH_MODEL . 'ProductModel.php';
require_once PATH_MODEL . 'CategoryModel.php';
require_once PATH_MODEL . 'BrandModel.php';
require_once PATH_MODEL . 'SizeModel.php';
require_once PATH_MODEL . 'ColorModel.php';

class ProductController
{
    public $productModel;
    public $categoryModel;
    public $brandModel;
    public $sizeModel;
    public $colorModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
        $this->brandModel = new BrandModel();
        $this->sizeModel = new SizeModel();
        $this->colorModel = new ColorModel();
    }

    // ==========================================
    //                  ADMIN
    // ==========================================

    public function list() {
        $listProduct = $this->productModel->getAll();
        $view = PATH_VIEW . 'admin/product/listProduct.php';
        require_once PATH_VIEW . 'admin/main.php';
    }

    public function add() {
        $listCate = $this->categoryModel->getAll();
        $listBrand = $this->brandModel->getAll();
        $listSize = $this->sizeModel->getAll();
        $listColor = $this->colorModel->getAll();
        $view = PATH_VIEW . 'admin/product/addProduct.php';
        require_once PATH_VIEW . 'admin/main.php';
    }

    public function addProcess() {
        if (isset($_POST['btn_add'])) {
            $name = $_POST['product_name'] ?? '';
            $desc = $_POST['description'] ?? '';
            $price = $_POST['base_price'] ?? 0;
            $cate_id = $_POST['category_id'] ?? 0;
            $brand_id = $_POST['brand_id'] ?? 0;
            $color_id = $_POST['color_id'] ?? 0;

            $image = '';
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $image = time() . '_' . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $image);
            }

            // Lưu sản phẩm chính
            $product_id = $this->productModel->insertProduct($name, $desc, $image, $price, $cate_id, $brand_id);

            // Xử lý lưu mảng Size và Số lượng tương ứng
            if (!empty($_POST['size_ids']) && is_array($_POST['size_ids'])) {
                foreach ($_POST['size_ids'] as $s_id) {
                    $qty = $_POST['quantities'][$s_id] ?? 0; 
                    // Luôn truyền đủ 4 tham số: id_sp, id_size, id_mau, so_luong
                    $this->productModel->insertVariant($product_id, $s_id, $color_id, $qty);
                }
            }
            header("Location:?url=listProduct&success=Added");
            exit();
        }
    }

    public function edit() {
        $id = $_GET['id'] ?? 0;
        $product = $this->productModel->find($id);
        $listCate = $this->categoryModel->getAll();
        $listBrand = $this->brandModel->getAll();
        $listSize = $this->sizeModel->getAll();
        $listColor = $this->colorModel->getAll();
        
        // Lấy danh sách biến thể hiện tại để tick chọn (checked) và điền số lượng cũ
        $currentVariants = $this->productModel->getVariantByProduct($id);

        $view = PATH_VIEW . 'admin/product/editProduct.php';
        require_once PATH_VIEW . 'admin/main.php';
    }

    public function editProcess() {
        if (isset($_POST['btn_edit'])) {
            $id = $_GET['id'];
            $name = $_POST['product_name'] ?? '';
            $desc = $_POST['description'] ?? '';
            $price = $_POST['base_price'] ?? 0;
            $cate_id = $_POST['category_id'] ?? 0;
            $brand_id = $_POST['brand_id'] ?? 0;
            $color_id = $_POST['color_id'] ?? 0;

            $image = $_POST['old_image']; 
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $image = time() . '_' . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $image);
            }

            $this->productModel->updateProduct($id, $name, $desc, $image, $price, $cate_id, $brand_id);

            if (!empty($_POST['size_ids'])) {
                // Làm sạch biến thể cũ trước khi ghi đè dàn mới
                $this->productModel->deleteVariantByProduct($id); 

                foreach ($_POST['size_ids'] as $s_id) {
                    $qty = $_POST['quantities'][$s_id] ?? 0;
                    $this->productModel->insertVariant($id, $s_id, $color_id, $qty);
                }
            }
            header("Location: ?url=listProduct&success=Updated");
            exit();
        }
    }

    public function delete() {
        $id = $_GET['id'] ?? 0;
        // Xóa con (biến thể) trước khi xóa cha (sản phẩm) để không lỗi Database
        $this->productModel->deleteVariantByProduct($id);
        $this->productModel->deleteProduct($id);
        
        header("Location:?url=listProduct&success=Deleted");
        exit();
    }

    // ==========================================
    //                  CLIENT
    // ==========================================

    public function detail() {
        $id = $_GET['id'] ?? 0;
        $product = $this->productModel->find($id);
        $allProducts = $this->productModel->getAllLimit(4);
        $listCate = $this->categoryModel->getAll(); 
        
        // Lấy biến thể (size/qty) cụ thể của sản phẩm này
        $productVariants = $this->productModel->getVariantByProduct($id);

        require_once PATH_VIEW . 'client/products/ctPro.php';
    }

    public function shop() {
        $cate_id = $_GET['category_id'] ?? null;
        if ($cate_id) {
            $listProduct = $this->productModel->getByCategory($cate_id);
        } else {
            $listProduct = $this->productModel->getAll();
        }
        $listCate = $this->categoryModel->getAll(); 
        require_once PATH_VIEW . 'client/products/shop.php';
    }

    // ----- CART LOGIC -----

    public function addToCart() {
        if (session_status() === PHP_SESSION_NONE) session_start();

        $id = $_POST['product_id'] ?? 0;
        $quantity = $_POST['quantity'] ?? 1;
        
        // Lấy cả ID và Tên Size để hiển thị và xử lý trừ kho sau này
        $sizeId = $_POST['size_id'] ?? 0;
        $sizeName = $_POST['size_name'] ?? 'N/A';

        if ($id <= 0 || $sizeId <= 0) {
            header("Location: index.php?url=shop&error=MissingInfo"); 
            exit();
        }

        $product = $this->productModel->find($id);
        if ($product) {
            if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

            // CartKey kết hợp ID và Size để tách biệt cùng 1 giày nhưng khác size
            $cartKey = $id . '_' . $sizeId;

            if (isset($_SESSION['cart'][$cartKey])) {
                $_SESSION['cart'][$cartKey]['quantity'] += (int)$quantity;
            } else {
                $_SESSION['cart'][$cartKey] = [
                    'id'        => $id,
                    'size_id'   => $sizeId, // Quan trọng để trừ kho
                    'name'      => $product['product_name'],
                    'price'     => (int)$product['base_price'],
                    'image'     => $product['image'],
                    'quantity'  => (int)$quantity,
                    'size_name' => $sizeName
                ];
            }
            header("Location: index.php?url=cart");
            exit();
        } else {
            header("Location: index.php?url=shop");
            exit();
        }
    }

    public function increase() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        $cartKey = $_GET['id'] ?? null; 
        if ($cartKey && isset($_SESSION['cart'][$cartKey])) {
            $_SESSION['cart'][$cartKey]['quantity'] += 1;
        }
        header("Location: ?url=cart");
        exit();
    }

    public function decrease() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        $cartKey = $_GET['id'] ?? null;
        if ($cartKey && isset($_SESSION['cart'][$cartKey])) {
            if ($_SESSION['cart'][$cartKey]['quantity'] > 1) {
                $_SESSION['cart'][$cartKey]['quantity'] -= 1;
            } else {
                unset($_SESSION['cart'][$cartKey]);
            }
        }
        header("Location: ?url=cart");
        exit();
    }

    public function remove() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        $cartKey = $_GET['id'] ?? null; 
        if ($cartKey && isset($_SESSION['cart'][$cartKey])) {
            unset($_SESSION['cart'][$cartKey]);
        }
        header("Location: ?url=cart");
        exit();
    }
}