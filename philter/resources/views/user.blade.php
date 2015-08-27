@extends('layouts.master')

@section('content')

    <!-- User Page
        - this page simply returns a summary of the current user
    -------------------------->
    <section class="fourteen wide column">
        <p>This users name is : {{ $user->name }}</p>

        @if (Auth::id() == $user->id)

            <a href="/users/{{ $user->id }}/edit">Edit</a>

            <form action="" method="POST">
                {!! csrf_field() !!}
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" value="{{ $user->id }}">
                <button class="ui red button">Delete</button>
            </form>
        @endif
    </section>

@endsection