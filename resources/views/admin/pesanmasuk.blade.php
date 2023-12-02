@extends('admin.layouts.admin')
@section('tittle','admin')
@section('content')
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Tabel Pesanan Masuk</h2>
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
                                    <th scope="col">Nama Pemesan</th>
                                    <th scope="col">No Meja</th>
                                    <th scope="col">Status Pesanan</th>
                                    <th scope="col">Status Pembayaran</th>
                                    <th scope="col">Total price</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->table_number }}</td>
                                        <td>{{ $order->order_status }}</td>
                                        <td>{{ $order->payment_status }}</td>
                                        <td>{{ $order->total_price }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('pesan.detailshow', $order->id) }}" class="btn"><i class="fa fa-list text-success" style="font-size: 24px"></i></a>
                                                <form action="{{ route('pesan.pesananselesai', $order->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn">
                                                        <i class="fa fa-check text-info" style="font-size: 24px"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
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
