<header class="main-header">
			<div class="page-logo">
				<a href="{{ route('homepage') }}">
					TripStory
				</a>
			</div>
			<nav class="main-navigation">
				<ul class="menu-main">
					<li class="nav-item">
						<a href="{{ route('homepage') }}">Główna</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('post.anteroom') }}">Poczekalnia</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('post.bests') }}">Hity</a>
					</li>
				</ul>
			</nav>
			<nav class="main-navigation">
				<button class="call-to-menu">
					<i class="fa fa-bars"  aria-hidden="true" ></i>
				</button>
			<ul class="menu-list">
				<li class="nav-item">
					<a href="{{ route('homepage') }}">Główna</a>
				</li>
				<li class="nav-item">
					<a href="{{ route('post.anteroom') }}">Poczekalnia</a>
				</li>
				<li class="nav-item">
					<a href="{{ route('post.bests') }}">Hity</a>
				</li>
				<li>
					@if (\Auth::check())
				<li class="menu-profile-item">
						<a href="{{ route('user.profile') }}" class="btn-profile">Profil</a>
				</li>
				@endif
				@auth
						{!! Form::open(['route' => 'logout']) !!}
								{!! Form::submit('Wyloguj się', ['class' => 'btn red btn-send-comment']) !!}
						{!! Form::close() !!}
				@else
					{!! Form::open(['route' => 'login']) !!}
						<div class="login-form">
						<header class="login-header">
							<h4>Logowanie:</h4>
						</header>

							{!! Form::label('email', 'Nazwa', ['class' => 'login-form-label']) !!}
						    {!! Form::text('email',null, ['class'=>'form-control login-form-input',]) !!}
						    {!! Form::label('password', 'Hasło', ['class' => 'login-form-label']) !!}
							{!! Form::password('password', ['class'=>'form-control login-form-input']) !!}
							<div class="login-links">
									{!! Form::submit('Zaloguj', ['class' => 'btn btn-send-comment']) !!}
							{!! link_to_route('register', $title = "Rejestracja",null,['class' => 'btn btn-send-comment']) !!}
							</div>
						</div>
					{!! Form::close() !!}
				@endauth
				</li>
			</ul>
	</nav>
</header>