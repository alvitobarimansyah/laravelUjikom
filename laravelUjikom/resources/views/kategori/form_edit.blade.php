@extends('layouts.index')
@section('content')
    @if ( Auth::user()->role != 'user')
        @foreach ($data as $rs)
            <h3> Form Input Kategori </h3>
            <form class="user" method="POST" action="{{ route('kategori.update',$rs->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <input type="text" name="nama" class="form-control form-control-user" placeholder="Nama Kategori" value="{{ $rs->nama }}"> 
                </div>
                <button type="submit" name="proses" value="ubah" class="btn btn-warning">
                    Update
                </button>
            </form>
        @endforeach
    @else
        @include('auth.terlarang')
    @endif
@endsection