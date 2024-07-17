<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
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

Route::get('/member-login', function () {
    return view('auth.member_login');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {


    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');


    Route::prefix('team-members')->group(function () {
        Route::controller(TeamMemberController::class)->group(function () {
            Route::get('/', 'index')->name('team-members.index');
            Route::get('/datatable', 'datatable')->name('team-members.datatable');
            Route::post('/store', 'store')->name('team-members.store');
            Route::get('/edit/{memberId}', 'edit')->name('team-members.edit');
            Route::post('/update/{memberId}', 'update')->name('team-members.update');
            Route::get('/destroy/{memberId}', 'destroy')->name('team-members.destroy');
        });
    });

    Route::prefix('projects')->group(function () {
        Route::controller(ProjectController::class)->group(function () {
            Route::get('/', 'index')->name('projects.index');
            Route::get('/datatable', 'datatable')->name('projects.datatable');
            Route::post('/store', 'store')->name('projects.store');
            Route::get('/edit/{projectId}', 'edit')->name('projects.edit');
            Route::post('/update/{projectId}', 'update')->name('projects.update');
            Route::get('/destroy/{projectId}', 'destroy')->name('projects.destroy');
        });
    });

    Route::prefix('tasks')->group(function () {
        Route::controller(TaskController::class)->group(function () {
            Route::get('/', 'index')->name('tasks.index');
            Route::get('/datatable', 'datatable')->name('tasks.datatable');
            Route::post('/store', 'store')->name('tasks.store');
            Route::get('/show/{taskId}', 'show')->name('tasks.show');
            Route::get('/change-status/{taskId}/{status}', 'changeStatus')->name('tasks.change-status');
            Route::get('/edit/{taskId}', 'edit')->name('tasks.edit');
            Route::post('/update/{taskId}', 'update')->name('tasks.update');
            Route::get('/destroy/{taskId}', 'destroy')->name('tasks.destroy');
        });
    });

});

// Route::get('/dashboard', function () {
//     return view('pages.dashboard');
// });
