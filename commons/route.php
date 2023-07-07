<?php

use Phroute\Phroute\RouteCollector;
use App\Controllers\BaseController;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router = new RouteCollector();

// filter check đăng nhập
$router->filter('auth', function(){
    if(!isset($_SESSION['auth']) || empty($_SESSION['auth'])){
        header('location: ' . BASE_URL . 'login');die;
    }
});


// bắt đầu định nghĩa ra các đường dẫn
//$router->get('/', function(){

//    $ba = new BaseController();
//    return $ba->render('index');
//});
$router->post('CartProductPost', [\App\Controllers\ProductDetailController::class, 'getProForPrice']);
$router->get('/', [\App\Controllers\ProductDetailController::class, 'getPriceProduct']);
$router->get('productdetail/{id}', [\App\Controllers\ProductDetailController::class, 'getPro']);
$router->get('customer',[\App\Controllers\CustomerController::class,'getCustomer']);
$router->get('addCustomer',[\App\Controllers\CustomerController::class,'addCustomer']);
$router->post('addCustomerPost',[\App\Controllers\CustomerController::class,'addCustomerPost']);
$router->get('deleteCustomer/{id}',[\App\Controllers\CustomerController::class,'deleteCustomer']);
//Categories
$router->get('cate',[\App\Controllers\CategoriesController::class,'getCategories']);
$router->get('addCate',[\App\Controllers\CategoriesController::class,'addCategories']);
$router->post('addCatePost',[\App\Controllers\CategoriesController::class,'addCategoriesPost']);
$router->get('updateCate/{id}',[\App\Controllers\CategoriesController::class,'updateCategories']);
$router->post('updateCatePost/{id}',[\App\Controllers\CategoriesController::class,'updateCategoriesPost']);
$router->get('deleteCate/{id}',[\App\Controllers\CategoriesController::class,'deleteCategories']);
//Color
$router->get('color',[\App\Controllers\ColorController::class,'getColor']);
$router->get('addColor',[\App\Controllers\ColorController::class,'addColor']);
$router->post('addColorPost',[\App\Controllers\ColorController::class,'addColorPost']);
$router->get('updateColor/{id}',[\App\Controllers\ColorController::class,'updateColor']);
$router->post('updateColorPost/{id}',[\App\Controllers\ColorController::class,'updateColorPost']);
$router->get('deleteColor/{id}',[\App\Controllers\ColorController::class,'deleteColor']);
//Ram
$router->get('ram',[\App\Controllers\RamController::class,'getRam']);
$router->get('addRam',[\App\Controllers\RamController::class,'addRam']);
$router->post('addRamPost',[\App\Controllers\RamController::class,'addRamPost']);
$router->get('updateRam/{id}',[\App\Controllers\RamController::class,'updateRam']);
$router->post('updateRamPost/{id}',[\App\Controllers\RamController::class,'updateRamPost']);
$router->get('deleteRam/{id}',[\App\Controllers\RamController::class,'deleteRam']);
//Rom
$router->get('rom',[\App\Controllers\RomController::class,'getRom']);
$router->get('addRom',[\App\Controllers\RomController::class,'addRom']);
$router->post('addRomPost',[\App\Controllers\RomController::class,'addRomPost']);
$router->get('updateRom/{id}',[\App\Controllers\RomController::class,'updateRom']);
$router->post('updateRomPost/{id}',[\App\Controllers\RomController::class,'updateRomPost']);
$router->get('deleteRom/{id}',[\App\Controllers\RomController::class,'deleteRom']);
//Users
$router->get('user',[\App\Controllers\UserController::class,'getUser']);
$router->get('addUser',[\App\Controllers\UserController::class,'addUser']);
$router->post('addUserPost',[\App\Controllers\UserController::class,'addUserPost']);
$router->get('updateUser/{id}',[\App\Controllers\UserController::class,'updateUser']);
$router->post('updateUserPost/{id}',[\App\Controllers\UserController::class,'updateRomPost']);
$router->get('deleteUser/{id}',[\App\Controllers\UserController::class,'deleteUser']);
$router->get('signIn', [\App\Controllers\UserController::class, 'SignIn']);
$router->get('signUp', [\App\Controllers\UserController::class, 'addUserCus']);
$router->post('signUpPost', [\App\Controllers\UserController::class, 'addUserPostCus']);
$router->post('signInPost', [\App\Controllers\UserController::class, 'SignInPost']);
$router->get('signOut', [\App\Controllers\UserController::class, 'SignOut']);
//Product
$router->get('product', [\App\Controllers\ProductController::class, 'getProducts']);
$router->get('addProduct',[\App\Controllers\ProductController::class, 'addProducts']);
$router->post('addProductPost', [\App\Controllers\ProductController::class, 'addProductsPost']);
$router->get('updateProduct/{id}',[\App\Controllers\ProductController::class, 'updateProducts']);
$router->post('updateProductPost/{id}', [\App\Controllers\ProductController::class, 'updateProductPost']);
$router->get('deleteProduct/{id}', [\App\Controllers\ProductController::class, 'deleteProducts']);
//Cart
$router->post('CartView', [\App\Controllers\CartController::class, 'addCartPost']);
//ProductDetail
$router->get('productDetail', [\App\Controllers\ProductDetailController::class, 'getProductDetail']);
$router->get('ProductDetail/{id}', [\App\Controllers\ProductDetailController::class, 'getProductID']);
$router->post('editProductDetailPost', [\App\Controllers\ProductDetailController::class, 'editProductDetailPost']);
$router->get('updateProductDetail/{id}', [\App\Controllers\ProductDetailController::class, 'updateProductDetail']);
$router->post('updateProductDetailPost', [\App\Controllers\ProductDetailController::class, 'updateProductDetailPost']);
$router->get('productID/{id}', [\App\Controllers\ProductDetailController::class, 'getProductID']);
$router->get('addProductDetail', [\App\Controllers\ProductDetailController::class, 'addProductDetail']);
$router->post('addProductDetailPost', [\App\Controllers\ProductDetailController::class, 'addProductDetailPost']);
# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;


?>