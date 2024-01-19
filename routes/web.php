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

// Display login form
Route::get('login', [CustomAuthController::class, 'showAuthForm'])->name('login');

// Handle login submission
Route::post('login', [CustomAuthController::class, 'processLogin'])->name('login.custom');

// Display registration form
Route::get('register', [CustomAuthController::class, 'showRegistrationForm'])->name('register');

// Handle registration submission
Route::post('register', [CustomAuthController::class, 'processRegistration'])->name('register.custom');

// Handle logout action
Route::post('logout', [CustomAuthController::class, 'logout'])->name('logout');

// Approve an article
Route::post('/articles/{id}/approve', [ArticleController::class, 'approve'])->name('articles.approve');

// Reject an article
Route::post('/articles/{id}/reject', [ArticleController::class, 'reject'])->name('articles.reject');

// Display public homepage
Route::get('/', function () {
    $articles = App\Models\Article::all();
    return view('welcome', compact('articles'));
});

// Dashboard access and article management for editor and jurnalist
Route::middleware(['auth', 'checkrole:editor,jurnalist'])->group(function () {
    Route::get('/dashboard', [ArticleController::class, 'index'])->name('dashboard');
    Route::resource('articles', ArticleController::class);
});

