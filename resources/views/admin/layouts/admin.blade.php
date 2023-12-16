<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.section.head')
</head>
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
            <div class="left_col scroll-view">
                <div class="clearfix"></div>
                @include('admin.section.profil')
                <br />
                @include('admin.section.sidebar')
            </div>
        </div>
                @include('admin.section.header')
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                    @yield('content')
            </div>
        </div>
        <footer>
            <div class="pull-right">
                Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /page content -->
    </div>
</div>
@include('admin.section.footer')
</body>

</html>
