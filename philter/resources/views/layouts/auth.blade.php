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

<div class="ui padded stackable grid">

    <main class="ui column centered row">

        <!-- Main Content
        -------------------------->
        @yield('content')

    </main>

</div>

<!-- Scripts
-------------------------->
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="{{ asset('js/semantic.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>