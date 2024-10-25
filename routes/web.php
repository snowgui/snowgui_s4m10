<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CDHCategoria\CDHCategoriaController;
use App\Http\Controllers\CDHFramework\CDHFrameworkController;
use App\Http\Controllers\CDHLang\CDHLangController;
use App\Http\Controllers\CDHSo\CDHSoController;
use App\Http\Controllers\CodeHelper\CodeHelperController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Book\BookController;
use App\Http\Controllers\CDHTool\CDHToolController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the 'web' middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('s4m01')->middleware('auth')->group(function () {
//Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/usuarios', [UserController::class, 'index'])->name('user.index');
    Route::get('/usuarios/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/usuarios/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/usuarios/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/usuarios/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/usuarios/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    Route::get('/perfil/edit', [UserController::class, 'perfil_edit'])->name('perfil.edit');
    Route::put('/perfil/update/{id}', [UserController::class, 'perfil_update'])->name('perfil.update');

    Route::resource('CodeHelper', CodeHelperController::class);
    Route::get('getCode', [CodeHelperController::class, 'getCode'])->name('code.helper.getcode');

    Route::resource('CDHCategoria', CDHCategoriaController::class);

    Route::resource('CDHLang', CDHLangController::class);

    Route::resource('CDHFramework', CDHFrameworkController::class);

    Route::resource('CDHTool', CDHToolController::class);

    Route::resource('CDHSo', CDHSoController::class);

    Route::resource('Book', BookController::class);

});