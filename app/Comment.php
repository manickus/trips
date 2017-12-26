<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Vote;
use Auth;

class Comment extends Model
{
	protected $fillable = ['user_id', 'post_id','body'];

	public function post()
	{
		return $this->belongsTo('App\Post');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function replies()
	{
		return $this->hasMany('App\CommentReply');
	}

	public function getCreatedAtAttribute($value)
    {
      	Carbon::setLocale('pl');
    	return Carbon::parse($value)->diffForHumans();
    }

    public function getVoteNumber()
    {
        $sum = Vote::where('model_id',$this->id)
                    ->where('model','App\Comment')
                    ->sum('value');
        return $sum;
    }

      public function isVotedByMe()
    {
        if(Auth::user())
        {
           $sum = Vote::where('model_id',$this->id)
                    ->where('model','App\Comment')
                    ->where('user_id',Auth::user()->id)
                    ->value('value');
            return $sum;
        } else {
            return 0;
        }

    }
}
