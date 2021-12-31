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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('/','HomeController');

Route::get('/categories/{category_id}', ['as'=>'products_by_category', 'uses'=>
            'HomeController@getProducts'
]);

Route::get('/products/{productid}', ['as'=>'get_product', 'uses'=>
            'ProductController@get'
]);

// Route::get('', ['as'=>'add_category', 'uses'=>
//         'CategoryController@add']);

Route::group(['prefix' => 'manage'], function () {
    Route::resource('/','ManageController');

    Route::group(['namespace'=>'\App\Http\Controllers'], function () {
        Route::get('/categories','CategoryController@index');
        Route::get('/categories/add', ['as'=>'add_category_view', 'uses'=>
        'CategoryController@add_view']);
        Route::post('/categories/create',['as'=>'add_category', 'uses'=>
        'CategoryController@add']);
        Route::get('/categories/delete/{categoryid}',['as'=>'delete_category', 'uses'=>
        'CategoryController@delete']);
        Route::get('/categories/{categoryid}', ['as'=>'edit_category_view', 'uses'=>
        'CategoryController@edit_view']);
        Route::post('/categories/edit/{categoryid}', ['as'=>'edit_category', 'uses'=>
        'CategoryController@edit']);

        Route::get('/manufacturers','ManufacturerController@index');
        Route::get('/manufactures/add', ['as'=>'add_manufacturer_view', 'uses'=>
        'ManufacturerController@add_view']);
        Route::post('/manufactures/create',['as'=>'add_manufacturer', 'uses'=>
        'ManufacturerController@add']);
        Route::get('/manufactures/delete/{manufacturerid}',['as'=>'delete_manufacturer', 'uses'=>
        'ManufacturerController@delete']);
        Route::get('/manufacturers/{manufacturerid}', ['as'=>'edit_manufacturer_view', 'uses'=>
        'ManufacturerController@edit_view']);
        Route::post('/manufacturers/edit/{manufacturerid}', ['as'=>'edit_manufacturer', 'uses'=>
        'ManufacturerController@edit']);

        Route::get('/products','ProductController@index');
        Route::get('/products/add', ['as'=>'add_product_view', 'uses'=>
        'ProductController@add_view']);
        Route::post('/products/create', ['as'=>'add_product', 'uses'=>
        'ProductController@add']);
        Route::get('/products/delete/{productid}', ['as'=>'delete_product', 'uses'=>
        'ProductController@delete']);
        Route::get('/products/{productid}', ['as'=>'edit_product_view', 'uses'=>
        'ProductController@edit_view']);
        Route::post('/products/edit/{productid}', ['as'=>'edit_product', 'uses'=>
        'ProductController@edit']);
    });

});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

