<?php
use Illuminate\Support\Facades\Artisan;

Route::get('/', function () {
    return view('welcome');
});

//Clear Cache:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<p>Cache cleared...</p>';
});

//Reoptimized:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<p>Reoptimized...</p>';
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::resource('user', 'UserController');
    Route::resource('jenis-surat', 'JenisSuratController');
    Route::get('laporan', 'SuratController@laporan');
    Route::resource('surat', 'SuratController');
    Route::get('surat-masuk', 'SuratController@masuk');
    Route::get('surat-keluar', 'SuratController@keluar');
    Route::get('jenis-surat', 'JenisSuratController@index');
    Route::get('/dashboard', 'HomeController@dashboard');
});