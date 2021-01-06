@extends('admin.templates.default')

@section('content')

    <div class="box">
        <div class="box-header">
            <h2 class="box-title">ADD MAKANAN</h2>
        </div>

            <div class="box-body">
                <form action="/admin/customer/update" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                    <div class="form-group @error('nama_lengkap') has-error @enderror">
                        <label for="">NAMA LENGKAP</label>
                        <!-- //value="{{ old('name')}}"  , Validasi untuk tetap menampilkan nilai di form-->
                        <input type="text" name="nama_lengkap" class="form-control" placeholder="Masukkan nama_lengkap Makanan"
                        value="{{ $drink->nama_lengkap ??old('nama_lengkap') }}">
                        @error('nama_lengkap')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="form-group @error('jenis_kelamin') has-error @enderror">
                        <label for="exampleFormControlSelect1">JENIS KELAMIN</label>
                            <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                                <option value="L"{{(old('jenis_kelamin') == 'L') ? ' selected' : ''}}>Laki-Laki</option>
                                <option value="P"{{(old('jenis_kelamin') == 'P') ? ' selected' : ''}}>Perempuan</option>
                            </select>
                                @error('jenis_kelamin')
                                    <span class="help-block">{{ $message}}</span>
                                @enderror
                    </div>

                    <div class="form-group @error('email') has-error @enderror">
                        <label for="">EMAIL</label>
                        <!-- //value="{{ old('name')}}"  , Validasi untuk tetap menampilkan nilai di form-->
                        <input type="text" name="email" class="form-control" placeholder="Masukkan email Makanan"
                        value="{{ $drink->email ??old('email') }}">
                        @error('email')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="form-group @error('no_telpon') has-error @enderror">
                        <label for="">NO Telpon</label>
                        <input type="text" name="no_telpon" class="form-control" placeholder="Masukkan No Telpon.. ">
                            @error('no_telpon')
                                <span class="help-block">{{ $message}}</span>
                            @enderror
                    </div>

                    <div class="form-group @error('alamat') has-error @enderror">
                        <label for="">Alamat</label>
                        <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat.. ">
                            @error('alamat')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">KETERANGAN</label>
                        <textarea name="keterangan" class="form-control" id="exampleFormControlTextarea1" rows="3">{{old('keterangan')}}</textarea>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Tambah" class ="btn btn-primary">
                        <button type="reset" class="btn btn-warning">Ulang</button>
                        <a href="{{ route('admin.customer.index') }}" class="btn btn-danger">Kembali</a>
                    </div>
                </form>
            </div>
    </div>
@endsection
