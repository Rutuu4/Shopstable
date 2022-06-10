<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisteredTenantController;
use App\Http\Controllers\TenantController;
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

Route::get('tenant', [TenantController::class, 'index']);
Route::get('/', function () {
    return view('welcome');
});

// require __DIR__ . '/auth.php';
// register create a tenant
Route::get('/register', [RegisteredTenantController::class, 'create']);
Route::post('/register', [RegisteredTenantController::class, 'store']);
Route::get('/admin/login', [AdminController::class, 'login'])->name('auth.login');
Route::post('/admin/save', [AdminController::class, 'save'])->name('auth.save');
