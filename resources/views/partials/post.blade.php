<article class="post">
	<div class="post-data">
		<div class="post-id">
			#{{ $post->hashid }}
		</div>
		<time class="post-time" datetime="2017-11-26">
			{{ $post->updated_at }}
		</time>
	</div>
	<p class="post-text">
		{!! nl2br(e($post->body)) !!}
	</p>
	<div class="post-options">
		<div class="votes">
			@auth
				@if ($post->isVotedByMe() == 1)
				<button class="vote call-to-vote green" 
						data-id="{{ $post->id }}"
						data-model="App\Post"
						data-value="1">
					<i class="fa fa-thumbs-up" aria-hidden="true"></i>
				</button>
				@else 
					<button class="vote call-to-vote" 
						data-id="{{ $post->id }}"
						data-model="App\Post"
						data-value="1">
					<i class="fa fa-thumbs-up" aria-hidden="true"></i>
				</button>
				@endif
			@else
				<button class="vote not-loged" 
						data-id="{{ $post->id }}"
						data-model="App\Post"
						data-value="1">
					<i class="fa fa-thumbs-up" aria-hidden="true"></i>
				</button>
			@endauth
			<p class="post-vote-number">
				{{ $post->getVoteNumber() }}
			</p>
			@auth
				@if ($post->isVotedByMe() == -1)
					<button class="vote call-to-vote red"
							data-id="{{ $post->id }}"
							data-model="App\Post"
							data-value="-1">
						<i class="fa fa-thumbs-down" aria-hidden="true"></i>
					</button>
				@else
					<button class="vote call-to-vote"
							data-id="{{ $post->id }}"
							data-model="App\Post"
							data-value="-1">
						<i class="fa fa-thumbs-down" aria-hidden="true"></i>
					</button>
				@endif
			@else
				<button class="vote not-loged"
					data-id="{{ $post->id }}"
					data-model="App\Post"
					data-value="-1">
				<i class="fa fa-thumbs-down" aria-hidden="true"></i>
				</button>
			@endauth
		</div>
		 @role('superadministrator')
		 		@if($post->category_id==2)
		 		 	<button class="btn call-to-change-category" data-post-id="{{ $post->id }}" data-category-id="1">
						Główna
					</button>
		 		@endif

		 		<div class="adminVotes">
		 			<input type="text" class="vote-count">
		 			<button type="button" class="adminSecretVotes" 
		 				data-id="{{ $post->id }}"
						data-model="App\Post">
						Dodaj Głosy
					</button>
		 		</div>
		 @endrole
		<div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Udostępnij</a></div>
	</div>
	<section class="new-comment">
		{!! Form::open(['route' => 'comment.store']) !!}
			<div class="form-group">
			    {!! Form::label('body', "Dodaj komentarz:", ['class'=>'h3']) !!}
			    {!! Form::textarea('body',null, ['class'=>'form-control']) !!}
  			</div>
  			<div class="form-group">
  				@auth
    				{!! Form::submit('Wyślij', ['class' => 'btn btn-send-comment']) !!}
    			@else
    				{!! Form::submit('Wyślij', ['class' => 'btn btn-send-comment not-loged']) !!}
    			@endauth
    		</div>
    		{!! Form::hidden('post_id', $post->id) !!}
		{!! Form::close() !!}
	</section>
	<section class="comments">
	@foreach ($post->comments as $comment)
		<div class="comment-wrapper">
		@if($loop->iteration<=2)
			<article class="comment">
		@else 
			<article class="comment hidden">
		@endif
				<div class="comment-data">
					<p class="comment-username">
						{{ $comment->user->name }}
					</p>
					<time class="comment-time" datetime="2017-11-27">
						{{ $comment->created_at }}
					</time>
					<button href="#" class="reply">
						Odpowiedz
					</button>
				</div>
				<p class="comment-text">
					{!! nl2br(e($comment->body)) !!}
				</p>
				<div class="comment-option">
					@auth
						@if ($comment->isVotedByMe() == 1)
							<button class="vote call-to-vote vote-comment green"
									data-id="{{ $comment->id }}"
									data-model="App\Comment"
									data-value="1">
								<i class="fa fa-angle-up" aria-hidden="true"></i>
							</button>
						@else
							<button class="vote call-to-vote vote-comment"
									data-id="{{ $comment->id }}"
									data-model="App\Comment"
									data-value="1">
								<i class="fa fa-angle-up" aria-hidden="true"></i>
							</button>
						@endif
					@else
						<button class="vote vote-comment not-loged"
								data-id="{{ $comment->id }}"
								data-model="App\Comment"
								data-value="1">
							<i class="fa fa-angle-up" aria-hidden="true"></i>
						</button>
					@endauth
					<p class="comment-vote-number">
						{{ $comment->getVoteNumber() }}
					</p>
					@auth
						@if ($comment->isVotedByMe() == -1)
							<button class="vote call-to-vote vote-comment red" 
									data-id="{{ $comment->id }}"
									data-model="App\Comment"
									data-value="-1">
								<i class="fa fa-angle-down" aria-hidden="true"></i>
							</button>
						@else
							<button class="vote call-to-vote vote-comment" 
									data-id="{{ $comment->id }}"
									data-model="App\Comment"
									data-value="-1">
								<i class="fa fa-angle-down" aria-hidden="true"></i>
							</button>
						@endif
					@else
						<button class="vote vote-comment not-loged" 
								data-id="{{ $comment->id }}"
								data-model="App\Comment"
								data-value="-1">
							<i class="fa fa-angle-down" aria-hidden="true"></i>
						</button>
					@endauth
				</div>
			</article>
			<div class="comment-replies-wrapper">
				<section class="new-comment new-comment-reply new-comment-reply-hidden">
					{!! Form::open(['route' => 'comment.storeReply']) !!}
					<div class="reply-form-wrapper">
						<div class="form-group">
						    {!! Form::label('body', "Dodaj komentarz:", ['class'=>'h3']) !!}
						    {!! Form::textarea('body',null, ['class'=>'form-control']) !!}
			  			</div>
			  			@auth
				  			<div class="form-group">
				    			{!! Form::submit('Wyślij', ['class' => 'btn btn-send-comment']) !!}
				    		</div>
			    		@else
							<div class="form-group">
			    				{!! Form::submit('Wyślij', ['class' => 'btn btn-send-comment not-loged']) !!}
			    			</div>
			    		@endauth
			    	</div>
			    		{!! Form::hidden('comment_id', $comment->id) !!}
					{!! Form::close() !!}
				</section>
				@if($comment->replies->count())
				<button class="reply comment-answers show-comment-answers">
					<span class="fa fa-reply comment-answers-icon"></span>
					Odpowiedzi ({{ $comment->replies->count() }})
				</button>	
				@endif
				<section class="comment-replys hidden">
					@foreach ($comment->replies as $reply)
						<article class="comment">
							<div class="comment-data">
								<p class="comment-username">
									{{ $reply->user->name }}
								</p>
								<time class="comment-time" datetime="2017-11-27">
									{{ $reply->created_at }}
								</time>
							</div>
							<p class="comment-text">
								{!! nl2br(e($reply->body)) !!}
							</p>
							<div class="comment-option">
								@auth
									@if ($reply->isVotedByMe() == 1)
										<button class="vote call-to-vote vote-comment green" 
												data-id="{{ $reply->id }}"
												data-model="App\CommentReply"
												data-value="1">
											<i class="fa fa-angle-up" aria-hidden="true"></i>
										</button>
									@else
										<button class="vote call-to-vote vote-comment" 
												data-id="{{ $reply->id }}"
												data-model="App\CommentReply"
												data-value="1">
											<i class="fa fa-angle-up" aria-hidden="true"></i>
										</button>
									@endif
								@else
									<button class="vote vote-comment not-loged" 
											data-id="{{ $reply->id }}"
											data-model="App\CommentReply"
											data-value="1">
										<i class="fa fa-angle-up" aria-hidden="true"></i>
									</button>
								@endauth
								<p class="comment-vote-number">
									{{ $reply->getVoteNumber() }}
								</p>
								@auth
									@if ($reply->isVotedByMe() == -1)
										<button class="vote call-to-vote vote-comment red" 
												data-id="{{ $reply->id }}"
												data-model="App\CommentReply"
												data-value="-1">
											<i class="fa fa-angle-down" aria-hidden="true"></i>
										</button>
									@else
										<button class="vote call-to-vote vote-comment" 
												data-id="{{ $reply->id }}"
												data-model="App\CommentReply"
												data-value="-1">
											<i class="fa fa-angle-down" aria-hidden="true"></i>
										</button>
									@endif
								@else
									<button class="vote vote-comment not-loged" 
											data-id="{{ $reply->id }}"
											data-model="App\CommentReply"
											data-value="-1">
										<i class="fa fa-angle-down" aria-hidden="true"></i>
									</button>
								@endauth
							</div>
						</article>
					@endforeach
				</section>
			</div>
		</div>
	@endforeach
	</section>
</article>



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

  	var adminSecretVotes = document.querySelectorAll(".adminSecretVotes");
  	console.log(adminSecretVotes);
  	for(var i=0;i<adminSecretVotes.length;i++)
  	{
  		adminSecretVotes[i].addEventListener("click",function(event){
  			var parent = event.target.parentElement,
  				number = parent.querySelector('input').value,
  				model = event.target.getAttribute('data-model'),
  				modelId = event.target.getAttribute('data-id');
  				console.log('ok');
  				$.ajax({
	    	url: "/system/voteadmin",
	        type: "POST",
	        cache: false,
        	data: {
        		value: number,
        		model: model,
        		id: modelId,
        	},
            success: function(results){
         		console.log('ok');
           	 }
    	});

  		},null);
  	}

  	var votePost = document.querySelectorAll('.call-to-vote');
  	for(var i = 0;i<votePost.length;i++)
  	{
  		votePost[i].addEventListener("click", function(event){
  			event.stopPropagation();
  			vote(event.target);
  		}, false);
  	}

  	function vote(btn)
  	{
  		if(btn.tagName === "I") btn = btn.parentElement;
  		var value = btn.getAttribute('data-value'),
  			model = btn.getAttribute('data-model'),
  			id = btn.getAttribute('data-id');	

  		$.ajax({
	    	url: "/system/vote",
	        type: "POST",
	        cache: false,
        	data: {
        		value: value,
        		model: model,
        		id: id,
        	},
            success: function(results){
         		var vote = btn.parentElement,
         			voted = 0,
         			scoreBoard = vote.querySelector('p'),
         			score = parseInt(scoreBoard.innerHTML),
         			el;
         			console.log(vote.querySelector('.red'));
         		if(vote.querySelector('.red')) {
         			voted = -1;
         			btn.className = "vote call-to-vote";
         		} else if(vote.querySelector('.green')) {
         			voted = 1;
         			btn.className = "vote call-to-vote";
         		}

         		if(voted == value) {
         			score -= value;
         			scoreBoard.innerHTML = score;
         		} else {
         			if(value == 1) {
         				score += 1;
         				if(voted == -1) score +=1;
         				scoreBoard.innerHTML = score;
         				btn.classList.add('green');
         			} else {
         				score -= 1;
         				if(voted == 1) score -=1;
         				scoreBoard.innerHTML = score;
         				btn.classList.add('red');
         			}
         		}

            }
    	});
  	}

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

  	const btnReplies = document.querySelectorAll('.reply');
  	for(var i=0;i<btnReplies.length;i++)
  	{
  		btnReplies[i].addEventListener("click", function(event) {
  			showReplyCommentForm(event.target);
  		}, false);
  	}

  	function showReplyCommentForm(btn)
  	{
  		var commentWrapper = btn.parentNode.parentNode.parentNode.querySelector('.comment-replies-wrapper');
  		var replyForm = commentWrapper.querySelector('.new-comment-reply');
  		replyForm.classList.remove('new-comment-reply-hidden');
  	}


  </script>


@endsection