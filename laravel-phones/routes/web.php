<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// --- МИДЪЛУЕРИ ---
use App\Http\Middleware\IsAdmin;

// --- КОНТРОЛЕРИ ---
use App\Http\Controllers\PhoneController; // Публичен контролер за телефони

// Тук използваме "as", за да не се бърка с публичния
use App\Http\Controllers\Admin\PhoneController as AdminPhoneController; 
use App\Http\Controllers\Admin\ManufacturerController; // Админ контролер за марки
use App\Http\Controllers\PhoneModelController; // Админ контролер за модели
use App\Http\Controllers\PublicModelController; 
// --- МОДЕЛИ (за публичните closures) ---
use App\Models\Manufacturer;
use App\Models\PhoneModel;

/*
|--------------------------------------------------------------------------
| ПУБЛИЧНИ РУТОВЕ (Достъпни за всички)
|--------------------------------------------------------------------------
*/

// Начална страница и списък телефони
Route::get('/', [PhoneController::class, 'index'])->name('phones.index');
Route::get('/phones', [PhoneController::class, 'index']);

// Публичен списък: Марки
Route::get('/manufacturers', function () {
    $manufacturers = Manufacturer::orderBy('name')->paginate(12);
    return view('manufacturers.index', compact('manufacturers'));
})->name('manufacturers.index');

// Публичен списък:  Модели (вече ползваме PublicModelController)
Route::get('/models', [PublicModelController::class, 'index'])->name('models.index');

/*
|--------------------------------------------------------------------------
| AUTH ROUTES (Вход, Регистрация, Изход)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';

// Ръчен логаут (ако auth.php не го покрива или искаш специфично поведение)
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');


/*
|--------------------------------------------------------------------------
| ПОТРЕБИТЕЛСКИ ПРОФИЛ (За логнати потребители)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function() {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('profile', 'profile')->name('profile');
});


/*
|--------------------------------------------------------------------------
| АДМИНИСТРАТОРСКИ ПАНЕЛ (Защитен с IsAdmin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', IsAdmin::class])->prefix('admin')->name('admin.')->group(function () {
    
    // Главно табло
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // CRUD за Телефони (AdminPhoneController)
    Route::resource('phones', AdminPhoneController::class);
    
    // CRUD за Производители (ManufacturerController - Admin версия)
    Route::resource('manufacturers', ManufacturerController::class);
    
    // CRUD за Модели (PhoneModelController)
    Route::resource('models', PhoneModelController::class);
});