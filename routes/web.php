<?php

Route::get('/', function () {
    return view('welcome');
}); 

Route::group(['namespace' => 'AdminAuth'], function() {

    Route::group(['prefix' => 'authadmin','middleware'=>'adminCheckLogin'], function()
    {
        Route::get('login','AuthController@getLogin');
        Route::post('login','AuthController@postLogin');
    });
    
    // Route::get('admin/register','AuthController@getRegister');
    // Route::post('admin/register','AuthController@postRegister');

    Route::get('admin/dashboard','AdminAuthController@getIndex');
    Route::get('admin/logout','AdminAuthController@getLogout');

    Route::get('admin/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('admin/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

    Route::get('admin/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('admin/password/reset', 'ResetPasswordController@reset');
});

Route::group(['namespace' => 'AdminManager'], function() {
    Route::get('login','UserController@getDangNhap');
    Route::post('login','UserController@postDangNhap');

    Route::get('logout','UserController@getUserLogout');

});


Route::group(['namespace' => 'AdminManager'], function() {

    Route::group(['prefix' => 'admin', 'middleware'=>'adminCheckLogout'], function() {

        Route::group(['prefix' => 'ckfinder'], function() {
            Route::get('view', 'CkfinderController@getCkfinder');
            Route::any('connector', 'CkfinderController@getConnector');
        });
        
        /* Product*/
        Route::group(['prefix' => 'product'], function() {
            Route::get('list', 'ProductController@getList');
            Route::get('add', 'ProductController@getAdd');
            Route::post('add', 'ProductController@postAdd');
            Route::get('edit/{id}', 'ProductController@getEdit');
            Route::post('edit/{id}', 'ProductController@postEdit');
            Route::get('delete/{id}', 'ProductController@getDelete');
            Route::get('view-history-pro/{id}', 'ProductController@getHistory');
        });

        /* Bill*/
        Route::group(['prefix' => 'bill'], function() {
            Route::get('list', 'BillController@getList');
            // Route::get('add', 'BillController@getAdd');
            // Route::post('add', 'BillController@postAdd');
            Route::get('edit/{id}', 'BillController@getEdit');
            Route::post('edit/{id}', 'BillController@postEdit');
            Route::get('delete/{id}', 'BillController@getDelete');
            Route::get('view-bill-detail/{id}', 'BillController@getBillDetail');
        });


        /*------------------------------------------------------------------*/
        /* Category Group*/
        Route::group(['prefix' => 'categorygroup'], function() {
            Route::get('list', 'CategoryGroupController@getList');
            Route::get('add', 'CategoryGroupController@getAdd');
            Route::post('add', 'CategoryGroupController@postAdd');
            Route::get('edit/{id}', 'CategoryGroupController@getEdit');
            Route::post('edit/{id}', 'CategoryGroupController@postEdit');
            Route::get('delete/{id}', 'CategoryGroupController@getDelete');
            Route::get('view-history-cate-group/{id}', 'CategoryGroupController@getHistory');
        });

        /* Category Product*/
        Route::group(['prefix' => 'categoryproduct'], function() {
            Route::get('list', 'CategoryProductController@getList');
            Route::get('add', 'CategoryProductController@getAdd');
            Route::post('add', 'CategoryProductController@postAdd');
            Route::get('edit/{id}', 'CategoryProductController@getEdit');
            Route::post('edit/{id}', 'CategoryProductController@postEdit');
            Route::get('delete/{id}', 'CategoryProductController@getDelete');
            Route::get('view-history-cate-product/{id}', 'CategoryProductController@getHistory');
        });

        /* Slide*/
        Route::group(['prefix' => 'slide'], function() {
            Route::get('list', 'SlideController@getList');
            Route::get('add', 'SlideController@getAdd');
            Route::post('add', 'SlideController@postAdd');
            Route::get('edit/{id}', 'SlideController@getEdit');
            Route::post('edit/{id}', 'SlideController@postEdit');
            Route::get('delete/{id}', 'SlideController@getDelete');
            Route::get('view-history-slide/{id}', 'SlideController@getHistory');
        });

        /* Size*/
        Route::group(['prefix' => 'size'], function() {
            Route::get('list', 'SizeController@getList');
            Route::get('add', 'SizeController@getAdd');
            Route::post('add', 'SizeController@postAdd');
            Route::get('edit/{id}', 'SizeController@getEdit');
            Route::post('edit/{id}', 'SizeController@postEdit');
            Route::get('delete/{id}', 'SizeController@getDelete');
            Route::get('view-history-size/{id}', 'SizeController@getHistory');
        });

        /*User*/
        Route::group(['prefix' => 'user'], function() {
            Route::get('list', 'UserController@getList');
            Route::get('add', 'UserController@getAdd');
            Route::post('add', 'UserController@postAdd');
            Route::get('edit/{id}', 'UserController@getEdit');
            Route::post('edit/{id}', 'UserController@postEdit');
            Route::get('delete/{id}', 'UserController@getDelete');
        });
    });


});

/*Giỏ hàng*/

Route::resource('/cart','CartController');


Route::group(['namespace' => 'UserController'], function() {
    Route::get('/tatcasanpham/{id}','BeforeCartController@getViewProduct')->name('tatcasanpham');
    Route::get('/chitietsanpham/{id}','BeforeCartController@viewDetailProduct')->name('chitietsanpham');;


});


// Login fb
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 
    'Auth\LoginController@handleProviderCallback');