@extends('layouts.master')

@section('content')

    <!-- All Projects Page
        - this page simply lists all projects for the current user
        - the project cards provide a summary of information about the project
    -------------------------->
    <section class="fourteen wide column">
        <section class="ui link cards">
            @foreach($projects as $project)
                <a href="/projects/{{ $project->id }}" class="ui blue card">
                    <div class="image">
                        @if ($project->project_grade == "A")
                            <img src="{{ asset('images/A.gif') }}">
                        @elseif ($project->project_grade == "B")
                            <img src="{{ asset('images/B.gif') }}">
                        @elseif ($project->project_grade == "C")
                            <img src="{{ asset('images/C.gif') }}">
                        @elseif ($project->project_grade == "D")
                            <img src="{{ asset('images/D.gif') }}">
                        @else
                            <img src="{{ asset('images/F.gif') }}">
                        @endif
                    </div>

                    <div class="content">
                        <span class="header">{{ $project->project_name }}</span>

                        <div class="meta">
                            <span class="lead-name">{{ $project->lead->lead_name }}</span>
                        </div>

                        <div class="description">
                            {{ str_limit($project->project_description, 300) }}
                        </div>
                    </div>

                    <div class="center aligned extra content ui small labels">
                        <span class="ui green label">${{ $project->project_budget }}</span>
                        <span class="ui blue label">{{ $project->project_days }} days</span>
                        <span class="ui teal label">{{ ucfirst($project->project_type) }}</span>
                        <span class="ui orange label">{{ ucfirst($project->project_size) }}</span>
                    </div>
                </a>
            @endforeach
        </section>
    </section>

@endsection
