<!-- resources/views/layouts/main_layout.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Danceshow')</title>
    <!-- Add your CSS styles or external stylesheets here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>

</head>
<body style="text-align: center;">
<header>
    <!-- Your header content goes here -->
    @include('layouts.nav')
</header>
<div style="margin: auto; width: 60%;">


    <main>
        @yield('content')
    </main>

    <footer>
        <!-- Your footer content goes here -->
        <p>&copy; 2024 website</p>
    </footer>
</div>

</body>
</html>
