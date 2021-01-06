@extends('admin.templates.default')
@section('content')

<!-- /.box-header -->
    <div class="box">
        <div class="box-header">
                <h3 class="box-title">DATA PRODUK TERMURAH</h3><br><br>

            </div>
            <div class="box-body">

            <table id="dataTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                             <th>NAMA PRODUK</th>
                            <th>QUANTITY</th>
                             <th>HARGA PRODUK</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produk as $pd)
                        <tr>
                            <td>{{ $loop-> index +1 }}</td>
                            <td>{{ $pd->nama_produk }} </td>
                            <td> {{ $pd->qty }} </td>
                            <td> {{ $pd->harga }} </td>
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
