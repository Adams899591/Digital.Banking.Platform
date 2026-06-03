<?php

use App\Livewire\Auth\AdminLogin;
use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\UserVerifyEmail;
use App\Livewire\Auth\UserForgetPassword;
use Illuminate\Support\Facades\Broadcast;
use App\Http\Controllers\LogoutController;
use App\Livewire\Auth\AdminForgetPassword;
use App\Livewire\Auth\UserPreparingDashboard;
use App\Livewire\Auth\AdminPreparingDashboard;
use App\Http\Controllers\VerifyEmailController;
use App\Livewire\Auth\EmailVerificationMessage;
use App\Http\Controllers\pdf\TransactionReceiptController;
use Illuminate\Support\Facades\Artisan;


//this route group handles web page routes
Route::prefix("web")->group(function(){

   Route::get('/home', function () { return view('banks.web.home');})->name('banks.home');
   Route::get('/corporate', function () { return view('banks.web.corporate');})->name('banks.corporate');
   Route::get('/privateBanking', function () { return view('banks.web.privateBanking');})->name('banks.privateBanking');
   Route::get('/wealthManagement', function () { return view('banks.web.wealthManagement');})->name('banks.wealthManagement');
   Route::get('/login', function () { return view('banks.web.login');})->name('login');

});

// this route handles user logout
Route::post('/userlogout', [LogoutController::class, "Userlogout"])->name("userLogout");
Route::post('/adminlogout', [LogoutController::class, "Adminlogout"])->name("adminLogout");

// this route group handles authentication related routes
Route::prefix("auth")->group(function(){

     Route::get("adminLogin", AdminLogin::class)->name("adminLogin");
     Route::get("adminForgetPassword", AdminForgetPassword::class)->name("adminForgetPassword");
     Route::get("userForgetPassword", UserForgetPassword::class)->name("userForgetPassword");
     Route::get("adminPreparingDashboard", AdminPreparingDashboard::class)->name("adminPreparingDashboard");
     Route::get("userPreparingDashboard", UserPreparingDashboard::class)->name("userPreparingDashboard");
     Route::get("userVerifyEmail", UserVerifyEmail::class)->name("userVerifyEmail");
     Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');
     
});


// this route group handles pdf generation routes
Route::prefix("pdf")->group(function (){
     Route::get("transactionReceipt", [TransactionReceiptController::class, "generateTransactionReceipt"])->name("transactionReceipt");
});



Route::get('clear', function() {
    Artisan::call('optimize');
    return "Caches optimized";
});


// 
Broadcast::routes();




require __DIR__.'/user.php';
require __DIR__.'/admin.php';