@extends('admin.templates.default')
@section('content')

<div class="box-header">
    <a href="{{ route('admin.customer.index') }}" class="btn btn-danger">KEMBALI KE TRANSAKSI</a>
</div>

<div class="pad margin no-print">
    <div class="callout callout-info" style="margin-bottom: 0!important;">
      {{--  <h4><i class="fa fa-info"></i> INVOICE:</h4>  --}}
      <h4><i class="fa fa-info"></i> Catatan :</h4>
   ..........................
    </div>
  </div>

<section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> INVOICE :
          <small class="pull-right">tanggal : 2/10/2014</small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        From
        <address>
          <strong>Admin | AMIRIN SYAIFUDIN</strong><br>
          provinsi | JAWA TENGAH<br>
          Kabupaten | PATI , 59111<br>
          Kota |KOTA PATI <br>
          Phone:  082333858461 <br>
          Email: amirinsyaifudin6@gmail.com
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        To
        <address>
          <strong>Detail Member :{{ $transaksi->nama }} </strong><br>
          PROVINSI : {{ $transaksi->provinsi_id }} <br>
          KABUPATEN : {{ $transaksi->kabupaten_id }} <br>
          KOTA : {{ $transaksi->kota_id }} <br>
          Phone: {{ $transaksi->no_telpon }} <br>
          Email: {{ $transaksi->email }}
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Invoice : Kode Invoice </b><br>
        <br>
        <b>Kode Transaksi :</b> {{ $transaksi->kode_transaksi }} <br>
        <b>Tanggal Transaksi :</b> {{ $transaksi->tanggal }}  <br>
        <b>Akun Member : </b> {{ $transaksi->nama }}
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>NO </th>
            <th>KODE PRODUK </th>
            <th>NAMA PRODUCT</th>
            <th>KETERANGAN</th>
            <th>QUANTITY </th>
            <th>HARGA</th>
            <th>JUMLAH</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($transaksi as $ts)
                <tr>
                    <td>{{ $loop -> index +1}}</td>
                    <td></td>
                    <td>{{ $transaksi->nama_produk }}</td>
                    <td>{{ $transaksi->nama_produk }}</td>
                    <td>{{ $transaksi->qty }}</td>
                    <td>{{ 'Rp.'. number_format ($transaksi->harga) . "  " }}</td>
                    <td>{{ 'Rp.'. number_format ($transaksi->harga * $transaksi->qty) . "  " }} </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6">
        <p class="lead">Pembayaran | Payment :</p>
        <img src="{{ asset('assets/dist/img/credit/visa.png') }}" alt="Visa" >
        <img src="{{ asset('assets/dist/img/credit/mastercard.png') }}" alt="Mastercard">
        <img src="{{ asset('assets/dist/img/credit/american-express.png') }}" alt="American Express">
        <img src="{{ asset('assets/dist/img/credit/paypal2.png') }}" alt="Paypal">

        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
          dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
        </p>
      </div>
      <!-- /.col -->
      <div class="col-xs-6">
        <p class="lead">JUMLAH TRANSAKSI & TANGGAL :  Due 2/22/2014</p>

        <div class="table-responsive">
          <table class="table">
            <tbody><tr>
              <th style="width:50%">SUB TOTAL:</th>
              <td>$250.30</td>
            </tr>
            <tr>
              <th>Diskon :  (9.3%)</th>
              <td>$10.34</td>
            </tr>
            <tr>
              <th>Pengiriman :</th>
              <td> {{ $transaksi->pengirim }} </td>
            </tr>
            <tr>
              <th>TOTAL:</th>
              <td>$265.24</td>
            </tr>
          </tbody></table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row no-print">
      <div class="col-xs-12">
        <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
        <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
        </button>
        <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
          <i class="fa fa-download"></i> Generate PDF
        </button>
      </div>
    </div>
  </section>

@endsection


