<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
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
})->name('welcome');

// Pages supplémentaires
Route::get('/home', function () {
    return view('pages.home');
})->name('home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

// Tableau de bord (accessible uniquement aux utilisateurs authentifiés)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Gestion du profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes CRUD pour les ressources (authentification obligatoire)
Route::middleware(['auth'])->group(function () {
    Route::resource('roles', RoleController::class); // Gestion des rôles
    Route::resource('logements', LogementController::class); // Gestion des logements
    Route::resource('payment_methods', PaymentMethodController::class); // Méthodes de paiement
    Route::resource('prises', PriseController::class); // Gestion des prises
    Route::resource('products', ProductController::class); // Gestion des produits
    Route::resource('users', UserController::class); // Gestion des utilisateurs
    Route::resource('statuses', StatusController::class); // Gestion des statuts
    Route::resource('orders', OrderController::class); // Gestion des commandes
    Route::resource('contenirs', ContenirController::class); // Gestion des contenus
});

// Authentification avec Laravel Breeze
require __DIR__ . '/auth.php';
