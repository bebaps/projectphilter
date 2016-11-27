@extends('layouts.auth')

@section('content')

    <div class="ui middle aligned center aligned six wide column">
        <div class="column">
            <h2 class="ui teal image header">
                <i class="ui large filter icon"></i>
                <span class="content">
                    Sign up for an account
                </span>
            </h2>

            @if (count($errors) > 0)
                <div class="ui attached error message">
                    <h4 class="header">Sorry! We found some errors...</h4>
                    <ul class="list">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="/auth/register" class="ui form attached fluid segment">
                {!! csrf_field() !!}

                <div class="ui stacked segment">
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Name">
                        </div>
                    </div>

                    <div class="field">
                        <div class="ui left icon input">
                            <i class="mail icon"></i>
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email">
                        </div>
                    </div>

                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i> <input type="password" name="password" placeholder="Password">
                        </div>
                    </div>

                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input type="password" name="password_confirmation" placeholder="Confirm Password">
                        </div>
                    </div>

                    <button type="submit" class="ui fluid large teal submit button">Sign Up</button>
                </div>
            </form>

            <div class="ui message">
                Have an account? <a href="{{ url('/auth/login') }}">Log In</a>
            </div>
        </div>
    </div>

@endsection