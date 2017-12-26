<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vote;
use Auth;

class VoteController extends Controller
{
	public function vote(Request $request)
	{
		$user_id = Auth::user()->id;
		$model = $request->model;
		$model_id = $request->id;
		$value = $request->value;

		$vote = Vote::where('user_id',$user_id)
					->where('model',$model)
					->where('model_id',$model_id)
					->first();


		if($vote){
			if($vote->value == $value){
				$vote->delete();
			} else {
				$vote->value = $value;
				$vote->save();
			}
		} else {
			$vote = new Vote;
			$vote->user_id = $user_id;
			$vote->model = $model;
			$vote->model_id = $model_id;
			$vote->value = $value;
			$vote->save();
		}

		if($vote){
			$newValue = $vote->value;
		} else {
			$newValue = 0;
		}

		return response(['data' => $newValue],200);
	} 

}
