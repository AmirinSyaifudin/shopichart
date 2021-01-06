@extends('admin.templates.default')
@section('content')

<div class="box">
    <div class="box-header">
        <h2 class="box-title">TAMBAH PRODUK</h2>
    </div>

        <div class="box-body">
            <form action="{{ route('admin.produk.update', $produk->produk_id) }}"
             method="POST" enctype="multipart/form-data">
             @csrf
             @method("PUT")
             {{-- <input type="hidden" name="id_produk" value="{{ $produk->produk_id }}"> --}}
            <div class="form-group @error('nama_produk') has-error @enderror">
                <label for="">NAMA PRODUK</label>
                <!-- //value="{{ old('nama_produk')}}"  , Validasi untuk tetap menampilkan nilai di form-->
                <input type="text" name="nama_produk" class="form-control"
                value="{{ $produk->nama_produk ?? old('nama_produk') }}">
                @error('nama_produk')
                    <span class="help-block">{{ $message}}</span>
                @enderror
            </div>

            <div class="form-group @error('qty') has-error @enderror">
                <label for="">QUANTITY</label>
                <input type="number" name="qty" class="form-control"
                placeholder="Masukkan Jumlah Buku" value="{{ $produk->qty ?? old('qty') }}">
                @error('qty')
                    <span class="help-block">{{ $message}}</span>
                @enderror
            </div>

            <div class="form-group @error('harga') has-error @enderror">
                <label for="">HARGA</label>
                <input type="number" name="harga" class="form-control"
                placeholder="Masukkan Jumlah Buku" value="{{ $produk->harga ?? old('harga') }}">
                @error('harga')
                    <span class="help-block">{{ $message}}</span>
                @enderror
            </div>

            <div class="form-group @error('cover') has-error @enderror">
                <label for="">FOTO</label>
                <input type="file" name="cover" class="form-control">
                @error('cover')
                    <span class="help-block">{{ $message}}</span>
                @enderror
            </div>

            <div class="form-group @error('katagori') has-error @enderror">
                <label for="">NAMA KATAGORI</label>
                <select name="katagori_id" id="" class="form-control select2">
                 @foreach ($katagori as $ktgr)
                        <option value="{{ $ktgr->katagori_id}}" @if($produk->katagori_id ==  $ktgr->katagori_id) selected  @endif >{{ $ktgr->nama_katagori}}</option>
                 @endforeach
                    @error('katagori')
                        <span class="help-block">{{ $message}}</span>
                    @enderror
                </select>
            </div>

            <div class="form-group @error('keterangan') has-error @enderror">
                <label for="">KETERANGAN</label>

                <textarea name="keterangan" id="" row="3" class="form-control"
                placeholder="Masukkan Deskripsi Buku">{{ $produk->keterangan ?? old('keterangan') }}</textarea>
                @error('keterangan')
                    <span class="help-block">{{ $message}}</span>
                @enderror
            </div>


            <div class="form-group">
                <input type="hidden" name="produk_id" value="{{$produk->produk_id}}">
                <input type="submit" value="Update" class ="btn btn-primary">
                <button type="reset" class="btn btn-warning">Ulang</button>
                <a href="{{ route('admin.produk.index') }}" class="btn btn-danger">Kembali</a>
            </div>

            </form>
        </div>
</div>

@endsection








{{--  <div class="form-group @error('title') has-error @enderror">
    <label for="">JUDUL</label>
    <!-- //value="{{ old('title')}}"  , Validasi untuk tetap menampilkan nilai di form-->
    <input type="text" name="title" class="form-control" placeholder="Masukkan Nama Penulis" value="{{ $produk->title ?? old('title') }}">
    @error('title')
        <span class="help-block">{{ $message}}</span>
    @enderror
</div>

<div class="form-group @error('description') has-error @enderror">
    <label for="">DESKRIPSI</label>

    <textarea name="description" id="" row="3" class="form-control" placeholder="Masukkan Deskripsi Buku">{{ $produk->description ?? old('description') }}</textarea>
    @error('description')
        <span class="help-block">{{ $message}}</span>
    @enderror
</div>

<div class="form-group @error('author') has-error @enderror">
    <label for="">PENULIS</label>

    <select name="author_id" id="" class="form-control select2">
        @foreach ($authors as $author)
                <option value="{{ $author->id}}"
                    @if ($author->id === $produk->author_id)
                            selected
                        @endif
                    >
                    {{ $author->name}}
                </option>
        @endforeach
    </select>
    @error('author')
        <span class="help-block">{{ $message}}</span>
    @enderror
</div>

<div class="form-group @error('cover') has-error @enderror">
    <label for="">COVER</label>
    <input type="file" name="cover" class="form-control">
    @error('cover')
        <span class="help-block">{{ $message}}</span>
    @enderror
</div>

<div class="form-group @error('qty') has-error @enderror">
    <label for="">QUANTITY</label>
    <input type="text" name="qty" class="form-control" placeholder="Masukkan Jumlah Buku" value="{{ $produk->qty ?? old('qty') }}">
    @error('qty')
        <span class="help-block">{{ $message}}</span>
    @enderror
</div>

<div class="form-group">
    <input type="submit" value="Simpan" class ="btn btn-primary">
</div>  --}}




