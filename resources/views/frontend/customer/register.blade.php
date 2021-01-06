@extends('frontend.templates.default')

@section('content')


 <section id="contact" class="w-screen mx-auto py-4 gradient-aye">
    <h1 class="w-full my-2 text-5x1 font-bold text-center text-while">MASUKKAN DATA PENGUNJUNG</h1>
    <div class="mb-4">
        <div class="h-1 mx-auto bg-pink-500 w-1/4 opacity-75 my-0 py-0 rounded"></div>
    </div>
    <!-- <div class="container p-4 mb-6 w-full lg:w-1/2 shadow-lg rounded-lg bg-gray-900 mx-auto"> -->
    <div class="container p-4 mb-6 w-full lg:w-1/2 shadow-lg rounded-lg gradient mx-auto">
        <form class="p-5 lg:p-10 text-center">
            <h3 class="text-2xl font-semibold"> INPUT DATA PENGUNJUNG : </h3>
            {{--  <p class="mt-1 mb-4 font-bold text-gray-900">DATA CUSTOMER.</p>  --}}

            <div class="w-full mb-4 mt-8">
                <label class="uppercase text-gray-900 text-xs font-bold">Nama Lengkap  : </label>
                <input type="text" class="mt-2 px-3 py-3 placeholder-gray-500 text-gray-600 bg-while rounded text-sm shadow w-full" placeholder="Nama Lengkap">
            </div>

            {{--  <div class="w-full mb-4 mt-8">
                <label class="uppercase text-gray-900 text-xs font-bold">Jenis Kelamin : </label>
                <input type="text" class="mt-2 px-3 py-3 placeholder-gray-500 text-gray-600 bg-while rounded text-sm shadow w-full" placeholder="Jenis Kelamin">
            </div>  --}}

            <div class="w-full mb-4 mt-8 @error('jenis_kelamin') has-error @enderror">
                <label  class="uppercase text-gray-900 text-xs font-bold" for="exampleFormControlSelect1">JENIS KELAMIN</label>
                    <select class="mt-2 px-3 py-3 placeholder-gray-500 text-gray-600 bg-while rounded text-sm shadow w-full" name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                        <option value="L"{{(old('jenis_kelamin') == 'L') ? ' selected' : ''}}>Laki-Laki</option>
                        <option value="P"{{(old('jenis_kelamin') == 'P') ? ' selected' : ''}}>Perempuan</option>
                    </select>
                        @error('jenis_kelamin')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
            </div>

            <div class="w-full mb-4 mt-4">
                <label class="uppercase text-gray-900 text-xs font-bold">Email : </label>
                <input type="email" class="mt-2 px-3 py-3 placeholder-gray-500 text-gray-600 bg-while rounded text-sm shadow w-full" placeholder="Email">
            </div>

            <div class="w-full mb-4 mt-8">
                <label class="uppercase text-gray-900 text-xs font-bold">No Telpon : </label>
                <input type="number" class="mt-2 px-3 py-3 placeholder-gray-500 text-gray-600 bg-while rounded text-sm shadow w-full" placeholder="No Telpon">
            </div>

            <div class="w-full mb-4 mt-8">
                <label class="uppercase text-gray-900 text-xs font-bold">Alamat : </label>
                <textarea rows="4" cols="80" class="mt-2 px-3 py-3 placeholder-gray-500 text-gray-600 bg-while rounded text-sm shadow w-full" placeholder="Alamat Customer..."></textarea>
            </div>


            {{--  <div class="w-full mb-4 mt-8">
                <label class="uppercase text-gray-900 text-xs font-bold">Pesan : </label>
                <textarea rows="4" cols="80" class="mt-2 px-3 py-3 placeholder-gray-500 text-gray-600 bg-while rounded text-sm shadow w-full" placeholder="Tuliskan Pesan..."></textarea>
            </div>  --}}
            <div class="mt-6">
                <button class="bg-indigo-700 text-while text-sm font-bold uppercase px-6 py-3 rounded shadow hover:bg-indigo-900 hover:shadow-lg">
                    REGISTRASI </button>
            </div>
        </form>
    </div>
</section>


@endsection


