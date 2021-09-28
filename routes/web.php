<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', 'FrontController@index')->name('index');
Route::post('/', 'FrontController@index')->name('index');

Auth::routes();
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
/*Route::get('/logout', 'Auth\LoginController@logout')->name('logout');


Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');*/





//Route::get('/admin/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/shop', 'CartController@shop');
Route::get('/get/all-products/{ord?}', 'FrontController@showAll')->name('product.all');
Route::get('/contact-us','ContactController@index');
Route::post('/contact-us','ContactController@handleForm');
Route::get('/about-us','FrontController@about');
Route::get('/cookies','FrontController@cookies');
Route::get('/repairs','FrontController@repair');
Route::get('/policy','FrontController@policy');
Route::get('/terms-conditions','FrontController@terms');

Route::get('/cart', 'CartController@cart')->name('cart.index');
Route::post('/add', 'CartController@add')->name('cart.add');
Route::post('/compare', 'FrontController@compare')->name('cart.compare');
Route::get('/getcompare', 'FrontController@display')->name('front.display');
Route::post('/details', 'FrontController@details')->name('cart.details');
Route::get('/pcbuilder', 'FrontProductController@pcbuilder')->name('pc.view');
Route::post('/getpcbuilder', 'FrontProductController@getbuilder')->name('get.pc');

Route::post('/sort/all/{ord?}', 'FrontController@showAllSort');

Route::post('/sort/category/{id}/{ord?}', 'FrontController@showSort');
Route::post('/sort/brand/{id}/{ord?}', 'FrontController@showSortBrand');
Route::post('/sort/subcategory/{id}/{ord?}', 'FrontController@showSortSub');

Route::get('/category/{id}/{ord?}', 'FrontController@show')->name('category.show');

Route::get('/brand/{id}/{ord?}', 'FrontController@showBrand')->name('brand.showBrand');
Route::get('/single_product/{id}', 'FrontProductController@singleProduct')->name('single.singleProduct');

Route::get('/subcategory/{id}/{ord?}', 'FrontController@showSub')->name('subcategory.show');
Route::post('get/search/asc', 'FrontController@searchPro')->name('show.search');
Route::get('get/search/asc', 'FrontController@searchPro')->name('show.search');

Route::post('get/search/{ord?}', 'FrontController@searchSearch')->name('view.search');

Route::post('/pricefilter', 'FrontProductController@priceFilter')->name('price.filter');

Route::post('/brand/filter/', 'FrontProductController@showBrandFilter')->name('brand.filter');


Route::post('/update', 'CartController@update')->name('cart.update');
Route::post('/remove', 'CartController@removeItem')->name('cart.remove');
//Route::get('/add-to-cart/{id}', 'CartController@addToCart');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard','FrontProductController@dashboard')->name('dashboard');
    Route::post('/dashboard','FrontProductController@userUpdate')->name('user.update');

    Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
    Route::post('/checkout/order', 'CheckoutController@placeOrder')->name('checkout.place.order');
    Route::get('/clear', 'CheckoutController@cartClear')->name('cart.clear');
     Route::get('paywithpaypal', array('as' => 'paywithpaypal','uses' => 'PaypalController@payWithPaypal',));
Route::post('paypal', array('as' => 'paypal','uses' => 'PaypalController@postPaymentWithpaypal',));
Route::get('paypal', array('as' => 'status','uses' => 'PaypalController@getPaymentStatus',));

});


Route::get('/admin', 'Backend\Admin\LoginController@showLoginForm')->name('adminlogin');

Route::post('/adminlogin', 'Backend\Admin\LoginController@login')->name('adminlogin.post');
Route::get('/adminlogout', 'Backend\Admin\LoginController@logout')->name('adminlogout');



    

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['as'=>'backend.', 'prefix'=>'admin', 'namespace'=>'Backend', 'middleware'=>['auth:admin']], function(){
    
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/roles', 'DashboardController@index')->name('roles');
    Route::post('/device', 'DashboardController@deviceview')->name('backend.device');
    Route::get('/getdevice', 'DashboardtController@devicedisplay');
    Route::get('/stock', 'DashboardController@stockDisplay')->name('stock');
    Route::get('/customer', 'DashboardController@customerDisplay')->name('customer');
    Route::get('/customer/view/{id}', 'DashboardController@customerView')->name('customer.view');
    Route::get('/approve{id}','OrderController@approve')->name('order.approve');


    Route::get('product/getsubcategory/{id}', 'SubcategoryController@show');
        Route::post('product/galleryorder', 'ProductController@orderUpdate');

    Route::post('product/reorder', 'ProductController@reorderUpdate');
        Route::post('product/delete_gallery', 'ProductController@galleryDelete');



    Route::resource('slider', 'SliderController');
    Route::resource('banner', 'BannerController');

    Route::resource('product', 'ProductController');
    Route::resource('category', 'CategoryController');
    Route::resource('subcategory', 'SubcategoryController');

    Route::resource('brand', 'BrandController');
   Route::resource('attributes', 'AttributesController');
   Route::resource('attributesvalues', 'AttributeValuesController');

   Route::resource('order', 'OrderController');
   Route::resource('settings', 'SettingsController');

   Route::resource('pcbuilder', 'PCController');




Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
    

});
