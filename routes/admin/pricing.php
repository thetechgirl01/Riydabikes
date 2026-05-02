use App\Http\Controllers\Admin\DeliveryPricingController;

Route::middleware(['isadmin', '2fa'])->prefix('admin')->group(function () {
    Route::controller(DeliveryPricingController::class)->group(function () {
        Route::get('pricing',                  'index')->name('admin.pricing.index');
        Route::get('pricing/create',           'create')->name('admin.pricing.create');
        Route::post('pricing',                 'store')->name('admin.pricing.store');
        Route::get('pricing/{id}/edit',        'edit')->name('admin.pricing.edit');
        Route::put('pricing/{id}',             'update')->name('admin.pricing.update');
        Route::delete('pricing/{id}',          'destroy')->name('admin.pricing.destroy');
        Route::post('pricing/{id}/toggle',     'toggleActive')->name('admin.pricing.toggle');

        Route::get('pricing-settings',         'settings')->name('admin.pricing.settings');
        Route::post('pricing-settings',        'updateSettings')->name('admin.pricing.settings.update');
    });
});