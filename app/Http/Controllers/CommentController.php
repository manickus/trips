<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Post;
use App\Comment;
use Auth;

class CommentController extends Controller
{
	public function store(CommentRequest $request)
	{

		$user_id = Auth::user()->id;
		$post = Post::find($request->input('post_id'));
		$post->comments()->create([
				'user_id' => $user_id,
				'body' => $request->input('body'),
			]);

		return redirect()->back();
	}    

	public function storeReply(CommentRequest $request)
	{
		$user_id = Auth::user()->id;
		if($user_id){
		$comment = Comment::find($request->input('comment_id'));
		$comment->replies()->create([
			  'user_id' => $user_id,
			  'body' => $request->input('body'),
			]);
		}
		return redirect()->back();
	}
}
