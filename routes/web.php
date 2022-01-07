<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Connections and Messages
Route::get('connections')->name('connections')->uses('ConnectionsPageController@index')->middleware('auth');
//Route::get('connections/{connection}')->name('connections.showMessages')->uses('ConnectionsPageController@showMessages')->middleware('auth');
Route::post('/connections/{connection}/messages')->name('connections.addMessage')->uses('ConnectionsPageController@addMessage')->middleware('auth');



// Route::get('/')->name('connections')->uses('ConnectionsPageController@index')->middleware('remember', 'auth');
// Route::put('/')->name('add_message')->uses('ConnectionsPageController@addMessage')->middleware('auth');
// //Route::put('/')->name('send_message')->uses('ConnectionsPageController@storeFromAddMessageModal')->middleware('auth');
// Route::delete('/')->name('remove_connection')->uses('ConnectionsPageController@deleteFromRemoveConfirmModal')->middleware('auth');

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
