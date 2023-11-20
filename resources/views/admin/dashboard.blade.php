@extends('admin.layouts.admin')
@section('content')

    @if (Session::has('key'))
        <h5>berhasil</h5>
    @else
        <h5>gagal</h5>
    @endif

@endsection
