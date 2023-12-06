<?php

use Illuminate\Support\Facades\Route;

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
