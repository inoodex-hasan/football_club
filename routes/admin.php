<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\{AboutSectionController, AdminDashboardController, AdmissionController, ContactController, EventController, GalleryController, OrderController, PrivacyPolicyController, ProfileController, ReviewController, SettingController, SliderController, TeamController, TermsConditionController, TrainingPackageController};

Route::middleware(['web', 'auth', 'verified'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'index')->name('profile');
        Route::post('/profile/update', 'updateProfile')->name('profile.update');
        Route::post('/profile/update/password', 'updatePassword')->name('password.update');
    });

    /** training package route */
    Route::delete('training-packages/image/{id}', [TrainingPackageController::class, 'destroyImage'])->name('training-packages.image.destroy');
    Route::put('training-packages/change-status', [TrainingPackageController::class, 'changeStatus'])->name('training-packages.change-status');
    Route::resource('training-packages', TrainingPackageController::class);


    /** order route */
    Route::put('change-approve-status', [OrderController::class, 'changeApproveStatus'])->name('change-approve-status');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

    /** admission route */
    Route::get('admission', [AdmissionController::class, 'index'])->name('admission.index');
    Route::get('admission/{id}', [AdmissionController::class, 'show'])->name('admission.show');
    Route::get('/admissoin/create', [AdmissionController::class, 'create'])->name('admission.create');
    Route::post('/admission', [AdmissionController::class, 'store'])->name('admission.store');
    Route::get('/admission/{id}/edit', [AdmissionController::class, 'edit'])->name('admission.edit');
    Route::put('/admission/{id}', [AdmissionController::class, 'update'])->name('admission.update');
    // Route::delete('/admission/{id}', [AdmissionController::class, 'destroy'])->name('admission.destroy');

    /** GalleryImages routes */
    Route::resource('gallery', GalleryController::class)->only('index', 'create', 'store', 'destroy');
    Route::post('gallery/delete-media/{gallery}', [GalleryController::class, 'deleteMedia'])->name('gallery.delete-media');

    /** Event Routes */
    Route::put('events/change-status', [EventController::class, 'changeStatus'])->name('events.change-status');
    Route::resource('events', EventController::class);

    /** setting rotue */
    Route::controller(SettingController::class)->group(function () {
        Route::get('settings', 'index')->name('setting.index');
        Route::put('general-setting', 'generalSettingUpdate')->name('general-setting.update');
        Route::put('email-configuration-setting', 'emailConfigurationUpdate')->name('email-configuration-setting.update');
        Route::put('log-setting', 'logSettingUpdate')->name('log-setting.update');
    });

    /** About Section Routes */
    Route::controller(AboutSectionController::class)->group(function () {
        /** About Section Routes */
        Route::get('about', 'about')->name('about');
        Route::put('about-update', 'aboutUpdate')->name('about.us.update');
        Route::post('/about-section/image-delete', 'deleteImage')->name('about.image.delete');

        /** Mission Section Routes */
        Route::get('mission', 'mission')->name('mission');
        Route::put('mission-update', 'missionUpdate')->name('mission.update');

        /** Vision Section Routes */
        Route::get('vision', 'vision')->name('vision');
        Route::put('vision-update', 'visionUpdate')->name('vision.update');
    });

    /** Slider Routes */
    Route::resource('sliders', SliderController::class);

     /** Teams Routes */
    Route::resource('teams', TeamController::class);

    /** Reviews Routes */
    Route::resource('reviews', ReviewController::class);

    /** Contact Routes */
    Route::get('contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::put('contact/{id}', [ContactController::class, 'update'])->name('contact.update');

    /** Message Routes */
    Route::get('messages', [ContactController::class, 'show'])->name('messages');
    Route::delete('contact-message/{id}', [ContactController::class, 'destroy'])
    ->name('contact-message.destroy');

    // Terms & Conditions
    Route::controller(TermsConditionController::class)->group(function () {
        Route::get('terms-conditions', 'index')->name('terms_conditions.index');
        Route::get('terms-conditions/create', 'create')->name('terms_conditions.create');
        Route::post('terms-conditions', 'store')->name('terms_conditions.store');
        Route::get('terms-conditions/{id}/edit', 'edit')->name('terms_conditions.edit');
        Route::put('terms-conditions/{id}', 'update')->name('terms_conditions.update');
        Route::delete('terms-conditions/{id}', 'destroy')->name('terms_conditions.destroy');
    });

    // Privacy Policy
    Route::controller(PrivacyPolicyController::class)->group(function () {
        Route::get('privacy-policies', 'index')->name('privacy_policies.index');
        Route::get('privacy-policies/create', 'create')->name('privacy_policies.create');
        Route::post('privacy-policies', 'store')->name('privacy_policies.store');
        Route::get('privacy-policies/{id}/edit', 'edit')->name('privacy_policies.edit');
        Route::put('privacy-policies/{id}', 'update')->name('privacy_policies.update');
        Route::delete('privacy-policies/{id}', 'destroy')->name('privacy_policies.destroy');
    });
});
