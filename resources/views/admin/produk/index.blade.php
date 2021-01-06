@extends('admin.templates.default')
@section('content')

<!-- /.box-header -->
    <div class="box">
        <div class="box-header">
                <h3 class="box-title">DATA PRODUK</h3><br><br>
                <a href="{{ route('admin.produk.create') }}" class="btn btn-primary">TAMBAH DATA PRODUK</a>
            </div>
            <div class="box-body">

            <table id="dataTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width='5'>ID</th>
                            <th width='20'>NAMA PRODUK</th>
                            <th width='20'>KATAGORI</th>
                            <th width='5'>QTY</th>
                            <th width='20'>HARGA</th>
                            <th width='20'>TOTAL JUMLAH</th>
                            <th width='10'>FOTO</th>
                            <th width='5'> </th>
                            <th width='5'> </th>
                            <th width='5'> </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produk as $pd)
                        <tr>
                            <td width='5'>  {{ $loop-> index +1 }} </td>
                            <td width='20'> {{ $pd->nama_produk  }}  </td>
                            <td width='20'> {{  $pd->nama_katagori }}</td>
                            <td width='5'>  {{ $pd->qty }}  </td>
                            <td width='20'> {{ 'Rp.'. number_format ($pd->harga) . "  "  }}</td>
                            <td width='20'> {{ 'Rp.'. number_format ($pd->harga * $pd->qty) . "  "  }} </td>

                            <td width='50'><img class="img-responsive" src="{{url('/assets/covers/'. $pd->cover)}}"> </td>
                            {{--  <td width='50'> <img class="profile-user-img img-responsive img-circle" src="{{url('/assets/covers/'. $produk->cover)}}" alt="User profile picture"> </td>  --}}

                            <td width='5'>  <a href="{{ route('admin.produk.detail', $pd->produk_id) }}" class="btn btn-info">DETAIL</a></td>
                            <td width='5'>  <a href="{{ route('admin.produk.edit', $pd->produk_id) }}" class="btn btn-warning">EDIT</a></td>
                            <td width='5'>
                                <form action="{{ route('admin.produk.destroy', $pd->produk_id) }}" method="post" style="display:inline;">
                                    {{ csrf_field() }}
                                    {{ method_field ('delete')}}
                                    <button type="submit"  class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">DELETE</button>
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



