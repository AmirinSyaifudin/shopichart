@extends('admin.templates.default')

@section('content')

    <div class="box">
        <div class="box-header">
            <h2 class="box-title">UPDATE DATA KABUPATEN</h2>
        </div>

            <div class="box-body">
                <form action="{{ route('admin.kabupaten.update', $kabupaten->kabupaten_id) }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                    <div class="form-group @error('nama_kabupaten') has-error @enderror">
                        <label for="">NAMA KABUPATEN</label>
                        <!-- //value="{{ old('nama_kabupaten')}}"  , Validasi untuk tetap menampilkan nilai di form-->
                        <input type="text" name="nama_kabupaten" class="form-control" placeholder="Masukkan kabupaten"
                        value="{{ $kabupaten->nama_kabupaten ?? old('nama_kabupaten') }}">
                        @error('nama_kabupaten')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
                    </div>


                    <div class="form-group @error('kota') has-error @enderror">
                        <label for="">NAMA KOTA</label>
                        <select name="kota_id" id="" class="form-control select2">
                         @foreach ($kota as $kt)
                                <option value="{{ $kt->kota_id}}">{{ $kt->nama_kota}}</option>
                         @endforeach
                            @error('kota')
                                <span class="help-block">{{ $message}}</span>
                            @enderror
                        </select>
                    </div>


                    <div class="form-group @error('provinsi') has-error @enderror">
                        <label for="">NAMA PROVINSI</label>
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
                        <input type="hidden" name="kabupaten_id" value="{{$kabupaten->kabupaten_id}}">
                        <input type="submit" value="Update" class ="btn btn-primary">
                        <button type="reset" class="btn btn-warning">Ulang</button>
                        <a href="{{ route('admin.kabupaten.index') }}" class="btn btn-danger">Kembali</a>
                    </div>

                </form>
            </div>
    </div>
@endsection


