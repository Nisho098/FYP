<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\StudentProfileController;
use App\Http\Controllers\RecruiterProfileController;
use App\Http\Controllers\PostInternshipController;
use App\Models\Recuiter;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'index'])->name('home');

// Resource route for AccountController
//userlogin
Route::get('/signin', [AccountController::class, 'login'])->name('Account.signin');
Route::post('/signin', [AccountController::class, 'loginUser'])->name('loginUser');
//userregisteration
Route::get('/student-signup', [AccountController::class, 'registration'])->name('Account.studentsignup');
Route::post('/account-register', [AccountController::class, 'processStudentRegistration'])->name('Account.registration');
//recuiterregisteration
Route::get('/recuiter-signup', [AccountController::class, 'recuiterregistration'])->name('Account.recuitersignup');
Route::post('/register', [AccountController::class, 'processRecruiterRegistration'])->name('Account.register');



// student dashboard
Route::get('/dashboard', [StudentProfileController::class, 'dashboard'])
    ->name('dashboard')
    ->middleware('auth');

// recruiter dashboard
Route::get('/recruiterdashboard', [RecruiterProfileController::class, 'dashboard'])
    ->name('recruiterdashboard')
    ->middleware('auth');

// Internship routes
Route::middleware(['auth'])->group(function () {
Route::get('/createpostinternships', [PostInternshipController::class, 'create'])->name('postinternships.create');
Route::post('/postinternships/store', [PostInternshipController::class, 'store'])->name('postinternships.store');
Route::get('/postinternships', [PostInternshipController::class, 'index'])->name('postinternships.index');
Route::get('postinternships/tablecreate', [PostInternshipController::class, 'tablecreate'])->name('postinternships.tablecreate');
Route::get('postinternships/{id}/edit', [PostInternshipController::class, 'edit'])->name('postinternships.edit');
Route::post('postinternships/{id}', [PostInternshipController::class, 'update'])->name('postinternships.update');
Route::delete('postinternships/{id}', [PostInternshipController::class, 'destroy'])->name('postinternships.destroy');


});


   