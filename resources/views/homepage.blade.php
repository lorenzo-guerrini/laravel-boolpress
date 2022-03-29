<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Blog</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="{{ 'css/front.css' }}">
</head>

<body>
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ route('admin.home') }}">ADMIN</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div id="app"></div>
    <script src="{{ asset('js/front.js') }}"></script>
</body>

</html>
