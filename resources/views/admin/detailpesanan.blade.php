@extends('admin.layouts.admin')
@section('tittle','admin')
@section('content')
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Tabel Detail Pesanan</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <p class="text-muted font-13 m-b-30">

                            </p>
                            <table id="ManageMenuTable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th scope="col">Nama Makanan</th>
                                    <th scope="col">QTY</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Discount</th>
                                    <th scope="col">Sub Total</th>
                                    <th scope="col">Menu Note</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach($detail as $detail)
                                    <tr>
                                        <td>{{ $detail->name }}</td>
                                        <td>{{ $detail->quantity }}</td>
                                        <td>{{ $detail->price_food }}</td>
                                        <td>{{ $detail->discount }}</td>
                                        <td>{{ $detail->subtotal }}</td>
                                        <td>{{ $detail->menu_note }}</td>
                                    </tr>
                                    @php
                                        $no++;
                                    @endphp
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
