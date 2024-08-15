<?php

use App\Http\Controllers\Back\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Back\RoleController;
use App\Http\Controllers\BackController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Back\userController;
use App\Models\Appointment;
use App\Models\Department;
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

Route::prefix('back')->name('back.')->group(function (){
    Route::middleware('admin')->group(function(){

        Route::get('/home',[BackController::class,'index'])->name('index');
        Route::resource('admins',AdminController::class);
        Route::resource('roles',RoleController::class);
        Route::resource('users',userController::class);
    });
    require __DIR__.'/adminAuth.php';

});

Route::prefix('front')->name('front.')->middleware('auth')->group(function(){
    Route::get('/home',[FrontController::class,'index'])->name('index');
    Route::get('/about',[FrontController::class,'about'])->name('about');
    Route::get('/doctors',[FrontController::class,'doctors'])->name('doctors');
    Route::get('/news',[FrontController::class,'news'])->name('news');
    Route::get('/contact',[FrontController::class,'contact'])->name('contact');
    // Route::get('/myBlogs',[FrontController::class,'myBlogs'])->name('myBlogs');
    // Route::get('/myPatients',[FrontController::class,'myPatients'])->name('myPatients');
    // Route::get('/join_doctors',[FrontController::class,'join_doctors'])->name('join_doctors');

    //
    Route::resource('appointments',AppointmentController::class)->only('store');
    Route::resource('contacts',ContactController::class)->only('store');
    Route::post('searchBlog',[BlogController::class,'search'])->name('searchBlog');
    Route::resource('blogs',BlogController::class);

    //join Doctors
    Route::post('join_doctors',[DoctorController::class,'join_doctors'])->name('join_doctors');
    Route::get('/myBlogs',[DoctorController::class,'myBlogs'])->name('myBlogs');
    Route::get('/myPatients',[DoctorController::class,'myPatients'])->name('myPatients');
    Route::resource('doctors', DoctorController::class)->only('create');
});

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
