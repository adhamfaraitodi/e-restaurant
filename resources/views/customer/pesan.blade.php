@extends('customer.layouts.customer')
@section('title_cus','pesan')
@section('content_cus')
    <section id="latest-blog" class="padding-large">
        <div class="container">
            <br>
            <br>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="row justify-content-center text-md-center">
                        <br>
                        <h3>Selamat datang di E-Restaurant</h3>
                        <h4>beritahu kami namamu</h4>
                        <br>
                    </div>
                    <form method="POST" action="{{ route('pesan.setupSession') }}">
                        @csrf
                        <input type="hidden" id="id" name="id" value="{{ $idMeja }}">
                        <br><br>
                        <div class="mb-3">
                            <label for="namaCus" class="form-label">Nama Pemesan</label>
                            <input type="text"class="form-control"id="namaCus" name="namaCus"/>
                            @if ($errors->has('namaCus'))
                                <span class="text-danger text-left">{{ $errors->first('namaCus') }}</span>
                            @endif
                            <div id="namaCusHelp" class="form-text">
                                We'll never share your name with anyone else.
                            </div>
                        </div>
                        <button id="btn-login" type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
