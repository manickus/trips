@extends('layout.layout')

@section('content')

@auth
@else
<article class="story-rules">
			<h3> Dodając historię jako niezalogowany, nie zalicza się ona do statystyk! </h3>
			

		</article>
@endauth

		{!! Form::open(['route' => 'post.store' ,'files' => true,'enctype' => 'multipart/form-data']) !!}
			<div class="form-group">
			    {!! Form::label('body', "Treść histori:", ['class'=>'form-label']) !!}
			    {!! Form::textarea('body',null, ['class'=>'form-control']) !!}
  			</div>
  			<div class="form-group">
    			{!! Form::submit('Wyślij', ['class' => 'btn btn-send-comment']) !!}
    		</div>
		{!! Form::close() !!}


		<article class="story-rules">
			<h3> Zasady: </h3>
			<ul class="story-rules-list">
				<li>
					Opisuj tylko prawdziwe sytuacje, w których brałeś udział.
				</li>
				<li>
					Pisz poprawnie gramatycznie, stylistycznie, ortograficznie.
				</li>
				<li>
					Nie podawaj swoich danych, ani danych umożliwiających identyfikację innych osób.
				</li>
				<li>
					Powstrzymaj się od wulgaryzmów.
				</li>
				<li>
					Nie dodawaj wielokrotnie tego samego wyznania.
				</li>
			</ul>
		</article>
@endsection