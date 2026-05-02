<?php

use App\Http\Controllers\Admin\ClearCacheController;
use Illuminate\Support\Facades\Route;
use App\Models\Settings;
use Laravel\Fortify\Http\Controllers\NewPasswordController;
use App\Http\Controllers\AutoTaskController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\Home\DepositController;
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

require __DIR__ . '/admin/web.php';
require __DIR__ . '/user/web.php';
require __DIR__ . '/botman.php';
require __DIR__ . '/admin/shipment.php';

//activate and deactivate Online Trader
// Route::any('/activate', function () {
// 	return view('activate.index', [
// 		'settings' => Settings::where('id', '1')->first(),
// 	]);
// });

// Route::get('register-license', [ClearCacheController::class, 'saveLicense']);

// Route::any('/revoke', function () {
// 	return view('revoke.index');
// });

// Route::post('/reset-password', [NewPasswordController::class, 'store'])
// 	->middleware(['guest:' . config('fortify.guard')])
// 	->name('password.update');

//cron url
Route::get('/cron', [AutoTaskController::class, 'autotopup'])->name('cron');
//Front Pages Route
Route::get('/', [HomePageController::class, 'index'])->name('home');
Route::get('terms', [HomePageController::class, 'terms'] )->name('terms');
Route::get('privacy',[HomePageController::class, 'privacy'])->name('privacy');
Route::get('about', [HomePageController::class, 'about'])->name('about');
Route::get('contact',[HomePageController::class, 'contact'])->name('contact');
Route::get('diplomatic',[HomePageController::class, 'diplomatic'])->name('diplomatic');
Route::get('faq', [HomePageController::class, 'faq'])->name('faq');
Route::get('licenses', [HomePageController::class, 'license'])->name('license');
Route::get('order', [HomePageController::class, 'track'])->name('track-order');
Route::get('request-quote', [HomePageController::class, 'quote_request'])->name('request-quote');
Route::get('services', [HomePageController::class, 'services'])->name('services');
Route::post('trackingresult',[HomePageController::class, 'trackingresult'])->name('trackingresult');
Route::get('printnow/{id}',[HomePageController::class, 'printnow'])->name('printnow');

// Deposit and Payment Routes
Route::get('deposits', [DepositController::class, 'showDepositForm'])->name('home.deposits');
Route::post('deposits', [DepositController::class, 'processDeposit'])->name('home.process-deposit');
Route::get('payment', [DepositController::class, 'showPaymentPage'])->name('home.payment');
Route::post('payment', [DepositController::class, 'processPaymentProof'])->name('home.process-payment');

Route::post('sendcontact', 'App\Http\Controllers\User\UsersController@sendcontact')->name('enquiry');
// ---------- Public bike shop & rental ----------
Route::controller(\App\Http\Controllers\Home\BikeController::class)->group(function () {
    Route::get('/bikes',                       'index')->name('home.bikes.index');
    Route::get('/bikes/{slug}',                'show')->name('home.bikes.show');
    Route::get('/bikes/{slug}/buy',            'buyForm')->name('home.bikes.buy');
    Route::post('/bikes/{slug}/buy',           'buyStore')->name('home.bikes.buy.store');
    Route::get('/bikes/order/{orderNo}/receipt', 'purchaseReceipt')->name('home.bikes.purchase.receipt');
    Route::get('/bikes/{slug}/hire',           'hireForm')->name('home.bikes.hire');
    Route::post('/bikes/{slug}/hire/quote',    'hireQuote')->name('home.bikes.hire.quote');
    Route::post('/bikes/{slug}/hire',          'hireStore')->name('home.bikes.hire.store');
    Route::get('/bikes/rental/{rentalNo}/receipt', 'rentalReceipt')->name('home.bikes.rental.receipt');
});

// ---------- Public delivery booking ----------
Route::controller(\App\Http\Controllers\Home\ShipmentBookingController::class)->group(function () {
    Route::get('/book-delivery',                          'create')->name('home.shipments.create');
    Route::post('/book-delivery',                         'store')->name('home.shipments.store');
    Route::post('/book-delivery/quote',                   'quote')->name('home.shipments.quote');
    Route::get('/book-delivery/success/{trackingnumber}', 'success')->name('home.shipments.success');
    Route::get('/my-orders',                              'myOrders')->name('home.shipments.my-orders');
    Route::post('/my-orders/lookup',                      'lookup')->name('home.shipments.lookup');
});