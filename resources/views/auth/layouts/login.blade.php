<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('tittle')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-1.13.8/datatables.min.css" rel="stylesheet">

    <script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-1.13.8/datatables.min.js"></script>
</head>
<body class="login">
@yield('content_login')
</body>

</html>
