@extends('frontend.templates.eshopper')

{{--  @extends('layouts.app')  --}}

@section('content')

<section id="cart_items">
    <div class="container">
        <h2 class="title text-center">List Product</h2>

        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Product: </td>
                        <td class="description"></td>
                        <td class="price">Harga : </td>
                        <td class="quantity">Quantity :</td>
                        <td class="total">Total : </td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{ asset('eshopper/images/cart/two.png') }}" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">Colorblock Scuba</a></h4>
                            <p>Web ID: 1089772</p>
                        </td>
                        <td class="cart_price">
                            <p>$59</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_up" href=""> + </a>
                                <input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
                                <a class="cart_quantity_down" href=""> - </a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">$59</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                        </td>
                    </tr>


                    <tr>
                        <td colspan="4">&nbsp;</td>
                        <td colspan="2">
                            <table class="table table-condensed total-result">
                                <tbody><tr>
                                    <td>Jumlah Total Produk : </td>
                                    <td>$59</td>
                                </tr>
                                {{-- <tr>
                                    <td>Exo Tax</td>
                                    <td>$2</td>
                                </tr> --}}
                                <tr class="shipping-cost">
                                    <td>Pengiriman : </td>
                                    <td>Free</td>
                                </tr>
                                <tr class="shipping-cost">
                                    <td>Transfer  : </td>
                                    <td>Free</td>
                                </tr>
                                <tr>
                                    <td>Total Produk</td>
                                    <td><span>$61</span></td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
        <a class="btn btn-primary" href="">ORDER SEKARANG</a>
        <a class="btn btn-primary" href="">KEMBALI</a>
    </div>
</section>



@endsection


{{-- @foreach ($produk as $pd)
<tr>
    <td class="cart_product">
        <a href=""><img src="{{url('/assets/covers/'. $pd->cover)}}" alt=""></a>
    </td>
    <td class="cart_description">
        <h4><a href="">{{ $pd->nama_produk }}</a></h4>
        <p>Web ID: 1089772</p>
    </td>
    <td class="cart_price">
        <p>{{ 'Rp.'. number_format ($pd->harga) . "  "  }}</p>
    </td>
    <td class="cart_quantity">
        <div class="cart_quantity_button">
            <a class="cart_quantity_up" href=""> + </a>
            <input class="cart_quantity_input" type="text" name="quantity" value="{{ $pd->qty }}" autocomplete="off" size="2">
            <a class="cart_quantity_down" href=""> - </a>
        </div>
    </td>
    <td class="cart_total">
        <p class="cart_total_price">{{ 'Rp.'. number_format ($pd->harga * $pd->qty) . "  "  }}</p>
    </td>
    <td class="cart_delete">
        <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
    </td>
</tr>

@endforeach --}}



{{--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>  --}}


{{--
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{ asset('eshopper/images/cart/two.png') }}" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">Colorblock Scuba</a></h4>
                            <p>Web ID: 1089772</p>
                        </td>
                        <td class="cart_price">
                            <p>$59</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_up" href=""> + </a>
                                <input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
                                <a class="cart_quantity_down" href=""> - </a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">$59</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                        </td>
                    </tr> --}}


                    {{-- <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{ asset('eshopper/images/cart/three.png') }}" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">Colorblock Scuba</a></h4>
                            <p>Web ID: 1089772</p>
                        </td>
                        <td class="cart_price">
                            <p>$59</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_up" href=""> + </a>
                                <input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
                                <a class="cart_quantity_down" href=""> - </a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">$59</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                        </td>
                    </tr> --}}

