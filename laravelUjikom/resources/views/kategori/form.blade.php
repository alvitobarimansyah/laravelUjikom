@extends('layouts.index')
@section('content')
  @if ( Auth::user()->role != 'user')
    <h3> Form Input Kategori </h3>
    <form class="user" method="POST" action="{{ route('kategori.store') }}">
      @csrf
      <div class="form-group">
        <input type="text" name="nama" class="form-control form-control-user" placeholder="Nama Kategori">
      </div>
      <button type="submit" name="proses" value="simpan" class="btn btn-primary">
        Add
      </button>
    </form>
  @else
    @include('auth.terlarang')
  @endif
@endsection