<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Post;
use App\User;
use App\Vote;
use Auth;

class PostController extends Controller
{
    
	public function index()
	{
		$posts = Post::where('category_id',1)
				->orderBy('updated_at','DESC')
				->paginate(9);

		return view('homepage.index',compact('posts'));
	}


	public function create()
	{
		return view('partials.create');
	}

	public function show(Post $post)
	{
		return view('post.show',compact('post'));
	}

	public function unverifiedPage()
	{
		$posts = Post::where('category_id',3)
				->latest()
				->paginate(9);

		return view('post.unverified',compact('posts'));
	}

	public function anteroomPage()
	{
		$posts = Post::where('category_id',2)
				->latest()
				->paginate(9);

		return view('homepage.index',compact('posts'));
	}

	public function bests()
	{
		$posts = Vote::bestPosts();
		return view('homepage.index',compact('posts'));
	}

	public function changeCategory(Request $request)
	{
		$post = Post::findOrFail($request->post_id);
		if($post){
			$post->category_id = $request->category_id;
			$post->save();
		}
		return response(['data' => 'ok'],200);
	}

	public function store(PostRequest $request)
	{
		if(Auth::user()){
			$userId = Auth::user()->id;
		} else {
			$userId = 1;
		}
		$post = Post::create([
			'user_id' => $userId,
			'body' => $request->input('body'),
			'category_id' => 3,
			]);

		$request->session()->flash('message', 'Historia została dodana do niezweryfikowanych.');

		return redirect()->route('post.show',['post' => $post->getHashidAttribute(),]);
	}
}
