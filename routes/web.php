<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\FileUpload;
use App\Http\Controllers\MessageController;

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
    return view('/auth/login');
});

Route::get('teacher', [UserController::class, 'index1'])->name('users.index1');
Route::get('student', [UserController::class, 'index2'])->name('users.index2');
Route::get('teacher_edit/{id}', [UserController::class, 'edit1'])->name('users.edit1');
Route::get('student_edit/{id}', [UserController::class, 'edit2'])->name('users.edit2');
Route::put('update1/{id}', [UserController::class, 'update1'])->name('users.update1');
Route::put('update2/{id}', [UserController::class, 'update2'])->name('users.update2');
Route::resource('users', UserController::class);

//Authenticate Route
Route::get('dashboard1', [CustomAuthController::class, 'dashboard1']);
Route::get('dashboard2', [CustomAuthController::class, 'dashboard2']);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

//File Upload Route
Route::resource('files', FileUpload::class);
Route::get('/upload-file', [FileUpload::class, 'createForm']);
Route::post('/upload-file', [FileUpload::class, 'fileUpload'])->name('fileUpload');

//File Download Route
Route::get('/download/{file}', [FileUpload::class, 'download'])->name('files.download');

//Message Route
Route::resource('messages', MessageController::class);
Route::get('/MessageInfo', [MessageController::class, 'showMessInfo'])->name('messages.showMessInfo');