@extends('admin.layouts.admin')
@section('tittle','admin')
@section('content')
    <!-- top tiles -->
    <div class="row " style="display: inline-block;" >
        <div class="tile_count">
            <div class="col-md-4 col-sm-6 tile_stats_count ">
                <span class="count_top"><i class="fa fa-user"></i> Total Karyawan</span>
                <div class="count">{{ $sumAdmins }}</div>
                <span class="count_bottom"><i class="green"></i> Karyawan</span>
            </div>
            <div class="col-md-4 col-sm-6  tile_stats_count">
                <span class="count_top"><i class="fa fa-spoon"></i> Total Menu</span>
                <div class="count">{{ $sumMenu }}</div>
                <span class="count_bottom"><i class="green"></i> Menu </span>
            </div>
            <div class="col-md-4 col-sm-6  tile_stats_count">
                <span class="count_top"><i class="fa fa-shopping-bag"></i> Total Penjualan</span>
                <div class="count green">{{ $sumOrders }}</div>
                <span class="count_bottom"><i class="green"></i> Dish</span>
            </div>
        </div>
    </div>
    <!-- /top tiles -->
@endsection
