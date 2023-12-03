@extends('customer.layouts.customer')
@section('title_cus','Keranjang')
@section('content_cus')
    <section id="latest-blog" class="padding-large">
        <div class="container">
            <div class="row">
                <div class="display-header d-flex justify-content-between pb-3">
                    <h2 class="display-7 text-dark text-uppercase">Keranjang Makanan</h2>
                </div>
                <div class="col-lg-2 col-sm-6 pb-3">
                    <div class="footer-menu text-uppercase">
                        <table id="ManageMenuTable" class="table table-striped " style="width:100%">
                            <thead>
                            <tr>
                                <th scope="col">No. Meja</th>
                                <th scope="col">Tgl</th>
                                <th scope="col">Total Price</th>
                                <th scope="col">Payment status</th>
                            </tr>
                            </thead>
                            <tbody>
                                <td>{{$data->table_number}}</td>
                                <td>{{$data->date}}</td>
                                <td>{{$data->total_price}}</td>
                                <td>{{$data->payment_status}}</td>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td >
                                    <button id="pay-button" class="btn btn-primary"><i class="fa fa-angle-left"></i> Bayar Sekarang</button>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        /* Add this style to your CSS or in a style tag within your HTML */
        .delete-product {
            background: none;
            border: none;
            padding: 0;
            font: inherit;
            cursor: pointer;
            outline: inherit;
        }
    </style>
@endsection
