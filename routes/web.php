<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DefaultController;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\GaleriController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\UserAuthController;




Route::get('/', function () {
    return view('newpage');
});
//Route::get('ninja',           'App\Http\Controllers\Backend\DefaultController@index')->name('ninja.index');

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

    });
});
});
Route::middleware(['admin'])->group(function(){
Route::namespace('App\Http\Controllers\Backend')->group(function(){
    Route::prefix('ninja')->group(function(){
        Route::resource('blog', 'BlogController');
        Route::post('test', 'BlogController@sortable')->name('blog.sortable');
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
    });
});
});


