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
                    <form>
                        <br><br>
                        <div class="mb-3">
                            <label for="email-login" class="form-label">Nama Pemesan</label>
                            <input type="text"class="form-control"id="namacus"/>
                            <div id="emailHelp" class="form-text">
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
