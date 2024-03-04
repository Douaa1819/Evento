<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrganizateurController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/Home',[AdminController::class,'index'])->name('admine.home');

    Route::get('/index',[ClientController::class,'index'])->name('client.home');
    Route::get('/Home',[OrganizateurController::class,'index'])->name('organisateur.home');
    Route::get('/Catégorie',[CategoryController::class,'index'])->name('catégorie.index');
    Route::post('/Catégorie/Ajouter',[CategoryController::class,'store'])->name('catégorie.sotre');
    Route::put('/Catégorie/Modifier/{categorie}',[CategoryController::class,'update'])->name('categorie.update');
    Route::delete('/Catégorie/Supprimer/{categorie}', [CategoryController::class, 'destroy'])->name('categorie.delete');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
