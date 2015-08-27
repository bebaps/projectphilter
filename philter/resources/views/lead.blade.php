@extends('layouts.master')

@section('content')

    <!-- Lead
        - this page is shows the details of given Lead
        - it provides basic information, and any related projects
    -------------------------->
    <section class="fourteen wide column">
        <div class="ui top attached tabular menu">
            <a class="active item" data-tab="first">Overview</a>
            <a href="/leads/{{ $lead->lead_id }}/edit" class="item">Edit</a>
            <a class="item" data-tab="third">Delete</a>
        </div>

        <div class="ui bottom attached active tab segment" data-tab="first">
            <div class="ui two column grid">

                <div class="five wide column">
                    <h1 class="ui header">
                        <span>{{ $lead->lead->lead_name }}</span>
                        <div class="sub header">
                            <span>{{ $lead->lead->lead_company }}</span>
                        </div>
                    </h1>

                    <div class="ui horizontal divider">Overview</div>

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

                        <div class="ui horizontal divider">Characteristics</div>

                        <div class="item">
                            @if ($lead->lead->lead_type == $user->type)
                                <i class="large green check icon"></i>
                            @else
                                <i class="large red minus icon"></i>
                            @endif
                            <div class="content">
                                <div class="header">Type</div>
                                <div class="description">{{ $lead->lead->lead_type }}</div>
                            </div>
                        </div>

                        <div class="item">
                            @if ($lead->lead->lead_focus == $user->focus)
                                <i class="large green check icon"></i>
                            @else
                                <i class="large red minus icon"></i>
                            @endif
                            <div class="content">
                                <div class="header">Focus</div>
                                <div class="description">{{ $lead->lead->lead_focus }}</div>
                            </div>
                        </div>

                        <div class="item">
                            @if ($lead->lead->lead_involvement == $user->involvement)
                                <i class="large green check icon"></i>
                            @else
                                <i class="large red minus icon"></i>
                            @endif
                            <div class="content">
                                <div class="header">Involvement</div>
                                <div class="description">{{ $lead->lead->lead_involvement }}</div>
                            </div>
                        </div>

                        <div class="item">
                            @if ($lead->lead->lead_boss == $user->boss)
                                <i class="large green check icon"></i>
                            @else
                                <i class="large red minus icon"></i>
                            @endif
                            <div class="content">
                                <div class="header">Decision Maker</div>
                                <div class="description">{{ $lead->lead->lead_boss }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Related Projects
                    - this area would show a list of projects for the specific lead
                    - for the purposes of this demo, this project card is hard coded into the view
                    - the goal is to have this card pulled into the view as a partial from the all-projects view
                -------------------------->
                <div class="eleven wide column">
                    <div class="ui link cards">
                        <a href="/projects/{{ $lead->id }}" class="ui blue card">
                            <div class="image">
                                @if ($lead->project_grade == "A")
                                    <img src="{{ asset('images/A.gif') }}">
                                @elseif ($lead->project_grade == "B")
                                    <img src="{{ asset('images/B.gif') }}">
                                @elseif ($lead->project_grade == "C")
                                    <img src="{{ asset('images/C.gif') }}">
                                @elseif ($lead->project_grade == "D")
                                    <img src="{{ asset('images/D.gif') }}">
                                @else
                                    <img src="{{ asset('images/F.gif') }}">
                                @endif
                            </div>

                            <div class="content">
                                <span class="header">{{ $lead->project_name }}</span>

                                <div class="meta">
                                    <span class="lead-name">{{ $lead->lead->lead_name }}</span>
                                </div>

                                <div class="description">
                                    {{ str_limit($lead->project_description, 300) }}
                                </div>
                            </div>

                            <div class="center aligned extra content ui small labels">
                                <span class="ui green label">${{ $lead->project_budget }}</span>
                                <span class="ui blue label">{{ $lead->project_days }} days</span>
                                <span class="ui teal label">{{ ucfirst($lead->project_type) }}</span>
                                <span class="ui orange label">{{ ucfirst($lead->project_size) }}</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete
            - for this demo, the delete button is simply displayed
            - for production if the button is pressed, an additional alert will trigger to confirm the action
        -------------------------->
        <div class="ui bottom attached tab segment" data-tab="third">
            <div class="ui one column row">
                <div class="column">

                    <p>Delete this Lead.</p>

                    <form action="" method="POST">
                        {!! csrf_field() !!}
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="id" value="{{ $lead->lead->lead_id }}">
                        <button class="ui red button">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
