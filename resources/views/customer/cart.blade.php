@extends('customer.layouts.customer')
@section('title_cus','Keranjang')
@section('content_cus')
<section id="latest-blog" class="padding-large">
    <div class="container">
        <div class="row">
            <div class="display-header d-flex justify-content-between pb-3">
                <h2 class="display-7 text-dark text-uppercase">Keranjang Makanan</h2>
            </div>
            <div class="col-lg-2 col-sm-6 pb-3">
                <div class="footer-menu text-uppercase">
                    <table id="ManageMenuTable" class="table table-striped " style="width:100%">
                        <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Terjual</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Diskon</th>
                            <th scope="col">total</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $total = 0 @endphp
                        @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                                <tr rowId="{{ $id }}">
                                    <td data-th="Product">{{ $details['name'] }}</td>
                                    <td data-th="quantity">{{ $details['quantity'] }}</td>
                                    <td data-th="Price">{{ $details['price'] }}</td>
                                    <td data-th="diskon">{{ $details['discount'] }}</td>
                                    <td data-th="total">{{ $details['quantity'] * ($details['price'] - $details['discount']) }}</td>
                                    <td class="actions">
                                        <a href="{{ route('pesan.cartdelete', ['meja' => session('idMeja'), 'id' => $id]) }}">
                                            <svg class="close" width="2em" height="2em">&nbsp;<use xlink:href="#close"></use></svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="5" class="text-right">
                                <a href="{{ route('pesan.menu',['meja' => session('idMeja')])}}" class="btn btn-secondary"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                            <td class="actions">
                                <a class="btn btn-primary delete-product"><i class="fa fa-angle-left"></i> Clear</a></a>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(".delete-product").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        if(confirm("Do you really want to delete?")) {
            $.ajax({
                url: '{{ route('pesan.cartdelete',['meja' => session('idMeja')])}}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("rowId")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
</script>
@endsection
