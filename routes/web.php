<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/admin', 'AdminController@index')->name('admin.login');

Route::post('/admin', 'AdminController@login');

Route::get('/logout', 'AdminController@logout')->name('admin.logout');

Route::get('/home', function () {
    if(Auth::check()){
        return view('home');
    } return redirect()->route('admin.login');
});

    //admin
Route::prefix('admin')->group(function () {
    //Category
    Route::prefix('categories')->group(function () {
        Route::get('/', [
            'as' => 'categories.index',
            'uses'=> 'CategoryController@index'
        ]);
        
        Route::get('/create', [
            'as' => 'categories.create',
            'uses'=> 'CategoryController@create'
        ]);
    
        Route::post('/store', [
            'as' => 'categories.store',
            'uses'=> 'CategoryController@store'
        ]);
    
        Route::get('/edit/{id}', [
            'as' => 'categories.edit',
            'uses'=> 'CategoryController@edit'
        ]);
    
        Route::post('/update/{id}', [
            'as' => 'categories.update',
            'uses'=> 'CategoryController@update'
        ]);
    
        Route::get('/del/{id}', [
            'as' => 'categories.del',
            'uses'=> 'CategoryController@delete'
        ]);
    });
    
    //Menu
    Route::prefix('menus')->group(function () {
        Route::get('/', [
            'as' => 'menus.index',
            'uses'=> 'MenuController@index'
        ]);
    
        Route::get('/create', [
            'as' => 'menus.create',
            'uses'=> 'MenuController@create'
        ]);
        
        Route::post('/store', [
            'as' => 'menus.store',
            'uses'=> 'MenuController@store'
        ]);
        
        Route::get('/edit/{id}', [
            'as' => 'menus.edit',
            'uses'=> 'MenuController@edit'
        ]);
    
        Route::post('/update/{id}', [
            'as' => 'menus.update',
            'uses'=> 'MenuController@update'
        ]);
    
        Route::get('/del/{id}', [
            'as' => 'menus.del',
            'uses'=> 'MenuController@destroy'
        ]);
    });

    //Product
    Route::prefix('product')->group(function () { 
        Route::get('/', [
            'as' => 'product.index',
            'uses'=> 'AdminProductController@index'
        ]);

        Route::get('/create', [
            'as' => 'product.create',
            'uses'=> 'AdminProductController@create'
        ]);

        Route::post('/store', [
            'as' => 'product.store',
            'uses'=> 'AdminProductController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'product.edit',
            'uses'=> 'AdminProductController@edit'
        ]);
        
        Route::post('/update/{id}', [
            'as' => 'product.update',
            'uses'=> 'AdminProductController@update'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'product.delete',
            'uses'=> 'AdminProductController@destroy'
        ]);
    });

    //Slider
        //Product
        Route::prefix('slider')->group(function () { 
            Route::get('/', [
                'as' => 'slider.index',
                'uses'=> 'SliderAdminController@index'
            ]);

            Route::get('/create', [
                'as' => 'slider.create',
                'uses'=> 'SliderAdminController@create'
            ]);

            Route::post('/store', [
                'as' => 'slider.store',
                'uses'=> 'SliderAdminController@store'
            ]);

            Route::get('/edit/{id}', [
                'as' => 'slider.edit',
                'uses'=> 'SliderAdminController@edit'
            ]);

            Route::post('/update/{id}', [
                'as' => 'slider.update',
                'uses'=> 'SliderAdminController@update'
            ]);

            Route::get('/delete/{id}', [
                'as' => 'slider.delete',
                'uses'=> 'SliderAdminController@destroy'
            ]);
        });

});


