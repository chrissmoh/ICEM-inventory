<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DeviceAssignmentController;

Route::get('signin', [LoginController::class, 'showLoginForm'])->name('signin');
Route::post('signin', [LoginController::class, 'signin']);

Route::get('signup', [RegisterController::class, 'showRegistrationForm'])->name('signup');
Route::post('signup', [RegisterController::class, 'register'])->name('signuppost');


Route::get('/adddevice', [DeviceController::class, 'create'])->name('device.create');
Route::post('/adddevice', [DeviceController::class, 'store'])->name('device.store');

Route::get('/users', [UserController::class, 'index'])->name('user.view');
Route::get('/adduser', [UserController::class, 'addview'])->name('user.adduser');
Route::post('/adduser', [UserController::class, 'create'])->name('user.create');

 Route::get('/devicelist', [InventoryController::class, 'index'])->name('devices.index');
 Route::post('/devicelist', [InventoryController::class, 'store'])->name('devices.store');
 Route::delete('/devicelist/{id}', [InventoryController::class, 'destroy'])->name('devices.destroy');

Route::prefix('assignments')->group(function () {
    Route::get('/', [DeviceAssignmentController::class, 'index'])->name('assignments.index'); // Changed
    Route::get('/create', [DeviceAssignmentController::class, 'create'])->name('assignments.create');
    Route::post('/', [DeviceAssignmentController::class, 'store'])->name('assignments.store');
    Route::get('/{assignment}', [DeviceAssignmentController::class, 'show'])->name('assignments.show'); // Changed
    Route::get('/{assignment}/edit', [DeviceAssignmentController::class, 'edit'])->name('assignments.edit');
    Route::put('/{assignment}', [DeviceAssignmentController::class, 'update'])->name('assignments.update');
    Route::delete('/{assignment}', [DeviceAssignmentController::class, 'destroy'])->name('assignments.destroy');

    // Additional custom routes
    Route::get('/device/{device_id}', [DeviceAssignmentController::class, 'assignDevice'])->name('assignments.device');
    Route::get('/report/active', [DeviceAssignmentController::class, 'activeAssignments'])->name('assignments.active');
    Route::get('/report/overdue', [DeviceAssignmentController::class, 'overdueAssignments'])->name('assignments.overdue');
});


// Route::get('/home', [InventoryController::class, 'index'])->name('home');


Route::get('/', function () {
    return view('index');
})->name('home');


// Route::get('/profile', function () {
//     return 'This is the profile page.';
// })->name('profile');
