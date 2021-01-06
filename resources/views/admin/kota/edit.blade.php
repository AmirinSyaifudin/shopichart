@extends('admin.templates.default')

@section('content')

    <div class="box">
        <div class="box-header">
            <h2 class="box-title">ADD KOTA</h2>
        </div>

            <div class="box-body">
                <form action="{{ route('admin.kota.update', $kota->kota_id) }}"
                     method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")

                    <div class="form-group @error('nama_kota') has-error @enderror">
                        <label for="">NAMA KOTA</label>
                        <!-- //value="{{ old('nama_kota')}}"  , Validasi untuk tetap menampilkan nilai di form-->
                        <input type="text" name="nama_kota" class="form-control" placeholder="Masukkan kota"
                        value="{{ $kota->nama_kota ?? old('nama_kota') }}">
                        @error('nama_kota')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="form-group @error('type') has-error @enderror">
                        <label for=""> TYPE</label>
                        <!-- //value="{{ old('type')}}"  , Validasi untuk tetap menampilkan nilai di form-->
                        <input type="number" name="type" class="form-control" placeholder="Masukkan Jumlah"
                        value="{{ $kota->type ?? old('type') }}">
                        @error('type')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="form-group @error('kode_pos') has-error @enderror">
                        <label for=""> KODE POS</label>
                        <!-- //value="{{ old('kode_pos')}}"  , Validasi untuk tetap menampilkan nilai di form-->
                        <input type="number" name="kode_pos" class="form-control" placeholder="Masukkan Jumlah"
                        value="{{ $kota->kode_pos ?? old('kode_pos') }}">
                        @error('kode_pos')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
                    </div>


                    <div class="form-group @error('provinsi') has-error @enderror">
                        <label for="">PROVINSI</label>
                        <select name="provinsi_id" id="" class="form-control select2">
                         @foreach ($provinsi as $prv)
                                <option value="{{ $prv->provinsi_id}}">{{ $prv->nama_provinsi}}</option>
                         @endforeach
                            @error('provinsi')
                                <span class="help-block">{{ $message}}</span>
                            @enderror
                        </select>
                    </div>


                    <div class="form-group">
                        <input type="hidden" name="kota_id" value="{{$kota->kota_id}}">
                        <input type="submit" value="Update" class ="btn btn-primary">
                        <button type="reset" class="btn btn-warning">Ulang</button>
                        <a href="{{ route('admin.kota.index') }}" class="btn btn-danger">Kembali</a>
                    </div>

                </form>
            </div>
    </div>
@endsection


