<?php

use App\Http\Controllers\AuthController;
use App\Models\Siswa;
use App\Models\Staff;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\KuUsiaController;
use App\Http\Controllers\InstitusiController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\RaporController;
use App\Models\Ku_usia;

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

// login
Route::get('/login', [AuthController::class, 'index'])->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware(['auth'])->group(function () {

    // logout
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/', function () {
        $title = 'Dashboard';
        $siswa = Siswa::with('kuu')->get();
        $staff = Staff::all();
        $ku = Ku_usia::all();
        return view('admin.dashboard', compact('title', 'siswa', 'staff', 'ku'));
    });

    Route::get('admin/dashboard', function () {
        $title = 'Dashboard';
        $siswa = Siswa::with('kuu')->get();
        $staff = Staff::all();
        $ku = Ku_usia::all();
        return view('admin.dashboard', compact('title', 'siswa', 'staff', 'ku'));
    });
    // Master Data

    Route::prefix('admin')->group(function () {

        Route::get('/institusi', [InstitusiController::class, 'index']);
        Route::post('/institusi', [InstitusiController::class, 'store'])->name('tambah_institusi');
        Route::resource('/divisi', DivisiController::class);
        Route::resource('/staff', StaffController::class);
        Route::get('/asset', function () {
            $title = 'Data Asset';

            return view('admin.asset', compact('title'));
        });
        Route::resource('ku-usia', KuUsiaController::class);
        Route::resource('siswa', SiswaController::class);
        // Master Data End
        route::get('/profil', [AuthController::class, 'profil'])->name('profil');
    });
});




// Data Rapor
Route::resource('setting-periode', PeriodeController::class);
Route::put('setting-periode/{id}', [PeriodeController::class, 'update']);
Route::delete('setting-periode/{id}', [PeriodeController::class, 'destroy']);

Route::get('data-rapor', [RaporController::class, 'index'])->name('data-rapor');
Route::get('input-nilai', [RaporController::class, 'create'])->name('input-nilai');
Route::post('simpan-nilai', [RaporController::class, 'store'])->name('simpan-nilai');
Route::get('input-nilai/{id}/edit', [RaporController::class, 'edit'])->name('edit-nilai');
Route::put('input-nilai/{id}', [RaporController::class, 'edit'])->name('update-nilai');
Route::delete('input-nilai/{id}', [RaporController::class, 'destroy'])->name('delete-rapor');
Route::get('input-nilai/{id}/download', [RaporController::class, 'downloadRaporPdf'])->name('download-rapor');
// Data Rapor End
