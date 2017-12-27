<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Post;
use Carbon\Carbon;

class Vote extends Model
{
    protected $fillable = ['user_id','model','model_id','value'];


    public static function bestPosts()
    {
    	$bestPosts = Post::join('votes','posts.id','=','votes.model_id')
                    ->groupBy('votes.model_id')
                    ->orderBy('sum_value','DESC')
                    ->where('model','App\Post')
                    ->selectRaw('posts.*, sum(votes.value) as sum_value')
                    ->paginate(9);

    	return $bestPosts;
    }

    public static function bestPostsSevenDays()
    {

        $date = new Carbon;
        $date->subWeek();
            $bestPosts = Post::join('votes','posts.id','=','votes.model_id')
                    ->groupBy('votes.model_id')
                    ->orderBy('sum_value','DESC')
                    ->where('model','App\Post')
                    ->where('votes.updated_at','>',$date->toDateTimeString())
                    ->selectRaw('posts.*, sum(votes.value) as sum_value')
                    ->take(5)
                    ->get();

        return $bestPosts;
    }

    
}
