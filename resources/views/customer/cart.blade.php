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
                    <table id="ManageMenuTable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Terjual</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Diskon</th>
                            <th scope="col">total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Terjual</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Diskon</th>
                            <th scope="col">total</th>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
