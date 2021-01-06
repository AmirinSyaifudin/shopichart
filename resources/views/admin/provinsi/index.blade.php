@extends('admin.templates.default')
@section('content')

<!-- /.box-header -->
    <div class="box">
        <div class="box-header">
                <h3 class="box-title">DATA PROVINSI</h3><br><br>
                <a href="{{ route('admin.provinsi.create') }}" class="btn btn-primary">TAMBAH DATA</a>
            </div>
            <div class="box-body">

            <table id="dataTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width='5'>ID</th>
                            <th width='20'>NAMA PROVINSI</th>
                            <th width='5'> </th>
                            <th width='5'> </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($provinsi as $prv)
                            <tr>
                                <td>{{ $loop -> index +1 }}</td>
                                <td>{{ $prv->nama_provinsi }}</td>
                                <td width='5'><a href="{{ route('admin.provinsi.edit', $prv->provinsi_id) }}" class="btn btn-warning">Edit</a></td>
                                <td width='5'>
                                    <form action="{{ route('admin.provinsi.destroy', $prv->provinsi_id) }}" method="post" style="display:inline;">
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

