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

//--------------------------Les Routes de Admine ---------------------------------------------------------------------------------------

Route::middleware(['auth', 'admine'])->group(function () {
    Route::get('/Home',[AdminController::class,'index'])->name('admine.home');
    Route::get('/Catégorie',[CategoryController::class,'index'])->name('catégorie.index');
    Route::post('/Catégorie/Ajouter',[CategoryController::class,'store'])->name('catégorie.sotre');
    Route::put('/Catégorie/Modifier/{categorie}',[CategoryController::class,'update'])->name('categorie.update');
    Route::delete('/Catégorie/Supprimer/{categorie}', [CategoryController::class, 'destroy'])->name('categorie.delete');
    });


//-------------------------------------------------------------------------------------------------------------------------------------


//-----------------------------Les Routes de Client----------------------------------------------------------------------------------

    Route::middleware(['auth', 'client'])->group(function () {
    Route::get('/index',[ClientController::class,'index'])->name('client.home');

    });

//---------------------------------------------------------------------------------------------------------------------------------------

//----------------------------------Les Routes de Organizateur--------------------------------------------------------------

    Route::middleware(['auth', 'organisateur'])->group(function () {
    Route::get('/Home',[OrganizateurController::class,'index'])->name('organisateur.home');     
        });




//--------------------------------------------------------------------------------------------------------------------------------------    

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/logout', function () {
    request()->session()->invalidate();
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/login');
})->name('logout.home');
require __DIR__.'/auth.php';
