<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DefaultController;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\GaleriController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\UserAuthController;
use App\Http\Controllers\API\ProductAPIController;
use App\Http\Controllers\API\BlogAPIController;
use App\Http\Controllers\API\GaleriAPIController;
use App\Http\Controllers\API\SliderAPIController;



Route::namespace('App\Http\Controllers\Backend')->group(function(){
    Route::prefix('ninja')->group(function(){
        Route::get('/', 'DefaultController@login')->name('ninja.login');
        Route::get('/logout', 'DefaultController@logout')->name('ninja.logout');
        Route::post('/loggin', 'DefaultController@authentication')->name('ninja.auth');
        


    });   
});
Route::middleware(['admin'])->group(function(){
Route::namespace('App\Http\Controllers\Backend')->group(function(){
    Route::prefix('ninja')->group(function(){
        Route::get('/dashboard', 'DefaultController@index')->name('ninja.index');
        Route::get('/settings', 'SettingsController@index')->name('ninja.settings');
        Route::post('', 'SettingsController@sortable')->name('ninja.sortable');
        Route::get('/delete/{id}', 'SettingsController@destroy')->name('ninja.destroy');
        Route::get('/edit/{id}', 'SettingsController@edit')->name('ninja.edit');
        Route::post('/update{id}', 'SettingsController@update')->name('ninja.update');
    });
});
});
Route::middleware(['admin'])->group(function(){
Route::namespace('App\Http\Controllers\Backend')->group(function(){
    Route::prefix('ninja')->group(function(){
        Route::resource('products', 'ProductController');
        Route::post('sortable', 'ProductController@sortable')->name('products.sortable');
        Route::get('product-edit{id}', 'ProductController@edit')->name('product.edit');
        Route::post('product-update{id}', 'ProductController@update')->name('product.update');

    });
});
});
Route::middleware(['admin'])->group(function(){
Route::namespace('App\Http\Controllers\Backend')->group(function(){
    Route::prefix('ninja')->group(function(){
        Route::resource('blog', 'BlogController');
        Route::post('test', 'BlogController@sortable')->name('blog.sortable');
        Route::get('blog-edit{id}', 'BlogController@edit')->name('blog.edit');
        Route::post('blog-update{id}', 'BlogController@update')->name('blog.update');
    });
});
});
Route::middleware(['admin'])->group(function(){
    Route::namespace('App\Http\Controllers\Backend')->group(function(){
        Route::prefix('ninja')->group(function(){
            Route::resource('messages', 'MessageController');
            Route::get('messages/{id}', 'MessageController@destroy')->name('message.destroy');
        });
    });
    });
Route::middleware(['admin'])->group(function(){
Route::namespace('App\Http\Controllers\Backend')->group(function(){
    Route::prefix('ninja')->group(function(){
        Route::resource('slider', 'SliderController');
        Route::post('test2', 'SliderController@sortable')->name('slider.sortable');
    });
});
});

Route::middleware(['admin'])->group(function(){
Route::namespace('App\Http\Controllers\Backend')->group(function(){
    Route::prefix('ninja')->group(function(){
        Route::resource('galeri', 'GaleriController');
        Route::post('galerisorting', 'GaleriController@sortable')->name('galeri.sortable');
    });
});
});

Route::middleware(['admin'])->group(function(){
Route::namespace('App\Http\Controllers\Backend')->group(function(){
    Route::prefix('ninja')->group(function(){
        Route::resource('user', 'UserController');
        Route::post('usersorting', 'UserController@sortable')->name('user.sortable');
        Route::get('user-edit{id}', 'UserController@edit')->name('user.edit');
        Route::post('user-update{id}', 'UserController@update')->name('user.update');
    });
});
});



Route::namespace('App\Http\Controllers\Front')->group(function(){
    Route::prefix('/')->group(function(){
        Route::redirect("/", "tr");
        Route::get('{lang}', 'DefaultIndexController@index')->name("home");
        Route::get('{lang}/blog', 'BlogController@index')->name('blog');
        Route::get('{lang}/blog-detail/{slug}', 'BlogController@detail');
        Route::get('/{lang}/about', 'AboutController@index')->name('about');
        Route::get('/{lang}/services', 'ServicesController@index')->name('services');
        Route::get('/{lang}/products', 'ProductController@index')->name('products');
        Route::get('/{lang}/category/{slug}', 'ProductController@category');
        Route::get('/{lang}/contact', 'ContactController@index')->name('contact');
        Route::post("/", 'ContactController@store')->name('store');

    });
});

Route::middleware(['admin'])->group(function(){
Route::namespace('App\Http\Controllers\Backend')->group(function(){
    Route::prefix('ninja')->group(function(){
         Route::resource('category', 'CategoryController');
        Route::post('categorysorting', 'CategoryController@sortable')->name('category.sortable');
    });
});
});

//Route::get('ninja',           'App\Http\Controllers\Backend\DefaultController@index')->name('ninja.index');
Route::namespace('App\Http\Controllers\API')->group(function(){
    Route::prefix('api')->group(function(){
        Route::get('product', 'ProductAPIController@index');
        Route::get('blog', 'BlogAPIController@index');
        Route::get('galeri', 'GaleriAPIController@index');
        Route::get('slider', 'SliderAPIController@index');
        
    });
});



