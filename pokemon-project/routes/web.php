<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RedirectController;
use Illuminate\Support\Facades\Route;


// Routes publiques


// Homegae
Route::get('/', [HomepageController::class, 'index'])->name('home');

// Catalogue
Route::get('/catalogue', [CatalogueController::class, 'index'])->name('catalogue');

// Produits
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/product/{id}', [CatalogueController::class, 'show'])->name('product.show');


// Route redirect aprés login
Route::get('/redirect', [RedirectController::class, 'redirectUser'])->middleware('auth')->name('redirect');

// Dashboard (utilisateurs apres login)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Page utilisateur
Route::get('/user', [UserController::class, 'showUser'])->middleware('auth')->name('user');

// Profile utilisateur
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'admin'])->group(function () {
    // Page Admin
    Route::get('/admin', [AdminController::class, 'index2'])->name('admin');
    
    // Nouvelle page de gestion via dashboard
    Route::get('/admin/pokemons', [AdminController::class, 'index'])->name('admin.pokemons.index');
    
    // Formulaire pour ajouter un nouveau Pokémon
    Route::get('/add', [AdminController::class, 'create'])->name('pokemons.create');
    Route::post('/pokemons/add', [AdminController::class, 'add'])->name('pokemons.add');
    
    // Eliminer Pokémon
    Route::delete('/pokemons/supprimer/{id}', [AdminController::class, 'delete'])->name('pokemons.delete');
    
    // Modifier pokemon
    Route::get('/pokemons/{id}/modifier', [AdminController::class, 'edit'])->name('pokemons.edit');
    Route::put('/pokemons/{id}', [AdminController::class, 'update'])->name('pokemons.update');
});


require __DIR__.'/auth.php';