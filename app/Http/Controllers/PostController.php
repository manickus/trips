<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Post;
use App\User;
use App\Vote;
use Auth;
use SEOMeta;

class PostController extends Controller
{
    
	public function index()
	{

		

		$posts = Post::where('category_id',1)
				->orderBy('updated_at','DESC')
				->paginate(9);
		

		SEOMeta::setTitle('Strona główna');
        SEOMeta::setDescription('Najlepsze anonimowe historie z tripów, imprez, dziwnych sytuacji. Znajdziesz tutaj alkohol, narkotyki oraz inne używki. Czytaj historie innych, podziel się swoimi.');

		return view('homepage.index',compact('posts'));
	}


	public function create()
	{
		SEOMeta::setTitle('TripStory - Napisz historie');
        SEOMeta::setDescription('Podziel się swoją historią z imprezy, tripa. ');
		return view('partials.create');
	}

	public function show(Post $post)
	{

		SEOMeta::setTitle('Historia '.$post->hashid);
        SEOMeta::setDescription($post->body);
        SEOMeta::addMeta('article:published_time', $post->updated_at, 'property');
		

		return view('post.show',compact('post'));
	}

	public function unverifiedPage()
	{

		SEOMeta::setTitle('TripStory - Niezwerikowane');
        SEOMeta::setDescription('Niezwerikowane historie');


		$posts = Post::where('category_id',3)
				->latest()
				->paginate(9);

		return view('post.unverified',compact('posts'));
	}

	public function anteroomPage()
	{

		SEOMeta::setTitle('TripStory - Poczekalnia');
        SEOMeta::setDescription('Historie oczekujące w poczekalni');


		$posts = Post::where('category_id',2)
				->latest()
				->paginate(9);

		return view('homepage.index',compact('posts'));
	}

	public function bests()
	{

		SEOMeta::setTitle('TripStory - Hity');
        SEOMeta::setDescription('Hity z tripów, imprez');
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
