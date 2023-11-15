@extends('layouts.app')
@section('body_class','nav-md')

    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col menu_fixed">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
                    </div>

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
                    <div class="page-title">
                        @yield('content')
                    </div>
                </div>
            </div>
            <!-- /page content -->
        </div>
    </div>
