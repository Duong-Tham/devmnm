<?php
use Illuminate\Support\Facades\Route;

use App\Models\Category;
use Symfony\Component\Mailer\Transport\Smtp\Auth\LoginAuthenticator;


Route::get('/', 'App\Http\Controllers\ADminController@login');

Route::post('/', 'App\Http\Controllers\ADminController@postlogin');

Route::get('/home',[ 'as'=> 'home',function () {
    return view(' home');
    
}] );

Route::prefix('categories')->group(function () {
    Route::get('/',[ 'as' => 'categories.index', 
    'uses'=> 'App\Http\Controllers\CategoryController@index'
    ]);

    Route::get('/create',[ 
        'as' => 'categories.create', 
        'uses'=> 'App\Http\Controllers\CategoryController@create'
    ]);

    Route::post('/store',[ 
        'as' => 'categories.store', 
        'uses'=> 'App\Http\Controllers\CategoryController@store'
    ]);

    Route::get('/edit/{id}',[ 'as' => 'categories.edit', 
    'uses'=> 'App\Http\Controllers\CategoryController@edit'
    ]);

    Route::get('/update/{id}',[ 'as' => 'categories.update', 
    'uses'=> 'App\Http\Controllers\CategoryController@update'
    ]);

    Route::get('/delete/{id}',[ 'as' => 'categories.delete', 
    'uses'=> 'App\Http\Controllers\CategoryController@delete'
    ]);
});

Route::prefix('product')->group(function (){

    Route::get('/',[ 
    'as' => 'product.index', 
    'uses'=> 'App\Http\Controllers\ProductController@index'
    ]);
    Route::get('/create',[ 
        'as' => 'product.add', 
        'uses'=> 'App\Http\Controllers\ProductController@create'
    ]);
    Route::post('/store',[ 
        'as' => 'product.store', 
        'uses'=> 'App\Http\Controllers\ProductController@store'
    ]);
    Route::get('/edit/{id}',[ 
        'as' => 'product.edit', 
        'uses'=> 'App\Http\Controllers\ProductController@edit'
    ]);
    Route::post('/update/{id}',[ 
        'as' => 'product.update', 
        'uses'=> 'App\Http\Controllers\ProductController@update'
    ]);
    Route::get('/delete/{id}',[ 
        'as' => 'product.delete', 
        'uses'=> 'App\Http\Controllers\ProductController@delete'
    ]);
});

Route::prefix('user')->group(function (){
    Route::get('/', [
        'as' => 'user.index',
        'uses' => 'App\Http\Controllers\AdminUserController@index'
    ]);

});