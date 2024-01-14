<?php

use App\Http\Controllers\AESController;
use App\Http\Controllers\caesarController;
use App\Http\Controllers\DESController;
use App\Http\Controllers\otpController;
use App\Http\Controllers\playfairController;
use App\Http\Controllers\RSAController;
use App\Http\Controllers\scytaleController;
use App\Http\Controllers\vigenereController;
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
    return view('welcome');
});
Route::get('/caesar', [caesarController::class, 'yourMethod']);
Route::post('/caesar/encrypt', [caesarController::class, 'yourMethod'])->name('caesar.encrypt');
Route::post('/caesar/decrypt', [caesarController::class, 'decrypt'])->name('caesar.decrypt');

Route::get('/vigenere', [VigenereController::class, 'showForm'])->name('form');
Route::post('/vigenere/encrypt', [VigenereController::class, 'encrypt'])->name('vigenere.encrypt');
Route::post('/vigenere/decrypt', [VigenereController::class, 'decrypt'])->name('vigenere.decrypt');

Route::get('/vernam', [otpController::class, 'index'])->name('vernam.index');
Route::post('/vernam/encrypt', [otpController::class, 'encrypt'])->name('vernam.encrypt');
Route::post('/vernam/decrypt', [otpController::class, 'decrypt'])->name('vernam.decrypt');

Route::get('/scytale', [scytaleController::class, 'index'])->name('scytale.index');
Route::post('/scytale/encrypt', [scytaleController::class, 'encrypt'])->name('scytale.encrypt');
Route::post('/scytale/decrypt', [scytaleController::class, 'decrypt'])->name('scytale.decrypt');

Route::get('/playfair', [playfairController::class, 'index'])->name('playfair.index');
Route::post('/playfair/encrypt', [PlayfairController::class, 'encrypt'])->name('playfair.encrypt');
Route::post('/playfair/decrypt', [PlayfairController::class, 'decrypt'])->name('playfair.decrypt');

Route::get('/des/DES', [DESController::class, 'index']);
Route::post('/des/encrypt', [DESController::class, 'encrypt'])->name('des.encrypt');
Route::post('/des/decrypt', [DESController::class, 'decrypt'])->name('des.decrypt');

Route::get('/aes/AES', [AESController::class, 'index']);
Route::post('/aes/encrypt', [AESController::class, 'encrypt'])->name('aes.encrypt');
Route::post('/aes/decrypt', [AESController::class, 'decrypt'])->name('aes.decrypt');

// Route::get('/rsa/RSA', [RSAController::class, 'index']);
// Route::post('/rsa/encrypt', [RSAController::class, 'encrypt'])->name('rsa.encrypt');
// Route::post('/rsa/decrypt', [RSAController::class, 'decrypt'])->name('rsa.decrypt');
