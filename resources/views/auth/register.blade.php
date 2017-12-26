@extends('layout.layout')

@section('content')
<div class="register-account">
        {!! Form::open(['route' => 'register']) !!}
            <div class="register-form-wrapper">
                <div class="form-group">
                    {!! Form::label('name', "Nazwa użytkownika:", ['class'=>'h3']) !!}
                    {!! Form::text('name',null, ['class'=>'form-control']) !!}
                </div>
                  <div class="form-group">
                    {!! Form::label('email', "Email:", ['class'=>'h3']) !!}
                    {!! Form::email('email',null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password', "Hasło:", ['class'=>'h3']) !!}
                    {!! Form::password('password',null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password_confirmation', "Powtórz hasło:", ['class'=>'h3']) !!}
                    {!! Form::password('password_confirmation',null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Rejestruj', ['class' => 'btn btn-send-comment']) !!}
                </div>
            </div>
    {!! Form::close() !!}
</div>
@endsection
