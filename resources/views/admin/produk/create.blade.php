@extends('admin.templates.default')

@section('content')

    <div class="box">
        <div class="box-header">
            <h2 class="box-title">ADD PRODUK</h2>
        </div>

            <div class="box-body">
                <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group @error('nama_produk') has-error @enderror">
                        <label for="">PRODUK</label>
                        <!-- //value="{{ old('nama_produk')}}"  , Validasi untuk tetap menampilkan nilai di form-->
                        <input type="text" name="nama_produk" class="form-control" placeholder="Masukkan PRODUK" value="{{ old('nama_produk') }}">
                        @error('nama_produk')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="form-group @error('qty') has-error @enderror">
                        <label for="">QTY</label>
                        <!-- //value="{{ old('qty')}}"  , Validasi untuk tetap menampilkan nilai di form-->
                        <input type="number" name="qty" class="form-control" placeholder="Masukkan Jumlah"
                        value="{{ old('qty') }}">
                        @error('qty')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
                    </div>



                    <div class="form-group @error('harga') has-error @enderror">
                        <label for="">HARGA</label>
                        <!-- //value="{{ old('harga')}}"  , Validasi untuk tetap menampilkan nilai di form-->
                        <input type="number" name="harga" class="form-control" placeholder="Masukkan harga"
                        value="{{ old('harga') }}">
                        @error('harga')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
                    </div>



                    {{--  <div class="form-group{{$errors->has('cover') ? 'has-error' : ''}}">
                        <label for="exampleFormControlTextarea1">COVER</label>
                        <input type="file" name="cover" class="form-control">
                        @if($errors->has('cover'))
                            <span class="help-block">{{$errors->first('cover')}}</span>
                        @endif
                    </div>  --}}

                    {{--  <div class="form-group{{$errors->has('cover') ? 'has-error' : ''}}">
                        <label for="exampleFormControlTextarea1">COVER</label>
                        <input type="file" name="cover" class="form-control">
                        @if($errors->has('cover'))
                            <span class="help-block">{{$errors->first('cover')}}</span>
                        @endif
                    </div>  --}}



                    <div class="form-group @error('cover') has-error @enderror">
                        <label for="">COVER</label>
                        <input type="file" name="cover" class="form-control">
                        @error('cover')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
                    </div>


                    <div class="form-group @error('katagori') has-error @enderror">
                        <label for="">NAMA KATAGORI</label>
                        <select name="katagori_id" id="" class="form-control select2">
                         @foreach ($katagori as $ktgr)
                                <option value="{{ $ktgr->katagori_id}}">{{ $ktgr->nama_katagori}}</option>
                         @endforeach
                            @error('katagori')
                                <span class="help-block">{{ $message}}</span>
                            @enderror
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">KETERANGAN</label>
                        <textarea name="keterangan" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ old('keterangan') }}</textarea>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Tambah" class ="btn btn-primary">
                        <button type="reset" class="btn btn-warning">Ulang</button>
                        <a href="{{ route('admin.produk.index') }}" class="btn btn-danger">Kembali</a>
                    </div>

                </form>
            </div>
    </div>
@endsection


