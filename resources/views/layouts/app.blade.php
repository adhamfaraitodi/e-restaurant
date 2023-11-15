<!DOCTYPE html>
<html lang="en">
<head>
    @include('include.head')
</head>
<body class="@yield('body_class')">
        @yield('content')
        @include('include.footer')
</body>
</html>
