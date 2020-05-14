@extends('layouts.index')
@section('content')
  @if ( Auth::user()->role != 'user')
    @php
      $rs = App\Kategori::all();
    @endphp
    <h3> Form Input Buku </h3>
    <form class="user" method="POST" action="{{ route('buku.store') }}">
      @csrf
      <div class="form-group">
        <label> Kategori </label>
        <select name="kategori" class="form-control">
          <option value="">-- Pilih Kategori --</option>
          @foreach ($rs as $kategori)
            <option value="{{ $kategori['id'] }}">{{ $kategori['nama'] }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <input type="text" name="nama" class="form-control form-control-user" placeholder="Judul Buku">
      </div>
      <div class="form-group">
        <input type="text" name="harga" class="form-control form-control-user" placeholder="Harga Buku">
      </div>
      <button type="submit" name="proses" value="simpan" class="btn btn-primary">
        Add
      </button>
    </form>
  @else
    @include('auth.terlarang')
  @endif
@endsection