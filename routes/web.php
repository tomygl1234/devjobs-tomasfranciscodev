<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacanciesController;
use App\Http\Controllers\CandidatesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;

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

Route::get('/', HomeController::class)->name('home');

Route::get('/dashboard', [VacanciesController::class, 'index'])->middleware(['auth', 'verified', 'recruiter.role'])->name('vacancies.index');
Route::get('/vacancies/create', [VacanciesController::class, 'create'])->middleware(['auth', 'verified'])->name('vacancies.create');
Route::get('/vacancies/{vacancy}/edit', [VacanciesController::class, 'edit'])->middleware(['auth', 'verified'])->name('vacancies.edit');
Route::get('/vacancies/{vacancy}', [VacanciesController::class, 'show'])->name('vacancies.show');
Route::get('/candidates/{vacancy}', [CandidatesController::class, 'index'])->name('candidates.index'); 

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Notifications
Route::get('/notifications', NotificationController::class)->middleware(['auth', 'verified', 'recruiter.role'])->name('notifications');
require __DIR__.'/auth.php';
