<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;

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

// Route::get('/auth/github/redirect', function () {
    // try
    // {
        // return Socialite::driver('github')->redirect();
    // } catch (\Exeception$e) {
        // return redirect('/');
    // }

// });

// Route::get('http://localhost:8000/auth/github/callback', function () {

//     $socialiteUser = Socialite::driver('github')->user();

// $user =	User::create([
		// 'name' => $socialiteUser->getName,
		// 'email' => $socialiteUser->getEmail,
		// 'provider' => 'github',
		//  'status' => 1,
		// 'provider_id' => $socialiteUser->getId,
		// 'github_token' => $socialiteUser->getToken,
		// 'github_refresh_token' => $socialiteUser->getRefreshToken,
		//  'student_id' => 'TECH4ALL' . rand(),
	// ]);

//     // $user = User::where([
//     //     'status' => 1,
// 	// 	'student_id' => 'TECH4ALL' . rand(),
//     //     'provider' => 'github',
//     //     'provider_id' => $socialiteUser->getId(),

//     // ])->first();

//     // if (!$user) {
//     //     $user = User::create([
//     //         'name' => $socialiteUser->getName(),
//     //         'email' => $socialiteUser->getEmail(),
//     //         'provider' => 'github',
//     //         'status' => 0,
//     //         'role_as' => 0,
// 	// 		'student_id' => 'TECH4ALL' . rand(),
//     //         'provider_id' => $socialiteUser->getId(),
//     //         'email_verified_at' => now(),
//     //     ]);
//     // }
//     Auth::login($user);

//  return redirect('/home');


//     // $user->token

//     // dd($socialiteUser->getName(), $socialiteUser->getEmail(), $socialiteUser->getId());
 //});

Route::get('/', function () {
    return view('auth.login');
});
//for student login and registration
Route::get('stud', [StudentController::class, 'getstud'])->name('stud');

Route::post('addstud', [StudentController::class, 'student'])->name('addstud');
Route::post('log', [StudentController::class, 'login'])->name('log');
Auth::routes();


Auth::routes();

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => [ProfileController::class, 'edit']]);
    Route::put('profile', ['as' => 'profile.update', 'uses' => [ProfileController::class, 'update']]);
    Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade');
    Route::get('map', function () {return view('pages.maps');})->name('map');
    Route::get('icons', function () {return view('pages.icons');})->name('icons');
    Route::get('table-list', function () {return view('pages.tables');})->name('table');
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => [ProfileController::class, 'password']]);
    Route::get('/home', [HomeController::class, 'index'])->name('home');
	//for employee
	Route::post('employee_add', [AdminsController::class, 'add_employee'])->name('employee');
    Route::get('employ', [AdminsController::class, 'index'])->name('employ');
    Route::get('editemplo/{id}', [AdminsController::class, 'editemployee'])->name('editemp');
    Route::any('updatemplo/{id}', [AdminsController::class, 'updateemployee'])->name('updateemploy');
    Route::get('showemploy', [AdminsController::class, 'showemployee'])->name('showemploy');
    Route::get('viewemploy/{id}', [AdminsController::class, 'viewemployee'])->name('viewemploy');
    // Route::delete('delete/{id}', [AdminsController::class, 'deleteemployee'])->name('deleteemploy');
    Route::post('delete', [AdminsController::class, 'deleteemployee'])->name('deleteemploy');

    //for making a post or anouncement
    Route::get('post', [AdminsController::class, 'getpost'])->name('posts');
    Route::post('addpost', [AdminsController::class, 'createpost'])->name('create');
    Route::get('showpost', [AdminsController::class, 'showpost'])->name('showpost');
    Route::get('editpost/{id}', [AdminsController::class, 'editpost'])->name('editpost');
    Route::post('updatepost/{id}', [AdminsController::class, 'updatepost'])->name('updatepost');
    Route::post('deletepost', [AdminsController::class, 'deletepost'])->name('deletepost');
    //for task
    Route::get('task', [AdminsController::class, 'gettask'])->name('tasks');
    Route::post('tasks', [AdminsController::class, 'createtask'])->name('createtask');
    Route::get('showtask', [AdminsController::class, 'showtasks'])->name('showtask');
    Route::get('edittask/{id}', [AdminsController::class, 'edittask'])->name('edittask');
    Route::post('updatetask/{id}', [AdminsController::class, 'updatetask'])->name('updatetask');
    //for all task and all submitted task
    Route::get('alltask', [AdminsController::class, 'alltask'])->name('alltask');
    Route::get('allsubtask', [AdminsController::class, 'allsubtask'])->name('allsubtask');
    //for showing all users in admin dashboard
    Route::get('getusers', [AdminsController::class, 'getuser'])->name('getusers');
    Route::get('viewuser/{id}', [AdminsController::class , 'viewuser'])->name('viewuser');
    //for displaying task in student navbar
    Route::get('gettask', [StudentController::class, 'getstudtask'])->name('gettask');
    Route::get('viewtask/{id}', [StudentController::class, 'viewtask'])->name('viewtask');
    Route::post('submittask', [StudentController::class, 'submittask'])->name('submit');
    //for submitted task
    Route::get('getsubtask', [AdminsController::class, 'submittedtask'])->name('submitted');
    Route::get('viewsubtask/{id}', [AdminsController::class, 'viewsubmitted'])->name('viewsubmitted');
    Route::post('gradetask/{id}', [AdminsController::class, 'gradetask'])->name('gradetask');
    //regrading task
    Route::get('regrade/{id}', [AdminsController::class, 'regrade']);
    //for Displaying post in the student navbar
    Route::get('getpost', [StudentController::class, 'getstudpost'])->name('getpost');
    Route::get('viewpost/{id}', [StudentController::class, 'viewpost'])->name('viewpost');
    //for profile
    Route::get('myprofile', [AdminsController::class, 'myprofile'])->name('myprofile');
    Route::get('editprofile/{id}', [AdminsController::class, 'editprofile'])->name('editprofile');
    Route::post('updateprofile/{id}', [AdminsController::class, 'updateprofile'])->name('updateprofile');
    //student dashboard
    Route::get('studashboard', [StudentController::class, 'dashboard'])->name('studashboard');
    //for change password
    Route::get('change', [AdminsController::class, 'changepass'])->name('change');
    Route::post('updatepass', [AdminsController::class, 'updatepass'])->name('updatepass');
    //for verify users
    Route::get('verify/{id}', [AdminsController::class, 'verifyuser'])->name('verify');
    //for changing track and course
    Route::get('updtrack', [StudentController::class, 'changetrack'])->name('updtrack');
    Route::post('updatetrack', [StudentController::class, 'updatetrack'])->name('updatetrack');
    Route::get('updcourse', [StudentController::class, 'changecourse'])->name('updcourse');
    Route::post('updatecourse', [StudentController::class, 'updatecourse'])->name('updatecourse');
//to show total student under a particualer course in employees dashboard
Route::get('employee_student', [HomeController::class, 'getstudent'])->name('employee_student');
Route::get('viewstud/{id}', [HomeController::class, 'viewstud'])->name('viewstud');
Route::post('upgradelevel/{id}', [HomeController::class, 'upgradestud'])->name('upgradelevel');



});
