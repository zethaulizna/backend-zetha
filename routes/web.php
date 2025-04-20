<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeDescriptionController;
use App\Http\Controllers\HomeServiceController;
use App\Http\Controllers\HomeProductController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\FacultyLeaderController;
use App\Http\Controllers\VisionMissionController;
use App\Http\Controllers\ManagementController;
use Illuminate\Support\Facades\Route;

// =======================
// 🌍 ROUTE UNTUK PENGUNJUNG (Front-End)
// =======================

Route::get('/', [HomeController::class, 'index']);

// Halaman About Us (Pengunjung) - Render views/aboutus.blade.php
Route::get('/about-us', [AboutUsController::class, 'show'])->name('aboutus.public');

// Halaman Pimpinan Fakultas
Route::get('/pimpinan', [FacultyLeaderController::class, 'index'])->name('pimpinan.public');

// Halaman Visi Misi
Route::get('/visimisi', [VisionMissionController::class, 'index'])->name('visimisi.public');

// Halaman manajemen (pengunjung)
Route::get('/manajemen', [ManagementController::class, 'index'])->name('manajemen.public');


// =======================
// 🔑 LOGIN & LOGOUT
// =======================

Route::get('/login', function(){
    return view('login');
});
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// =======================
// 🛠 ROUTE UNTUK DASHBOARD (Admin)
// =======================
Route::prefix('dashboard')->middleware('auth')->group(function(){

    Route::get('/', function(){
        return view('dashboard');
    });

    // Home Descriptions (Dashboard)
    Route::get('descriptions', [HomeDescriptionController::class, 'index'])->name('dashboard.descriptions');
    Route::get('descriptions/create', [HomeDescriptionController::class, 'create'])->name('descriptions.create');
    Route::post('descriptions', [HomeDescriptionController::class, 'store'])->name('descriptions.store');
    Route::get('descriptions/edit/{id}', [HomeDescriptionController::class, 'edit'])->name('descriptions.edit');
    Route::put('descriptions/update/{id}', [HomeDescriptionController::class, 'update'])->name('descriptions.update');
    Route::delete('descriptions/delete/{id}', [HomeDescriptionController::class, 'destroy'])->name('descriptions.delete');

   // Home Services (Layanan)
Route::get('services', [HomeServiceController::class, 'index'])->name('services.index');
Route::get('services/create', [HomeServiceController::class, 'create'])->name('services.create');
Route::post('services', [HomeServiceController::class, 'store'])->name('services.store');
Route::get('services/edit/{id}', [HomeServiceController::class, 'edit'])->name('services.edit');
Route::put('services/update/{id}', [HomeServiceController::class, 'update'])->name('services.update');
Route::delete('services/destroy/{id}', [HomeServiceController::class, 'destroy'])->name('services.destroy');

// Home Products (Produk)
Route::get('products', [HomeProductController::class, 'index'])->name('products.index');
Route::get('products/create', [HomeProductController::class, 'create'])->name('products.create');
Route::post('products', [HomeProductController::class, 'store'])->name('products.store');
Route::get('products/edit/{id}', [HomeProductController::class, 'edit'])->name('products.edit');
Route::put('products/update/{id}', [HomeProductController::class, 'update'])->name('products.update');
Route::delete('products/destroy/{id}', [HomeProductController::class, 'destroy'])->name('products.destroy');


     // Halaman utama About Us di Dashboard
     Route::get('/aboutus', [AboutUsController::class, 'index'])->name('dashboard.aboutus');

     // Tambah About Us
     Route::get('/aboutus/create', [AboutUsController::class, 'create'])->name('aboutus.create');
     Route::post('/aboutus', [AboutUsController::class, 'store'])->name('aboutus.store');
 
     // Edit About Us
     Route::get('/aboutus/edit/{id}', [AboutUsController::class, 'edit'])->name('aboutus.edit');
     Route::put('/aboutus/update/{id}', [AboutUsController::class, 'update'])->name('aboutus.update');
 
     // Hapus About Us
     Route::delete('/aboutus/destroy/{id}', [AboutUsController::class, 'destroy'])->name('aboutus.destroy');

    // Faculty Leaders (Dashboard)
    Route::get('/leaders', [FacultyLeaderController::class, 'dashboardIndex'])->name('dashboard.leaders');

    Route::get('/pimpinan/create', function () {
        return view('leaders.create');
    })->name('pimpinan.create');

    Route::post('/pimpinan/store', [FacultyLeaderController::class, 'store'])->name('pimpinan.store');

    Route::get('/pimpinan/edit/{id}', function ($id) {
        $leader = App\Models\FacultyLeader::findOrFail($id);
        return view('leaders.edit', compact('leader'));
    })->name('pimpinan.edit');

    Route::put('/pimpinan/update/{id}', [FacultyLeaderController::class, 'update'])->name('pimpinan.update');

    Route::delete('/pimpinan/destroy/{id}', [FacultyLeaderController::class, 'destroy'])->name('pimpinan.destroy');

   // Vision & Missions (Dashboard)
Route::get('vision', [VisionMissionController::class, 'dashboardIndex'])->name('dashboard.vision');
Route::get('/visimisi/create', [VisionMissionController::class, 'create'])->name('visimisi.create');
Route::get('/visimisi/edit/{id}', [VisionMissionController::class, 'edit'])->name('visimisi.edit');
Route::post('/visimisi/store', [VisionMissionController::class, 'store'])->name('visimisi.store');
Route::post('/visimisi/update/{id}', [VisionMissionController::class, 'update'])->name('visimisi.update');
Route::delete('/visimisi/destroy/{id}', [VisionMissionController::class, 'destroy'])->name('visimisi.destroy');


    // Management (Dashboard)
Route::get('/management', [ManagementController::class, 'dashboardIndex'])->name('dashboard.management');

Route::get('/manajemen/create', function () {
    return view('management.create');
})->name('manajemen.create');

Route::post('/manajemen/store', [ManagementController::class, 'store'])->name('manajemen.store');

Route::get('/manajemen/edit/{id}', function ($id) {
    $management = App\Models\Management::findOrFail($id);
    return view('management.edit', compact('management'));
})->name('manajemen.edit');

Route::put('/manajemen/update/{id}', [ManagementController::class, 'update'])->name('manajemen.update');

Route::delete('/manajemen/destroy/{id}', [ManagementController::class, 'destroy'])->name('manajemen.destroy');

// Halaman publik
Route::get('/manajemen', [ManagementController::class, 'index'])->name('manajemen.public');



    Route::get('user', [UserController::class, 'dashboardIndex'])->name('dashboard.user');
    // Menampilkan halaman user

    // Menambah user baru
    Route::get('user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('user', [UserController::class, 'store'])->name('user.store');

    // Mengedit user
    Route::get('user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('user/{user}', [UserController::class, 'update'])->name('user.update');

    // Menghapus user
    Route::delete('user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
});
