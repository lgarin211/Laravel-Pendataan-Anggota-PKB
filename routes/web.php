<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DataAnggotaController;

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
Route::post('/pasfile', [DataAnggotaController::class, 'pasfile']);

Route::get('/', function () {
    return redirect('login');
});

Route::get('/ard', function () {
    if (auth()->user()->role=='Admin') {
        return redirect('anggota');
    }else{
    return view('User/master');
    }
});


Route::get('data_users', [UserController::class, 'index'])->name('users.index');

Route::post('/adduser', [DataAnggotaController::class, 'akun_add']);
Route::get('/Hapus', [DataAnggotaController::class, 'Hapus']);

Route::get('/sand', [DataAnggotaController::class, 'sand']);
Route::get('/Adminkan', [DataAnggotaController::class, 'Adminkan']);

Route::get('anggota', [UserController::class, 'anggota'])->name('anggota.index');

Route::get('/edit', [DataAnggotaController::class, 'edit']);

Route::post('/edit', [DataAnggotaController::class, 'edit']);

Route::get('users/export/', [UserController::class, 'export']);

Route::get('dapil/export/', [UserController::class, 'dapilexport']);

Route::post('/Dapilset', [DataAnggotaController::class, 'Dapil']);



Route::get('/Fbylok', [DataAnggotaController::class, 'Fbylok']);

Route::get('/Fbydapil', [DataAnggotaController::class, 'Fbydapil']);

Route::get('/cetak', [DataAnggotaController::class, 'Cetak']);

Route::get('/kelengkapandata', function () {
    // dd($_GET);
    return view('DataDiri/datadiri');
});
// Route::get('/kelengkapandata', [DataAnggotaController::class, 'kelengkapandata']);
Route::post('/kelengkapandata', [DataAnggotaController::class, 'kelengkapandata']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
