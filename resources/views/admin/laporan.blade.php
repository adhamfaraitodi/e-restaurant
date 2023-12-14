@extends('admin.layouts.admin')
@section('tittle','admin')
@section('content')

    <!-- page content -->
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_content">

                            <section class="content invoice">
                                <!-- title row -->
                                <div class="row" style="padding-left: 3em;">
                                    <div class="invoice-header">
                                            <img src="{{asset('img/logooooo.png')}}" class="logo">
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col" style="padding-left: 1em;">
                                        E-restaurant
                                        <address>
                                            795 Freedom Ave, Suite 600
                                            <br>New York, CA 94107
                                            <br>Phone: 1 (804) 123-9876
                                            <br>Email: jon@ironadmin.com
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                                <div class="row" style="justify-content: center;">
                                    <h3>Laporan Penjualan Bulanan </h3>
                                </div>
                                <div class="row"style="justify-content: center;padding-bottom: 1em;">
                                    <div class="invoice-header">
                                    <h2>Bulan :
                                    @php
                                        echo date('F'); // Change this to your month number
                                    @endphp
                                    </h2>
                                    <br>
                                    </div>
                                </div>
                                <!-- Table row -->
                                <div class="row">
                                    <div class="  table">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Nama Menu</th>
                                                <th>Qty</th>
                                                <th>Harga satuan</th>
                                                <th>Discount</th>
                                                <th>Subtotal</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($datas as $index => $item)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $item->created_at }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->quantity }}</td>
                                                    <td>{{ $item->price_food }}</td>
                                                    <td>{{ $item->discount }}</td>
                                                    <td>{{ $item->subtotal }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr >
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Total :</td>
                                                <td >{{ $total }}</td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <div class="row" style="justify-content: end;padding-right: 1em;">
                                    <strong>Dicetak Pada : </strong> {{ now()->toDateTimeString() }}
                                </div>
                                <!-- this row will not appear when printing -->
                                <div class="row no-print">
                                    <div class=" ">
                                        <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- /page content -->
@endsection
