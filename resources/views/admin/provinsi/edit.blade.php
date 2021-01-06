@extends('admin.templates.default')
@section('content')
    <div class="box">
        <div class="box-header">
            <h2 class="box-title">EDIT PROVINSI</h2>
        </div>

            <div class="box-body">
                <form action="{{ route('admin.provinsi.update', $provinsi->provinsi_id) }}"
                    method="POST"  enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="form-group @error('nama_provinsi') has-error @enderror">
                            <label for="">NAMA provinsi</label>
                            <!-- //value="{{ old('name')}}"  , Validasi untuk tetap menampilkan nilai di form-->
                            <input type="text" name="nama_provinsi" class="form-control" placeholder="Masukkan Nama provinsi"
                            required value="{{ $provinsi->nama_provinsi ?? old('nama_provinsi') }}">
                            @error('nama_provinsi')
                                <span class="help-block">{{ $message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="provinsi_id" value="{{ $provinsi->provinsi_id }}">
                            <input type="submit" value="Update" class ="btn btn-primary">
                            <button type="reset" class="btn btn-warning">Ulang</button>
                            <a href="{{ route('admin.provinsi.index') }}" class="btn btn-danger">Kembali</a>
                        </div>
                </form>

            </div>
    </div>
@endsection
