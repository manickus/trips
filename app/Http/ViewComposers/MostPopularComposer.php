<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Vote;

class MostPopularComposer
{
    public $popularPosts = [];
    /**
     * Create a movie composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->popularPosts = Vote::bestPostsSevenDays();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('popularPosts', $this->popularPosts);
    }
}