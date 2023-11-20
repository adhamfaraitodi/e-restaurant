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
                            <table id="ManageMenuTable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Terjual</th>
                                    <th scope="col">Favorit</th>
                                    <th scope="col">Jenis Makanan</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Diskon</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach($menus as $menu)
                                    <tr>
                                        <td>{{ $menu->name }}</td>
                                        <td>{{ $menu->desc }}</td>
                                        <td><img src="{{ Storage::url($menu->image_path) }}"></td>
                                        <td>{{ $menu->number_available }}</td>
                                        <td>{{ $menu->number_sale }}</td>
                                        <td>{{ $menu->favorite }}</td>
                                        <td>{{ $menu->food_type }}</td>
                                        <td>{{ $menu->price_food }}</td>
                                        <td>{{ $menu->discount }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('menu.edit', $menu->id) }}" class="btn"><i class="fa fa-edit text-info" style="font-size: 24px"></i></a>
                                                <button id="btnMenuDelete{{ $menu->id }}" class="btn" onclick="destroyMenu({{ $menu->id }})"><i class="fa fa-trash text-danger" style="font-size: 24px"></i></button>
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
