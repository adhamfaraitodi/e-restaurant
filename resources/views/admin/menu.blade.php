@extends('admin.layouts.admin')
@section('content')
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Tabel Menu Makanan</h2>
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
                            <table id="datatable-fixed-header" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Deskripsi</th>
                                    <th>Foto</th>
                                    <th>Stok</th>
                                    <th>Terjual</th>
                                    <th>Favorit</th>
                                    <th>Jenis Makanan</th>
                                    <th>Harga</th>
                                    <th>Diskon</th>
                                    <th scope="col" colspan="3"></th>
                                </tr>
                                </thead>


                                <tbody>
                                @foreach($menus as $menu)
                                    <tr>
                                        <td>{{ $menu->name }}</td>
                                        <td>{{ $menu->desc }}</td>
                                        <td>{{ $menu->image_path }}</td>
                                        <td>{{ $menu->number_available }}</td>
                                        <td>{{ $menu->number_sale }}</td>
                                        <td>{{ $menu->favorite }}</td>
                                        <td>{{ $menu->food_type }}</td>
                                        <td>{{ $menu->price_food }}</td>
                                        <td>{{ $menu->discount }}</td>
                                        <td><a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-info btn-sm">Edit</a></td>
                                    </tr>
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
