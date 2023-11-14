<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('login');
});
Route::get('/admin', [LoginController::class, 'getLogin'])->name('login');
 
Route::post('/login', [  LoginController::class, 'postLogin']);

Route::get('/logout', [  LoginController::class, 'LogoutUser']);

Route::get('/register-form', [  LoginController::class, 'SignUp'])->name('register-form');

Route::post('/save-new-users', [  LoginController::class, 'SaveNewUsers'])->name('save-new-users');

Route::group(['middleware' => 'auth'], function () {
    Route::controller(UserController::class)->group(function() {
        

        Route::post('/authenticate', 'authenticate')->name('authenticate');
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/user-dashboard', 'UserDashboard')->name('user-dashboard');

        Route::get('/create-designations', 'CreateDesignations')->name('create-designations');
        Route::get('/designation-list', 'DesignationLists')->name('designation-list');
        Route::post('/save-designations', 'SaveDesignations')->name('save-designations');
        Route::get('/get-designation', 'GetDesignations')->name('get-designations');
        Route::get('/edit-designation/{id}','EditDesignation')->name('edit-designation');

        Route::get('/create-users', 'CreateUsers')->name('create-users');
        Route::get('/users-list', 'UsersList')->name('users-list');
        Route::post('/save-users', 'SaveUsers')->name('save-users');
        Route::get('/get-users', 'GetUsers')->name('get-users');
        Route::get('/edit-user-dtls/{id}','EditUserDtls')->name('edit-user-dtls');
        Route::post('/search-user', 'SearchUsers')->name('search-users');
    });
});