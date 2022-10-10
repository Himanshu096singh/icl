<?php
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\PageController;

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
// Route::get('dashboard','AdminController@dashboard');

// Category 
Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});


Route::get('/redirect', 'Auth\LoginController@redirectTo');
Route::get('/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/fb_redirect', 'SocialAuthFacebookController@redirect');
Route::get('/fb_callback', 'SocialAuthFacebookController@callback');
Route::resource('admin/header', 'Admin\HeadController');
Route::resource('admin/product/category', 'Admin\CategoryController');
Route::post('admin/category/change_popular', 'ProductController@change_popular');

Route::post('admin/product/upload_images', 'ProductController@upload_images');
Route::get('admin/product/edit_image/{id}', 'ProductController@edit_image');
Route::post('admin/product/update_images', 'ProductController@update_images');
Route::get('admin/product/delete_image/{id}', 'ProductController@delete_image');

Route::post('admin/product/upload_images_cate', 'ProductController@upload_images_cate');
Route::get('admin/product/edit_image_cate/{id}', 'ProductController@edit_image_cate');
Route::post('admin/product/update_images_cate', 'ProductController@update_images_cate');
Route::get('admin/product/delete_image_cate/{id}', 'ProductController@delete_image_cate');

Route::get('admin/product-category/main', 'ProductController@main_category');

Route::post('admin/product/add_product_subcategory', 'ProductController@add_product_subcategory');
Route::get('admin/produtct/delete_product_subcategory/{id}', 'ProductController@delete_product_subcategory');
Route::get('admin/produtct/editsubcategory', 'ProductController@editsubcategory');
Route::post('admin/produtct/updatesubcategory', 'ProductController@updatesubcategory');

Route::resource('admin/product/brand', 'Admin\ProductBrand');

Route::post('admin/product/update_status', 'Admin\ProductController@update_status');
Route::get('admin/product/product_restore/{s}', 'Admin\ProductController@product_restore');
Route::get('admin/product/product_force_delete/{s}', 'Admin\ProductController@product_force_delete');
Route::post('admin/product/update_image_order', 'Admin\ProductController@update_image_order');


//Product
Route::get('admin/all_product_list', 'ProductController@view_productlist');
Route::get('admin/add_products', 'ProductController@add_product');

Route::post('admin/product/category_status', 'ProductController@category_status');
Route::post('admin/product/category_status_sub', 'ProductController@category_status_sub');
Route::get('get_subcategory', 'HomeController@get_subcategory');
Route::get('get_category', 'Admin\ProductController@get_category');

Route::get('admin/product', 'Admin\ProductController@index');
Route::get('admin/product/create', 'Admin\ProductController@create');
Route::post('admin/product/store', 'Admin\ProductController@store');
Route::get('admin/product/edit/{id}', 'Admin\ProductController@edit');
Route::post('admin/product/update', 'Admin\ProductController@update');
Route::get('admin/product/delete/{id}', 'Admin\ProductController@delete');
Route::get('admin/product/delete_img/{id}', 'Admin\ProductController@delete_img');

Route::post('admin/product/savefaq','Admin\ProductController@savefaq');

Route::get('admin/product/image', 'Admin\ProductController@image');
Route::post('admin/product/image_save', 'Admin\ProductController@image_save');
Route::get('admin/product/image_edit/{id}', 'Admin\ProductController@image_edit');
Route::post('admin/product/image_update', 'Admin\ProductController@image_update');
Route::get('admin/product/image_delete/{id}', 'Admin\ProductController@image_delete');

Route::get('admin/product/import', 'Admin\ProductController@add_import');
Route::post('admin/product/save_import', 'Admin\ProductController@save_import');
Route::get('admin/import/list', 'Admin\ProductController@import_list');

Route::resource('admin/product/reviews',ReviewController::class);
Route::get('admin/product/reviews/delete/{id}','Admin\ReviewController@destroy');

Route::resource('admin/shipping', 'Admin\ShippingController');

Route::get('admin/order', 'Admin\OrderController@index');
Route::post('admin/order/bulk_action', 'Admin\OrderController@bulk_action');
Route::get('admin/business-order', 'Admin\OrderController@business_orders');
Route::get('admin/order/details/{id}', 'Admin\OrderController@details');
Route::get('admin/order/delete/{id}', 'Admin\OrderController@delete');
Route::post('update_order_status/', 'Admin\OrderController@update_order_status');
Route::get('admin/order/invoice/{id}', 'Admin\OrderController@invoice');
Route::get('admin/order/invoice_print/{id}', 'Admin\OrderController@genrate_pdf');
Route::get('invoice/{id}', 'Admin\OrderController@genrate_pdf');

Route::get('admin/business', 'Admin\BusinessController@index');
Route::get('admin/business/create', 'Admin\BusinessController@create');
Route::post('admin/business/store', 'Admin\BusinessController@store');
Route::get('admin/business/edit/{id}', 'Admin\BusinessController@edit');
Route::post('admin/business/update', 'Admin\BusinessController@update');
Route::get('admin/business/delete/{id}', 'Admin\BusinessController@delete');
Route::post('admin/business/update_status', 'Admin\BusinessController@update_status');

Route::resource('admin/service', 'Admin\ServiceController');

Route::get('admin/business/category', 'Admin\BusinesscategoryController@index');
Route::get('admin/business/category/create', 'Admin\BusinesscategoryController@create');
Route::post('admin/business/category/store', 'Admin\BusinesscategoryController@store');
Route::get('admin/business/category/edit/{id}', 'Admin\BusinesscategoryController@edit');
Route::post('admin/business/category/update', 'Admin\BusinesscategoryController@update');
Route::get('admin/business/category/delete/{id}', 'Admin\BusinesscategoryController@delete');

Route::get('admin/business/subcategory', 'Admin\BusinesscategoryController@subcategory');
Route::get('admin/business/subcategory/create', 'Admin\BusinesscategoryController@create');
Route::post('admin/business/subcategory/store', 'Admin\BusinesscategoryController@subcategory_store');
Route::get('admin/business/subcategory/edit/{id}', 'Admin\BusinesscategoryController@subcategory_edit');
Route::post('admin/business/subcategory/update', 'Admin\BusinesscategoryController@subcategory_update');
Route::get('admin/business/subcategory/delete/{id}', 'Admin\BusinesscategoryController@subcategory_delete');

Route::get('admin/business/payouts', 'Admin\OrderController@payouts');
Route::get('admin/business/payouts/edit/{id}', 'Admin\OrderController@payouts_edit');
Route::post('admin/business/payouts/update', 'Admin\OrderController@payouts_update');

Route::get('admin/coupon', 'Admin\CouponController@index');
Route::get('admin/coupon/create', 'Admin\CouponController@create');
Route::post('admin/coupon/store', 'Admin\CouponController@store');
Route::get('admin/coupon/edit/{id}', 'Admin\CouponController@edit');
Route::post('admin/coupon/update', 'Admin\CouponController@update');
Route::get('admin/coupon/delete/{id}', 'Admin\CouponController@delete');
Route::post('admin/coupon/update_status', 'Admin\CouponController@update_status');


Route::get('admin/homepage', 'Admin\HomepageController@index');
Route::get('admin/homepage/create', 'Admin\HomepageController@create');
Route::post('admin/homepage/store', 'Admin\HomepageController@store');
Route::get('admin/homepage/edit/{id}', 'Admin\HomepageController@edit');
Route::post('admin/homepage/update', 'Admin\HomepageController@update');
Route::get('admin/homepage/delete/{id}', 'Admin\HomepageController@delete');
Route::post('admin/homepage/update_status', 'Admin\HomepageController@update_status');

Route::get('admin/settings/', 'Admin\PagesController@index');
Route::post('admin/settings/update', 'Admin\PagesController@update');

Route::get('admin/customer', 'Admin\CustomerController@index');
Route::get('admin/customer/create', 'Admin\CustomerController@create');
Route::post('admin/customer/store', 'Admin\CustomerController@store');
Route::get('admin/customer/edit/{id}', 'Admin\CustomerController@edit');
Route::post('admin/customer/update', 'Admin\CustomerController@update');
Route::get('admin/customer/delete/{id}', 'Admin\CustomerController@delete');
Route::post('admin/customer/update_status', 'Admin\CustomerController@update_status');

Route::get('admin/blog', 'Admin\BlogController@index');
Route::get('admin/blog/create', 'Admin\BlogController@create');
Route::post('admin/blog/store', 'Admin\BlogController@store');
Route::get('admin/blog/edit/{id}', 'Admin\BlogController@edit');
Route::post('admin/blog/update', 'Admin\BlogController@update');
Route::get('admin/blog/delete/{id}', 'Admin\BlogController@delete');
Route::post('admin/blog/savefaq', 'Admin\BlogController@savefaq');

Route::get('admin/blog/category', 'Admin\BlogController@category_list');
Route::post('admin/blog/category/save', 'Admin\BlogController@category_save');
Route::get('admin/blog/category/edit/{id}', 'Admin\BlogController@category_edit');
Route::post('admin/blog/category/update', 'Admin\BlogController@category_update');
Route::get('admin/blog/category/delete/{id}', 'Admin\BlogController@category_delete');

Route::post('imageupload', [ImageController::class, 'storeImage'])->name('imageupload');

#--------------------------------END____ADMIN______BLOG_______ROUTE----------------------------------#

#--------------------------------START____ADMIN______NEWSLETTER_______ROUTE----------------------------------#
Route::get('admin/newsletter', 'Admin\NewsletterController@index');
Route::get('admin/newsletter/create', 'Admin\NewsletterController@create');
Route::post('admin/newsletter/store', 'Admin\NewsletterController@store');
Route::get('admin/newsletter/edit/{id}', 'Admin\NewsletterController@edit');
Route::post('admin/newsletter/update', 'Admin\NewsletterController@update');
Route::get('admin/newsletter/delete/{id}', 'Admin\NewsletterController@delete');
Route::post('admin/newsletter/update_status', 'Admin\NewsletterController@update_status');
#--------------------------------END____ADMIN______NEWSLETTER_______ROUTE----------------------------------#


#--------------------------------START____ADMIN______MARKUP_______ROUTE----------------------------------#
Route::get('admin/product/business-product', 'Admin\MarkupController@index');
Route::get('admin/product/business-product/edit/{id}', 'Admin\MarkupController@edit');
Route::post('admin/product/business-product/update_status', 'Admin\MarkupController@update_status');
#--------------------------------END____ADMIN______MARKUP_______ROUTE----------------------------------#
Route::resource('admin/seo', 'Admin\SeoController');
Route::resource('admin/page', PageController::class);

Route::get('admin/contact/view/{id}', 'Admin\AdminController@contact_view');
Route::get('admin/contact/delete/{id}', 'Admin\AdminController@contact_delete');

Route::get('admin/get_data', 'Admin\AdminController@get_data');
Route::get('admin/day_wise', 'Admin\AdminController@day_wise');
Route::get('admin/hour_wise', 'Admin\AdminController@hour_wise');
Route::get('admin/custom_range', 'Admin\AdminController@custom_range');

Route::get('product', 'HomeController@cart_page');
Route::get('get_cart', 'HomeController@get_cart');

#--------------------------------START____BUSINESS______ORDER_______ROUTE----------------------------------#
Route::get('business/order', 'Business\OrderController@index');
Route::get('business/order/details/{id}', 'Business\OrderController@details');
Route::get('business/order/delete/{id}', 'Business\OrderController@delete');
Route::post('business/update_order_status/', 'Business\OrderController@update_order_status');

Route::get('business/earning', 'Business\OrderController@earning');
Route::post('business/payout_request', 'Business\OrderController@payout_request');
#--------------------------------END____BUSINESS______ORDER_______ROUTE----------------------------------#

#--------------------------------START____BUSINESS______PRODUCT_______ROUTE------------------------------#
Route::get('business/product', 'Business\ProductController@index');
Route::get('business/product/create', 'Business\ProductController@create');
Route::post('business/product/store', 'Business\ProductController@store');
Route::get('business/product/edit/{id}', 'Business\ProductController@edit');
Route::post('business/product/update', 'Business\ProductController@update');
Route::get('business/product/delete/{id}', 'Business\ProductController@delete');
#--------------------------------END____BUSINESS______PRODUCT_______ROUTE----------------------------------#


#------------------------------START____BUSINESS______GALLERY_______ROUTE-----------------------------#
Route::get('business/gallery', 'Business\GalleryController@index');
Route::get('business/gallery/create', 'Business\GalleryController@create');
Route::post('business/gallery/store', 'Business\GalleryController@store');
Route::get('business/gallery/edit/{id}', 'Business\GalleryController@edit');
Route::post('business/gallery/update', 'Business\GalleryController@update');
Route::get('business/gallery/delete/{id}', 'Business\GalleryController@delete');

Route::get('business/gallery/category', 'Business\GalleryController@category');
Route::post('business/gallery/category/save', 'Business\GalleryController@category_save');
Route::get('business/gallery/category/edit/{id}', 'Business\GalleryController@category_edit');
Route::post('business/gallery/category/update', 'Business\GalleryController@category_update');
Route::get('business/gallery/category/delete/{id}', 'Business\GalleryController@category_delete');
#------------------------------END____BUSINESS______GALLERY_______ROUTE----------------------------------#


#------------------------------START____BUSINESS____TIMING_______ROUTE----------------------------------#
Route::resource('business/timing', 'Business\TimingController');

#------------------------------END____BUSINESS____TIMING_______ROUTE----------------------------------#





Route::get('business/profile', 'Business\BusinessController@profile');
Route::post('business/profile_update', 'Business\BusinessController@profile_update');
Route::post('business/password_update', 'Business\BusinessController@password_update');







Route::get('/customer_reg', 'HomeController@customer_reg');

Auth::routes(['verify' => true]);

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');


// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin1', 'Admin\AdminController@index')->name('admin');


Route::get('/superadmin', 'Admin\AdminController@index')->name('superadmin');
Route::post('/admin/contact/delete_all', 'Admin\AdminController@contact_delete_all');
Route::get('business', 'Business\BusinessController@index')->name('business');
// Route::get('/business', 'Business\BusinessController@index')->name('business1');
Route::get('/business1', function () {
    return "adf";
});




Route::get('/customer', 'Customer\CustomerController@index')->name('customer');
Route::get('/customer/orders', 'Customer\CustomerController@orders');
// Route::get('/customer/cart', 'Customer\CustomerController@cart');
Route::get('/customer/orders/details/{any}', 'Customer\CustomerController@orders_details');

Route::resource('/customer/address', 'Customer\AddressController');

Route::get('/customer/account', 'Customer\CustomerController@account');
Route::post('/customer/account/update', 'Customer\CustomerController@account_update');

#-----------------------------EMAIL-----------ROUTE-----------------------------#
Route::get('/send/email', 'HomeController@emailtest');
#-----------------------------EMAIL-----------ROUTE-----------------------------#


Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});

Route::resource('cart', 'CartController');

Route::post('cart/discount', 'CartController@discount');
Route::post('cart/remove_discount', 'CartController@remove_discount');

Route::get('show_cart', 'CartController@show_cart');
Route::get('checkout', 'OrderController@checkout');
Route::get('load_address/{id}', 'OrderController@load_address');
Route::post('place_order', 'OrderController@place_order');

Route::get('guest-checkout','GuestController@checkout');
Route::post('order-complete','GuestController@place_order');


Route::post('product_filter', 'ShopController@product_filter');
Route::get('cart_count', 'CartController@cart_count');
Route::get('cart_clear', 'CartController@cart_clear');

Route::get('paytm','PaymentController@index');
Route::post('payment/response', 'PaytmController@index');


Route::get('/', 'MainController@index')->name('home');
Route::get('/blogs', 'MainController@blogs')->name('blogs');


Route::get('/collections', 'MainController@collection')->name('collection');
Route::get('/about-the-brand', 'MainController@about')->name('about_the_brand');
Route::get('/faq', 'MainController@faq')->name('faq');
Route::get('/contact-us', 'MainController@contact')->name('contact');
Route::post('/contact-us', 'MainController@contact_save');
Route::get('sale', 'ShopController@sale')->name('sale');
Route::get('shop', 'ShopController@shop')->name('shop');
Route::post('quick_view', 'ShopController@quick_view');
Route::get('/blog/{slug}', 'MainController@blog_detail');

Route::get('sitemap.xml','MainController@sitemap');
Route::get('image-sitemap.xml','MainController@imagesitemap');

Route::post('review','MainController@savereview');
Route::get('{category1}/{category2}/{product}', 'ShopController@product_detail');
Route::get('{collection}/{category}', 'ShopController@index');
Route::get('{slug}', 'ShopController@category');
