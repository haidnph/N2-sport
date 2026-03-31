<?php
require_once 'controllers/AuthController.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/CategoryController.php';
require_once 'controllers/BrandController.php';
require_once 'controllers/ProductController.php';
require_once 'controllers/SizeController.php'; 
require_once 'controllers/colorController.php';// ✅ thêm

$url = $_GET['url'] ?? '/';

$auth = new AuthController();
$home = new HomeController();
$category = new CategoryController();
$brand = new BrandController();
$product = new ProductController();
$size = new SizeController(); // ✅ thêm
$color= new colorController();

switch ($url) {

    // ===== AUTH =====
    case 'login':
        $auth->login();
        break;

    case 'register':
        $auth->register();
        break;

    case 'logout':
        $auth->logout();
        break;

    // ===== ADMIN =====
    case 'admin':
        require 'views/admin/main.php';
        break;

    // ===== CART =====
    case 'cart':
        require 'views/client/cart.php';
        break;

    // ===== CATEGORY =====
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

    // ===== BRAND =====
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

    // ===== PRODUCT =====
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

    // ===== SIZE =====
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

    case 'editSizeProcess':
        $size->editProcess();
        break;

    case 'deleteSize':
        $size->delete();
        break;
        // ===== COLOR =====
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

    // ===== HOME =====
    default:
        $home->index();
        break;
}