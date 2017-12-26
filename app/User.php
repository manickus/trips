<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use Carbon\Carbon;
use App\Post;
use App\Comment;
use App\CommentReply;
use App\Vote;



class User extends Authenticatable
{
    use Notifiable;
    use LaratrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function storiesAdded()
    {
        $count = Post::where('user_id',$this->id)
                ->count();
        return $count;
    }

    public function commentsAdded()
    {
        $comment = Comment::where('user_id',$this->id)
                ->count();
        $commentReply = CommentReply::where('user_id',$this->id)
                ->count();
        $count = $comment + $commentReply;
        return $count;
    }

    public function votesAdded()
    {
        $count = Vote::where('user_id',$this->id)
                ->count();
        return $count;
    }

    public function positiveVotesAdded()
    {
        $count = Vote::where('user_id',$this->id)
                ->where('value',1)
                ->count();
        return $count;
    }

    public function negativeVotesAdded()
    {
        $count = Vote::where('user_id',$this->id)
                ->where('value',-1)
                ->count();
        return $count;
    }

    public function getJoindateAttribute()
    {
        $date = Carbon::parse($this->created_at)->format('d/m/Y');
        return $date;
    }

}
