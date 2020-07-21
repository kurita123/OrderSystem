<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('top');
});

// ユーザー
Route::namespace('User')->prefix('user')->name('user.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset'    => false,
        'verify'   => false
    ]);

    // ログイン認証後
    Route::middleware('auth:user')->group(function () {

        // TOPページ
        Route::resource('home', 'HomeController', ['only' => 'index']);

    });
});

// 管理者
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset'    => false,
        'verify'   => false
    ]);

    // ログイン認証後
    Route::middleware('auth:admin')->group(function () {

        // TOPページ
        Route::resource('home', 'HomeController', ['only' => 'index']);

    });

});

//発注元
//ユーザーホーム
Route::get('user/home', 'User\HomeController@index')->name('home');
Route::post('user/home', 'User\HomeController@update');
//発注先商品検索
Route::get ('user/company', 'ProductController@company')->name('company');
Route::post('user/company', 'ProductController@company');

//商品一覧
Route::get ('user/product', 'ProductController@index');
Route::post('user/product', 'ProductController@index');

//発注商品DB保存
Route::get('user/mycart', 'ProductController@myCart');
Route::post('user/mycart', 'ProductController@myCart');

//発注一覧検索結果
Route::post('user/history/confirm','CartController@index');

//発注一覧検索
Route::get ('user/history/search', 'CartController@add')->name('search');
Route::post('user/history/search', 'CartController@add');

//お問い合わせホーム
Route::get('user/inquiry/contact', 'InquiryController@contact')->name('contact');

//お問い合わせ確認
Route::post('user/inquiry/confirm', 'InquiryController@confirm');

//お問い合わせ完了
Route::post('user/inquiry/complete', 'InquiryController@complete');

//発注先
//発注先ホーム
Route::get ('admin/home', 'Admin\HomeController@index')->name('adminhome');
Route::post('admin/home', 'Admin\HomeController@update');

//発注一覧検索
Route::get ('admin/order/search', 'Admin\OrderController@search')->name('order');

//発注内容一覧
Route::post('admin/order/catalog', 'Admin\OrderController@catalog');

//商品一覧
Route::get ('admin/product/myproduct', 'Admin\ProductController@myproduct')->name('myproduct');

//商品変更
Route::get ('admin/product/change', 'Admin\ProductController@change');
Route::post('admin/product/change', 'Admin\ProductController@change');

//変更確認
Route::post('admin/product/check', 'Admin\ProductController@check');

//変更完了
Route::post('admin/product/confirm', 'Admin\ProductController@confirm');

//商品削除
Route::get ('admin/product/delete', 'Admin\ProductController@delete');

//削除確認
Route::post ('admin/product/delconf', 'Admin\ProductController@delconf');

//削除完了
Route::get ('admin/product/delcomplete', 'Admin\ProductController@delcomplete');

//商品追加
Route::get ('admin/product/addto', 'Admin\ProductController@addto')->name('addto');

//追加確認
Route::post ('admin/product/addtoconf', 'Admin\ProductController@addtoconf');

//追加完了
Route::post ('admin/product/addtocomplete', 'Admin\ProductController@addtocomplete');

//お問い合わせ検索
Route::get ('admin/inquiry/contact', 'Admin\InquiryController@contact')->name('admincontact');

//返信
Route::get ('admin/inquiry/reply', 'Admin\InquiryController@reply');
Route::post('admin/inquiry/reply', 'Admin\InquiryController@reply');

//返信確認
Route::post('admin/inquiry/confirm', 'Admin\InquiryController@confirm');

//返信完了
Route::post('admin/inquiry/complete', 'Admin\InquiryController@complete');

