<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Food;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.food.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.food.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'nama'      => 'required|min:3',
            'harga'     => 'required|min:3',
            'qty'       => 'required|numeric',
            'cover'     => 'file|image',
        ]);

        $cover = null;

        if ($request->hasFile('cover')) {
            $cover = $request->file('cover')->store('assets/covers');
        }

        Food::create([
            'nama'  => $request->nama,
            'harga' => $request->harga,
            'qty'   => $request->qty,
            'cover' => $cover
        ]);

        // Food::create()->($request->only('nama','harga','qty','cover'));

        return redirect()->route('admin.food.index')
            ->with('sukses', 'Data berhasil ditambahkan');
        // ->with('success', 'Data Kelurahan Berhasil di Tambahkan Creettt');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        //
        // dd($food);
        return view('admin.food.edit', [
            'food'    => $food,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        //
        $this->validate($request, [
            'nama'      => 'required',
            'harga'     => 'required',
            'qty'       => 'required|numeric',
            'cover'     => 'file|image',

        ]);

        $cover = $food->cover;

        // if ($request->hasFile('cover')) {
        //     Storage::delete($food->cover);  // menghapus cover yang lama dan di ganti dengan cove yang baru
        //     $cover = $request->file('cover')->store('assets/covers');
        // }


        $food->update([
            'nama'      => $request->nama,
            'harga'     => $request->harga,
            'qty'       => $request->qty,
            'cover'     => $cover,
        ]);

        return redirect()->route('admin.food.index')
            ->with('info', 'Data Kelurahan Berhasil di Update Oyeachh');
        //->with('info', 'Data Kelurahan Berhasil di Update Oyeachh');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        //
        $food->delete();

        return redirect()->route('admin.food.index')
            ->with('sukses', 'Data berhasil didelete');
        //->with('danger','Data Penulis berhasil di Delete');
    }
}