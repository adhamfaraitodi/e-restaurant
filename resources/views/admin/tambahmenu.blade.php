@extends('admin.layouts.admin')
@section('content')
    <div class="page-title">
        <div class="title_left">
        </div>

        <div class="title_right">
            <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                <div class="input-group">
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Form Tambah Menu</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form id="tambahMenuForm" enctype="multipart/form-data" method="POST" action="{{ route('menu.store') }}" data-parsley-validate class="form-horizontal form-label-left">
                        @csrf
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="foodName">Nama Makanan <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="foodName" required="required" class="form-control" name="foodName">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="foodDesc">Deskripsi Makanan <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="foodDesc" name="foodDesc" required="required" class="form-control">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="foodImg" class="col-form-label col-md-3 col-sm-3 label-align">Foto Makanan</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input id="foodImg" class="form-control" type="file" name="foodImg">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="foodStock" class="col-form-label col-md-3 col-sm-3 label-align">Stok</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input id="foodStock" class="form-control" type="number" name="foodStock">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Makanan</label>
                            <div class="col-md-6 col-sm-6 ">
                                <div id="jenis" class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                        <input type="radio" name="jenis" value="Makanan" class="join-btn"> Makanan
                                    </label>
                                    <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                        <input type="radio" name="jenis" value="Minuman" class="join-btn"> Minuman
                                    </label>
                                    <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                        <input type="radio" name="jenis" value="Snack" class="join-btn"> Snack
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="foodPrice">Harga <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="number" id="foodPrice" name="foodPrice" required="required" class="form-control">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="foodDisc">Diskon <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="number" id="foodDisc" name="foodDisc" required="required" class="form-control">
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
