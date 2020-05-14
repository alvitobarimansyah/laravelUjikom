@extends('layouts.index')
@section('content')
  @if ( Auth::user()->role != 'user')
    @php
      $ar_role = ['admin','user'];
    @endphp
    <h3> Form Input User </h3>
    <form class="user" method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <input type="text" name="nama" class="form-control form-control-user" placeholder="Nama User">
      </div>
      <div class="form-group">
        <input type="email" name="email" class="form-control form-control-user" placeholder="Email">
      </div>
      <div class="form-group">
        <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
      </div>
      <div class="form-group row">
        <label> Role </label>
        <select name="role" class="form-control">
          <option value="">-- Pilih Role --</option>
          @foreach ($ar_role as $role)
            <option value="{{ $role }}">{{ $role }}</option>
          @endforeach
        </select>
      </div>
      <button type="submit" name="proses" value="simpan" class="btn btn-primary">
        Add
      </button>
    </form>
  @else
    @include('auth.terlarang')
  @endif
@endsection