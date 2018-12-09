<?php

/*Xampp\apache\conf\extra
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'DemoController@getProductsIndex')->name('home');

Route::get('auth/facebook', 'Auth\UserController@redirectToFacebook')->name('auth.facebook');
Route::get('auth/facebook/callback', 'Auth\UserController@handleFacebookCallback');

// liên kết giữa các trang
Route::get('mens', 'DemoController@mens');
Route::get('womens', 'DemoController@womens');
Route::get('about', 'DemoController@about');
Route::get('contact', 'DemoController@contact');



Auth::routes();
// sau khi dang nhap, neu la user se chuyen ve trang home


Route::group(['prefix' => '/'], function () {

    Route::get('home', 'DemoController@getProductsIndex')->name('home');

	// Get Products
	Route::get('womens', 'DemoController@getProducts');
	//hien thi san pham theo category
	Route::get('category/{id}', 'DemoController@category');
	// chi tiet san pham
	Route::get('detail/{id}', ['as' => 'detail', 'uses' => 'DemoController@detail']);
	// tim kiem san pham
	Route::get('search', 'DemoController@getSearch');

   // liên hệ
   Route::get('contact', ['as' => 'getContact', 'uses' => 'DemoController@getContact']);
   Route::post('contact', ['as' => 'getContact', 'uses' => 'DemoController@postContact']);

   // giỏ hàng
   Route::get('buy-item/{id}', ['as' => 'shopingcart', 'uses' => 'CartController@shopingcart']);
   Route::get('shoping-cart', ['as' => 'cart', 'uses' => 'CartController@cart']);
   Route::get('delete-product/{id}', ['as' => 'deleteproduct', 'uses' => 'CartController@deleteproduct']);

   // lưu giỏ hàng vào db
   Route::get('checkout', 'CartController@getCheckOut');
   Route::post('checkout', 'CartController@postCheckOut');


   // quan li gio hang

   // chuc nang comment
    Route::post('comment/{id}', ['as' => 'comment', 'uses' =>  'DemoController@postComment']);

   // chuc nang sap xep
   Route::get('sortByPrice', ['as' => 'sortByPrice', 'uses' => 'DemoController@sortByPrice']);


});

   Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
   		Route::group(['prefix' => 'product'], function () {
   			Route::get('add', ['as'=>'admin/product/getAdd' , 'uses' => 'ProductController@getAdd']);
            Route::post('add', ['as'=>'admin/product/postAdd' , 'uses' => 'ProductController@postAdd']);
   			Route::get('list', ['as'=>'admin/product/getList' , 'uses' => 'ProductController@getList']);
            Route::get('delete/{id}', ['as'=>'admin/product/getDelete' , 'uses' => 'ProductController@getDelete']);
            Route::get('edit/{id}', ['as'=>'admin/product/getEdit' , 'uses' => 'ProductController@getEdit']);
            Route::post('edit/{id}', ['as'=>'admin/product/postEdit' , 'uses' => 'ProductController@postEdit']);
   		});

   		Route::group(['prefix' => 'cate'], function () {
   			Route::get('add', ['as'=>'admin.cate.getAdd' , 'uses' => 'CategogiesController@getAdd']);
   			Route::post('add', ['as'=>'admin.cate.postAdd' , 'uses' => 'CategogiesController@postAdd']);
   			Route::get('list', ['as'=>'admin.cate.list' , 'uses' => 'CategogiesController@getList']);
   			Route::get('delete/{id}', ['as'=>'admin/cate/getDelete' , 'uses' => 'CategogiesController@getDelete']);
   			Route::get('edit/{id}', ['as'=>'admin/cate/getEdit' , 'uses' => 'CategogiesController@getEdit']);
   			Route::post('edit/{id}', ['as'=>'admin/cate/postEdit' , 'uses' => 'CategogiesController@postEdit']);
   		});

         Route::group(['prefix' => 'user'], function () {
            Route::get('add', ['as'=>'admin.user.getAdd' , 'uses' => 'UserController@getAdd']);
            Route::post('add', ['as'=>'admin.user.postAdd' , 'uses' => 'UserController@postAdd']);
            Route::get('list', ['as'=>'admin.user.list' , 'uses' => 'UserController@getList']);
            Route::get('delete/{id}', ['as'=>'admin/user/getDelete' , 'uses' => 'UserController@getDelete']);
            Route::get('edit/{id}', ['as'=>'admin/user/getEdit' , 'uses' => 'UserController@getEdit']);
            Route::post('edit/{id}', ['as'=>'admin/user/postEdit' , 'uses' => 'UserController@postEdit']);
         });

          Route::group(['prefix' => 'comment'], function () {
          
            Route::get('list', ['as'=>'admin.comment.list' , 'uses' => 'DemoController@getListCmt']);
            Route::get('delete/{id}', ['as'=>'admin/comment/getDelete' , 'uses' => 'DemoController@getDeleteCmt']);
           
         });


          Route::group(['prefix' => 'shoping-cart'], function () {
          
            Route::get('list', ['as'=>'admin/shoping-cart/list' , 'uses' => 'CartController@getListCart']);
            Route::get('listDetail/{id}', ['as'=>'admin/shoping-cart/listDetail' , 'uses' => 'CartController@getListDetail']);
            
            Route::get('delete/{id}', ['as'=>'admin/shoping-cart/getDelete' , 'uses' => 'CartController@getDeleteBill']);
           
         });
});

         
 

