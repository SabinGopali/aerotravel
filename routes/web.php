<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientControlller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\ScheduleFlightController;
use App\Http\Controllers\TravellerDetailsController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\StripeTravellerController;
use App\Models\TravellerDetails;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Public routes
Route::get('/', [ClientControlller::class, 'index'])->name('client.index');

// Authenticated routes (only accessible by logged-in users)
Route::middleware(['auth'])->group(function () {
    Route::get('/flight_list', [ClientControlller::class, 'flightlist'])->name('client.flightlist');
    Route::get('/passengers_details', [ClientControlller::class, 'passengersDetails'])->name('client.passengersDetails');
    Route::get('/preview_details', [ClientControlller::class, 'previewDetails'])->name('client.previewDetails');
    Route::get('/feedback_details', [ClientControlller::class, 'feedbackDetails'])->name('client.feedbackDetails');
    Route::post('/feedbackDetailsStore', [ClientControlller::class, 'store'])->name('client.feedbackDetails.store');
    Route::get('/tripplan/{id}', [ClientControlller::class, 'tripplandetails'])->name('client.tripplandetails');
    Route::get('/travellerdetail/{id}', [ClientControlller::class, 'travellerdetails'])->name('client.travellerdetails');
    Route::post('/travellerdetailtstore/{id}', [ClientControlller::class, 'tstore'])->name('client.travellerdetails.tstore');
    Route::get('/payment', [ClientControlller::class, 'paymentDetails'])->name('client.paymentDetails');
    Route::get('/boardingpass/{id}', [ClientControlller::class, 'boardingpass'])->name('client.boardingpass');    
    Route::get('/travellerboardingpass', [ClientControlller::class, 'travellerboardingpass'])->name('client.travellerboardingpass');    
    // Route::get('/stripe', [ClientControlller::class, 'stripepayment'])->name('client.stripepayment');    
    Route::post('/passengersdetails', [PassengerController::class, 'passengerStore'])->name('client.passengersdetails.store');
});










Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/flightdetail', [HomeController::class, 'adminflightdetail'])->name('admin.flightdetail');
Route::get('/adminfeedback', [HomeController::class, 'feedback'])->name('admin.feedback');
// Route::get('/addflight', [HomeController::class, 'adminaddflight'])->name('admin.adminaddflight');
Route::get('/scheduleflight', [HomeController::class, 'scheduleflight'])->name('admin.scheduleflight');
Route::get('/schedule', [HomeController::class, 'schedule'])->name('admin.schedule');
Route::get('/passengerlist', [HomeController::class, 'adminpassengerlist'])->name('admin.adminpassengerlist');
Route::get('/tripdetails', [HomeController::class, 'admintripdetails'])->name('admin.admintripdetails');
Route::get('/travellerlist', [HomeController::class, 'admintravellerlist'])->name('admin.admintravellerlist');    
// Route::post('/addtripdetails', [HomeController::class, 'adminaddtripdetails'])->name('admin.adminaddtripdetails');    





// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Route::get('/admindashboard', [HomeFlightController::class, 'dashboard'])->name('admin.dashboard');


//ADD FLIGHT
Route::get('/addflight', [AddFlightController::class, 'index'])->name('admin.addflight.index');
Route::get('/addflight/create', [AddFlightController::class, 'create'])->name('admin.addflight.create');
Route::post('/addflight', [AddFlightController::class, 'store'])->name('admin.addflight.store');
Route::get('/addflight/edit/{id}', [AddFlightController::class, 'edit'])->name('admin.addflight.edit');
Route::put('/addflight/{id}', [AddFlightController::class, 'update'])->name('admin.addflight.update');
Route::delete('/addflight/{id}', [AddFlightController::class, 'destroy'])->name('admin.addflight.destroy');

//SCHEDULE FLIGHT
Route::get('/scheduleflight', [ScheduleFlightController::class, 'index'])->name('admin.scheduleflight.index');
Route::get('/scheduleflight/create', [ScheduleFlightController::class, 'create'])->name('admin.scheduleflight.create');
Route::post('/scheduleflight', [ScheduleFlightController::class, 'store'])->name('admin.scheduleflight.store');
Route::get('/scheduleflight/edit/{id}', [ScheduleFlightController::class, 'edit'])->name('admin.scheduleflight.edit');
Route::put('/scheduleflight/{id}', [ScheduleFlightController::class, 'update'])->name('admin.scheduleflight.update');
Route::get('/scheduleflight-show/{id}', [ScheduleFlightController::class, 'show'])->name('admin.scheduleflight.show');
Route::get('/scheduleflight-delete/{id}', [ScheduleFlightController::class, 'destroy'])->name('admin.scheduleflight.destroy');

//TRIPDETAILS
Route::get('/travellerdetails', [TravellerDetailsController::class, 'index'])->name('admin.travellerdetails.index');
Route::get('/travellerdetails/create', [TravellerDetailsController::class, 'create'])->name('admin.travellerdetails.create');
Route::post('/travellerdetails', [TravellerDetailsController::class, 'store'])->name('admin.travellerdetails.store');
Route::get('/travellerdetails/edit/{id}', [TravellerDetailsController::class, 'edit'])->name('admin.travellerdetails.edit');
Route::put('/travellerdetails/{id}', [TravellerDetailsController::class, 'update'])->name('admin.travellerdetails.update');
// Route::get('/travellerdetails-show/{id}', [TravellerDetailsController::class, 'show'])->name('admin.travellerdetails.show');
Route::get('/travellerdetails-delete/{id}', [TravellerDetailsController::class, 'destroy'])->name('admin.travellerdetails.destroy');

// Route::controller(StripePaymentController::class)->group(function(){
//     Route::get('stripe', 'stripe')->name('client.stripe');
//     Route::post('stripe', 'stripePost')->name('stripe.post'); 
// });

// Route::controller(StripeTravellerController::class)->group(function(){
//     Route::get('stripetraveller', 'stripe')->name('client.stripetraveller');
//     Route::post('stripetraveller', 'stripePost')->name('stripetraveller.post'); 
// });


Route::group(['prefix' => '/stripetraveller'], function () {
    Route::get('/stripe/{id}', [StripeTravellerController::class, 'stripe'])->name('client.stripetraveller');
    Route::post('/stripePost', [StripeTravellerController::class, 'stripePost'])->name('stripetraveller.post');
});


Auth::routes();

