@extends('layouts.master')

@section('content')

    <!-- User Updating
        - this form has been generated for the demo
        - in production, the goal is to have the user be able to create their own custom form with custom values
        - that would allow them to set their own bottom lines, no matter how complex they are
        - based upon the bottom lines received, a client facing form would be generated for the user
        - the use then takes that form and can put into their own website or can send leads to this system to submit the form
    -------------------------->
    <section class="fourteen wide column">
        <div class="ui one column row">
            <div class="column">
                <h2 class="ui dividing header">
                    <i class="huge diamond icon"></i>
                    <div class="content">
                        <span>Edit</span>
                        <div class="sub header">Make changes to {{ $user->name }}</div>
                    </div>
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

                <form method="POST" action="" class="ui form attached fluid segment">

                    {!! csrf_field() !!}

                    <div class="one field">

                        <div class="ui field">
                            <label for="name" class="label">Name</label>
                            <input type="text" name="name" value="{{ $user->name }}" placeholder="{{ $user->name }}">
                        </div>

                        <div class="ui field">
                            <label for="email" class="label">Email</label>
                            <input type="email" name="email" value="{{ $user->email }}" placeholder="{{ $user->email }}">
                        </div>

                        <div class="ui horizontal divider">Project Bottom Lines</div>

                        <div class="ui field">
                            <label for="project" class="label">What type of projects do you prefer?</label>
                            <select name="project" class="ui fluid dropdown">
                                <option value="{{ $user->project }}">{{ $user->project }}</option>
                                <option value="development">Web Development</option>
                                <option value="design">Graphic Design</option>
                                <option value="seo">SEO</option>
                            </select>
                        </div>

                        <div class="ui field">
                            <label for="rate" class="label">What's your hourly rate?</label>
                            <input type="text" name="rate" value="{{ $user->rate }}" placeholder="{{ $user->rate }}">
                        </div>

                        <div class="ui field">
                            <label for="budget" class="label">What is your minimum budget for a given project?</label>
                            <select name="budget" class="ui fluid dropdown">
                                <option value="{{ $user->budget }}">{{ $user->budget }}</option>
                                <option value="0">0</option>
                                <option value="1000">1000</option>
                                <option value="2000">2000</option>
                                <option value="3000">3000</option>
                            </select>
                        </div>

                        <div class="ui field">
                            <label for="hours" class="label">What's the minimum amount of hours needed to complete a project?</label>
                            <select name="hours" class="ui fluid dropdown">
                                <option value="{{ $user->hours }}">{{ $user->hours }}</option>
                                <option value="20">20</option>
                                <option value="40">40</option>
                                <option value="60">60</option>
                            </select>
                        </div>

                        <div class="ui field">
                            <label for="size" class="label">How large should projects be?</label>
                            <select name="size" class="ui fluid dropdown">
                                <option value="{{ $user->size }}">{{ $user->size }}</option>
                                <option value="small">1-5 pages</option>
                                <option value="medium">6-10 pages</option>
                                <option value="large">11+ pages</option>
                            </select>
                        </div>

                        <div class="ui field">
                            <label for="framework" class="label">What Framework do you use?</label>
                            <select name="framework" class="ui fluid dropdown">
                                <option value="{{ $user->framework }}">{{ $user->framework }}</option>
                                <option value="bootstrap">Bootstrap</option>
                                <option value="foundation">Foundation</option>
                                <option value="semantic">Semantic UI</option>
                                <option value="no">None</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div class="ui field">
                            <label for="theme" class="label">Do you prefer to customize themes rather than to design from scratch?</label>
                            <select name="theme" class="ui fluid dropdown">
                                <option value="{{ $user->theme }}">{{ $user->theme }}</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>

                        <div class="ui field">
                            <label for="cms" class="label">Which Content Management System do you prefer?</label>
                            <select name="cms" class="ui fluid dropdown">
                                <option value="{{ $user->cms }}">{{ $user->cms }}</option>
                                <option value="wordpress">Wordpress</option>
                                <option value="drupal">Drupal</option>
                                <option value="joomla">Joomla</option>
                                <option value="no">None</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div class="ui horizontal divider">Preferred Lead Characteristics</div>

                        <div class="ui field">
                            <label for="type" class="label">Who do you prefer to work with?</label>
                            <select name="type" class="ui fluid dropdown">
                                <option value="{{ $user->type }}">Please select an option</option>
                                <option value="individual">Individual</option>
                                <option value="organization">Local Organization</option>
                                <option value="smallbusiness">Small Business</option>
                                <option value="business">Large Business</option>
                                <option value="government">Government Entity</option>
                                <option value="nonprofit">Non-Profit Organization</option>
                            </select>
                        </div>

                        <div class="ui field">
                            <label for="focus" class="label">What is important for clients to receive from you?</label>
                            <select name="focus" class="ui fluid dropdown">
                                <option value="{{ $user->focus }}">Please select one</option>
                                <option value="cheap">Getting the cheapest price possible</option>
                                <option value="value">Getting the best value possible</option>
                                <option value="results">Getting the best results possible</option>
                            </select>
                        </div>

                        <div class="ui field">
                            <label for="involvement" class="label">Do you prefer a client to be hands on or hands off?</label>
                            <select name="involvement" class="ui fluid dropdown">
                                <option value="{{ $user->involvement }}">Please select one</option>
                                <option value="yes">Hands on</option>
                                <option value="no">hands off</option>
                            </select>
                        </div>

                        <div class="ui field">
                            <label for="boss" class="label">Who do you prefer working with as far as making decisions?</label>
                            <select name="boss" class="ui fluid dropdown">
                                <option value="{{ $user->boss }}">Please select one</option>
                                <option value="yes">The decision maker</option>
                                <option value="contact">The primary contact</option>
                                <option value="no">Neither</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="ui blue submit button">Update</button>
                </form>
            </div>
        </div>
    </section>

@endsection