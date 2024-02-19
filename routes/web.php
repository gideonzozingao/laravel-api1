<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\ReportsController;
use App\Http\Controllers\ReportTypeController;

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

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::group([
    "middleware" => ['auth', 'verified'],
    'prefix' => 'users',
], function () {

    Route::get("/", [UserController::class, "index"])->name('users');
    Route::get("new", [UserController::class, "create"])->name("users.new");
    Route::get('/{id}', [UserController::class, "show"])->name('user');
    Route::get('/{id}/edit', [UserController::class, "edit"])->name('user.edit');
    Route::post("new", [UserController::class, "store"])->name('user.create');
});
Route::group([
    "middleware" => ['auth', 'verified'],
    'prefix' => 'reports',
], function () {

    Route::get("/", [ReportsController::class, "index"])->name('reports');
    Route::get("new", [ReportsController::class, "create"])->name("reports.new");
    Route::get('/{id}', [ReportsController::class, "show"])->name('report');
    Route::get('/{id}/edit', [ReportsController::class, "edit"])->name('report.edit');
    // Route::post("new", [UserController::class, "store"])->name('user.create');
});
Route::group([
    "middleware" => ['auth', 'verified'],
    'prefix' => 'reportsTypes',
], function () {

    Route::get("/", [ReportTypeController::class, "index"])->name('reportsTypes');
    Route::get("new", [ReportTypeController::class, "create"])->name("reportsTypes.new");
    Route::get('/{id}', [ReportTypeController::class, "show"])->name('reportsType');
    Route::get('/{id}/edit', [ReportTypeController::class, "edit"])->name('reportsType.edit');
    // Route::post("new", [UserController::class, "store"])->name('user.create');
});
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
