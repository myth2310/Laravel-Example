<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MahasiswaController;

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
//Mahasiswa
Route::get('/tampilmahasiswa',[MahasiswaController::class,'tampilmahasiswa']);
Route::get('/add-mahasiswa',[MahasiswaController::class,'create']);
Route::post('/add-mahasiswa',[MahasiswaController::class,'store']);
Route::get('/hapusdata/{id}',[MahasiswaController::class, 'hapusdata'])->name('hapusdata');
Route::get('/edit-mahasiswa/{id}',[MahasiswaController::class, 'editdata']);
Route::put('/update-mahasiswa/{id}',[MahasiswaController::class, 'update']);



Route::get('/', function () {
    return view('mahasiswa');
});



Route::get('/pegawai',[EmployeeController::class, 'index'])->name('pegawai');

Route::get('/tambahpegawai',[EmployeeController::class, 'tambahpegawai'])->name('tambahpegawai');

Route::post('/insertdata',[EmployeeController::class, 'insertdata'])->name('insertdata');

Route::get('/tampildata/{id}',[EmployeeController::class, 'tampildata'])->name('tampiltdata');

Route::post('/updatedata/{id}',[EmployeeController::class, 'updatedata'])->name('updatedata');

Route::get('/deletedata/{id}',[EmployeeController::class, 'deletedata'])->name('deletetdata');