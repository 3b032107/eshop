<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartItemController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
/*  路由名稱      所使用的URL               HTTP方法     所串接的控制器&方法
products.index   Products                 GET           HEAD
products.show    Products/{Product}       GET           HEAD
products.create  Products/create          GET           HEAD
products.store   Products                 POST          POST
products.edit    Products/{Product}/edit  GET           HEAD
products.update  Products/{Product}       PUT           PATCH
products.destroy Products/{Product}       DELETE        DELETE
                   各路由應該有的作用
products.index     顯示所有products資料
products.show      顯示單筆products資料
products.create    指新增products頁面
products.store     新增products頁面後儲存
products.edit      編輯products頁面
products.update    更新products資料
products.destroy   刪除products資料
*/
/*
Route::resource('Products', ProductController::class)->only([
	'index','show','store','update','destroy'
]);
*/
Route::get('Products', [ProductController::class, 'index']);
Route::get('Products/create', [ProductController::class, 'create']);
Route::get('Products/{Product}', [ProductController::class, 'show']);
Route::post('Products', [ProductController::class, 'store']);
Route::get('Products/{Product}/edit', [ProductController::class, 'edit']);
Route::patch('Products/{Product}', [ProductController::class, 'update']);
Route::delete('Products/{Product}', [ProductController::class, 'destroy']);

Route::resource('cart_items',CartItemController::class)->middleware(['auth','verified']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

