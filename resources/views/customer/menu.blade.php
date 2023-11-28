@extends('customer.layouts.customer')
@section('title_cus','meja')
@section('content_cus')

    <section id="latest-blog" class="padding-large">
        <div class="container">
            <div class="row">
                <div>
                    <br>
                    <br>
                </div>
                <div class="display-header d-flex justify-content-center pb-3">
                    <h2 class="display-7 text-dark text-uppercase">Menu Makanan</h2>
                </div>
                <div class="d-flex flex-wrap">
                    <!-- menu makanan -->
                    <div class="col-lg-4 col-sm-12">
                    <div class="card border-none me-3">
                            <div class="card-image">
                                <img src="{{asset('img/menu.png')}}" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="card-body text-uppercase">
                            <h3 class="card-title ">
                                <a href="#">Tittle</a>
                            </h3>
                            <div class="card-meta text-muted">
                                <span class="meta-  ">harga</span>
                            </div>
                            <div class="card-meta text-muted">
                                <span class="meta-category">deskripsi</span>
                            </div>
                            <br>
                            <a href="#"><svg class="star star-empty" width="2em" height="2em"><use xlink:href="#star-empty"></use></svg></a>
                            <span style="margin-right: 10px;"></span>
                            <a href="#"><svg class="cart-outline" width="2em" height="2em"><use xlink:href="#cart-outline"></use></svg></a>
                        </div>
                    </div>
                    <!-- end menu -->
                </div>
            </div>
        </div>
    </section>
@endsection
