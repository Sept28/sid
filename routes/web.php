<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BirthController;
use App\Http\Controllers\ComerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeathController;
use App\Http\Controllers\FamiliarController;
use App\Http\Controllers\FamilyCardController;
use App\Http\Controllers\MoverController;
use App\Http\Controllers\VillagerController;
use App\Models\FamilyCard;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


    Route::group(['middleware' => ['auth']], function () {
        Route::get('/', [DashboardController::class, 'dashboard']);

        Route::get('/villager-reset', [VillagerController::class, 'filterreset'])->name('villager.filter-reset');
        Route::get('/villager-export', [VillagerController::class, 'export'])->name('villager.export');
        Route::get('/villager-import', [VillagerController::class, 'import'])->name('villager.import');
        Route::post('/villager-import/store', [VillagerController::class, 'storeImport'])->name('villager.storeImport');
        Route::resource('villager', VillagerController::class);

        Route::get('/family-export', [FamilyCardController::class, 'export'])->name('family.export');
        Route::get('/family-import', [FamilyCardController::class, 'import'])->name('family.import');
        Route::post('/family-import/store', [FamilyCardController::class, 'storeImport'])->name('family.storeImport');
        Route::resource('family', FamilyCardController::class);

        Route::get('/family-reset', [FamilyCardController::class, 'filterreset'])->name('family.filter-reset');
        Route::get('/familiar/create/{id}', [FamiliarController::class, 'create'])->name('familiar.create');
        Route::post('/familiar/store/{id}', [FamiliarController::class, 'store'])->name('familiar.store');
        Route::get('/familiar/create-exists/{id}', [FamiliarController::class, 'createExists'])->name('familiar.create_exists');
        Route::post('/familiar/store-exists/{id}', [FamiliarController::class, 'storeExists'])->name('familiar.store_exists');

        Route::get('/comer-reset', [ComerController::class, 'filterreset'])->name('comer.filter-reset');
        Route::get('/comer-export', [ComerController::class, 'export'])->name('comer.export');
        Route::get('/comer-import', [ComerController::class, 'import'])->name('comer.import');
        Route::post('/comer-import/store', [ComerController::class, 'storeImport'])->name('comer.storeImport');
        Route::resource('comer', ComerController::class);

        Route::get('/move-reset', [MoverController::class, 'filterreset'])->name('move.filter-reset');
        Route::get('/move-export', [MoverController::class, 'export'])->name('move.export');
        Route::get('/move-import', [MoverController::class, 'import'])->name('move.import');
        Route::post('/move-import/store', [MoverController::class, 'storeImport'])->name('move.storeImport');
        Route::resource('move', MoverController::class);

        Route::get('/birth-reset', [BirthController::class, 'filterreset'])->name('birth.filter-reset');
        Route::get('/birth-export', [BirthController::class, 'export'])->name('birth.export');
        Route::get('/birth-import', [BirthController::class, 'import'])->name('birth.import');
        Route::post('/birth-import/store', [BirthController::class, 'storeImport'])->name('birth.storeImport');
        Route::resource('birth', BirthController::class);

        Route::get('/death-reset', [DeathController::class, 'filterreset'])->name('death.filter-reset');
        Route::get('/death-export', [DeathController::class, 'export'])->name('death.export');
        Route::get('/death-import', [DeathController::class, 'import'])->name('death.import');
        Route::post('/death-import/store', [DeathController::class, 'storeImport'])->name('death.storeImport');
        Route::resource('death', DeathController::class);
    });

    Route::get('/login', [AuthController::class, 'login'])->name('auth.login')->middleware('guest');
    Route::post('/login-auth', [AuthController::class, 'loginAuth'])->name('auth.login-auth');
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');