@extends('admin.layouts.admin')
@section('tittle','admin')
@section('content')
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Tabel Karyawan</h2>
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
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Job</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($karyawan as $index => $data)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->phone_number }}</td>
                                        <td>{{ $data->address }}</td>
                                        <td>{{ $data->job }}</td>
                                        <td>
{{--                                            david--}}
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('menu.edit', $data->id) }}" class="btn"><i class="fa fa-edit text-info" style="font-size: 24px"></i></a>
                                                <button id="btnMenuDelete{{ $data->id }}" class="btn" onclick="destroyMenu({{ $data->id }})"><i class="fa fa-trash text-danger" style="font-size: 24px"></i></button>
                                            </div>
                                        </td>
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
