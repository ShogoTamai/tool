<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(CompanyController::class)->middleware(['auth'])->group(function(){
    Route::get('/', 'index')->name('index');
    Route::post('/companies/', 'store')->name('store');
    Route::get('/companies/create', 'create')->name('create');
    Route::get('/companies/{industry}', 'show')->name('show');
    Route::put('/companies/{company}', 'update')->name('update');
    Route::delete('/companies/{company}', 'delete')->name('delete');
    Route::get('/companies/{company}/edit', 'edit')->name('edit');
});
Route::get('/calendar/{company}/create', [ApiController::class, 'create'])->middleware('auth');
Route::post('/calendar', [ApiController::class, 'store'])->middleware('auth');
Route::put('/calendar', [ApiController::class, 'update'])->middleware('auth');

Route::get('/totals', [CompanyController::class, 'total'])->name('total')->middleware('auth');

Route::get('/categories/{category}', [CategoryController::class,'index'])->middleware("auth");

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
