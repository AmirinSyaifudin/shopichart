@extends('frontend.templates.eshopper')

@section('content')
<section id="cart_items">
    <div class="container">
        <h2 class="title text-center">Transaksi Product</h2>
{{--
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#">Kembali</a></li>
            </ol>
        </div><!--/breadcrums--> --}}

        <div class="checkout-options">
            <h3> User :  {{ $users = auth()->user()->name  }}  </h3>
            <h4>{{ $produk->nama_produk }}</h4>
            <ul class="nav">
                <li>
                    <label><input type="checkbox"> Register Account</label>
                </li>
                <li>
                    <label><input type="checkbox"> Guest Checkout</label>
                </li>
                <li>
                    <a href=""><i class="fa fa-times"></i>Cancel</a>
                </li>
            </ul>
        </div><!--/checkout-options-->

        <div class="step-one">
            <h2 class="heading text-center">ISI DATA DI BAWAH DENGAN BENAR</h2>
        </div>


        <div class="shopper-informations">

            <div class="row">
                <div class="col-sm-3">
                    <div class="shopper-info">
                        <p>Informasi Akun : </p>
                     {{--  <form accept="{{ route('transaksi.proses_transaksi', $transaksi) }}" method="POST" enctype="multipart/form-data">  --}}
                            <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="" value="" placeholder="{{ $users = auth()->user()->name  }} *">
                            <input type="text" name="" value="" placeholder="{{ $users = auth()->user()->email  }} ">
                            <input type="text" name="" value="" placeholder="{{ $produk->nama_produk }}">
                            <input type="text" name="" value="" placeholder="{{ 'Rp.'. number_format ($produk->harga) . "  " }} *">

                        <input type="submit" value="Order" class="btn btn-primary"></input>
                        <a class="btn btn-primary" href="">KEMBALI</a>
                    </div>
                </div>
                <div class="col-sm-5 clearfix">
                    <div class="bill-to">
                        <p>Data lengkap : </p>
                        <div class="form-one">

                                <input type="text" name="nama_customer" placeholder="Nama Lengkap">
                                <input type="text" name="email" placeholder="Konfirmasi Email*">
                                <input type="number" placeholder="No Telpon *">
                                <textarea name="message" name="alamat" placeholder="Alamat *" rows="4"></textarea>
                            </form>
                        </div>
                        <div class="form-two">

                                <input type="number" name="kode_pos" placeholder="Kode Pos*">
                                <select>
                                    <option>-- Provinsi :  --</option>
                                    @foreach ($provinsi as $prv)
                                        <option value="{{ $prv->provinsi_id}}">{{ $prv->nama_provinsi}}</option>
                                     @endforeach
                                </select>
                                <select nama="kabupaten_id" id="" >
                                    <option>-- Kabupaten :  --</option>
                                    @foreach ($kabupaten as $kb)
                                        <option value="{{ $kb->kabupaten_id}}">{{ $kb->nama_kabupaten}}</option>
                                    @endforeach
                                </select>
                                <select>
                                    <option>-- Kota :  --</option>
                                    @foreach ($kota as $kt)
                                        <option value="{{ $kt->kota_id}}">{{ $kt->nama_kota}}</option>
                                    @endforeach
                                </select>
                                {{-- <input type="password" placeholder="Confirm password"> --}}



                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="order-message">
                        <p>Catatan : </p>
                        <textarea name="keterangan" placeholder="Keterangan...." rows="16"></textarea>
                        <label><input type="checkbox"> Shipping to bill address</label>
                    </div>
                </div>
            </div>

        </from>
        </div>


        {{-- <div class="review-payment">
            <h2>Daftar Produk di Order &amp; Payment</h2>
        </div>

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
                            <a href=""><img src="{{ asset('eshopper/images/cart/one.png') }}" alt=""></a>
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
                    </tr>
                    <tr>
                        <td colspan="4">&nbsp;</td>
                        <td colspan="2">
                            <table class="table table-condensed total-result">
                                <tbody><tr>
                                    <td>Cart Sub Total</td>
                                    <td>$59</td>
                                </tr>
                                <tr>
                                    <td>Exo Tax</td>
                                    <td>$2</td>
                                </tr>
                                <tr class="shipping-cost">
                                    <td>Shipping Cost</td>
                                    <td>Free</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td><span>$61</span></td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody>
            </table>



        </div>


        <a class="btn btn-primary" href="">ORDER SEKARANG</a>
        <a class="btn btn-primary" href="">KEMBALI</a> --}}



    </div>
</section>



@endsection
