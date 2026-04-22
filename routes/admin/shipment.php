<?php

use App\Http\Controllers\ShipmentController;
use Illuminate\Support\Facades\Route;

// Shipment Management Routes
Route::middleware(['isadmin', '2fa'])->prefix('admin')->group(function () {
    Route::controller(ShipmentController::class)->group(function () {
        // List all shipments
        Route::get('shipments', 'listShipments')->name('admin.shipments');

        // Shipment deposits
        Route::get('shipment/deposits', 'shipmentDeposits')->name('admin.shipment.deposits');

        // Create shipment form
        Route::get('shipments/create', function () {
            $settings = \App\Models\Settings::where('id', '1')->first();
            return view('admin.create-shipment', [
                'settings' => $settings,
                'title' => 'Create New Shipment'
            ]);
        })->name('admin.shipments.create');

        // Store new shipment
        Route::post('shipments/store', 'storeShipment')->name('admin.shipments.store');

        // View single shipment
        Route::get('shipments/view/{id}', 'viewShipment')->name('admin.shipments.view');

        // Edit shipment form
        Route::get('shipments/edit/{id}', function ($id) {
            $shipment = \App\Models\User::findOrFail($id);
            $settings = \App\Models\Settings::where('id', '1')->first();
            return view('admin.edit-shipment', [
                'shipment' => $shipment,
                'settings' => $settings,
                'title' => 'Edit Shipment'
            ]);
        })->name('admin.shipments.edit');

        // Update shipment
        Route::post('shipments/update', 'updateShipment')->name('admin.shipments.update');

        // Update status form
        Route::get('shipments/update-status/{id}', 'showUpdateStatusForm')->name('admin.shipments.update-status-form');

        // Process status update
        Route::post('shipments/update-status', 'updateShipmentStatus')->name('admin.shipments.update-status');

        // Track history management routes
        Route::put('shipments/track/{id}', 'updateTrackRecord')->name('admin.shipments.track.update');
        Route::delete('shipments/track/{id}', 'deleteTrackRecord')->name('admin.shipments.track.delete');

        // Print shipment invoice
        Route::get('shipments/print/{id}', function ($id) {
            $shipment = \App\Models\User::findOrFail($id);
            $settings = \App\Models\Settings::where('id', '1')->first();
            return view('admin.print-shipment', [
                'shipment' => $shipment,
                'settings' => $settings,
                'title' => 'Print Shipment Invoice'
            ]);
        })->name('admin.shipments.print');

         Route::delete('shipments/delete/{id}', 'deleteShipment')->name('admin.shipments.delete');


        // Shipment Deposit Management Routes
        Route::get('shipment/deposits', 'shipmentDeposits')->name('admin.shipment.deposits');
        Route::get('shipment/deposits/process/{id}', 'processDeposit')->name('admin.process.deposit');
        Route::get('shipment/deposits/view/{id}', 'viewDeposit')->name('admin.view.deposit');
        Route::get('shipment/deposits/viewimage/{id}', 'viewDepositImage')->name('admin.view.depositimage');
        Route::get('shipment/deposits/delete/{id}', 'deleteDeposit')->name('admin.delete.deposit');
        Route::get('shipment/deposits/export/{format}', 'exportDeposits')->name('admin.export.deposits');
    });
});
