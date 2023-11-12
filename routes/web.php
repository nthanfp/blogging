<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\BiodataController;
use App\Models\Article;
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

// Route::get('/', function () {
//     return view('landing');
// });

// Auth
Auth::routes();

// Home
Route::get('/', LandingController::class)->name('landing');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Contact
Route::get('/contact-us', [ContactController::class, 'index'])->name('contact-us.index');
Route::post('/contact-us', [ContactController::class, 'store'])->name('contact-us.store');

// Articles
Route::resource('articles', ArticleController::class);

// Biodata
Route::get('/biodata', [BiodataController::class, 'show'])->name('biodata.show');
Route::get('/biodata/edit', [BiodataController::class, 'edit'])->name('biodata.edit');
Route::put('/biodata/edit', [BiodataController::class, 'update'])->name('biodata.update');
