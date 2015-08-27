@extends('layouts.master')

@section('content')

    <!-- All Users Page
        - this page simply returns a list of all the currently logged in users
    -------------------------->
    <section class="fourteen wide column">
        User: <a href="/users/{{ $user->id }}" title="">{{ $user->name }}</a>
    </section>

@endsection