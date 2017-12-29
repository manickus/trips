<?php

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

Route::get('/', [
	'uses' => 'PostController@index',
	'as' => 'homepage',
	]);


Route::get('/hity',[
	'uses' => 'PostController@bests',
	'as' => 'post.bests'
	]);



Route::post('/add/comment', [
	'uses' => 'CommentController@store',
	'as' => 'comment.store'
	]);

Route::post('/add/comment-reply',[
	'uses' => 'CommentController@storeReply',
	'as' => 'comment.storeReply'
]);

Route::get('/create/story', [
	'uses' => 'PostController@create',
	'as' => 'post.create'
	]);

Route::post('/store/story',[
	'uses' => 'PostController@store',
	'as' => 'post.store'
	]);

Route::get('/story/{post}',[
	'uses' => 'PostController@show',
	'as' => 'post.show'
	]);


Route::get('/niezweryfikowane', [
	'uses' => 'PostController@unverifiedPage',
	'as' => 'post.unverified'
	]);

Route::get('/poczekalnia', [
	'uses' => 'PostController@anteroomPage',
	'as' => 'post.anteroom'
	]);


Route::post('/story/change-category', [
	'uses' => 'PostController@changeCategory',
	'as' => 'post.changeCategory'
	]);


Route::post('/system/vote', [
	'uses' => 'VoteController@vote',
	'as' => 'vote.vote'
	]);

Route::post('/system/voteadmin', [
	'uses' => 'VoteController@adminAddVotes',
	'as' => 'vote.voteadmin'
	]);


Route::get('/profil', [
	'uses' => 'UserController@index',
	'as' => 'user.profile'
	]);

Route::get('/regulamin', [
	'uses' => 'HomeController@agree',
	'as' => 'agree'
	]);

Route::bind('post',function ($value,$route){
	$id = Hashids::decode($value);
	if(!$id){
		App::abort(403, 'Unauthorized action.');
	}
	return $id;
});

Auth::routes();

