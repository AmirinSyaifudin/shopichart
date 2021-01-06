@extends('admin.templates.default')
@section('content')

<!-- /.box-header -->
    <div class="box">
        <div class="box-header">
                <h3 class="box-title">DATA MINUMAN</h3><br><br>
                <a href="{{ route('admin.katagori.create') }}" class="btn btn-primary">TAMBAH DATA MEMBER</a>
            </div>
            <div class="box-body">

            <table id="dataTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>KODE KATAGORI</th>
                            <th>NAMA KATAGORI</th>
                            <th>KETERANGAN</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($katagori as $ktgr)
                        <tr>
                            <td width='5'>{{ $loop -> index +1}}</td>
                            <td width='50'>{{ $ktgr->kode_katagori }}</td>
                            <td width='50'>{{ $ktgr->nama_katagori }}</td>
                            <td width='10'>{{ $ktgr->keterangan }}</td>
                            {{-- <td width='5'><a href="{{ route('admin.katagori.edit', $ktgr->id) }}" class="btn btn-warning btn-sm">Edit</a></td>
                            <td width='5'><a href="{{ route('admin.katagori.destroy', $ktgr->id) }}" class="btn btn-danger btn-sm delete" >Delete</a></td>
                              --}}
                            <td width='5'>
                                <a href="{{ route('admin.katagori.edit', $ktgr->katagori_id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('admin.katagori.destroy', $ktgr->katagori_id) }}" method="post" style="display:inline;">
                                    {{csrf_field()}}
                                    {{method_field('delete')}}
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

