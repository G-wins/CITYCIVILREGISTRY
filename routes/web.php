<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\WelcomeController;



//WELCOME PAGE TAB
Route::get('/', function () {
    return view('appointment_welcome'); 
})->name('appointment.welcome');

Route::get('/contact-us', function () {
    return view('contact_us'); 
})->name('contact.us');

Route::get('/requirements', function () {
    return view('requirements'); 
})->name('requirements');

Route::get('/services', function () {
    return view('services'); 
})->name('services');

Route::get('/about-us', function () {
    return view('about_us'); 
})->name('about.us');




// Route::get('/appointment-welcome', [WelcomeController::class, 'index'])->name('appointment.welcome');
// Route::get('/appointment-form', [AppointmentController::class, 'showForm'])->name('appointment.form');
// Route::post('/appointment', [AppointmentController::class, 'store'])->name('appointment.store');

// Route for displaying the welcome page
Route::get('/appointment-welcome', [WelcomeController::class, 'index'])->name('appointment.welcome');

// Route for showing the appointment form
Route::get('/appointment', [AppointmentController::class, 'create'])->name('appointment.form');

// Route for handling form submission
Route::post('/appointment', [AppointmentController::class, 'store'])->name('appointment.store');




Route::middleware(['auth'])->group(function () {
    Route::get('/notifications/mark-as-read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
});

 
//mark as read notification dashboard   
Route::get('/notifications/mark-as-read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/admin', [AdminController::class, 'index'])->middleware('auth')->name('admin.dashboard');


// Default welcome route
Route::get('/', function () {
    return view('welcome');
});
Route::get('/appointments/unavailable-dates', [AppointmentController::class, 'unavailableDates']);
Route::get('/appointments/available-slots', [AppointmentController::class, 'availableSlots']);




Route::get('/client/form', function () {
    return view('client.form');
})->name('client.form');


Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


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

//  DASHBOARD MODAL
Route::get('/appointment/birth/{id}', [DashboardController::class, 'showBirthForm']);
Route::put('/appointment/birth/{id}', [DashboardController::class, 'updateBirthCertificate'])->name('updateBirthCertificate');

Route::get('/appointment/marriage/{id}', [DashboardController::class, 'showMarriageForm']);
Route::put('/appointment/marriage/{id}', [DashboardController::class, 'updateMarriageCertificate'])->name('updateMarriageCertificate');

Route::get('/appointment/MLicense/{id}', [DashboardController::class, 'showMarriageLicenseForm']);
Route::put('/appointment/MLicense/{id}', [DashboardController::class, 'updateMarriageLicense'])->name('updateMarriageLicense');
Route::post('/appointment/MLicense/{id}', [DashboardController::class, 'storeMarriageLicense'])->name('storeMarriageLicense');

Route::get('/appointment/death/{id}', [DashboardController::class, 'showDeathCertificateForm']);
Route::put('/appointment/death/{id}', [DashboardController::class, 'updateDeathCertificate'])->name('updateDeathCertificate');

Route::get('/appointment/cenomar/{id}', [DashboardController::class, 'showCenomarForm']);
Route::put('/appointment/cenomar/{id}', [DashboardController::class, 'updateCenomar'])->name('updateCenomar');

Route::get('/appointment/other/{id}', [DashboardController::class, 'showOtherForm']);
Route::put('/appointment/other/{id}', [DashboardController::class, 'updateOther'])->name('updateOther');

Route::get('/api/unavailable-dates', [DashboardController::class, 'getUnavailableDates']);
Route::get('/api/date-slots', [DashboardController::class, 'getDateSlots']);


require __DIR__.'/auth.php';