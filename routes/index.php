<?php
require_once 'controllers/AuthController.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/CategoryController.php';
require_once 'controllers/BrandController.php';
require_once 'controllers/ProductController.php';
require_once 'controllers/SizeController.php'; 
require_once 'controllers/ColorController.php';
require_once 'controllers/AdminController.php';

$url = $_GET['url'] ?? 'home';

$auth = new AuthController();
$home = new HomeController();
$category = new CategoryController();
$brand = new BrandController();
$product = new ProductController();
$size = new SizeController();
$color = new ColorController();
$admin = new AdminController();

switch ($url) {

    // =========================
    // ===== CLIENT SIDE =======
    // =========================

    // HOME
    case 'home':
        $home->index();
        break;

    // SHOP (MENU)
    case 'shop':
        $product->shop(); // bạn cần tạo hàm này
        break;

    // PRODUCT DETAIL
    case 'productDetail':
        $product->detail();
        break;

    // CART
    case 'cart':
        $product->cart(); // hoặc CartController nếu có
        break;
    case 'add-to-cart':
        $product->addToCart();
        break;
    case 'remove-from-cart':
    $product->removeFromCart();
    break;
    
        

    // SALE
    case 'sale':
        $product->sale(); // lọc sản phẩm giảm giá
        break;

    // NEW ARRIVALS
    case 'new':
        $product->new(); // sản phẩm mới
        break;

    // BRANDS
    case 'brands':
        $brand->clientList(); // cần tạo hàm hiển thị brand phía client
        break;
        // GIAY BONG RO
        case 'giay-bong-ro':
        $product->giayBongRo();
        break;

        case 'giayChay':
        $product->giayChayBo();
        break;

        case 'giayBongChuyen':
        $product->giayBongChuyen();
        break;

        case 'giayBongDa':
        $product->giayBongDa();
        break;

        case 'giayCauLong':
        $product->giayCauLong();
        break;



    // =========================
    // ===== AUTH =============
    // =========================

    case 'login':
        $auth->login();
        break;

    case 'register':
        $auth->register();
        break;

    case 'logout':
        $auth->logout();
        break;


    // =========================
    // ===== ADMIN SIDE ========
    // =========================

    case 'admin':
        $admin->index();
        break;

    // CATEGORY
    case 'listCate':
        $category->list();
        break;

    case 'addCate':
        $category->add();
        break;

    case 'addCateProcess':
        $category->addProcess();
        break;

    case 'editCate':
        $category->edit();
        break;

    case 'editCateProcess':
        $category->editProcess();
        break;

    case 'deleteCate':
        $category->delete();
        break;

    // BRAND
    case 'listBrand':
        $brand->list();
        break;

    case 'addBrand':
        $brand->add();
        break;

    case 'addBrandProcess':
        $brand->addProcess();
        break;

    case 'editBrand':
        $brand->edit();
        break;

    case 'editBrandProcess':
        $brand->editProcess();
        break;

    case 'deleteBrand':
        $brand->delete();
        break;

    // PRODUCT
    case 'listProduct':
        $product->list();
        break;

    case 'addProduct':
        $product->add();
        break;

    case 'addProductProcess':
        $product->addProcess();
        break;

    case 'editProduct':
        $product->edit();
        break;

    case 'editProductProcess':
        $product->editProcess();
        break;

    case 'deleteProduct':
        $product->delete();
        break;

    // SIZE
    case 'listSize':
        $size->list();
        break;

    case 'addSize':
        $size->add();
        break;

    case 'addSizeProcess':
        $size->addProcess();
        break;

    case 'editSize':
        $size->edit();
        break;


    case 'deleteSize':
        $size->delete();
        break;

    // COLOR
    case 'listColor':
        $color->list();
        break;

    case 'addColor':
        $color->add();
        break;

    case 'addColorProcess':
        $color->addProcess();
        break;

    case 'editColor':
        $color->edit();
        break;

    case 'editColorProcess':
        $color->editProcess();
        break;

    case 'deleteColor':
        $color->delete();
        break;

case 'search':
    $product->search();
    break;
    // DEFAULT
    default:
        $home->index();
        break;
}