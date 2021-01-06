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
            {{--  <h4>PRODUK : {{ $produk->nama_produk }}</h4>
            <h5>HARGA : {{ 'Rp.'. number_format ($produk->harga) . "  " }} </h5>  --}}
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


        <div class="row">
            <form action="/transaksi/proses_transaksi" method="POST">
                 @csrf
                    <div class="col-sm-6">
                        <div class="chose_area">

                            <ul class="user_info">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">NAMA USER </label>
                                    <input name="name" value="{{ old('name') }}"
                                    placeholder="{{ $users = auth()->user()->name  }} *"
                                    class="form-control" id="exampleFormControlInput1" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Email :  </label>
                                    <input name="email" value="{{ old('email') }}"
                                    placeholder="{{ $users = auth()->user()->email }} *" class="form-control"
                                    id="exampleFormControlInput1" readonly>
                                </div>



                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Nama Produk : </label>
                                    <select name="produk_id" id="" class="form-control select2">
                                        <option value="{{ $produk->produk_id }}"> {{ $produk->nama_produk }} </option>
                                    @error('produk')
                                        <span class="help-block">{{ $message}}</span>
                                    @enderror
                                </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Nama Lengkap : </label>
                                    <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Nama Lengkap" class="form-control" id="exampleFormControlInput1">
                                    @error('nama')
                                        <span class="help-block">{{ $message}}</span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <p>Keterangan : </p>
                                    <textarea name="keterangan" placeholder="Keterangan...." rows="3"></textarea>
                                    {{--  <label><input type="checkbox"> Shipping to bill address</label>  --}}
                                </div>

                                <div class="form-group">
                                    <p>Alamat : </p>
                                    <textarea name="alamat" placeholder="Isikan Alamat...." rows="3"></textarea>
                                    {{-- <label><input type="checkbox"> Shipping to bill address</label> --}}
                                </div>
                            </ul>
                        </div>

                    </div>



                    <div class="col-sm-6">
                        <div class="total_area">
                            <ul class="user_info">

                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">No Rekening  : </label>
                                    <input type="text" name="no_rekening" value="{{ old('no_rekening') }}" placeholder="No Rekening " class="form-control" id="exampleFormControlInput1">
                                    @error('nama')
                                        <span class="help-block">{{ $message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">No Telpon : </label>
                                    <input type="number" name="no_telpon" value="{{ old('no_telpon') }}" placeholder="No Telpon *" class="form-control" id="exampleFormControlInput1">
                                    @error('no_telpon')
                                        <span class="help-block">{{ $message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <li class="form-group col-md-6">
                                        <label for="exampleFormControlSelect1">Tanggal : </label>
                                        <input type="text" name="tanggal" class="form-control tanggal" placeholder="dd-mm-yyyy"
                                        value="<?php if(isset($_POST['tanggal'])) { echo old('tanggal');
                                        }else{ echo date('d-m-Y'); } ?>">
                                    </li>

                                    <li class="form-group col-md-6">
                                        <label for="exampleFormControlSelect1">Kode Transaksi  : </label>
                                            <input type="text" name="kode_transaksi" value="{{ old('kode_transaksi') }}" placeholder="Kode Transaksi... " class="form-control" id="exampleFormControlInput1">
                                            @error('kode_transaksi')
                                                <span class="help-block">{{ $message}}</span>
                                            @enderror
                                    </li>
                                </div>

                                <div class="form-group">
                                    <li class="form-group col-md-6">
                                        <label for="exampleFormControlSelect1">VIA Pengiriman : </label>
                                        <select name="pengirim" class="form-control" id="exampleFormControlSelect1">
                                            <option value="POD"{{(old('pengirim') == 'POS') ? ' selected' : ''}}>POS</option>
                                            <option value="JNE EXPRESS"{{(old('pengirim') == 'JNE EXPRESS') ? ' selected' : ''}}>JNE Express</option>
                                        </select>
                                    </li>

                                    <li class="form-group col-md-6">
                                        <label for="exampleFormControlSelect1">Kode Pos  : </label>
                                            <input type="text" name="kode_pos" value="{{ old('kode_pos') }}" placeholder="Kode Pos... " class="form-control" id="exampleFormControlInput1">
                                            @error('kode_pos')
                                                <span class="help-block">{{ $message}}</span>
                                            @enderror
                                    </li>
                                </div>

                                <div class="form-group">
                                    <li class="form-group col-md-6">
                                        <label for="exampleFormControlSelect1">VIA Transfer : </label>
                                        <select name="transfer" id="exampleFormControlSelect1">
                                            <option value="BANK BCA"{{(old('transfer') == 'BANK BCA') ? ' selected' : ''}}>BANK BCA</option>
                                            <option value="BANK BNI"{{(old('transfer') == 'BANK BNI') ? ' selected' : ''}}>BANK BNI</option>
                                            <option value="BANK BNI SYARIAH"{{(old('transfer') == 'BANK BNI SYARIAH') ? ' selected' : ''}}>BANK BNI SYARIAH</option>
                                            <option value="BANK BRI"{{(old('transfer') == 'BANK BRI') ? ' selected' : ''}}>BANK BRI SYARIAH</option>
                                        </select>
                                    </li>

                                    <li class="form-group col-md-6">
                                        <label for="exampleFormControlSelect1">Provinsi : </label>
                                        <select name="provinsi_id" id="exampleFormControlSelect1">
                                            @foreach ($provinsi as $pv)
                                            <option value="{{ $pv->provinsi_id}}">{{ $pv->nama_provinsi}}</option>
                                            @endforeach
                                                @error('provinsi')
                                                    <span class="help-block">{{ $message}}</span>
                                                @enderror
                                        </select>
                                    </li>
                                </div>

                                <div class="form-group">
                                    <li class="form-group col-md-6">
                                        <label for="exampleFormControlSelect1">Kabupaten : </label>
                                        <select name="kabupaten_id" id="exampleFormControlSelect1">
                                            @foreach ($kabupaten as $kbp)
                                                    <option value="{{ $kbp->kabupaten_id}}">{{ $kbp->nama_kabupaten}}</option>
                                            @endforeach
                                                @error('kabupaten')
                                                    <span class="help-block">{{ $message}}</span>
                                                @enderror
                                        </select>
                                    </li>

                                    <li class="form-group col-md-6">
                                        <label for="exampleFormControlSelect1">Kota : </label>
                                        <select name="kota_id" id="exampleFormControlSelect1">
                                            @foreach ($kota as $kt)
                                            <option value="{{ $kt->kota_id}}">{{ $kt->nama_kota}}</option>
                                            @endforeach
                                                @error('kota')
                                                    <span class="help-block">{{ $message}}</span>
                                                @enderror
                                        </select>
                                    </li>
                                </div>

                                <div class="form-group">
                                    <li class="form-group col-md-4">
                                        <input a href="" type="submit" value="Order Sekarang" class="btn btn-primary"></input>
                                    </li>

                                    <li class="form-group col-md-4">
                                        <a class="btn btn-primary" href="">RISET DATA</a>
                                    </li>

                                    <li class="form-group col-md-4">
                                        <a class="btn btn-primary" href="">KEMBALI</a>
                                    </li>
                                </div>


                            </ul>
                                {{--  <a class="btn btn-default update" href="">Kirim Data</a>
                                <a class="btn btn-default check_out" href="">Check Out</a>  --}}
                        </div>


                    </div>

             </form>
        </div>

    </div>
</section>

@endsection

