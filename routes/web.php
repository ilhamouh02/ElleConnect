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


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
});


// --- Routes selon les rôles ---



// Routes pour les étudiants
Route::middleware(['auth', 'role:student'])->prefix('student')->name('student.')->group(function () {
    Route::get('/subscription', [SubscriptionController::class, 'index'])->name('subscription'); // Vue pour choisir un forfait et un câble
    Route::post('/subscribe', [SubscriptionController::class, 'store'])->name('subscribe'); // Enregistrer la souscription
    Route::get('/payment', [PaymentController::class, 'index'])->name('payment'); // Vue pour effectuer un paiement
    Route::get('/support', [SupportController::class, 'index'])->name('support'); // Vue pour signaler un problème technique
    Route::post('/support', [SupportController::class, 'store'])->name('support.submit'); // Envoyer un ticket de support
});

// Routes pour les administrateurs
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/users', [AdminController::class, 'users'])->name('users'); // Gestion des utilisateurs
    Route::get('/roles', [AdminController::class, 'roles'])->name('roles'); // Gestion des rôles
    Route::get('/products', [AdminController::class, 'products'])->name('products'); // Gestion des produits
    Route::get('/stats', [AdminController::class, 'stats'])->name('stats'); // Statistiques globales
    Route::get('/orders', [AdminController::class, 'orders'])->name('orders'); // Gestion des commandes
    Route::get('/invoices', [AdminController::class, 'invoices'])->name('invoices'); // Gestion des factures
});

// Routes pour les comptables
Route::middleware(['auth', 'role:accountant'])->prefix('accountant')->name('accountant.')->group(function () {
    Route::get('/payments', [AccountantController::class, 'payments'])->name('payments'); // Vue pour gérer les paiements
    Route::get('/invoices', [AccountantController::class, 'invoices'])->name('invoices'); // Vue pour gérer les factures
    Route::get('/orders', [AccountantController::class, 'orders'])->name('orders'); // Vue pour gérer les commandes (vérifier leur statut)
});

// Routes pour les techniciens
Route::middleware(['auth', 'role:technician'])->prefix('technician')->name('technician.')->group(function () {
    Route::get('/network', [TechnicianController::class, 'network'])->name('network'); // Vue pour surveiller les équipements réseau
    Route::get('/tickets', [TechnicianController::class, 'tickets'])->name('tickets'); // Vue pour gérer les incidents techniques
});

// Authentification Laravel Breeze
require __DIR__.'/auth.php';
