<?php

use Illuminate\Support\Facades\Route;

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

/*
 * Front Route
 *
 * */
Route::get('/', [\App\Http\Controllers\Site\HomeController::class, 'index'])->name('site.index');
Route::get('/careers', [\App\Http\Controllers\Site\HomeController::class, 'careers']);
Route::post('/careers', [\App\Http\Controllers\Site\CareersController::class, 'createApplicant'])->name('site.career.post');
Route::get('/careers/{career:id}', [\App\Http\Controllers\Site\HomeController::class, 'careersDetail'])->name('site.career.detail');
Route::get('/works', [\App\Http\Controllers\Site\HomeController::class, 'portfolio'])->name('site.portfolio');
Route::get('/contact', [\App\Http\Controllers\Site\HomeController::class, 'contact'])->name('site.contact');
Route::get('/blog', [\App\Http\Controllers\Site\ArticleController::class, 'list'])->name('site.article.list');
Route::get('/blog/{article:slug}', [\App\Http\Controllers\Site\ArticleController::class, 'show'])->name('site.article.detail');

/*
 * Dashboard Route
 *
 * */
Route::group(['prefix' => 'dashboard'], function (){
    Auth::routes();

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::prefix('career')->group(function () {
        Route::get('/lists', [\App\Http\Controllers\Admins\CareersController::class,'lists'])->name('career.list');
        Route::get('/lists/data', [\App\Http\Controllers\Admins\CareersController::class,'dataTable'])->name('career.data');
        Route::get('/create', [\App\Http\Controllers\Admins\CareersController::class,'showCreateForm'])->name('career.create');
        Route::post('/create', [\App\Http\Controllers\Admins\CareersController::class,'create'])->name('career.create.post');
//        Route::get('/show/{event:slug}', 'EventController@show')->name('event.show');
        Route::get('/edit/{career:id}', [\App\Http\Controllers\Admins\CareersController::class,'showEditForm'])->name('career.edit');
        Route::post('/edit', [\App\Http\Controllers\Admins\CareersController::class,'update'])->name('career.edit.post');
        Route::get('/delete', [\App\Http\Controllers\Admins\CareersController::class,'destroy'])->name('career.destroy');
    });

    Route::prefix('applicant')->group(function () {
        Route::get('/lists', [\App\Http\Controllers\Admins\ApplicantController::class,'lists'])->name('applicant.list');
        Route::get('/lists/data', [\App\Http\Controllers\Admins\ApplicantController::class,'dataTable'])->name('applicant.data');
        Route::get('/dl/file/{applicant:applicant_code}', [\App\Http\Controllers\Admins\ApplicantController::class,'downloadCV'])->name('applicant.download.cv');
        Route::get('/test', [\App\Http\Controllers\Admins\ApplicantController::class,'test'])->name('applicant.test');

        /*Route::get('/create', [\App\Htt p\Controllers\Admins\CareersController::class,'showCreateForm'])->name('career.create');

        Route::post('/create', [\App\Http\Controllers\Admins\CareersController::class,'create'])->name('career.create.post');
//        Route::get('/show/{event:slug}', 'EventController@show')->name('event.show');
        Route::get('/edit/{career:id}', [\App\Http\Controllers\Admins\CareersController::class,'showEditForm'])->name('career.edit');
        Route::post('/edit', [\App\Http\Controllers\Admins\CareersController::class,'update'])->name('career.edit.post');
        Route::get('/delete', [\App\Http\Controllers\Admins\CareersController::class,'destroy'])->name('career.destroy');*/
    });

    Route::prefix('article')->group(function () {
        Route::get('/lists', [\App\Http\Controllers\Admins\ArticleController::class,'lists'])->name('article.list');
        Route::get('/lists/data', [\App\Http\Controllers\Admins\ArticleController::class,'dataTable'])->name('article.data');
        Route::get('/create', [\App\Http\Controllers\Admins\ArticleController::class,'showCreateForm'])->name('article.create');
        Route::post('/create', [\App\Http\Controllers\Admins\ArticleController::class,'create'])->name('article.create.post');
////        Route::get('/show/{event:slug}', 'EventController@show')->name('article.show');
//        Route::get('/edit/{career:id}', [\App\Http\Controllers\Admins\CareersController::class,'showEditForm'])->name('article.edit');
//        Route::post('/edit', [\App\Http\Controllers\Admins\CareersController::class,'update'])->name('article.edit.post');
//        Route::get('/delete', [\App\Http\Controllers\Admins\CareersController::class,'destroy'])->name('article.destroy');
    });

    Route::prefix('user')->group(function () {
        Route::get('/lists', [\App\Http\Controllers\Admins\UserController::class,'lists'])->name('user.list');
        Route::get('/lists/data', [\App\Http\Controllers\Admins\UserController::class,'dataTable'])->name('user.data');
        Route::get('/create', [\App\Http\Controllers\Admins\UserController::class,'showCreateForm'])->name('user.create');
        Route::post('/create', [\App\Http\Controllers\Admins\UserController::class,'create'])->name('user.create.post');
////        Route::get('/show/{event:slug}', 'EventController@show')->name('article.show');
//        Route::get('/edit/{career:id}', [\App\Http\Controllers\Admins\CareersController::class,'showEditForm'])->name('article.edit');
//        Route::post('/edit', [\App\Http\Controllers\Admins\CareersController::class,'update'])->name('article.edit.post');
//        Route::get('/delete', [\App\Http\Controllers\Admins\CareersController::class,'destroy'])->name('article.destroy');
    });

});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
