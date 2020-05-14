@extends('layouts.index')
@section('content')
    @if ( Auth::user()->role != 'user')
        @php
            $rs1 = App\Kategori::all();
        @endphp
        @foreach ($data as $rs)
            <h3> Form Input Buku </h3>
            <form class="user" method="POST" action="{{ route('buku.update',$rs->id) }}">
                @csrf
                @method('PUT')  
                <div class="form-group">
                    <label> Kategori </label>
                    <select name="kategori" class="form-control">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($rs1 as $kategori)
                            @php $sel = ( $kategori['id'] == $rs->idkategori) ? 'selected' : ''; @endphp
                            <option value="{{ $kategori['id'] }}" {{ $sel }}>{{ $kategori['nama'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" name="nama" class="form-control form-control-user" placeholder="Judul Buku" value="{{ $rs->nama}}">
                </div>
                <div class="form-group">
                    <input type="text" name="harga" class="form-control form-control-user" placeholder="Harga Buku" value="{{ $rs->harga}}">
                </div>
                <button type="submit" name="proses" value="simpan" class="btn btn-warning">
                    Update
                </button>
            </form>
        @endforeach
    @else
        @include('auth.terlarang')
    @endif
@endsection