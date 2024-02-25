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
    <style>
        footer {
            position: fixed;
            height: 50px;
            bottom: 0px;
            left: 0px;
            right: 0px;
            margin-bottom: 0px;
        }
    </style>
</head>
<body>
<header>
    <!-- Your header content goes here -->
    @include('layouts.nav')
    @include('layouts.alert')
</header>
<div class="my-2 pb-5" style="margin: auto; width: 60%;">
    <main>
        @yield('content')
    </main>

</div>

<footer class="text-center bg-light">
    <!-- Your footer content goes here -->
    <p>&copy; 2024 Payemas Tech</p>
</footer>

</body>
</html>
