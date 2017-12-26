<section class="popular-wrapper">
	<h3> Ostatnie hity </h3>
	<ul class="popular-list">
	 @foreach ($popularPosts as $post)
	 	<li><a href="{{ route('post.show',['post' => $post->hashid]) }}"> {{ str_limit($post->body,20,'...') }}</a> </li>	
	 @endforeach
	</ul>
</section>