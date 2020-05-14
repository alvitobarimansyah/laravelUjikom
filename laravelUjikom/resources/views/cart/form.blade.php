@extends('layouts.index')
@section('content')
  @php
    $rs1 = App\Kategori::all();
    $rs2 = App\Buku::all();
  @endphp
  <h3> Form Pembelian </h3>
  <form class="user" method="POST" action="{{ route('cart.store') }}">
    @csrf
    <div class="form-group">
      <input type="text" name="nama" class="form-control form-control-user" placeholder="Nama Pembeli">
    </div>
    <div class="form-group">
      <label> Kategori </label>
      <select name="kategori" class="form-control">
        <option value="">-- Pilih Kategori --</option>
        @foreach ($rs1 as $kategori)
          <option value="{{ $kategori['id'] }}">{{ $kategori['nama'] }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label> Buku </label>
      <select name="buku" class="form-control">
        <option value="">-- Pilih Buku --</option>
        @foreach ($rs2 as $buku)
          <option value="{{ $buku['id'] }}">{{ $buku['nama'] }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <input type="text" name="jumlah" class="form-control form-control-user" placeholder="Masukkan Jumlah Yang Ingin di beli">
    </div>
    <button type="submit" name="proses" value="simpan" class="btn btn-primary">
      Add
    </button>
  </form>
@endsection