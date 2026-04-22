<?php

use App\Http\Controllers\Admin\ManageBikeController;
use Illuminate\Support\Facades\Route;

Route::middleware(['isadmin', '2fa'])->prefix('admin')->group(function () {
    Route::controller(ManageBikeController::class)->group(function () {

        // Bikes CRUD
        Route::get('bikes',                       'index')->name('admin.bikes.index');
        Route::get('bikes/create',                'create')->name('admin.bikes.create');
        Route::post('bikes',                      'store')->name('admin.bikes.store');
        Route::get('bikes/{id}/edit',             'edit')->name('admin.bikes.edit');
        Route::put('bikes/{id}',                  'update')->name('admin.bikes.update');
        Route::delete('bikes/{id}',               'destroy')->name('admin.bikes.destroy');
        Route::post('bikes/{id}/toggle-hire',     'toggleHire')->name('admin.bikes.toggle-hire');
        Route::post('bikes/{id}/toggle-active',   'toggleActive')->name('admin.bikes.toggle-active');

        // Purchases
        Route::get('bike-purchases',              'purchases')->name('admin.bikes.purchases');
        Route::get('bike-purchases/{id}',         'viewPurchase')->name('admin.bikes.purchase.view');
        Route::post('bike-purchases/{id}/status', 'updatePurchaseStatus')->name('admin.bikes.purchase.status');

        // Rentals
        Route::get('bike-rentals',                'rentals')->name('admin.bikes.rentals');
        Route::get('bike-rentals/{id}',           'viewRental')->name('admin.bikes.rental.view');
        Route::post('bike-rentals/{id}/status',   'updateRentalStatus')->name('admin.bikes.rental.status');
    });
});