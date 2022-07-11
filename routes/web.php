<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\ComplainController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\HostelAssignController;
use App\Http\Controllers\HostelCategoryController;
use App\Http\Controllers\HostelController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PaypalPaymentController;
use App\Http\Controllers\PayStackPaymentController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Models\HostelCategory;
use App\Models\Testimony;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $testimonies = Testimony::latest()->get();
    $hostelCategories = HostelCategory::all();
    return view('welcome', compact('testimonies', 'hostelCategories'));
})->name('home');

Route::get('/about', function(){
    return view('about');
})->name('about');

Route::get('/hostel/categories/{hostelCategory}', function (HostelCategory $hostelCategory) {
    $testimonies = Testimony::latest()->get();
    return view('detail', compact('testimonies', 'hostelCategory'));
})->name('hostel.category.show');

Route::get('/students/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');

require __DIR__.'/auth.php';

// Admin Routes
Route::middleware(['auth:admin', 'guard.verified'])->prefix('admin')->name('admin.')->group(function(){

    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');



    Route::resources([
        // testimony
        'testimony' => App\Http\Controllers\Admin\TestimonyController::class,
        //slider
        'homePageSlide' => App\Http\Controllers\Admin\HomePageSlideController::class,
    ]);

    Route::get('site', [\App\Http\Controllers\Admin\SiteController::class, 'index'])->name('site.index');
    Route::patch('site/{site?}', [\App\Http\Controllers\Admin\SiteController::class, 'update'])->name('site.update');

    Route::resource('departments', DepartmentController::class);
    Route::resource('hostels', HostelController::class);
    Route::resource('hostelCategories', HostelCategoryController::class);
    // delete product photo
    Route::delete('photos/{hostelCategory}', [HostelCategoryController::class, 'deletePhoto'])->name('hostelCategories.photo.delete');

    // AJAX call
    Route::get('hostelCategory/{id}/hostels', [hostelCategoryController::class, 'getHostels'])->name('hostelCategory.hostels');
    Route::get('hostel/{id}/beds', [hostelController::class, 'getBedNo'])->name('hostel.beds');

    Route::resource('hostelAssign', HostelAssignController::class);
    Route::resource('students', StudentController::class);
    Route::get('transactions', [TransactionController::class, 'index'])->name('transaction.index');
    Route::get('transactions/{transaction}', [TransactionController::class, 'show'])->name('transaction.show');
    Route::get('/create', [Admin\Auth\RegisteredUserController::class, 'create'])->name('create');
    Route::post('/store', [Admin\Auth\RegisteredUserController::class, 'store'])->name('store');
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('message', [MessageController::class, 'create'])->name('message.create');
    Route::post('message/send', [MessageController::class, 'store'])->name('message.send');


    Route::get('/{admin}', [AdminController::class, 'show'])->name('show');
    Route::put('/{admin}', [AdminController::class, 'update'])->name('update');
    Route::delete('/{admin}', [AdminController::class, 'destroy'])->name('destroy');
    Route::get('/{admin}/edit', [AdminController::class, 'edit'])->name('edit');


});
// End Admin Routes


// Students Routes
Route::resource('user', UserController::class)->except(['create', 'store'])->middleware(['auth', 'verified']);
Route::middleware(['auth', 'verified'])->prefix('students')->name('student.')->group(function(){
    Route::resource('departments', DepartmentController::class);
    Route::get('transactions/history', [TransactionController::class, 'myTransaction'])->name('transaction.index');
    Route::get('transactions/{transaction}', [TransactionController::class, 'show']);
    Route::get('complain', [ComplainController::class, 'create']);
    Route::post('complain/send', [ComplainController::class, 'store']);
    // Route::get('/{user}/hostel', [HostelController::class,  'myHostel']);

    //make payment
    Route::get('paystack/checkout/{id}', [PayStackPaymentController::class, 'MakePayment'])->name('paystack.makepayment');
    Route::get('paystack/verifypayment', [PayStackPaymentController::class, 'PayStackVerifyPayment'])->name('paystack.verifypayment');
    Route::get('paypal/checkout', [PaypalPaymentController::class, 'MakePayment'])->name('paypal.makepayment');
    Route::get('paypal/verifyment/{orderId}', [PaypalPaymentController::class, 'verifypayment'])->name('paypal.payment.verify');
    Route::get('paypal/cancel', [PaypalPaymentController::class, 'cancelPayment'])->name('paypal.payment.cancel');
});
// End Students Routes

