@extends('layouts.master')

@section('content')

    <!-- Edit Lead
        - this page is a simple form to edit and update Lead information
    -------------------------->
    <section class="fourteen wide column">
        <div class="ui one column row">
            <div class="column">
                <h2 class="ui dividing header">
                    <i class="huge diamond icon"></i>
                    <div class="content">
                        <span>Edit</span>
                        <div class="sub header">Make changes to {{ $lead->lead_name }}</div>
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
                            <label for="lead_name" class="label">Full Name</label>
                            <input type="text" name="lead_name" value="{{ $lead->lead_name }}" placeholder="Name">
                        </div>

                        <div class="ui field">
                            <label for="lead_company" class="label">Company</label>
                            <input type="text" name="lead_company" value="{{ $lead->lead_company }}" placeholder="Company">
                        </div>

                        <div class="ui field">
                            <label for="lead_email" class="label">Email Address</label>
                            <input type="email" name="lead_email" value="{{ $lead->lead_email }}" placeholder="Email">
                        </div>

                        <div class="ui field">
                            <label for="lead_phone" class="label">Phone Number</label>
                            <input type="text" name="lead_phone" value="{{ $lead->lead_phone }}" placeholder="Phone">
                        </div>

                        <div class="ui field">
                            <label for="lead_address" class="label">Street Address</label>
                            <input type="text" name="lead_address" value="{{ $lead->lead_address }}" placeholder="Address">
                        </div>

                        <div class="ui field">
                            <label for="lead_city" class="label">City</label>
                            <input type="text" name="lead_city" value="{{ $lead->lead_city }}" placeholder="City">
                        </div>

                        <div class="ui field">
                            <label for="lead_state" class="label">State</label>
                            <select name="lead_state" class="ui fluid dropdown">
                                <option value="{{ $lead->lead_state }}">{{ $lead->lead_state }}</option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                                <option value="AZ">Arizona</option>
                                <option value="AR">Arkansas</option>
                                <option value="CA">California</option>
                                <option value="CO">Colorado</option>
                                <option value="CT">Connecticut</option>
                                <option value="DE">Delaware</option>
                                <option value="DC">District Of Columbia</option>
                                <option value="FL">Florida</option>
                                <option value="GA">Georgia</option>
                                <option value="HI">Hawaii</option>
                                <option value="ID">Idaho</option>
                                <option value="IL">Illinois</option>
                                <option value="IN">Indiana</option>
                                <option value="IA">Iowa</option>
                                <option value="KS">Kansas</option>
                                <option value="KY">Kentucky</option>
                                <option value="LA">Louisiana</option>
                                <option value="ME">Maine</option>
                                <option value="MD">Maryland</option>
                                <option value="MA">Massachusetts</option>
                                <option value="MI">Michigan</option>
                                <option value="MN">Minnesota</option>
                                <option value="MS">Mississippi</option>
                                <option value="MO">Missouri</option>
                                <option value="MT">Montana</option>
                                <option value="NE">Nebraska</option>
                                <option value="NV">Nevada</option>
                                <option value="NH">New Hampshire</option>
                                <option value="NJ">New Jersey</option>
                                <option value="NM">New Mexico</option>
                                <option value="NY">New York</option>
                                <option value="NC">North Carolina</option>
                                <option value="ND">North Dakota</option>
                                <option value="OH">Ohio</option>
                                <option value="OK">Oklahoma</option>
                                <option value="OR">Oregon</option>
                                <option value="PA">Pennsylvania</option>
                                <option value="RI">Rhode Island</option>
                                <option value="SC">South Carolina</option>
                                <option value="SD">South Dakota</option>
                                <option value="TN">Tennessee</option>
                                <option value="TX">Texas</option>
                                <option value="UT">Utah</option>
                                <option value="VT">Vermont</option>
                                <option value="VA">Virginia</option>
                                <option value="WA">Washington</option>
                                <option value="WV">West Virginia</option>
                                <option value="WI">Wisconsin</option>
                                <option value="WY">Wyoming</option>
                            </select>
                        </div>

                        <div class="ui field">
                            <label for="lead_zip" class="label">Zip Code</label>
                            <input type="text" name="lead_zip" value="{{ $lead->lead_zip }}" placeholder="Zip">
                        </div>

                        <div class="ui horizontal divider">About the Project</div>

                        <div class="ui field">
                            <label for="lead_type" class="label">Who is this project for?</label>
                            <select name="lead_type" class="ui fluid dropdown">
                                <option value="{{ $lead->lead_type }}">Please select an option</option>
                                <option value="individual">Individual</option>
                                <option value="organization">Local Organization</option>
                                <option value="smallbusiness">Small Business</option>
                                <option value="business">Large Business</option>
                                <option value="government">Government Entity</option>
                                <option value="nonprofit">Non-Profit Organization</option>
                            </select>
                        </div>

                        <div class="ui field">
                            <label for="lead_focus" class="label">For this project, what is the most important aspect for you?</label>
                            <select name="lead_focus" class="ui fluid dropdown">
                                <option value="{{ $lead->lead_focus }}">Please select one</option>
                                <option value="cheap">Getting the cheapest price possible</option>
                                <option value="value">Getting the best value possible</option>
                                <option value="results">Getting the best results possible</option>
                            </select>
                        </div>

                        <div class="ui field">
                            <label for="lead_involvement" class="label">Would you like to be involved in the designed/technical decisions?</label>
                            <select name="lead_involvement" class="ui fluid dropdown">
                                <option value="{{ $lead->lead_involvement }}">Please select one</option>
                                <option value="yes">Yes, I am very hands on</option>
                                <option value="no">No, I trust you</option>
                            </select>
                        </div>

                        <div class="ui field">
                            <label for="lead_boss" class="label">Are you the primary decision maker for this project?</label>
                            <select name="lead_boss" class="ui fluid dropdown">
                                <option value="{{ $lead->lead_boss }}">Please select one</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                                <option value="contact">No, but I am the primary contact</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="ui green submit button">Update</button>
                </form>
            </div>
        </div>
    </section>

@endsection