<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;

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

use App\Models\Product;
use Spatie\QueryBuilder\QueryBuilder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;

Route::get('send',[MailController::class, 'send']);

Route::get('productView',function(){
    $handle_product = DB::table('users')
    ->join('model_has_roles','model_has_roles.model_id','=','users.id')
    ->join('roles','roles.id','=','model_has_roles.role_id')
    ->where('roles.name','admin')
    ->get();

    dd($handle_product);
    foreach($handle_product as $value){
        if($value->name == "admin"){
            dd($value);
        }
    }
});

Route::get('authLogin',[UserController::class, 'getAuthLogin'])->middleware('CheckLogedIn');
Route::post('authLogin',[UserController::class, 'postAuthLogin']);

Route::get('profile',[UserController::class, 'getProfile'])->middleware(['CheckLogout','CheckUser']);
Route::get('logout',[UserController::class, 'getLogout']);

//Frontend
Route::group(['prefix'=>'home','middleware' => ['CheckUser']],function(){ 
    Route::get('/',[HomeController::class,'showHomepage']);
    Route::group(['prefix'=>'{cate_name}'],function(){
        Route::get('/',[HomeController::class,'showCategory']);
        Route::get('/{product_slug}',[HomeController::class,'showDetail']);
        
        Route::get('/{product_slug}/get_voucher',[HomeController::class, 'get_voucher']);
    });

});

//Backend
Route::group(['prefix'=>'adminPage','middleware' => ['CheckLogout','CheckAdmin']],function(){
    Route::get('/',[UserController::class, 'getAdmin']);
    //Route::get('welcome',[UserController::class, 'getWelcome']);
    Route::get('logout',[UserController::class, 'getLogout']);

    //categories
    Route::get('addCategory',[CategoriesController::class, 'add_category']);
    Route::get('editCategory/{category_id}',[CategoriesController::class, 'edit_category']);
    Route::get('deleteCategory/{category_id}',[CategoriesController::class, 'delete_category']);
    Route::get('showCategories',[CategoriesController::class, 'show_categories']);

    Route::get('unactive_cate/{category_id}',[CategoriesController::class, 'unactive_cate']);
    Route::get('active_cate/{category_id}',[CategoriesController::class, 'active_cate']);

    Route::post('updateCategory/{category_id}',[CategoriesController::class, 'update_cate']);
    Route::post('saveCategory',[CategoriesController::class, 'save_category']);

    //brands
    Route::get('addBrand',[BrandsController::class, 'add_brand']);
    Route::get('editBrand/{brand_id}',[BrandsController::class, 'edit_brand']);
    Route::get('deleteBrand/{brand_id}',[BrandsController::class, 'delete_brand']);
    Route::get('showBrands',[BrandsController::class, 'show_brands']);

    Route::get('unactive_brand/{brand_id}',[BrandsController::class, 'unactive_brand']);
    Route::get('active_brand/{brand_id}',[BrandsController::class, 'active_brand']);

    Route::post('updateBrand/{brand_id}',[BrandsController::class, 'update_brand']);
    Route::post('saveBrand',[BrandsController::class, 'save_brand']);

    //products
    Route::get('addProduct',[ProductController::class, 'add_product']);
    Route::get('editProduct/{product_id}',[ProductController::class, 'edit_product']);
    Route::get('deleteProduct/{product_id}',[ProductController::class, 'delete_product']);
    Route::get('showProducts',[ProductController::class, 'show_products']);
    Route::get('showProductsImage',[ProductController::class, 'show_products_image']);

    Route::get('editProductImage/{image_id}',[ProductController::class, 'edit_product_image']);
    Route::get('deleteProductImage/{image_id}',[ProductController::class, 'delete_product_image']);
    Route::post('updateProductImage/{image_id}',[ProductController::class, 'update_product_image']);

    Route::get('unactive_product/{product_id}',[ProductController::class, 'unactive_product']);
    Route::get('active_product/{product_id}',[ProductController::class, 'active_product']);

    Route::get('unactive_voucher/{product_id}',[ProductController::class, 'unactive_voucher']);
    Route::get('active_voucher/{product_id}',[ProductController::class, 'active_voucher']);

    Route::post('updateProduct/{product_id}',[ProductController::class, 'update_product']);
    Route::post('saveProduct',[ProductController::class, 'save_product']);

    //Route::get('get_voucher/{product_id}',[ProductController::class, 'get_voucher']);

    Route::get('addProductImage',[ProductController::class, 'add_product_image']);
    Route::post('saveProductImage',[ProductController::class, 'save_product_image']);


    //Email

    Route::get('manage_email',[MailController::class, 'manage_email']);
    Route::get('send_email',[MailController::class, 'send_email']);
    Route::get('delete_email/{email_id}',[MailController::class, 'delete_email']);

});