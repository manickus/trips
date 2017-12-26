<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Hashids;
use App\Vote;
use Auth;

class Post extends Model
{

    protected $fillable = ['user_id','body','category_id'];

    public function comments()
    {
    	return $this->hasMany('App\Comment');
    }

    public function getCreatedAtAttribute($value)
    {
      	Carbon::setLocale('pl');
    	return Carbon::parse($value)->diffForHumans();
    }


    public function getHashidAttribute()
	{
    	return Hashids::encode($this->id);
	}

    public function getVoteNumber()
    {
        $sum = Vote::where('model_id',$this->id)
                    ->where('model','App\Post')
                    ->sum('value');
        return $sum;
    }

    public function isVotedByMe()
    {
        if(Auth::user())
        {
           $sum = Vote::where('model_id',$this->id)
                    ->where('model','App\Post')
                    ->where('user_id',Auth::user()->id)
                    ->value('value');
            return $sum;
        } else {
            return 0;
        }

    }

}
