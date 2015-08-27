@extends('layouts.master')

@section('content')

    <!-- New Lead
        - this is a simple form to create a new Lead
        - in production, this function will be paired with creating a new project
    -------------------------->
    <div class="fourteen wide column">
        <h1 class="ui center aligned header">Add a new Lead</h1>

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
                <div class="field">
                    <label for="lead_name">Full Name</label>
                    <input type="text" name="lead_name" value="{{ old('lead_name') }}" placeholder="What's your name?">
                </div>

                <div class="field">
                    <label for="lead_company">Company</label>
                    <input type="text" name="lead_company" value="{{ old('lead_company') }}" placeholder="What's your company (optional)">
                </div>

                <div class="field">
                    <label for="lead_email">Email Address</label>
                    <input type="email" name="lead_email" value="{{ old('lead_email') }}" placeholder="Email@myemail.com">
                </div>

                <div class="field">
                    <label for="lead_phone">Phone Number</label>
                    <input type="text" name="lead_phone" value="{{ old('lead_phone') }}" placeholder="555-555-5555">
                </div>

                <div class="field">
                    <label for="lead_address">Street Address</label>
                    <input type="text" name="lead_address" value="{{ old('lead_address') }}" placeholder="123 Main St.">
                </div>

                <div class="field">
                    <label for="lead_city">City</label>
                    <input type="text" name="lead_city" value="{{ old('lead_city') }}" placeholder="City">
                </div>

                <div class="field">
                    <label for="lead_state">State</label>
                    <select name="lead_state" class="ui dropdown">
                        <option value="{{ old('lead_state') }}">State</option>
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

                <div class="field">
                    <label for="lead_zip">Zip Code</label>
                    <input type="text" name="lead_zip" value="{{ old('lead_zip') }}" placeholder="85202">
                </div>

                <div class="ui field">
                    <label for="lead_type" class="label">Who is this project for?</label>
                    <select name="lead_type" class="ui fluid dropdown">
                        <option value="{{ old('lead_type') }}">Please select one</option>
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
                        <option value="{{ old('lead_focus') }}">Please select one</option>
                        <option value="cheap">Getting the cheapest price possible</option>
                        <option value="value">Getting the best value possible</option>
                        <option value="results">Getting the best results possible</option>
                    </select>
                </div>

                <div class="ui field">
                    <label for="lead_involvement" class="label">Would you like to be involved in the designed/technical decisions?</label>
                    <select name="lead_involvement" class="ui fluid dropdown">
                        <option value="{{ old('lead_involvement') }}">Please select one</option>
                        <option value="yes">Yes, I am very hands on</option>
                        <option value="no">No, I trust you</option>
                    </select>
                </div>

                <div class="ui field">
                    <label for="lead_boss" class="label">Are you the primary decision maker for this project?</label>
                    <select name="lead_boss" class="ui fluid dropdown">
                        <option value="{{ old('lead_boss') }}">Please select one</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                        <option value="contact">No, but I am the primary contact</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="ui green submit button">Add Lead</button>
        </form>
    </div>

@endsection