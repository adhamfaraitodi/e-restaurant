@extends('customer.layouts.customer')
@section('title_cus','meja')
@section('content_cus')
    
    <section id="latest-blog" class="padding-large">
        <div class="container">
            <div class="row">
                <div class="display-header d-flex justify-content-between pb-3">
                    <h2 class="display-7 text-dark text-uppercase">Menu Makanan</h2>
                </div>
                <div class="d-flex flex-wrap">
                    <!-- menu makanan -->
                    <div class="col-lg-4 col-sm-12">
                    <div class="card border-none me-3">
                            <div class="card-image">
                                <img src="images/post-item1.jpg" alt="" class="img-fluid">
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
                        </div>
                    </div>
                    <!-- end menu -->
                </div>
            </div>
        </div>
    </section>
@endsection
