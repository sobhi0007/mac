<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\CustomLoginController;
use App\Http\Controllers\Dashboard\ClientController;
use App\Http\Controllers\Dashboard\EmployeeController;
use App\Http\Controllers\Dashboard\BranchController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\NotificationController;
 

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
    return redirect('dashboard');
});

Route::prefix('dashboard')->group(function () {

    Route::resource('roles', RoleController::class);
    
    Route::get('/send-notification', [NotificationController::class, 'sendEmployeeNotification']);

    Route::get('/login',[CustomLoginController::class, 'index' ])->name('login');
    Route::post('/login',[CustomLoginController::class, 'checkEmployeeLogin' ]);
    Route::post('/logout',[CustomLoginController::class, 'logout' ])->name('logout');

   
    Route::get('/notifications',[NotificationController::class, 'all' ]);
    Route::get('/mark-all-as-read',[NotificationController::class, 'markAllAsRead' ]);

    Route::get('/',[DashboardController::class, 'index' ])->middleware('employee');
    Route::resource('employees', EmployeeController::class)->middleware('employee');
    Route::resource('clients', ClientController::class)->middleware('employee');
    Route::resource('branches', BranchController::class)->middleware('employee');

});