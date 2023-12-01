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
                            <th scope="col">Qty</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Diskon</th>
                            <th scope="col">sub total</th>
                            <th scope="col">hapus</th>
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
                                    <td data-th="total">{{ $details['subtotal']}}</td>
                                    <td class="actions">
                                        <form action="{{ route('pesan.cartdelete', ['meja' => session('idMeja'), 'id' => $id]) }}" method="post">
                                            @csrf
                                            @method('delete')

                                            <button type="submit" class="delete-product">
                                                <svg class="close" width="2em" height="2em">&nbsp;<use xlink:href="#close"></use></svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                        <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Total : </td>
                            @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                                <td colspan="4" class="text-right">{{ $details['total'] }}</td>
                                @break
                            @endforeach
                            @endif
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right">
                                <a href="{{ route('pesan.menu',['meja' => session('idMeja')])}}" class="btn btn-secondary"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                            <td class="actions text-right"colspan="2">
                                <a href="{{ route('pesan.flush',['meja' => session('idMeja')])}}" class="btn btn-secondary"><i class="fa fa-angle-left"></i> Clear all</a></a>
                            </td>
                            <td class="actions text-right">
                                <a href="{{ route('pesan.checkout',['meja' => session('idMeja')]) }}" class="btn btn-primary"><i class="fa fa-angle-left"></i> Checkout</a></a>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    /* Add this style to your CSS or in a style tag within your HTML */
    .delete-product {
        background: none;
        border: none;
        padding: 0;
        font: inherit;
        cursor: pointer;
        outline: inherit;
    }
</style>
@endsection
