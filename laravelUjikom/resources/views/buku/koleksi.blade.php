@extends('layouts.index')
@section('content')
  @php
      $no = 1;
      $ar_judul = ['No', 'Kategori', 'Judul', 'Action'];
  @endphp
  <a href="{{ route('cart.create') }}" class="btn btn-primary">
    <i class="fas fa-cart-plus"></i>
    Add To Cart
  </a>
  <br><br>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary"> Daftar Koleksi Buku </h6>
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
            @foreach ($ar_buku as $buku)
              <tr>
                <td> {{ $no++ }} </td>
                <td> {{ $buku->kategori }} </td>
                <td> {{ $buku->nama }} </td>
                <td> Rp. {{ number_format($buku->harga, 0, ',', '.') }} </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection