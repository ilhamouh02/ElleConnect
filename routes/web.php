<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\LogementController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\PriseController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContenirController;
use Illuminate\Support\Facades\Route;


// Page d'accueil
Route::get('/', function () {
    return view('welcome');
});


// Routes pour les pages statiques (si nécessaire)

// Route::get('/about', function () {
//     return view('pages.about');
// });

// Route::get('/contact', function () {
//     return view('pages.contact');
// });







// Routes pour les ressources (CRUD)
Route::resource('roles', RoleController::class);
Route::resource('logements', LogementController::class);
Route::resource('payment-methods', PaymentMethodController::class);
Route::resource('prises', PriseController::class);
Route::resource('products', ProductController::class);
Route::resource('users', UserController::class);
Route::resource('statuses', StatusController::class);
Route::resource('orders', OrderController::class);
Route::resource('contenirs', ContenirController::class);



// Routes pour le tableau de bord et le profil (protégées par authentification)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
