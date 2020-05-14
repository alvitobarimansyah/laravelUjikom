<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ar_cart = DB::table('cart')
        ->join('kategori', 'kategori.id', '=', 'cart.idkategori')
        ->join('buku', 'buku.id', '=', 'cart.idbuku')
        ->select('cart.*', 'kategori.nama AS kategori', 'buku.nama AS buku', 'buku.harga')
        ->get();
        return view('cart.index', compact('ar_cart'));
    }

    public function historiCart()
    {
        $ar_cart = DB::table('cart')
        ->join('kategori', 'kategori.id', '=', 'cart.idkategori')
        ->join('buku', 'buku.id', '=', 'cart.idbuku')
        ->select('cart.*', 'kategori.nama AS kategori', 'buku.nama AS buku', 'buku.harga')
        ->get();
        return view('cart.daftar', compact('ar_cart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cart.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('cart')->insert([
            'nama'=>$request->nama,
            'idkategori'=>$request->kategori,
            'idbuku'=>$request->buku,
            'jumlah'=>$request->jumlah
        ]);
        return redirect('/cart');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
