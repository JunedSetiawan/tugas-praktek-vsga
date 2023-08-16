<?php

use App\Http\Controllers\Activiy\ActivityController;
use App\Http\Controllers\GetImageFileController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::middleware('splade')->group(function () {
    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

    Route::get('/', [HomeController::class, 'index'])->name('main');

    Route::get('activity/{id}', [ActivityController::class, 'show'])->name('activity.show');
    Route::get('{folder?}/{image}', [GetImageFileController::class, 'index'])->name('get.image');


    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', function () {
            return view('pages.dashboard.dashboard');
        })->middleware(['verified'])->name('dashboard');
        Route::get('/test', function () {
            return view('pages.activity.add');
        })->middleware(['verified'])->name('test');

        Route::get('/activity', [ActivityController::class, 'index'])->name('activity.index');
        Route::get('create', [ActivityController::class, 'create'])->name('create');
        Route::group(['prefix' => 'activity', 'as' => 'activity.'], function () {

            Route::post('store', [ActivityController::class, 'store'])->name('store');
            Route::get('edit/{id}', [ActivityController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [ActivityController::class, 'update'])->name('update');
        });

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // require __DIR__ . '/documentation.php';
    require __DIR__ . '/auth.php';
});
