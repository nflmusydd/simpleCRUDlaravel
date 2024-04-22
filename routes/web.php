<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\LoginController;

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


// Route::get('/welcome', function () {
//     //echo "Welcome tho Sonic";
//     return view('hello');
// });



Route::group(['middleware'=>'auth'], function (){
    Route::get('/', [MahasiswaController::class, 'index']);
    Route::resource('data/mahasiswa', MahasiswaController::class);

    Route::get('/', [DosenController::class, 'index']);
    Route::resource('data/dosen', DosenController::class);
});

Route::post('/authenticate', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/login', function(){
    return view('login');
})->name('login');

Route::get('registration',[LoginController::class, 'registration']);

// Route::get('/form', function () {
//     //echo "Welcome tho Sonic";
//     return view('form');
// });


// Route::get('/profile/{username}', [MainController::class, 'ProfilePage']);

// Route::get('home', [MainController::class, 'HomePage']);