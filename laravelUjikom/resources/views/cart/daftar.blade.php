@extends('layouts.index')
@section('content')
    @php
        $no = 1;
        $ar_judul = ['No', 'Nama Pembeli', 'Kategori', 'Judul Buku', 'Harga', 'Jumlah', 'Total Harga'];
    @endphp
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Daftar List Pesanan </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        @foreach ($ar_judul as $jdl)
                            <th> {{ $jdl }} </th>
                        @endforeach 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ar_cart as $cart)
                            <tr>
                                <td> {{ $no++ }} </td>
                                <td> {{ $cart->nama }} </td>
                                <td> {{ $cart->kategori }} </td> 
                                <td> {{ $cart->buku }} </td>
                                <td> Rp. {{ number_format($cart->harga, 0, ',', '.') }} </td>
                                <td> {{ $cart->jumlah }} </td>
                                @php
                                    $total = $cart->harga * $cart->jumlah;
                                @endphp
                                <td> Rp. {{ number_format($total, 0, ',', '.') }} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection