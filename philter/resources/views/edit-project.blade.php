@extends('layouts.master')

@section('content')

    <!-- Edit Project
        - this page is a simple form to edit and update project information in the database
    -------------------------->
    <section class="fourteen wide column">
        <div class="ui one column row">
            <div class="column">
                <h2 class="ui dividing header">
                    <i class="huge diamond icon"></i>
                    <div class="content">
                        <span>Edit</span>
                        <div class="sub header">Make changes to {{ $project->project_name }}</div>
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
                            <label for="project_name" class="label">What is this project called?</label>
                            <input type="text" name="project_name" value="{{ $project->project_name }}" placeholder="{{ $project->project_name }}">
                        </div>

                        <div class="ui field">
                            <label for="project_type" class="label">What type of project will this be?</label>
                            <select name="project_type" class="ui fluid dropdown">
                                <option value="{{ $project->project_type }}">{{ $project->project_type }}</option>
                                <option value="development">Web Development</option>
                                <option value="design">Graphic Design</option>
                                <option value="seo">SEO</option>
                            </select>
                        </div>

                        <div class="ui field">
                            <label for="project_budget" class="label">What is your budget for this project?</label>
                            <select name="project_budget" class="ui fluid dropdown">
                                <option value="{{ $project->project_budget }}">{{ $project->project_budget }}</option>
                                <option value="0">0</option>
                                <option value="1000">1000</option>
                                <option value="2000">2000</option>
                                <option value="3000">3000</option>
                            </select>
                        </div>

                        <div class="ui field">
                            <label for="project_timeline" class="label">When should this project launch?</label>
                            <input type="date" name="project_timeline" value="{{ $project->project_timeline }}" placeholder="{{ $project->project_timeline }}">
                        </div>

                        <div class="ui field">
                            <label for="project_size" class="label">How large will this project be?</label>
                            <select name="project_size" class="ui fluid dropdown">
                                <option value="{{ $project->project_size }}">{{ $project->project_size }}</option>
                                <option value="small">1-5 pages</option>
                                <option value="medium">6-10 pages</option>
                                <option value="large">11+ pages</option>
                            </select>
                        </div>

                        <div class="ui field">
                            <label for="project_framework" class="label">Would you like a Framework to be used?</label>
                            <select name="project_framework" class="ui fluid dropdown">
                                <option value="{{ $project->project_framework }}">{{ $project->project_framework }}</option>
                                <option value="bootstrap">Bootstrap</option>
                                <option value="foundation">Foundation</option>
                                <option value="semantic">Semantic UI</option>
                                <option value="no">No</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div class="ui field">
                            <label for="project_theme" class="label">Would you like a template to be used?</label>
                            <select name="project_theme" class="ui fluid dropdown">
                                <option value="{{ $project->project_theme }}">{{ $project->project_theme }}</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>

                        <div class="ui field">
                            <label for="project_cms" class="label">Would you like to use a Content Management System?</label>
                            <select name="project_cms" class="ui fluid dropdown">
                                <option value="{{ $project->project_cms }}">{{ $project->project_cms }}</option>
                                <option value="wordpress">Wordpress</option>
                                <option value="drupal">Drupal</option>
                                <option value="joomla">Joomla</option>
                                <option value="no">No</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="ui blue submit button">Update</button>
                </form>
            </div>
        </div>
    </section>

@endsection