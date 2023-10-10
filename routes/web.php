<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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

Route::get('/', function(){
    return view('welcome');
});




Route::get('/', [UserController::class,'index'])->name('index');
Route::get('/add-user', [UserController::class,'create'])->name('create');
Route::post('/save-user', [UserController::class,'store'])->name('store');
Route::get('/edit-user/{id}', [UserController::class,'edit'])->name('edit');
Route::post('/update-user/{id}', [UserController::class,'update'])->name('update');
Route::get('/view-user/{id}', [UserController::class,'view'])->name('view');
Route::get('/delete-user/{id}', [UserController::class,'delete'])->name('delete');

//excel import export 
Route::get('/excel-export', [UserController::class,'export'])->name('export');
Route::get('/excel-import', [UserController::class,'importView'])->name('import.view');
Route::post('/excel-import', [UserController::class,'import'])->name('import');

