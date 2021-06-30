<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\AuthController;


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

 
// Route::get('/', [AuthController::class, 'showFormLogin'])->name('login');
// Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
// Route::post('login', [AuthController::class, 'login']);
// Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
// Route::post('register', [AuthController::class, 'register']);
 
// Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [SuratController::class, 'list']);

    Route::get('/tambah-surat', function () {
        return view('tambah-surat');
    });
    Route::post('/simpan-surat', [SuratController::class, 'simpan']);
    Route::get('/hapus-surat/{id}', [SuratController::class, 'hapus']);
    Route::get('/ubah-surat/{id}', [SuratController::class, 'ubah']);
    Route::post('/ubah-surat', [SuratController::class, 'rubah']);
 
    // Route::get('logout', [AuthController::class, 'logout'])->name('logout');
 
// });
 

 


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
