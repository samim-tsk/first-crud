<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserProfileController;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:admin')->group(function () {
    Route::get('/', function () {
        $categories = Category::count();
        $brands = Brand::count();
        return view('index', compact('categories', 'brands'));
    })->name('dashboard');

    Route::controller(CategoryController::class)->prefix('categories')->name('categories.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/list', 'list')->name('list');
        Route::post('/', 'store')->name('store');
        Route::post('{id}', 'update')->name('update');
        Route::get('{id}', 'destroy')->name('destroy');
    });

    Route::controller(BrandController::class)->prefix('brands')->name('brands.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/list', 'list')->name('list');
        Route::post('store/', 'store')->name('store');
        Route::post('update/{id}', 'update')->name('update');
        Route::get('delete/{id}', 'destroy')->name('destroy');
    });

    Route::controller(UserProfileController::class)->name('profile.')->group(function () {
        Route::get('/admin-profile', 'index')->name('index');
        Route::post('/admin-profile', 'update')->name('update');
    });


    // 
    Route::get('/all-routes', function () {
        $routes = \Route::getRoutes();

        $routeList = [];

        foreach ($routes as $route) {
            if (in_array('GET', $route->methods())) {
                $routeList[] = [
                    'uri'    => $route->uri,
                    'name'   => $route->getName(),
                    'method' => implode(', ', $route->methods())
                ];
            }
        }

        return response()->json($routeList);
    });
    // 


});

require_once __DIR__ . '/auth.php';
