@extends('layouts.master')

@section('content')

    <!-- Project Details
        - at this time the Bottom Lines Met and Lead Characteristics met are for display only
        - once functional these will display the accurate ratio of bottom lines met
    -------------------------->
    <section class="fourteen wide column">
        <div class="ui top attached tabular menu">
            <a class="active item" data-tab="first">Overview</a>
            <a class="item" data-tab="second">Bottom Lines</a>
            <a class="item" data-tab="third">Lead</a>
            <a href="/projects/{{ $project->id }}/edit" class="item">Edit</a>
            <a class="item" data-tab="fith">Delete</a>
        </div>

        <div class="ui bottom attached active tab segment" data-tab="first">
            <div class="ui two column grid">
                <div class="eleven wide column">
                    <h1 class="ui header">
                        <span>{{ $project->project_name }}</span>
                        <span class="sub header">
                            <span>{{ $project->lead->lead_name }}</span> | <span>{{ $project->lead->lead_email }}</span>
                        </span>
                    </h1>
                    <div class="ui buttons">
                        <button class="ui positive button">Accept</button>
                        <span class="or"></span>
                        <button class="ui negative button">Reject</button>
                    </div>

                    <div class="ui horizontal divider">Project Description</div>

                    <p>{{ $project->project_description }}</p>
                </div>

                <div class="five wide column">
                    <div class="ui purple fluid card">
                        <div class="ui large image">
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
                    </div>
                </div>
            </div>

            <div class="ui three column row grid">
                <div class="column">
                    <div class="ui center aligned red segment">
                        <div class="ui huge green statistic">
                            <div class="value">4/7</div>
                            <div class="label">Bottom Lines Met</div>
                        </div>
                    </div>
                </div>

                <div class="column">
                    <div class="ui center aligned blue segment">
                        <div class="ui huge green statistic">
                            <div class="value">2/4</div>
                            <div class="label">Lead Requirements Met</div>
                        </div>
                    </div>
                </div>

                <div class="column">
                    <div class="ui center aligned green segment">
                        @if ($project->project_score >= 0.8)
                            <div class="ui huge green statistic">
                                @elseif ($project->project_score >= 0.5)
                                    <div class="ui huge yellow statistic">
                                        @else
                                            <div class="ui huge red statistic">
                                                @endif
                                                <div class="value">{{ number_format($project->project_score * 100) }}</div>
                                                <div class="label">Total Score</div>
                                            </div>
                                    </div>
                            </div>
                    </div>
                </div>

                <div class="ui bottom attached tab segment" data-tab="second">
                    <div class="ui two column grid">
                        <div class="column">
                            <h2 class="ui dividing header">
                                <i class="huge settings icon"></i>
                                <span class="content">
                                    <span>Your Bottom Lines</span>
                                    <span class="sub header">Take a look at how this Project stacks up</span>
                                </span>
                            </h2>

                            <!-- List
                                - this list is currently hard coded in for demo purposes
                                - the goal is to have the list be dynamically generated as a result of the custom bottom lines set forth by the user
                            -------------------------->
                            <div class="ui relaxed list">
                                <div class="item">
                                    @if ($project->project_budget >= $user->budget)
                                        <i class="large green check icon"></i>
                                    @else
                                        <i class="large red minus icon"></i>
                                    @endif
                                    <div class="content">
                                        <div class="header">Budget</div>
                                        <div class="description">${{ $project->project_budget }}</div>
                                    </div>
                                </div>

                                <div class="item">
                                    @if ($project->project_days >= $user->days)
                                        <i class="large green check icon"></i>
                                    @else
                                        <i class="large red minus icon"></i>
                                    @endif
                                    <div class="content">
                                        <div class="header">Timeline</div>
                                        <div class="description">{{ $project->project_days }} days</div>
                                    </div>
                                </div>

                                <div class="item">
                                    @if ($project->project_hours >= $user->hours)
                                        <i class="large green check icon"></i>
                                    @else
                                        <i class="large red minus icon"></i>
                                    @endif
                                    <div class="content">
                                        <div class="header">Hours</div>
                                        <div class="description">{{ $project->project_hours }} hours</div>
                                    </div>
                                </div>

                                <div class="item">
                                    @if ($project->project_size >= $user->size)
                                        <i class="large green check icon"></i>
                                    @else
                                        <i class="large red minus icon"></i>
                                    @endif
                                    <div class="content">
                                        <div class="header">Size</div>
                                        <div class="description">{{ ucfirst($project->project_size ) }}</div>
                                    </div>
                                </div>

                                <div class="item">
                                    @if ($project->project_framework == $user->framework)
                                        <i class="large green check icon"></i>
                                    @else
                                        <i class="large red minus icon"></i>
                                    @endif
                                    <div class="content">
                                        <div class="header">Framework</div>
                                        <div class="description">{{ ucfirst($project->project_framework) }}</div>
                                    </div>
                                </div>

                                <div class="item">
                                    @if ($project->project_theme == $user->theme)
                                        <i class="large green check icon"></i>
                                    @else
                                        <i class="large red minus icon"></i>
                                    @endif
                                    <div class="content">
                                        <div class="header">Theme</div>
                                        <div class="description">{{ ucfirst($project->project_theme) }}</div>
                                    </div>
                                </div>

                                <div class="item">
                                    @if ($project->project_cms == $user->cms)
                                        <i class="large green check icon"></i>
                                    @else
                                        <i class="large red minus icon"></i>
                                    @endif
                                    <div class="content">
                                        <div class="header">CMS</div>
                                        <div class="description">{{ ucfirst($project->project_cms) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ui bottom attached tab segment" data-tab="third">
                    <div class="ui two column grid">
                        <div class="column">
                            <h2 class="ui dividing header">
                                <i class="huge male icon"></i>
                                <span class="content">
                                    <span>Lead Characteristics</span>
                                    <span class="sub header">See how you might get along with this client</span>
                                </span>
                            </h2>

                            <!-- List
                                - this list is currently hard coded in for demo purposes
                                - the goal is to have the list be dynamically generated as a result of the custom bottom lines set forth by the user
                            -------------------------->
                            <div class="ui relaxed list">
                                <div class="item">
                                    @if ($project->lead->lead_type == $user->type)
                                        <i class="large green check icon"></i>
                                    @else
                                        <i class="large red minus icon"></i>
                                    @endif
                                    <div class="content">
                                        <div class="header">Lead Type</div>
                                        <div class="description">{{ ucfirst($project->lead->lead_type) }}</div>
                                    </div>
                                </div>

                                <div class="item">
                                    @if ($project->lead->lead_focus == $user->focus)
                                        <i class="large green check icon"></i>
                                    @else
                                        <i class="large red minus icon"></i>
                                    @endif
                                    <div class="content">
                                        <div class="header">Lead Focus</div>
                                        <div class="description">{{ ucfirst($project->lead->lead_focus) }}</div>
                                    </div>
                                </div>

                                <div class="item">
                                    @if ($project->lead->lead_involvement == $user->involvement)
                                        <i class="large green check icon"></i>
                                    @else
                                        <i class="large red minus icon"></i>
                                    @endif
                                    <div class="content">
                                        <div class="header">Lead Involvement</div>
                                        <div class="description">{{ ucfirst($project->lead->lead_involvement) }}</div>
                                    </div>
                                </div>

                                <div class="item">
                                    @if ($project->lead->lead_boss == $user->boss)
                                        <i class="large green check icon"></i>
                                    @else
                                        <i class="large red minus icon"></i>
                                    @endif
                                    <div class="content">
                                        <div class="header">Decision Maker</div>
                                        <div class="description">{{ ucfirst($project->lead->lead_boss) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delete
                    - for this demo, the delete button is simply displayed
                    - for production if the button is pressed, an additional alert will trigger to confirm the action
                -------------------------->
                <div class="ui bottom attached tab segment" data-tab="fith">
                    <div class="ui one column row">
                        <div class="column">

                            <p>Delete this project.</p>

                            <form action="" method="POST">
                                {!! csrf_field() !!}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="id" value="{{ $project->project_id }}">
                                <button class="ui red button">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

