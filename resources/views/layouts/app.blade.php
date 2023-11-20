<!DOCTYPE html>
<html lang="en">
<head>
    @include('include.head')

</head>
<body class="@yield('body_class')">
        @yield('content_login')
        {{-- Itu yield content nya bikin tampilan nya jadi ada 2 --}}
        @include('include.footer')
</body>
</html>
