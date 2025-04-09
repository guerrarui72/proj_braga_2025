<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
    //echo("hello world");

});


Route::get('/sobre', function(){
    echo('Sobre a minha página');
});

Route::get('/main/{value}',[MainController::class,('index')]);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    //Rotas para os clientes
    // Route::get('/clientes', [ClienteController::class,'index'])->name('clientes.index');
    // Route::get('/clientes_show/{id}',[ClienteController::class,'show'])->name('clientes.show');
    // Route::get('/clientes_create',[ClienteController::class,'create'])->name('clientes.create');
    // Route::post('/clientes',[ClienteController::class,'store'])->name('clientes.store');


    // Route::get('/clientes_edit/{id}',[ClienteController::class,'edit'])->name('clientes.edit');


    // Route::put('/clientes_update/{id}',[ClienteController::class,'update'])->name('clientes.update');


    // Route::delete('/clientes/{id}', [ClienteController::class, 'destroy'])->name('clientes.destroy');




     //Rota geral
     Route::resources([
        'clientes' => ClienteController::class,
        // 'vendedor' => VendedoresController::class
    ]);
    // Route::put('/clientes/{id}', [ClienteController::class, 'update'])->name('clientes.update');


    Route::get('/exemplo', [ClienteController::class,'minhapagina'])->name('clientes.minhapagina');

});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
