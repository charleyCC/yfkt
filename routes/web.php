<?php

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

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::prefix('admin')->name('admin.')->group(function (){
    Route::get('index','Admin\IndexController@index')->name('home');

    //配置
    Route::group(['prefix'=>'config'],function(){
        Route::get('site','Admin\ConfigController@siteconfig')->name('config.siteconfig');
        Route::get('information','Admin\ConfigController@informationconfig')->name('config.informationconfig');
        Route::get('baidu','Admin\ConfigController@baiduconfig')->name('config.baiduconfig');
        Route::post('store','Admin\ConfigController@store')->name('config.store');
    });

    //新闻
    Route::resource('news','Admin\NewsController')->except('destroy');
    Route::get('news/{news}/del','Admin\NewsController@destroy')->name('news.delete');

    //产品分类
    Route::group(['prefix'=>'category'],function(){
        Route::get('/','Admin\CategoryController@index')->name('category.list');
        Route::match(['get','post'],'create','Admin\CategoryController@create')->name('category.create');
        Route::match(['get','post'],'{cate}/edit','Admin\CategoryController@edit')->name('category.edit');
        Route::get('{cate}/del','Admin\CategoryController@destroy')->name('category.delete');
    });

    //产品
    Route::resource('product','Admin\ProductController');

    //案例
    Route::resource('cases','Admin\CasesController');

    //图片上传接口
    Route::post('upload','Admin\IndexController@imgupload')->name('imgupload');

});