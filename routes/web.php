<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\dashboardChartController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\FAQController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::view('home', 'user.home');
Route::get('/index1', [CourseController::class, 'index1']);
//Route::get('/course/{id}', [CourseController::class, 'details'])->name('user.details');
Route::get('/course/{id}', [CourseController::class, 'details'])->name('user.details');
Route::post('/lessons/{courseId}', [LessonController::class, 'store'])->name('lessons.store');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::post('courses/{course}/sections', [SectionController::class, 'store'])->name('section.store');
Route::post('/courses/{course}/add-requirement', [CourseController::class, 'addRequirement'])->name('courses.addRequirement');
Route::post('/rate-course', [RatingController::class, 'store'])->name('course.rate');
Route::post('/courses/{id}/enroll', [CourseController::class, 'enrollInCourse'])->name('course.enroll');

Route::get('/faq', [FAQController::class, 'index'])->name('faq.index');
Route::post('/faq/submit', [FAQController::class, 'submit'])->name('faq.submit');
Route::get('/faq/results', [FAQController::class, 'showResults'])->name('faq.results');

Route::get('/quiz-result/{id}/download', [FAQController::class, 'downloadResult'])->name('quiz.result.download');


// Route::get('/course/{id}', [CourseController::class, 'details'])->name('course.show');
Route::get('/', function () {
    return redirect()->route(auth()->check() ? 'dashboard' : 'showLogin');
});

Route::get('register', [AuthController::class, 'showRegister'])->name('showRegister');
Route::post('register', [AuthController::class, 'register'])->name('register');

Route::get('login', [AuthController::class, 'showLogin'])->name('showLogin');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware('auth')->get('/dashboard', [dashboardChartController::class, 'dashboard'])->name('dashboard');

Route::prefix('courses')->name('courses.')->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('index');
    Route::get('/create', [CourseController::class, 'create'])->name('create');
    Route::post('/', [CourseController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [CourseController::class, 'edit'])->name('edit')->where('id', '[0-9]+');
    Route::put('/{id}', [CourseController::class, 'update'])->name('update')->where('id', '[0-9]+');
    Route::delete('/{id}', [CourseController::class, 'destroy'])->name('destroy')->where('id', '[0-9]+');
});

// Quiz Routes
Route::prefix('quiz')->name('quiz.')->group(function () {
    Route::get('/', [QuizController::class, 'index'])->name('index');
    Route::post('/submit', [QuizController::class, 'submit'])->name('submit');
    Route::get('/result', [QuizController::class, 'result'])->name('result');
    Route::post('/store-answers', [QuizController::class, 'storeAnswers'])->name('storeAnswers');
    Route::get('/result/{resultId}/export-pdf', [QuizController::class, 'exportPdf'])->name('exportPdf');
});


Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

// Route::get('register', [AuthController::class, 'showRegister'])->name('showRegister');
// Route::post('register', [AuthController::class, 'register'])->name('register');

// Route::get('login', [AuthController::class, 'showLogin'])->name('showLogin');
// Route::post('login', [AuthController::class, 'login'])->name('login');

// Route::post('logout', [AuthController::class, 'logout'])->name('logout');
// Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// Route::middleware('auth')->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });


// Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
// Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
// Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
// Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
// Route::put('/courses/{id}', [CourseController::class, 'update'])->name('courses.update');

// // Delete Route
// Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');


// Route::get('/quiz', [QuizController::class, 'index'])->name('quiz.index');
// Route::post('/quiz/submit', [QuizController::class, 'submit'])->name('quiz.submit');
// Route::get('/quiz/result', [QuizController::class, 'result'])->name('quiz.result');
// Route::post('/quiz/store-answers', [QuizController::class, 'storeAnswers'])->name('quiz.storeAnswers');
// Route::get('quiz/result/{resultId}/export-pdf', [QuizController::class, 'exportPdf'])->name('quiz.exportPdf');
