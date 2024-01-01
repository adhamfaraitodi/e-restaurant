@extends('admin.layouts.admin')
@section('tittle','admin')
@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Update menu</h1>
        <div class="lead">
        </div>
        <div class="container mt-4">
            <form method="post" action="{{ route('menu.update', $data->id) }}">
                @csrf
                <br class="mb-3">
                <label for="foodName" class="form-label">Nama</label>
                <input value="{{ $data->name }}" type="text" class="form-control" name="foodName" placeholder="Nama" required>

                <label for="foodDesc" class="form-label">Deskripsi</label>
                <input value="{{ $data->desc }}" type="text" class="form-control" name="foodDesc" placeholder="Deskripsi" required>

                <label for="foodStock" class="form-label">Stok</label>
                <input value="{{ $data->number_available }}" type="number" class="form-control" name="foodStock" placeholder="Deskripsi" required>

                <label for="foodStock" class="form-label">Jenis makanan</label> <br>
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
                </div><br>

                <label for="foodPrice" class="form-label">Harga</label>
                <input value="{{ round($data->price_food) }}" type="number" class="form-control" name="foodPrice" placeholder="Deskripsi" required>

                <label for="foodDisc" class="form-label">Discount</label>
                <input value="{{ round($data->discount )}}" type="number" class="form-control" name="foodDisc" placeholder="foodDisc" required>

                <button type="submit" class="btn btn-primary">Update menu</button>
                <a href="{{ route('menu.show') }}" class="btn btn-default">Cancel</a>
            </form>
        </div>

    </div>
@endsection
