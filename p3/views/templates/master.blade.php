<!doctype html>
<html lang='en'>

<head>

    <title>@yield('title', $app->config('app.name'))</title>

    <meta charset='utf-8'>

    <link rel='shortcut icon' href='/favicon.ico'>

    <link href='/css/app.css' rel='stylesheet'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css'>

    @yield('head')

</head>

<body>

    <header>
        <h1>{{ $app->config('app.name') }}</h1>
    </header>

    <main>
        @yield('content')
    </main>

    @yield('body')

</body>

</html>