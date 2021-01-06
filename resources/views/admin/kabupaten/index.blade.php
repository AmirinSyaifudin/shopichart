@extends('admin.templates.default')
@section('content')

<!-- /.box-header -->
    <div class="box">
        <div class="box-header">
                <h3 class="box-title">DATA KABUPATEN</h3><br><br>
                <a href="{{ route('admin.kabupaten.create') }}" class="btn btn-primary">TAMBAH DATA</a>
            </div>
            <div class="box-body">

            <table id="dataTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width='5'>ID</th>
                            <th width='20'>NAMA KABUPATEN</th>
                            <th width='5'>PROVINSI</th>
                            <th width='20'>KOTA</th>
                            <th width='5'> </th>
                            <th width='5'> </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kabupaten as $kb)
                        <tr>
                            <td width='5'><?php echo $loop -> index +1 ?></td>
                            <td width='10'><?php echo $kb->nama_kabupaten ?></td>
                            <td width='20'><?php echo $kb->nama_provinsi ?></td>
                            <td width='5'><?php echo $kb->nama_kota ?></td>
                            <td width='5'>  <a href="{{ route('admin.kabupaten.edit', $kb->kabupaten_id) }}" class="btn btn-warning">Ubah</a></td>
                            <td width='5'>
                                <form action="{{ route('admin.kabupaten.destroy', $kb->kabupaten_id) }}" method="post" style="display:inline;">
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

