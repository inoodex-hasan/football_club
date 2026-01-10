<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\{ContactFormController, HomeController};
use App\Http\Controllers\{ProfileController, SslCommerzPaymentController};
use Inertia\Inertia;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/events', [HomeController::class, 'event'])->name('event');
Route::get('/events/{id}', [HomeController::class, 'eventDetails'])->name('event.details');

Route::get('/training-packages', [HomeController::class, 'training'])->name('training');
Route::get('/training-package/{id}', [HomeController::class, 'trainingDetails'])->name('training.details');

Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');

Route::get('/contacts', [HomeController::class, 'contact'])->name('contacts');

Route::post('/contact-form', [ContactFormController::class, 'store'])->name('contact.store');

// SSLCOMMERZ Start
// Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
// Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);
// Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/cod-order', [SslCommerzPaymentController::class, 'codOrder']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);

Route::post('/success', [SslCommerzPaymentController::class, 'success'])->name('ssl.success');
Route::post('/fail', [SslCommerzPaymentController::class, 'fail'])->name('ssl.fail');

Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel'])->name('ssl.cancel');
//SSLCOMMERZ END

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
