@extends('admin.templates.default')
@section('content')
    <div class="box">
        <div class="box-header">
            <h2 class="box-title">EDIT KATAGORI</h2>
        </div>

            <div class="box-body">
                    <form action="{{ route('admin.katagori.update', $katagori->katagori_id) }}"
                    method="POST"  enctype="multipart/form-data">
                @csrf
                @method("PUT")
                    <div class="form-group @error('kode_katagori') has-error @enderror">
                        <label for="">KODE KATAGORI</label>
                        <!-- //value="{{ old('name')}}"  , Validasi untuk tetap menampilkan nilai di form-->
                        <input type="text" name="kode_katagori" class="form-control" placeholder="kode katagori"
                        required value="{{ $katagori->kode_katagori ?? old('kode_katagori') }}">
                        @error('kode_katagori')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="form-group @error('nama_katagori') has-error @enderror">
                        <label for="">NAMA KATAGORI</label>
                        <!-- //value="{{ old('name')}}"  , Validasi untuk tetap menampilkan nilai di form-->
                        <input type="text" name="nama_katagori" class="form-control" placeholder="Masukkan Nama Katagori"
                        required value="{{ $katagori->nama_katagori ?? old('nama_katagori') }}">
                        @error('nama_katagori')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="form-group @error('keterangan') has-error @enderror">
                        <label for="">KETERANGAN</label>
                        <!-- //value="{{ old('name')}}"  , Validasi untuk tetap menampilkan nilai di form-->
                        <input type="text" name="keterangan" class="form-control" placeholder="Masukkan katagori"
                        required value="{{ $katagori->keterangan ?? old('keterangan') }}">
                        @error('keterangan')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="katagori_id" value="{{$katagori->katagori_id}}">
                        <input type="submit" value="Update" class ="btn btn-primary">
                        <button type="reset" class="btn btn-warning">Ulang</button>
                        <a href="{{ route('admin.katagori.index') }}" class="btn btn-danger">Kembali</a>
                    </div>

                </form>
            </div>
    </div>
@endsection
