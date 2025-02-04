<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\StudentProfileController;
use App\Http\Controllers\RecruiterProfileController;
use App\Http\Controllers\PostInternshipController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ApplicationController;
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
//Email verification




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
//Forget Password
Route::get('/forgetPassword', [AccountController::class, 'forgetPassword'])->name('Account.forgetpassword');
Route::post('/send-reset-link', [AccountController::class, 'sendResetLink']);

Route::get('/reset-password/{token}', [AccountController::class, 'showResetForm'])->name('Account.resetPassword');

Route::post('/processreset-password/{token}', [AccountController::class, 'processResetPassword'])->name('Account.processResetPassword');










// student dashboard
Route::get('/dashboard', [StudentProfileController::class, 'dashboard'])
    ->name('dashboard')
    ->middleware('auth','verified');

// recruiter dashboard
Route::get('/recruiterdashboard', [RecruiterProfileController::class, 'dashboard'])
    ->name('recruiterdashboard')
    ->middleware('auth', 'verified');
//Recruiter Profiles
 Route::get('/recruiterProfile', [RecruiterProfileController::class, 'create'])->name('recruiterProfile.create')
 ->middleware('auth');
 Route::get('recruiterProfile/edit', [RecruiterProfileController::class, 'edit'])->name('recruiterProfile.edit')
 ->middleware('auth');
//  Route::post('/profile/update', [RecruiterProfileController::class, 'update'])->name('recruiterprofile.update');



 //Student Profiles
 Route::get('/studentProfile', [StudentProfileController::class, 'create'])->name('studentProfile.create')->middleware('auth');

 Route::get('studentProfile/edit', [StudentProfileController::class, 'edit'])->name('studentProfile.edit')
 ->middleware('auth');
 Route::post('/updateProfile', [StudentProfileController::class, 'update'])->name('studentProfile.update');




// Internship routes
Route::middleware(['auth', 'verified'])->group(function () {
Route::get('/createpostinternships', [PostInternshipController::class, 'create'])->name('postinternships.create');
Route::post('/postinternships/store', [PostInternshipController::class, 'store'])->name('postinternships.store');
Route::get('/postinternships', [PostInternshipController::class, 'index'])->name('postinternships.index');
Route::get('postinternships/tablecreate', [PostInternshipController::class, 'tablecreate'])->name('postinternships.tablecreate');
Route::get('postinternships/{id}/edit', [PostInternshipController::class, 'edit'])->name('postinternships.edit');
Route::post('postinternships/{id}', [PostInternshipController::class, 'update'])->name('postinternships.update');
Route::delete('postinternships/{id}', [PostInternshipController::class, 'destroy'])->name('postinternships.destroy');



});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/jobdetails/{id}', [JobController::class, 'show'])->name('job.create');

});

Route::middleware('auth')->group(function () {
 
    Route::get('/apply/{job_id}', [ApplicationController::class, 'create'])->name('apply.create');
    Route::post('/applyjob/{job_id}', [ApplicationController::class, 'store'])->name('apply.store');
});



Route::get('/recruiter/applications/{jobId?}', [RecruiterProfileController::class, 'showApplications'])
    ->name('recruiter.showApplications');

    Route::post('/recruiter/application/{applicationId}/reject', [RecruiterProfileController::class, 'rejectApplication'])->name('recruiter.rejectApplication');
    Route::post('/recruiter/application/{applicationId}/schedule', [RecruiterProfileController::class, 'scheduleInterview'])->name('recruiter.scheduleInterview');

  
    
  

    // Route for the student's dashboard to show their job applications
    Route::middleware('auth')->get('/student/applications', [StudentProfileController::class, 'showStudentApplications'])->name('StudentProfile.showStudentApplications');
    
    



   