@extends('layout.layout')

@section('content')
	@foreach ($posts as $post)
		<article class="post">
	<div class="post-data">
		<div class="post-id">
			#{{ $post->hashid }}
		</div>
		<time class="post-time" datetime="2017-11-26">
			{{ $post->created_at }}
		</time>
	</div>
	<p class="post-text">
					{!! nl2br(e($post->body)) !!}
	</p>
  @role('superadministrator')
	<div class="post-options">
		<button class="btn call-to-change-category" data-post-id="{{ $post->id }}" data-category-id="2">
			Przenieś do poczekalni
		</button>
		<button class="btn red call-to-change-category" data-post-id="{{ $post->id }}" data-category-id="4">
			Odrzut
		</button>
	</div>
  @endrole
	</article>
	@endforeach
@endsection

@section('js')
	<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>

  <script type="text/javascript">
  	$.ajaxSetup({
  		headers: {
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  		}
	});

  	var categoryBtns = document.querySelectorAll('.call-to-change-category');
  	for(var i = 0;i<categoryBtns.length;i++)
  	{
  		categoryBtns[i].addEventListener("click", function(event){
  			changeCategory(event.target);
  		}, false);
  	}

  	function changeCategory(btn)
  	{
  		var categoryId = btn.getAttribute('data-category-id'),
  			postId = btn.getAttribute('data-post-id');

  		$.ajax({
	    	url: "/story/change-category",
	        type: "POST",
	        cache: false,
        	data: {
        		category_id: categoryId,
        		post_id: postId,
        	},
            success: function(results){
         		console.log('ok');
            }
    	});
  	}
  </script>
@endsection