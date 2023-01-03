<?php

use App\Http\Controllers\Frontend\BookingsController;
use App\Http\Controllers\Frontend\PagesController;
use App\Mail\NewBooking;
use App\Mail\VerifyBooking;
use App\Models\Booking;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Route;

Route::controller(PagesController::class)
    ->name('pages.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/about', 'about')->name('about');
        Route::get('/gallery', 'gallery')->name('gallery');
        Route::get('/packages', 'packages')->name('packages');
        Route::get('/showcase/themed-picnics', 'themedPicnics')->name('showcase.themed.picnics');
    });

Route::get('/test', function () {
    $b = Carbon\CarbonInterval::minutes(3796)->roundDays()->totalDays;

    $period = CarbonPeriod::since(now())->days($b)->until(now()->addDays($b));
});
Route::get('/mailable', function () {
    return new VerifyBooking(Booking::first());
});
Route::get('/mailable/2', function () {
    return new NewBooking(Booking::first());
});

Route::prefix('/bookings')
    ->controller(BookingsController::class)
    ->name('bookings.')
    ->group(function () {
        Route::get('/create', 'index')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::post('/{package}/time_slots', 'generateTimeSlots')->name('time_slots');
        Route::get('/{booking:hash}', 'show')->name('show');
        Route::get('/{booking:hash}/cancel', 'cancel')->name('cancel');
    });
