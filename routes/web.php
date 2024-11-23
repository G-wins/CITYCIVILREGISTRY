<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\Appointment; 
use App\Http\Controllers\NewAppointmentController; 

Route::get('/appointment/create', [NewAppointmentController::class, 'create'])->name('new-appointment.create');
Route::post('/appointment/store', [NewAppointmentController::class, 'store'])->name('new-appointment.store');
Route::get('/appointments/unavailable-dates', [NewAppointmentController::class, 'unavailableDates'])->name('appointments.unavailable-dates');
Route::post('/appointments/available-slots', [NewAppointmentController::class, 'availableSlots'])->name('appointments.available-slots');



Route::post('/appointment/store', [NewAppointmentController::class, 'store'])->name('new-appointment.store');



Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/admin', [AdminController::class, 'index'])->middleware('auth')->name('admin.dashboard');


// Default welcome route
Route::get('/', function () {
    return view('welcome');
});
Route::get('/appointments/unavailable-dates', [AppointmentController::class, 'unavailableDates']);
Route::get('/appointments/available-slots', [AppointmentController::class, 'availableSlots']);


Route::get('/appointment/choose', function () {
    return view('client.index'); // Initial screen with buttons
})->name('appointment.index');

Route::get('/appointment/existing', function () {
    return view('client.form'); // Existing Document form
})->name('existing_document');

Route::get('/appointment/new', function () {
    return view('client.new_form'); // New Document Request form
})->name('new_document');


Route::get('/appointment', [AppointmentController::class, 'create'])->name('appointment.form');
Route::post('/appointment', [AppointmentController::class, 'store'])->name('appointment.store');

Route::get('/client/form', function () {
    return view('client.form');
})->name('client.form');


Route::get('/dashboard', function () {
    $appointments = Appointment::all(); // Kunin lahat ng appointments
    return view('dashboard', compact('appointments')); // I-pass ang appointments data sa view
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes under 'auth' middleware
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Registration routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Email verification routes
Route::get('/email/verify', [VerificationController::class, 'show'])->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/resend', [VerificationController::class, 'resend'])->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

require __DIR__.'/auth.php';