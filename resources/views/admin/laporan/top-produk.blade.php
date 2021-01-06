@extends('admin.templates.default')
@section('content')
<h1> Data Produk </h1>

<!-- /.box-header -->
    <div class="box">
        <div class="box-header">
                <h3 class="box-title">LAPORAN DATA PRODUK TERLARIS</h3><br><br>

            </div>
            <div class="box-body">

            <table id="dataTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width='5'>ID</th>
                            <th width='20'>NAMA PRODUK</th>
                            <th width='5'>KETERANGAN PRODUK</th>
                            <th width='5'>JUMLAH PRODUK</th>
                            <th width='5'>TOTAL PEMBELI</th>
                            <th width='5'>KATAGORI PRODUK</th>
                            <th width='5'>COVER</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produk as $pd)
                            <tr>
                                <td>{{ $loop-> index +1 }}</td>
                                <td>{{ $pd->nama_produk }} </td>
                                <td>{{ $pd->keterangan }} </td>
                                <td> {{ $pd->qty }} </td>
                                <td> {{ $pd->harga }} </td>
                                <td> {{ $pd->nama_katagori }}</td>
                                <td width='50'><img class="img-responsive" src="{{url('/assets/covers/'. $pd->cover)}}"> </td>
                            </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>


@endsection

@push('scripts')
    <script>
        $(function () {
            $('#dataTable').DataTable({






            });
        });
    </script>
@endpush

