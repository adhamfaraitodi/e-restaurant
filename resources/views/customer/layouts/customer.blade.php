@extends('layouts.app')
@section('body_class','nav-md')

    <div class="container body">
        <div class="main_container">
            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        @yield('content')
                    </div>
                </div>
            </div>
            <!-- /page content -->
        </div>
    </div>
