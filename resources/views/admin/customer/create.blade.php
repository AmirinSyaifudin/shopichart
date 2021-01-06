@extends('admin.templates.default')

@section('content')

    <div class="box">
        <div class="box-header">
            <h2 class="box-title">ADD CUSTOMER</h2>
        </div>

            <div class="box-body">
                <form action="{{ route('admin.customer.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group @error('nama_customer') has-error @enderror">
                    <label for=""> NAMA LENGKAP</label>
                    <input type="text" name="nama_customer" class="form-control" placeholder="Masukkan Nama Pasien.. ">
                        @error('nama_customer')
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

                {{--  <div class="form-group @error('users') has-error @enderror">
                    <label for="">NAMA USER</label>
                    <select name="user_id" id="" class="form-control select2">
                     @foreach ($users as $user)
                            <option value="{{ $users->user_id}}">{{ $users->nama_users}}</option>
                     @endforeach
                        @error('users')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
                    </select>
                </div>  --}}

                <div class="form-group @error('kabupaten') has-error @enderror">
                    <label for="">NAMA KABUPATEN</label>
                    <select name="kabupaten_id" id="" class="form-control select2">
                     @foreach ($kabupaten as $kb)
                            <option value="{{ $kb->kabupaten_id}}">{{ $kb->nama_kabupaten}}</option>
                     @endforeach
                        @error('kabupaten')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
                    </select>
                </div>

                <div class="form-group @error('produk') has-error @enderror">
                    <label for="">NAMA PRODUK</label>
                    <select name="produk_id" id="" class="form-control select2">
                     @foreach ($produk as $pd)
                            <option value="{{ $pd->produk_id}}">{{ $pd->nama_produk}}</option>
                     @endforeach
                        @error('produk')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
                    </select>
                </div>



                <div class="form-group @error('email') has-error @enderror">
                    <label for=""> EMAIL</label>
                    <input type="text" name="email" class="form-control" placeholder="Masukkan Nama Pasien.. ">
                        @error('email')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
                </div>

                <div class="form-group @error('no_telpon') has-error @enderror">
                    <label for="">NO Telpon</label>
                    <input type="text" name="number" class="form-control" placeholder="Masukkan No Telpon.. ">
                        @error('no_telpon')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
                </div>

                <div class="form-group @error('alamat') has-error @enderror">
                    <label for="exampleFormControlTextarea1">ALAMAT</label>
                    <textarea type="text" name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    @error('alamat')
                    <span class="help-block">{{ $message }}</span>
                @enderror
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
