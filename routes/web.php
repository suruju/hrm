<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /**DASHBOARD */
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

    /**DEPARTMENT ROUTE */
    Route::get('/department/list', [DepartmentController::class, 'AllDepartment'])->name('department.list');
    Route::get('/department/add', [DepartmentController::class, 'AddDepartment'])->name('add.department');
    Route::post('/department/store', [DepartmentController::class, 'StoreDepartment'])->name('store.department');
    Route::get('/department/edit/{id}', [DepartmentController::class, 'EditDepartment'])->name('edit.department');
    Route::post('/department/update', [DepartmentController::class, 'UpdateDepartment'])->name('update.department');
    Route::post('/department/delete/{id}', [DepartmentController::class, 'DeleteDepartment'])->name('delete.department');
    Route::get('/department/status/{id}', [DepartmentController::class, 'StatusDepartment'])->name('status.department');
});

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

require __DIR__.'/auth.php';
