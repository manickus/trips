<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Auth;

class CommentReply extends Model
{
    protected $fillable = ['body','user_id','comment_id'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function getVoteNumber()
    {
        $sum = Vote::where('model_id',$this->id)
                    ->where('model','App\CommentReply')
                    ->sum('value');
        return $sum;
    }

    public function getCreatedAtAttribute($value)
    {
      	Carbon::setLocale('pl');
    	return Carbon::parse($value)->diffForHumans();
    }

      public function isVotedByMe()
    {
        if(Auth::user())
        {
           $sum = Vote::where('model_id',$this->id)
                    ->where('model','App\CommentReply')
                    ->where('user_id',Auth::user()->id)
                    ->value('value');
            return $sum;
        } else {
            return 0;
        }

    }
}
