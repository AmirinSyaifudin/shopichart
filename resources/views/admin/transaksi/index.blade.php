@extends('admin.templates.default')
@section('content')

<!-- /.box-header -->
    <div class="box">
        <div class="box-header">
                <h3 class="box-title">DATA TRANSAKSI</h3><br><br>
                {{--  <a href="{{ route('admin.transaksi.create') }}" class="btn btn-primary">TAMBAH DATA MEMBER</a>  --}}
            </div>
            <div class="box-body">

            <table id="dataTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>MEMBER</th>
                            <th>TANGGAL </th>
                            {{--  <th>NAMA PRODUK</th>  --}}
                            <th>STATUS </th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi as $ts)
                        <tr>
                            <td width='10'>{{ $loop -> index +1}}</td>
                            <td width='10'>{{ $ts->name }} </td>
                            <td width='10'>{{ $ts->tanggal }} </td>
                            {{--  <td width='10'>{{ $ts->nama_produk }} </td>   --}}
                            {{-- <td width='5'> <a href="{{ route('admin.transaksi.detail', $ts->transaksi_id) }}" class="btn btn-info">Detail</a> </td> --}}
                            <td width='5'> <a href="{{ route('admin.transaksi.transaksi_detail', $ts->transaksi_id) }}" class="btn btn-info">Detail</a> </td>
                            <td width='5'>
                                <form action="{{ route('admin.transaksi.destroy', $ts->transaksi_id) }}" method="post" style="display:inline;">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button type="submit"  class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                                </form>
                            </td>
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


                {{--  <th>INVOICE</th>  --}}
                            {{--  <th>NAMA CUSTOMER</th>  --}}
                            {{--  <th>NO TELPON</th>  --}}
                            {{--  <th>TOTAL TRANSAKSI</th>  --}}
                            {{--  <th>ALAMAT</th>  --}}
                            {{--  <th>KETERANGAN</th>  --}}
                            {{--  <th>ID CUS</th>  --}}


                                                        {{--  <td width='20'>{{ $ts->invoice }}</td>  --}}
                            {{--  <td width='20'>{{ $ts->nama_customer }}</td>  --}}
                            {{--  <td width='20'>{{ $ts->no_telpon }}</td>  --}}
                            {{--  <td width='10'>{{ $ts->total_transaksi }}</td>  --}}
                            {{--  <td width='20'>{{ $ts->alamat }}</td>  --}}
                            {{--  <td width='50'>{{ $ts->keterangan }}</td>  --}}
                            {{--  <td width='5'>{{ $ts->customer_id }}</td>  --}}

