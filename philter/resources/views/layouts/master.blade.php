<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Project Philter</title>
    <meta name="description" content="Project Philter is the easiest way to filter out the good projects from the bad">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('css/semantic.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>
<body>

    <!-- The Dashboard
        - the Notifications link is a dead link at this time
        - in the future, it will simply show notifications of new projects submitted and so on
        - the Messages and Settings links in the sidebar are also dead links right now
        - the Messages highlights a future feature of Philter, being able to send and receive mail from the application
        - there are Accept and Reject buttons. When clicked, it will link to the Messages view and allow the User to send and email to the Lead
        - the email will either move forward with the project or decline the project
    -------------------------->

    <div class="ui padded stackable grid">

        <!-- Header -->
        <header class="one column row primary-header">
            <div class="column">
                <nav class="ui menu right">
                    {{-- Logo Area --}}

                    <a href="{{ url('/home') }}" class="item"><i class="ui large filter icon"></i></a>

                    {{-- Floated menu to the right --}}
                    <div class="right menu">
                        @if (Auth::guest())
                            <a href="{{ url('/auth/login') }}" class="item">Login</a>
                            <a href="{{ url('/auth/register') }}" class="item">Register</a>
                        @else
                            <div class="ui dropdown item">
                                <i class="add square icon"></i>

                                <div class="text">Create New</div>

                                <i class="dropdown icon"></i>

                                <div class="menu">
                                    <div class="item">
                                        <a href="/projects/create">New Project</a>
                                    </div>

                                    <div class="item">
                                        <a href="#">New Lead</a>
                                    </div>
                                </div>
                            </div>

                            <div class="ui dropdown item">
                                <i class="alarm icon"></i>

                                <div class="text">Notifications</div>

                                <i class="dropdown icon"></i>

                                <div class="menu">
                                    <div class="item">Notifications go here</div>
                                </div>
                            </div>

                            <div class="ui dropdown item">
                                <i class="user icon"></i>

                                <div class="text">{{ Auth::user()->name }}</div>

                                <i class="dropdown icon"></i>

                                <div class="menu">
                                    <div class="item">
                                        <a href="/users/{{ Auth::user()->id }}/edit">Update</a>
                                    </div>

                                    <div class="item">
                                        <a href="{{ url('/auth/logout') }}">Logout</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                </nav>
            </div>
        </header>

        <main class="equal height row">

            <!-- Sidebar -->
            <aside class="two wide column sidebar primary-sidebar">
                <nav class="ui fluid vertical labeled icon secondary pointing menu">
                    <a href="{{ url('home') }}" class="item"><i class="large dashboard icon"></i> Dashboard</a>
                    <a href="{{ url('projects') }}" class="item"><i class="large folder open icon"></i> Projects</a>
                    <a href="{{ url('leads') }}" class="item"><i class="large male icon"></i> Leads</a>
                    <a href="{{-- {{ url('messages') }} --}}" class="item"><i class="large comments icon"></i> Messages</a>
                    <a href="{{-- {{ url('settings') }} --}}" class="item"><i class="large settings icon"></i> Settings</a>
                </nav>
            </aside>

            <!-- Main Content -->
            @yield('content')

        </main>

        <!-- Footer -->
        <footer class="center aligned one column row primary-footer">
            <span class="column">&copy; Philter 2015.</span>
        </footer>

    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="{{ asset('js/semantic.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
