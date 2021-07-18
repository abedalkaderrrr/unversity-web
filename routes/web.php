<?php

use Illuminate\Support\Facades\Route;
use    Illuminate\Support\Facades\Auth;
use    Illuminate\Support\Facades\Request;
use App\Models\User;
// controller for dashboard
use App\Http\Controllers\admin\teacherController;
use App\Http\Controllers\admin\categoryController;
use App\Http\Controllers\admin\roomsController;
use App\Http\Controllers\admin\advrtismentController;
use App\Http\Controllers\admin\bookingController;
use App\Http\Controllers\admin\homeController;
use App\Http\Controllers\admin\matrialController;
use App\Http\Controllers\marks\marksController;
use App\Http\Controllers\students\postsController;
use App\Http\Controllers\students\studController;
// controller for teacher
use App\Http\controllers\teacher\teachController;

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

Route::get('/', function () {
    return view('welcome');
});
//test

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('loginRoute')->name('home');


Route::get('/test', function () {
    return view('layouts.dashboard');
});


Route::group(['prefix' => 'Dashboard/', 'middleware' => ['auth', 'admin']], function () {
    Route::get('index', [homeController::class, 'index'])->name('dashboard.main');
    Route::put('index/{id}/profile', [homeController::class, 'edit'])->name('dashboard.profile.edit');
    Route::get('index/{id}/profile', function ($id) {

        return view('dashboard.profile', ['student' => User::find($id)]);
    })->name('dashboard.profile');

    Route::group(['prefix' => 'students/'], function () {

        //show the students for the specific year
        Route::get('index', function (Request $request) {
            $cat = request()->category;
            $year = request()->year;
            // dd($year);
            return redirect()->to(route('student.show', ['cat' => $cat, 'year' => $year]));
        })->name('students');

        Route::get('index/{cat}/{year}', 'App\Http\Controllers\admin\studentController@students')->name('student.show');

        //add  a student
        Route::get('index/{cat}/{year}/addstudent', 'App\Http\Controllers\admin\studentController@pageAddStudent')->name('pageAddStudent');
        Route::post('index/addstudent', 'App\Http\Controllers\admin\studentController@addStudent')->name('student.add');
        //remove a student
        Route::delete('index/student/{id}/delete', 'App\Http\Controllers\admin\studentController@deleteStudent')->name('student.delete');
        //edit a student
        Route::get('index/student/{id}/edit', 'App\Http\Controllers\admin\studentController@pageEditStudent')->name('pageStudentEdit');
        Route::put('index/student/{id}/edit', 'App\Http\Controllers\admin\studentController@editStudent')->name('student.edit');

        //remove all students in this category
        Route::delete('index/students/{cat}/{year}/delete', 'admin\studentController@deleteStudents');
        //add a set of students by the excel file [import]
        Route::post('index/{cat}/{year}/students/import/all', 'App\Http\Controllers\admin\studentController@importStudentByExcel')->name('import.students');
        //export student file
        Route::get('index/{cat}/{year}/students/export/all', 'App\Http\Controllers\admin\studentController@exportStudentByExcel')->name('export.students');
    });


    Route::group(['prefix' => 'teachers/'], function () {
        Route::get('index', [teacherController::class, 'index'])->name('teacher.index');
        Route::get('index/{id}/subject', [teacherController::class, 'subjectPage'])->name('teacher.subject');
        Route::post('index/doctor/add', 'admin\doctorController@addDoctor');

        Route::delete('index/{id}/delete', [teacherController::class, 'deleteDoctor'])->name('teacher.delete');
        Route::get('index/{id}/pageEeitTeacher', [teacherController::class, 'pageEeitTeacher'])->name('teacher.pageEdit');
        Route::put('index/{id}/edit', [teacherController::class, 'editDoctor'])->name('teacher.edit');
        Route::get('index/add', [teacherController::class, 'addTeacher'])->name('teacher.add');
        Route::post('index/create', [teacherController::class, 'createTeacher'])->name('teacher.create');

        Route::post('index/doctor/{id}/{matrial}/add', [teacherController::class, 'addDoctorMatrial'])->name('teacher.addMatrial');
        Route::delete('index/doctor/{id}/{matrial}/delete', [teacherController::class, 'deleteDoctorMatrail'])->name('teacher.deleteMatrial');
    });



    Route::group(['prefix' => 'categories/'], function () {
        Route::get('index', [categoryController::class, 'index'])->name('category.index');
        Route::post('index/add', [categoryController::class, 'addCategory'])->name('category.add');
        Route::delete('index/{id}/delete', [categoryController::class, 'deleteCategory'])->name('category.delete');
        Route::put('index/{id}/edit', [categoryController::class, 'editCategory'])->name('category.edit');
        Route::get('index/{id}/edit', [categoryController::class, 'editPageCategory'])->name('categoryPageEdit');

        Route::get('users/add', function () {
            return view('dashboard.dep-add');
        })->name('categoryPageAdd');
    });

    Route::group(['prefix' => 'rooms/'], function () {
        Route::get('index', [roomsController::class, 'index'])->name('room.index');
        Route::post('index/add', [roomsController::class, 'addRooms'])->name('room.add');
        Route::get('index/add', function () {
            return view('dashboard.cla-add');
        })->name('roomPageAdd');
        Route::delete('index/{id}/delete', [roomsController::class, 'deleteRooms'])->name('room.delete');
        Route::put('index/{id}/edit', [roomsController::class, 'editRooms']);
    });

    Route::group(['prefix' => 'advertisments/'], function () {
        Route::get('index', [advrtismentController::class, 'index'])->name('adver.index');
        Route::post('index/add', [advrtismentController::class, 'adddAvertisment'])->name('advertisment.add');
        Route::get('index/add', function () {
            return view('dashboard.advert-add');
        })->name('advertismentPageAdd');
        Route::delete('index/{id}/delete', [advrtismentController::class, 'deleteAdvertisment'])->name('advertisment.delete');
        Route::put('index/{id}/edit', [advrtismentController::class, 'editAdvertisment'])->name('advertisment.edit');
        Route::get('index/{id}/edit', [advrtismentController::class, 'editPageAdvertisment'])->name('editPageAdver');
    });


    Route::group(['prefix' => 'bookings/'], function () {
        Route::get('index', [bookingController::class, 'index'])->name('booking.index');
        Route::post('index/add', [bookingController::class, 'adddBooking'])->name('booking.create');
        Route::get('index/add', function () {
            return view('dashboard.rese-add');
        })->name('booking.add');
        Route::delete('index/{id}/delete', [bookingController::class, 'deleteBooking'])->name('booking.delete');
        Route::put('index/{id}/edit', [bookingController::class, 'editBooking']);
    });
    Route::group(['prefix' => 'matrials/'], function () {
        Route::get('index', [matrialController::class, 'index'])->name('matrial.index');
        Route::post('index/add', [matrialController::class, 'addmatrial'])->name('matrial.create');
        Route::get('index/add', function () {
            return view('dashboard.matrial-add');
        })->name('matrial.add');
        Route::delete('index/{id}/delete', [matrialController::class, 'deleteMatrial'])->name('matrial.delete');
        Route::put('index/{id}/edit', [matrialController::class, 'editBooking']);
    });
});



Route::group(['prefix' => 'teacher/',], function () {
    Route::get('index', [teachController::class, 'index'])->name('teach.main');
    Route::post('test', [teachController::class, 'test'])->name('test.api');
    Route::post('booking/store', [teachController::class, 'store'])->name('teach.store');
    Route::post('lecture/store', [teachController::class, 'storeLecture'])->name('teach.lecture');
    Route::delete('lecture/{id}/delete', [teachController::class, 'deleteLecture'])->name('teach.lecture.delete');
    Route::get('projectAdver/{category}/{matrial}', [teachController::class, 'projectAdver'])->name('teach.project');
    Route::post('avertisment/{category}/{matrial}/add', [teachController::class, 'advertismentAdd'])->name('teach.advertisment.add');
    Route::post('avertisment/edit', [teachController::class, 'advertismentEdit'])->name('teach.advertisment.edit');
    Route::delete('advertisments/{id}/delete', [teachController::class, 'deleteAdver'])->name('teach.adver.delete');
    Route::post('projects/add', [teachController::class, 'projectAdd'])->name('teach.project.add');
    Route::delete('project/{id}/delete', [teachController::class, 'deleteProject'])->name('teach.project.delete');
    Route::post('project/edit', [teachController::class, 'projectEdit'])->name('teach.project.edit');
    Route::get('students/{category}', [teachController::class, 'getStudent'])->name('teach.student.get');

    Route::get('project/{id}/download', [teachController::class, 'projectDownload'])->name('download.projects');
    Route::post('search/teacher', [teachController::class, 'searchTeacher'])->name('search.teacher');
    Route::get('search/teacher', [teachController::class, 'searchTeacherIndex'])->name('search.teacher.get');
    Route::get('search/room', [teachController::class, 'searchRoomIndex'])->name('search.room.get');

    Route::post('search/room', [teachController::class, 'searchRoom'])->name('search.room');
});

Route::group(['prefix' => 'students/'], function () {
    Route::get('index', [studController::class, 'index'])->name('stud.index');
    Route::get('advertisments/{cat}', [studController::class, 'advertisments'])->name('stud.advertisments');
    Route::get('projects/{cat}', [studController::class, 'projects'])->name('stud.projects');
    Route::post('projects/upload', [studController::class, 'uploadProject'])->name('upload.project');
    Route::get('posts', [studController::class, 'myPosts'])->name('stud.myposts');
    Route::get('profile', [studController::class, 'profile'])->name('stud.profile');
    Route::post('profile/edit', [studController::class, 'profileEdit'])->name('edit.profile');
    Route::get('{id}/lectures', [studController::class, 'lectures'])->name('stud.lectures');
});

Route::group(['prefix' => 'posts/'], function () {
    Route::get('{id}/index', [postsController::class, 'index'])->name('posts.index');
    Route::post('post', [postsController::class, 'post'])->name('posts.post');
    Route::post('commit', [postsController::class, 'commit'])->name('posts.commit');
    Route::post('reply', [postsController::class, 'reply'])->name('posts.reply');
    Route::delete('delete', [postsController::class, 'deletePost'])->name('post.delete');
    Route::post('edit', [postsController::class, 'edit'])->name('posts.edit');
});


Route::group(['prefix' => 'marks/'], function () {
    Route::get('index', [marksController::class, 'index'])->name('marks.upload');
    Route::post('select', [marksController::class, 'selectMatrial'])->name('marks.select.matrial');
    Route::post('matrial/upload', [marksController::class, 'upload'])->name('upload.matrial');
    Route::get('marks', [marksController::class, 'marks'])->name('student.marks');
});
