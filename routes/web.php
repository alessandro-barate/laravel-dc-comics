<?php

use App\Http\Controllers\Admin\ComicController;
use App\Http\Controllers\Guest\ComicsController;
use App\Http\Controllers\Guest\PageController;
use App\Models\Comic;
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

// Homepage route
Route::get('/', [PageController::class, 'index']);

Route::resource('comics', ComicController::class);
