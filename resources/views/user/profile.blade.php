@extends('layout.layout')

@section('content')
	<article class="profile">
		<header class="profile-header">
			<h3> Informacje o użytkowniku: </h3>
		</header>
		<div class="user-info">
			<div class="profile-info">
				<p>Nazwa:</p> <span>{{ Auth::user()->name }}</span>	
			</div>
			<div class="profile-info">
				<p>Data dołączenia:</p> <span>{{ Auth::user()->joindate }}</span>	
			</div>
			<div class="profile-info">
				<p>Dodanych historii:</p> <span>{{ Auth::user()->storiesAdded() }}</span>
			</div>
			<div class="profile-info">
				<p>Dodanych komentarzy:</p> <span>{{ Auth::user()->commentsAdded() }}</span>
			</div>
			<div class="profile-info">
				<p>Oddanych głosów:</p> <span>{{ Auth::user()->votesAdded() }}</span>
			</div>
			<div class="profile-info">
				<p>Głosów na plus:</p> <span class="positive">{{ Auth::user()->positiveVotesAdded() }}</span>
			</div>
			<div class="profile-info">
				<p>Głosów na minus:</p> <span class="negative">{{ Auth::user()->negativeVotesAdded() }}</span>
			</div class="profile-info">
		</div>
	</article>
@endsection