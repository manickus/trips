@extends('layout.layout')

@section('content')
	@foreach ($posts as $post)

		@include('partials.post')
		@if($loop->index == 0)
		<div style="display: flex;
    width: 90%;
    margin: auto;">
	<a href="https://www.ceneo.pl/Konsole_do_gier#pid=16123&crid=153178&cid=24878" rel="nofollow"><img src="https://image2.ceneo.pl/data/banners/banner_40.jpg"></img></a>
	</div>
		@endif

		@if($loop->index == 4)
		<div style="display: flex;
    width: 90%;
    margin: auto;">
    <a href="https://www.ceneo.pl/Telefony_komorkowe?utm_source=PP&utm_medium=Swieta&utm_campaign=CPC#pid=16123&crid=153181&cid=24878" rel="nofollow"><img src="https://image2.ceneo.pl/data/banners/banner_1611.jpg"></img></a>
    </div>
		@endif
	@endforeach
	{{ $posts->links() }}
@endsection