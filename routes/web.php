<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PasswordresetController;
use App\Http\Controllers\TwitterController;

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



Auth::routes(['verify'=>true]);


Route::controller(HomeController::class)->group(function(){
	Route::get('/','index')->name('home');
	Route::get('/home','index')->name('home');
});
Route::controller(PasswordresetController::class)->group(function(){
	Route::get('/password/reset', 'request')->name('password.request');
	Route::post('/password/reset', 'requestSend')->name('password.request.send');
	Route::get('/password/reset/{token}','reset')->name('password.reset');
	Route::post('/password/reset/{token}', 'passwordUpdate')->name('password.update');

});
Route::controller(QuestionController::class)->group(function(){
	Route::get('/question/{type_id}', 'questionList')->name('question');
	Route::get('/show/{type_id}/{question_id}','questionShow')->name('question.show');
	Route::get('myquestion/show/','myquestionShow')->name('myquestion.show');
	Route::get('myquestion/edit/{question_id}','myquestionEdit')->name('myquestion.edit');
	Route::post('myquestion/edit/{question_id}','myquestionUpdate')->name('myquestion.update');

	Route::post('/question/delete', 'delete');

});
Route::controller(LikeController::class)->group(function(){
	Route::get('/like/{question_id}/{comment_id}', 'fetchLikeCount');
	Route::post('/like/{question_id}/{comment_id}', 'LikeStore');
	Route::post('/unlike/{question_id}/{comment_id}', 'unLikeStore');
});
Route::controller(CommentController::class)->group(function(){
	Route::get('/comment/{question_id}', 'fetchComment');
	Route::post('/comment/store', 'storeComment');

});
Route::controller(ProfileController::class)->group(function(){
	Route::get('/profile/edit','index')->name('profile.edit');
	Route::post('/profile/edit','update')->name('post.profile');
});

Route::controller(TwitterController::class)->group(function(){
	Route::get('/auth/twitter','login' )->name('twitter.login');
	Route::get('/auth/twitter/callback', 'callback');
});


//Eメール認証とプロフィール設定終了後
Route::middleware(['verified','profilesetup'])->group(function(){
	Route::get('/new', [QuestionController::class, 'new'])->name('question.new');
	Route::post('/new', [QuestionController::class, 'post'])->name('post.question');
	Route::get('/category/{type_id}', [CategoryController::class, 'fetchCategory']);

});








Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
