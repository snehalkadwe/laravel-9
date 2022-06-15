<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HasmanyThroughRelController;
use App\Http\Controllers\ManytoMany\ProductController;
use App\Http\Controllers\PolyMorphRel\PostController;
use App\Http\Controllers\PolyMorphRel\VideoController;
use App\Http\Controllers\QRCode\QRCodeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard',[DashboardController::class, 'index'])
->middleware(['auth', 'verified'])->name('dashboard');

Route::get('qr-code', [QRCodeController::class, 'index']);
Route::get('qr-code-colored', [QRCodeController::class, 'colorQrCodeIndex']);
Route::get('image-qr-code', [QRCodeController::class, 'imageQr']);
Route::get('/hasmanythrough/example', [HasmanyThroughRelController::class, 'index'])
    ->name('hasmanythrough');
Route::get('/show/{team}', [HasmanyThroughRelController::class, 'show']);
// example of polymorphy
Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');
Route::get('/video/{video}', [VideoController::class, 'show'])->name('video.show');
// example of many to many
Route::get('category/product/{product}', [ProductController::class, 'show'])
->name('category.product');
Route::get('category/product/{product}', [ProductController::class, 'removeCategory'])
    ->name('category.product.delete');

Route::get('/{user}/impersonate', [DashboardController::class, 'impersonateUser'])
    ->name('impersonate');
Route::get('/leave-impersonate', [DashboardController::class, 'leaveImpersonateUser'])
    ->name('impersonate.leave');

// Route::impersonate();

require __DIR__.'/auth.php';
