@extends('layout.layout')

@section('content')
	@foreach ($posts as $post)

		@include('partials.post')
		@if($loop->index == 1)
		<div class="only-lg">
   			 <a href="https://ceneo.pl#pid=16123&crid=153188&cid=24878" rel="nofollow"><img src="https://image2.ceneo.pl/data/banners/banner_1533.jpg"></img></a>
    	</div>
    	<div class="only-mobile">
    		<a href="https://www.ceneo.pl/Telefony_komorkowe#pid=16123&crid=153185&cid=24878" rel="nofollow"><img src="https://image2.ceneo.pl/data/banners/banner_669.jpg"></img></a>
    	</div>
		@endif

		@if($loop->index == 4)
		<div class="only-lg">
    			<a href="https://www.ceneo.pl/Buty_meskie?tag=staticbutymeskie750x200#pid=16123&crid=153189&cid=24878" rel="nofollow"><img src="https://image2.ceneo.pl/data/banners/banner_1815.jpg"></img></a>
    	</div>
    	<div class="only-mobile">
    		<a href="https://www.ceneo.pl/Gry_konsolowe#pid=16123&crid=153184&cid=24878" rel="nofollow"><img src="https://image2.ceneo.pl/data/banners/banner_271.jpg"></img></a>
    	</div>
		@endif

		@if($loop->index == 8)
		<div style="width: 90%;display: flex;justify-content: center;">
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
		</div> 
		@endif
	@endforeach
	{{ $posts->links() }}
@endsection