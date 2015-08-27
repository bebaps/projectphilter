@extends('layouts.master')

@section('content')

    <!-- Main Dashboard Area
        - these modules ideally would be sortable via drag and drop to the users liking
        - another future plan is to have different modules that can be customized to the user liking
    -------------------------->
    <section class="fourteen wide column">
        <div class="ui two column stackable grid">

            <!-- Potential Projects
                - will show a listing of projects that haven't yet been accepted or rejected
                - for demo purposes, it is currently set to show 3 random projects
            -------------------------->
            <section class="column">
                <div class="ui segment">
                    <h2 class="ui dividing header">
                        <i class="huge folder open icon"></i>
                        <div class="content">
                            <span>Projects</span>
                            <div class="sub header">Projects you might enjoy working on</div>
                        </div>
                    </h2>

                    <div class="ui divided link items">
                        @foreach ($projects as $project)
                            <a href="/projects/{{ $project->id }}" class="item">
                                <div class="ui tiny image">
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
                                    <div class="ui header">
                                        <span>{{ $project->project_name }}</span>
                                    </div>
                                    <div class="meta">
                                        <span class="budget">${{ $project->project_budget }}</span>|
                                        <span class="days">{{ $project->project_days }} days</span>|
                                        <span class="type">{{ ucfirst($project->project_type) }}</span>|
                                        <span class="cms">{{ ucfirst($project->project_cms) }}</span>
                                    </div>
                                    <div class="description">
                                        <p>This project has a score of <strong>{{ number_format($project->project_score * 100) }}</strong></p>

                                        @if ($project->project_grade == "A")
                                            <p>This is an ideal project!</p>
                                        @elseif ($project->project_grade == "B")
                                            <p>You should really consider this project!</p>
                                        @elseif ($project->project_grade == "C")
                                            <p>This project could be better.</p>
                                        @elseif ($project->project_grade == "D")
                                            <p>You may want to pass on this project.</p>
                                        @else
                                            <p>Run away while you can!</p>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>

                </div>
            </section>

            <!-- Most Recent Project
                - this module will dynamically show the most recent project submitted
                - a spin off of this can be a Featured Project module
                - for demo purposes, it it currently set to show a random project
            -------------------------->
            <section class="column">
                <div class="ui segment">
                    <h2 class="ui dividing header">
                        <i class="huge diamond icon"></i>
                        <div class="content">
                            <span>Most Recent Project</span>
                            <div class="sub header">This is your most recent project. Check it out!</div>
                        </div>
                    </h2>

                    <div class="ui link items">
                        <a href="/projects/{{ $project->id }}" class="item">
                            <div class="small image">
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
                                <h1 class="ui header">
                                    <span>{{ $project->project_name }}</span>
                                    <div class="sub header">
                                        <span>{{ $project->lead->lead_name }}</span>
                                    </div>
                                </h1>

                                <div class="meta">
                                    <span class="budget">${{ $project->project_budget }}</span>|
                                    <span class="days">{{ $project->project_days }} days</span>|
                                    <span class="type">{{ ucfirst($project->project_type) }}</span>|
                                    <span class="cms">{{ ucfirst($project->project_cms) }}</span>
                                </div>

                                <div class="description">
                                    <p>This project has a score of <strong>{{ number_format($project->project_score * 100) }}</strong></p>

                                    @if ($project->project_grade == "A")
                                        <p>This is an ideal project!</p>
                                    @elseif ($project->project_grade == "B")
                                        <p>You should really consider this project!</p>
                                    @elseif ($project->project_grade == "C")
                                        <p>This project could be better.</p>
                                    @elseif ($project->project_grade == "D")
                                        <p>You may want to pass on this project.</p>
                                    @else
                                        <p>Run away while you can!</p>
                                    @endif
                                </div>

                                <div class="extra">
                                    <div class="ui tiny buttons">
                                        <button class="ui positive button">Accept</button>
                                        <span class="or"></span>
                                        <button class="ui negative button">Reject</button>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </section>

            <!-- User Settings
                - gives a summary of the current user settings/bottom lines
            -------------------------->
            <section class="column">
                <div class="ui segment">
                    <h2 class="ui dividing header">
                        <i class="huge settings icon"></i>
                        <div class="content">
                            <span>Your Bottom Lines</span>
                            <div class="sub header">A project must have these to be considered!</div>
                        </div>
                    </h2>

                    <div class="ui relaxed list">
                        <div class="item">
                            <div class="content aligned header">Budget</div>
                            <span>Your minimum budget is <strong>${{ $user->budget }}</strong></span>
                        </div>

                        <div class="item">
                            <div class="content aligned header">Days</div>
                            <span>You prefer to have at least <strong>{{ $user->days }}</strong> days to complete a project</span>
                        </div>

                        <div class="item">
                            <div class="content aligned header">Project Type</div>
                            <span>You prefer to work on <strong>{{ $user->project }}</strong> projects</span>
                        </div>

                        <div class="item">
                            <div class="content aligned header">Framework</div>
                            @if ($user->framework == 'no')
                                <span>You don't like to use <strong>frameworks</strong></span>
                            @else
                                <span>Your preferred framework is <strong>{{ ucfirst($user->framework) }}</strong></span>
                            @endif
                        </div>

                        <div class="item">
                            <div class="content aligned header">Themes</div>
                            @if ($user->theme == 'yes' )
                                <span>You like to customize <strong>themes and templates</strong></span>
                            @else
                                <span>You like to create <strong>custom designs</strong></span>
                            @endif
                        </div>

                        <div class="item">
                            <div class="content aligned header">Content Management Systems</div>
                            @if ($user->cms == 'no' )
                                <span>You don't like to use <strong>CMS's</strong></span>
                            @else
                                <span>Your preferred CMS is <strong>{{ ucfirst($user->cms) }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
            </section>

            <!-- Potential Clients
                - shows all of the leads thus far
                - right now may show a lead twice if they have more than one project
                - also due to the potential length, I plan to configure it to show only a set amount of leads
                - for demo purposes, it is currently set to show 3 random leads
            -------------------------->
            <section class="column">
                <div class="ui segment">
                    <h2 class="ui dividing header">
                        <i class="huge male icon"></i>
                        <div class="content">
                            <span>Potential Clients</span>
                            <div class="sub header">You should work well with these leads</div>
                        </div>
                    </h2>

                    <div class="ui divided link items">
                        @foreach ($projects as $project)
                            <a href="/leads/{{ $project->lead->id }}" class="item">
                                <div class="ui tiny image">
                                   @if ($project->project_grade == "A")
                                        <img src="http://api.adorable.io/avatars/285/avatar">
                                    @elseif ($project->project_grade == "B")
                                        <img src="http://api.adorable.io/avatars/285/bob">
                                    @elseif ($project->project_grade == "C")
                                        <img src="http://api.adorable.io/avatars/285/cheap">
                                    @elseif ($project->project_grade == "D")
                                        <img src="http://api.adorable.io/avatars/285/happy">
                                    @else
                                        <img src="http://api.adorable.io/avatars/285/no">
                                    @endif
                                </div>
                                <div class="content">
                                    <div class="ui header">
                                        <span>{{ $project->lead->lead_name }}</span>
                                    </div>
                                    <div class="meta">
                                        <span class="type">{{ ucfirst($project->lead->lead_type) }}</span>|
                                        <span class="focus">{{ ucfirst($project->lead->lead_focus) }}</span>|
                                        <span class="involvement">{{ ucfirst($project->lead->lead_involvement) }}</span>|
                                        <span class="boss">{{ ucfirst($project->lead->lead_boss) }}</span>
                                    </div>
                                    <div class="description">
                                        <p>{{ $project->lead->lead_email }}</p>
                                        <p>{{ $project->lead->lead_phone }}</p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </section>

        </div>
    </section>

@endsection