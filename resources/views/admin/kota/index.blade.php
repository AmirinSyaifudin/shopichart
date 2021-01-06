
@extends('admin.templates.default')
@section('content')

<!-- /.box-header -->
    <div class="box">
        <div class="box-header">
                <h3 class="box-title">DATA KOTA</h3><br><br>
                <a href="{{ route('admin.kota.create') }}" class="btn btn-primary">TAMBAH DATA</a>
            </div>
            <div class="box-body">

            <table id="dataTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width='5'>ID</th>
                            <th width='10'>NAMA KOTA</th>
                            <th width='20'>TYPE</th>
                            <th width='5'>KODE POS</th>
                            <th width='5'>NAMA PROVINSI</th>
                            <th width='5'> </th>
                            <th width='5'> </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kota as $kt)
                        <tr>
                            <td width='5'>{{ $loop -> index +1 }} </td>
                            <td width='20'>{{ $kt->nama_kota }} </td>
                            <td width='5'>{{  $kt->type }}</td>
                            <td width='20'>{{ $kt->kode_pos }}</td>
                            <td width='20'>{{ $kt->nama_provinsi }}</td>
                            <td width='5'>  <a href="{{ route('admin.kota.edit', $kt->kota_id) }}" class="btn btn-warning">Ubah</a></td>
                            <td width='5'>
                                <form action="{{ route('admin.kota.destroy', $kt->kota_id) }}" method="post" style="display:inline;">
                                    {{ csrf_field() }}
                                    {{ method_field ('delete')}}
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

