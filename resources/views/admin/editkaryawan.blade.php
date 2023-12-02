@extends('admin.layouts.admin')
@section('tittle','admin')
@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Update user</h1>
        <div class="lead">

        </div>

        <div class="container mt-4">
            <form method="post" action="{{ route('karyawan.update',$Karyawan->id) }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ $Karyawan->name }}"
                           type="text"
                           class="form-control"
                           name="name"
                           placeholder="Name" required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input value="{{ $Karyawan->email }}"
                           type="email"
                           class="form-control"
                           name="email"
                           placeholder="Email" required>

                    @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input value="{{ $Karyawan->address }}"
                           type="address"
                           class="form-control"
                           name="address"
                           placeholder="address" required>

                    @if ($errors->has('address'))
                        <span class="text-danger text-left">{{ $errors->first('address') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input value="{{ $Karyawan->phone_number }}"
                           type="text"
                           class="form-control"
                           name="phone"
                           placeholder="phone" required>

                    @if ($errors->has('phone'))
                        <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
                    @endif
                </div>
                {{-- <div class="mb-3">
                    <div id="job" class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-secondary">
                            <input type="radio" name="job" value="owner" class="join-btn"> Owner
                        </label>
                        <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-secondary">
                            <input type="radio" name="job" value="karyawan" class="join-btn"> Karyawan
                        </label>
                    </div>
                </div> --}}
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input
                           type="password"
                           class="form-control"
                           name="password"
                           placeholder="Password">

                    @if ($errors->has('password'))
                        <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="passwordConfirm" class="form-label">Confirm assword</label>
                    <input
                           type="password"
                           class="form-control"
                           name="passwordConfirm"
                           placeholder="Confirm password">

                    @if ($errors->has('password'))
                        <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Update user</button>
                <a href="{{ route('karyawan.show') }}" class="btn btn-default">Cancel</button>
            </form>
        </div>

    </div>
@endsection
