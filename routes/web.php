<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpreadSheetController;

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


Route::get('/test-tailwind', function(){
    return view('test_tailwind');
});


Route::get('/import-by-queue', [SpreadSheetController::class,'showQueuImportPage'])->name('importWithQueue.show');
Route::post('/import-by-queue', [SpreadSheetController::class,'importFileWithQueue'])->name('importWithQueue.save');

Route::get('/generate-data', [SpreadSheetController::class,'generateData'])->name('generateData');

Route::get('/import-by-laravel-excel', [SpreadSheetController::class,'showLaravelExcelImportPage'])->name('importWithLaravelExcel.show');
Route::post('/import-by-laravel-excel', [SpreadSheetController::class,'importFileWithLaravelExcel'])->name('importWithLaravelExcel.save');

Route::get('developer-show', [SpreadSheetController::class,'developersShowPage'])->name('developers.show');
