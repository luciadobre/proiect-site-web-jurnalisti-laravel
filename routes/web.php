<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ArticleController;

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

Route::get('login', [CustomAuthController::class, 'showAuthForm'])->name('login');
Route::post('login', [CustomAuthController::class, 'processLogin'])->name('login.custom');
Route::get('register', [CustomAuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [CustomAuthController::class, 'processRegistration'])->name('register.custom');
Route::post('logout', [CustomAuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('welcome');
});

// Protected Dashboard Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [ArticleController::class, 'index'])->name('dashboard');
});
