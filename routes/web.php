<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Central\{
    GeneralSettingController,
};
use App\Http\Controllers\Central\Plan\PlanController;

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

//Route::get('/', function () {
//    return view('welcome');
//});
//
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

    Route::resource('tenants', \App\Http\Controllers\TenantController::class);

    //plans
    //setting
    Route::get('plans', [PlanController::class, 'index'])->name('plans');
    Route::get('plans/create', [PlanController::class, 'create'])->name('plans.create');
    Route::post('plans', [PlanController::class, 'store'])->name('plans.store');

    //setting
    Route::get('settings', [GeneralSettingController::class, 'index'])->name('settings');

    Route::put('settings/payment-setting/update', [GeneralSettingController::class, 'paymentSettingUpdate'])->name('settings.payment.setting.update');
});

require __DIR__.'/auth.php';
