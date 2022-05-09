<?php

use App\Http\Controllers\ComparisonController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\ProfileController;
use App\Models\DetailProfile;
use App\Models\Divisi;
use App\Models\KriteriaComparison;
use App\Models\Posisi;
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
    return view('Dashboard', [
        'divisi' => Divisi::all(),
        'posisi' => Posisi::all(),
        'profile' => DetailProfile::all()
    ]);
});

Route::get('home', [HomeController::class, 'index'])->name('index');

Route::resource('kriteria', KriteriaController::class);
Route::resource('comparison', ComparisonController::class);

Route::get('createcv', [HomeController::class, 'createCV'])->name('createCV');
Route::resource('profile', ProfileController::class);

Route::get('/{kriteria_for:kriteria_for}', [HomeController::class, 'keputusan'])->name('keputusan');
    