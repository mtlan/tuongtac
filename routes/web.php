<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// frontend
Route::get('/',[HomeController::class, 'welcome']);
Route::get('/home',[HomeController::class, 'index']);

// danh mục sản phẩm trang chủ
Route::get('/danh-muc-san-pham/{category_id}',[CategoryProduct::class, 'show_category_home']);
Route::get('/product-detail/{product_id}',[ProductController::class, 'detail']);
Route::get('/danh-muc-shop/{gory_id}',[CategoryProduct::class, 'show_category_shop']);


Route::get('/cart',[HomeController::class, 'cart']);
Route::get('/shop_detail',[HomeController::class, 'shop_detail']);
// Route::get('/shop',[HomeController::class, 'shop']);
Route::get('/404',[HomeController::class, 'not']);
Route::get('/about',[HomeController::class, 'about']);
Route::get('/contact',[HomeController::class, 'contact']);
Route::get('/checkout',[HomeController::class, 'checkout']);
Route::get('/login-register',[HomeController::class, 'account']);
Route::get('/my-account',[HomeController::class, 'myaccount']);

Route::post('/home-user',[HomeController::class, 'acc']);

// backend
Route::get('/admin',[AdminController::class, 'index']);
Route::get('/dashboard',[AdminController::class, 'show_dashboard']);

Route::post('/admin-dashboard',[AdminController::class, 'dashboard']);  // xử lý đăng nhập

Route::get('/logout',[AdminController::class, 'logout']);  // xử lý đăng xuất

//category product
Route::get('/Add-category',[CategoryProduct::class, 'Add_Category']);
Route::get('/All-category',[CategoryProduct::class, 'All_Category']);

// thêm/đẩy dữ liệu vào db
Route::post('/save-category-product',[CategoryProduct::class, 'Save_Category_Product']);

// bắt sự kiện cho category id
Route::get('/active-category-product/{cate_id}',[CategoryProduct::class, 'active_category_product']);
Route::get('/unactive-category-product/{cate_id}',[CategoryProduct::class, 'unactive_category_product']);

// update dữ liệu và delete
Route::get('/edit-category-product/{cate_id}',[CategoryProduct::class, 'Edit_Category_Product']);
Route::get('/delete-category-product/{cate_id}',[CategoryProduct::class, 'Delete_Category_Product']);

Route::post('/update-category-product/{cate_id}',[CategoryProduct::class, 'Update_Category_Product']);
//category product


//brand product
Route::get('/Add-brand',[BrandProduct::class, 'Add_Brand']);
Route::get('/All-brand',[BrandProduct::class, 'All_Brand']);

// thêm/đẩy dữ liệu vào db
Route::post('/save-brand-product',[BrandProduct::class, 'Save_Brand_Product']);

// bắt sự kiện cho category id
Route::get('/active-brand-product/{bra_id}',[BrandProduct::class, 'active_brand_product']);
Route::get('/unactive-brand-product/{bra_id}',[BrandProduct::class, 'unactive_brand_product']);

// update dữ liệu và delete
Route::get('/edit-brand-product/{bra_id}',[BrandProduct::class, 'edit_brand_Product']);
Route::get('/delete-brand-product/{bra_id}',[BrandProduct::class, 'delete_brand_Product']);

Route::post('/update-brand-product/{bra_id}',[BrandProduct::class, 'update_brand_Product']);
//brand product


//product
Route::get('/Add-product',[ProductController::class, 'Add_Product']);
Route::get('/All-product',[ProductController::class, 'All_Product']);




// thêm/đẩy dữ liệu vào db
Route::post('/save-product',[ProductController::class, 'Save_Product']);

// bắt sự kiện cho category id
Route::get('/active-product/{pro_id}',[ProductController::class, 'active_product']);
Route::get('/unactive-product/{pro_id}',[ProductController::class, 'unactive_product']);

// update dữ liệu và delete
Route::get('/edit-product/{pro_id}',[ProductController::class, 'edit_Product']);
Route::get('/delete-product/{pro_id}',[ProductController::class, 'delete_Product']);

Route::post('/update-product/{pro_id}',[ProductController::class, 'update_Product']);
//product


// cart
Route::post('/save-cart',[CartController::class,'save_cart']);
Route::post('/add-cart-ajax',[CartController::class,'add_cart_ajax']);
Route::get('/show-cart',[CartController::class,'show_cart']);
Route::get('/delete-cart/{rowId}',[CartController::class,'delete_cart']);
Route::post('/update-cart',[CartController::class,'update_cart']);

// checkout
Route::get('/login-checkout',[CheckoutController::class,'login_checkout']);
Route::post('/add-customer',[CheckoutController::class,'add_customer']);
Route::get('/checkout',[CheckoutController::class,'checkout']);
Route::post('/save-checkout-customer',[CheckoutController::class,'save_checkout_customer']);


Route::get('/payment',[CheckoutController::class,'payment']);
Route::get('/logout-checkout',[CheckoutController::class,'logout_checkout']);
Route::post('/login-customer',[CheckoutController::class,'login_customer']);

Route::post('/order-place',[CheckoutController::class,'order_place']);

// Quản lý đơn hàng
Route::get('/manager-order',[CheckoutController::class,'manager_order']);