<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TeamMemberController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {


    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');


    Route::prefix('team-members')->group(function () {
        Route::controller(TeamMemberController::class)->group(function () {
            Route::get('/', 'index')->name('team-members.index');
            Route::post('/store', 'store')->name('team-members.store');
            // Route::get('/edit/{team-member}', 'edit')->name('team-members.edit');
            Route::post('/update/{memberId}', 'update')->name('team-members.update');
            Route::get('/destroy/{memberId}', 'destroy')->name('team-members.destroy');
        });
    });

});

// Route::get('/dashboard', function () {
//     return view('pages.dashboard');
// });
