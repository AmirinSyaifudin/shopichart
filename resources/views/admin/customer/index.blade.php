@extends('admin.templates.default')
@section('content')

<!-- /.box-header -->
    <div class="box">
        <div class="box-header">
                <h3 class="box-title">DATA CUSTOMER</h3><br><br>
                <a href="{{ route('admin.customer.create') }}" class="btn btn-primary">TAMBAH DATA MEMBER</a>
            </div>
            <div class="box-body">

            <table id="dataTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width='5'>ID</th>
                            <th width='20'>NAMA CUSTOMER</th>
                            <th width='20'>JENIS KALAMIN</th>
                            <th width='20'>NAMA USER</th>
                            <th width='20'>NAMA PRODUK</th>
                            <th width='5'>NAMA KABUPATEN</th>
                            <th width='10'>EMAIL</th>
                            <th width='5'>NO TELPON</th>
                            <th width='5'>ALAMAT</th>
                            <th width='5'> </th>
                            <th width='5'> </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customer as $cs)
                        <tr>
                            <td width='5'>  {{ $loop-> index +1 }} </td>
                            <td width='5'>  {{ $cs->nama_customer }}  </td>
                            <td width='5'>  {{ $cs->jenis_kelamin }} </td>
                            <td width='20'> {{ $cs->name }} </td>
                            <td width='20'> {{ $cs->nama_produk }} </td>
                            <td width='20'> {{ $cs->nama_kabupaten }} </td>
                            <td width='5'>  {{ $cs->email }}  </td>
                            <td width='5'>  {{ $cs->no_telpon }}  </td>
                            <td width='5'>  {{ $cs->alamat }} </td>
                            <td width='5'>  <a href="{{ route('admin.customer.detail', $cs->customer_id) }}" class="btn btn-info">Detail</a></td>
                            <td width='5'>
                                <form action="{{ route('admin.customer.destroy', $cs->customer_id) }}" method="post" style="display:inline;">
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



