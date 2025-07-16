<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Suas rotas antigas
Route::get('/', [HomepageController::class, 'index']);
Route::get('/catalogue', [CatalogueController::class, 'index']);
Route::get('/product', [ProductController::class, 'index']);
Route::get('/user', [UserController::class, 'showUser']);
Route::get('/admin', [AdminController::class, 'index2']);
Route::get('/product/{id}', [CatalogueController::class, 'show'])->name('product.show');
Route::get('/add', [AdminController::class, 'create'])->name('pokemons.create');
Route::post('/pokemons/add', [AdminController::class, 'add'])->name('pokemons.add');
Route::delete('/pokemons/supprimer/{id}', [AdminController::class, 'delete'])->name('pokemons.delete');
Route::get('/pokemons/{id}/modifier', [AdminController::class, 'edit'])->name('pokemons.edit');
Route::put('/pokemons/{id}', [AdminController::class, 'update'])->name('pokemons.update');

// Rotas do Breeze para dashboard e perfil
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




/*
<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

*/