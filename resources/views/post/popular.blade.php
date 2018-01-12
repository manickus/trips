<section class="popular-wrapper">
	<h3> Ostatnie hity </h3>
	<ul class="popular-list">
	 @foreach ($popularPosts as $post)
	 	<li><a href="{{ route('post.show',['post' => $post->hashid]) }}"> {{ str_limit($post->body,20,'...') }}</a> </li>	
	 @endforeach
	</ul>

</section>

	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-format="fluid"
     data-ad-layout-key="-fj+6b+w-ex+of"
     data-ad-client="ca-pub-7702052866552132"
     data-ad-slot="4211293122"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>