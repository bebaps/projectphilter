@extends('layouts.master')

@section('content')

    <!-- All Leads Page
        - this page simply returns a list of all the Leads for a given user
    -------------------------->
    <section class="fourteen wide column">
        <section class="ui link cards">
            @foreach($leads as $lead)
                <a href="/leads/{{ $lead->id }}" class="ui blue card">
                    <div class="image">
                       @if ($lead->project_grade == "A")
                            <img src="http://api.adorable.io/avatars/285/avatar">
                        @elseif ($lead->project_grade == "B")
                            <img src="http://api.adorable.io/avatars/285/bob">
                        @elseif ($lead->project_grade == "C")
                            <img src="http://api.adorable.io/avatars/285/cheap">
                        @elseif ($lead->project_grade == "D")
                            <img src="http://api.adorable.io/avatars/285/happy">
                        @else
                            <img src="http://api.adorable.io/avatars/285/no">
                        @endif
                    </div>

                    <div class="content">
                        <span class="header">{{ $lead->lead->lead_name }}</span>

                        <div class="meta">
                            <span class="lead-name">{{ $lead->project_name }}</span>
                        </div>

                        <div class="description">

                            <!-- List
                                - this list is currently hard coded in for demo purposes
                                - the goal is to have the list be dynamically generated as a result of the custom bottom lines set forth by the user
                            -------------------------->
                            <div class="ui relaxed list">
                                <div class="item">
                                    <div class="content aligned header">Email</div>
                                    <span>{{ $lead->lead->lead_email }}</span>
                                </div>

                                <div class="item">
                                    <div class="content aligned header">Phone</div>
                                    <span>{{ $lead->lead->lead_phone }}</span>
                                </div>

                                <div class="item">
                                    <div class="content aligned header">Address</div>
                                    <span>{{ $lead->lead->lead_address }}</span><br>
                                    <span>{{ $lead->lead->lead_city }}</span>, <span>{{ $lead->lead->lead_state }}</span> <span>{{ $lead->lead->lead_zip }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </section>
    </section>

@endsection