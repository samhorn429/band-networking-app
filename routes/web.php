<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ConnectionsPageController;
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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

require __DIR__.'/auth.php';

//Authorization

//Route::get('/connections', function() {
    //return view('connectionsView');
//})->name('connections')0>uses();

//Route::get('/connectView')->name('connectView');//->uses('App/Http/Controllers/ConnectionsPageController@index');

// Route::get('/connectView', function() {
//     return view('connectView');
// });

// Route::get('/', function() {
//     return view('welcome');
// });

/*
Modal Routes
*/

//Auth
// Route::get('login')->name('login')->uses('App\Http\Controllers\Auth\LoginController@showLoginForm')->middleware('guest');
// Route::post('login')->name('login.attempt')->uses('App\Http\Controllers\Auth\LoginController@login')->middleware('guest');
// Route::post('logout')->name('logout')->uses('App\Http\Controllers\Auth\LoginController@logout');

// Route::get('login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->middleware('auth');
// Route::post('login', 'App\Http\Controllers\Auth\LoginController@login')->middleware('auth');
// Route::post('logout', 'App\Http\Controllers\Auth\LoginController@logout');

Route::get('/', 'App\Http\Controllers\WelcomeController@index')->middleware('auth');//->middleware('auth');

Route::get('connections', [ConnectionsPageController::class, 'index'])->middleware('remember', 'auth');
// Route::put('/')->name('connections.addMessage')->uses('ConnectionsPageController@addMessage')->middleware('auth');
// Route::put('connections')->name('connections.storeMessage')->uses('ConnectionsPageController@storeFromAddMessageModal')->middleware('auth');
// Route::delete('connections')->name('connections.destroy')->uses('ConnectionsPageController@destroy')->middleware('auth');

Route::put('connections', 'App\Http\Controllers\ConnectionsPageController@addMessage')->middleware('auth');
Route::put('connections', 'App\Http\Controllers\ConnectionsPageController@storeFromAddMessageModal')->middleware('auth');
Route::delete('connections', 'App\Http\Controllers\ConnectionsPageController@destroy')->middleware('auth');

Route::get('500', function() {
    echo $fail;
});