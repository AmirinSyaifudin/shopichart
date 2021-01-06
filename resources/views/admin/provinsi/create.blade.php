@extends('admin.templates.default')

@section('content')

    <div class="box">
        <div class="box-header">
            <h2 class="box-title">ADD PROVINSI</h2>
        </div>

            <div class="box-body">
                <form action="{{ route('admin.provinsi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group @error('nama_provinsi') has-error @enderror">
                        <label for="">NAMA PROVINSI</label>
                        <!-- //value="{{ old('nama_provinsi')}}"  , Validasi untuk tetap menampilkan nilai di form-->
                        <input type="text" name="nama_provinsi" class="form-control" placeholder="Masukkan provinsi" value="{{ old('nama_provinsi') }}">
                        @error('nama_provinsi')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Tambah" class ="btn btn-primary">
                        <button type="reset" class="btn btn-warning">Ulang</button>
                        <a href="{{ route('admin.provinsi.index') }}" class="btn btn-danger">Kembali</a>
                    </div>

                </form>
            </div>
    </div>
@endsection


