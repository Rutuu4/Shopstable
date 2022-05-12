<?php

declare(strict_types=1);

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\categoryDetailController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LinkDataController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PageBuilder;
use App\Http\Controllers\pageBuilderPreview;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDetails;
use App\Http\Controllers\ThemeBuilder;
use App\Http\Controllers\WebBuilderController;
use App\Models\Menubuilder;
use App\Models\Pages;
use App\Models\Themecolor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
 */

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {

    // Create subUser

    // Page Routing
    Route::get('/', function () {
        // $data = Pages::select('pageData')->first();
        $nav_item = Menubuilder::orderBy('nav_item_order', 'ASC')->get();
        $name = Pages::select('name')->first();
        // dd($data['pageData']);
        if (empty($nav_item)) {
            # code...
            return view('tenant');
        }
        if (!empty($nav_item)) {
            return view('tenant', ['nav_item' => $nav_item]);
        }
    });

    Route::put('/menubuilder_link', function (Request $request) {
        try {
            $nav_item_id = $request->nav_item_id;
            $nav_item_order = $request->nav_item_order;
            Menubuilder::where('nav_item_id', $nav_item_id)
                ->update(
                    [
                        // 'name' => $request->pageData,
                        'nav_item_id' => $nav_item_id,
                        'nav_item_order' => $nav_item_order
                    ]
                );
            Session::flash('message', 'Item successfully Updated!');
            return response()->json(['success' => "uploaded", 'nav_item_order' => $request->nav_item_order]);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage() . ' ' . $e->getLine()]);
        }
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
    Route::get('/publish_page/{id}', [DashboardController::class, 'show'])->middleware(['auth'])->name('dashboard.store');
    Route::put('/dashboard/update/{id}', [DashboardController::class, 'update'])->middleware(['auth'])->name('dashboard.update');
    Route::delete('/dashboard/delete/{id}', [DashboardController::class, 'delete'])->middleware(['auth'])->name('dashboard.delete');

    // Category Routing
    Route::get('/category', [CategoryController::class, 'show'])->middleware(['auth'])->name('category');
    Route::get('/addCategory', function () {
        return view('category.addCategory');
    })->middleware(['auth']);
    Route::post('/addCategory', [CategoryController::class, 'addCategory'])->middleware(['auth'])->name('addCategory');
    Route::post('/deleteCategory/{id}', [CategoryController::class, 'deleteCategory'])->middleware(['auth'])->name('deleteCategory');
    Route::post('dropzone/store', [CategoryController::class, 'dropzoneStore'])->name('dropzone.store');
    // Route::post('file-upload', [CategoryController::class, 'dropzoneFileUpload'])->name('dropzoneFileUpload');

    // Product API
    Route::get('/product', [ProductController::class, 'show'])->middleware(['auth'])->name('product');
    Route::get('/addProduct', [ProductController::class, 'show_category'])->middleware(['auth'])->name('add_product_route');
    Route::post('/addProduct', [ProductController::class, 'addProduct'])->middleware(['auth'])->name('addProduct');
    Route::post('/uploadProductImage', [ProductController::class, 'uploadProductImage'])->name('uploadProductImage');
    Route::post('/deleteProduct/{id}', [ProductController::class, 'deleteProduct'])->name('deleteProduct');

    // Pages
    Route::get('/pages', [
        PageController::class, 'show'
    ])->middleware(['auth'])->name('pages');
    Route::get('/addPages', function () {
        return view('pages.addPage');
    })->middleware(['auth']);
    Route::post('/addPages', [PageController::class, 'addPages'])->middleware(['auth'])->name('addPages');
    Route::get('/createPage/{id}', [PageController::class, 'createPage'])->middleware(['auth'])->name('createPage');
    Route::post('/pageData/{id}', [PageController::class, 'pageData'])->middleware(['auth'])->name('page_data');
    Route::get('/pageData/{id}', [PageController::class, 'pageData'])->middleware(['auth'])->name('page_data');
    Route::post('/savePage/{id}', [PageController::class, 'savePage'])->middleware(['auth'])->name('savePage');
    Route::post('/deletePage/{id}', [PageController::class, 'deletePage'])->middleware(['auth'])->name('deletePage');

    // builder
    Route::get('/web_builder/{id}', [
        WebBuilderController::class, 'show'
    ])->middleware(['auth'])->name('webBuilderShow');
    Route::get('/screenData/{id}', [WebBuilderController::class, 'screenData'])->middleware(['auth'])->name('builderPageData');
    Route::post('/web_builder/screenImageUpload/{id}', [WebBuilderController::class, 'imageUpload'])->middleware(['auth'])->name('screenImageUpload');
    Route::post('/web_builder/screenDataSave/{id}', [WebBuilderController::class, 'screenDataSave'])->middleware(['auth'])->name('screenDataSave');
    Route::get('/web_builder/screenDataLoad/{id}', [WebBuilderController::class, 'screenDataLoad'])->middleware(['auth'])->name('screenDataLoad');
    Route::get('/web_view/{id}', [WebBuilderController::class, 'webView'])->middleware(['auth'])->name('previewPageData');

    // Setting
    Route::view('/settings', 'setting.setting')->middleware(['auth'])->name('settings');
    Route::resource('themeBuilder', ThemeBuilder::class)->middleware(['auth']);

    // PageBuilder
    Route::resource('pageBuilder', PageBuilder::class)->middleware(['auth']);
    Route::resource('pageBuilderPreview', pageBuilderPreview::class)->middleware(['auth']);
    Route::resource('menuBuilder', MenuController::class)->middleware(['auth']);
    Route::resource('linkData', LinkDataController::class)->middleware(['auth']);
    Route::resource('productDetail', ProductDetails::class)->middleware(['auth']);
    Route::resource('categoryDetail', categoryDetailController::class)->middleware(['auth']);

    // Auth Routing

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.update');

    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
