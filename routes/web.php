<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\InternController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\PerformanceReviewController;
use App\Http\Controllers\DocumentController;


Route::resource(
    'documents',
    DocumentController::class
)
->only([
    'index',
    'create',
    'store'
]);


Route::get(
    'documents/{document}/download',
    [DocumentController::class,'download']
)
->name('documents.download');


Route::resource(
    'performance',
    PerformanceReviewController::class
);

Route::resource(
    'attendance',
    AttendanceController::class
);
Route::resource('tasks', TaskController::class);

Route::resource(
    'tasks',
    TaskController::class
)
->middleware(['auth', 'supervisor']);

Route::middleware(['auth'])->group(function () {
    Route::resource('interns', InternController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('supervisors', SupervisorController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('universities', UniversityController::class);
});

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware(['auth'])
        ->name('dashboard');

    Route::resource('departments', DepartmentController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';