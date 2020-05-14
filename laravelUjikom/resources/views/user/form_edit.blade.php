@extends('layouts.index')
@section('content')
  @if ( Auth::user()->role != 'user')
    @php
      $ar_role = ['admin','user'];
    @endphp
    @foreach ($data as $rs)
      <h3> Form Input User </h3>
      <form class="user" method="POST" action="{{ route('user.update',$rs->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
          <input type="text" name="nama" class="form-control form-control-user" placeholder="Nama User" value="{{ $rs->name}}">
        </div>
        <div class="form-group">
          <input type="email" name="email" class="form-control form-control-user" placeholder="Email" value="{{ $rs->email}}">
        </div>
        <div class="form-group">
          <input type="password" name="password" class="form-control form-control-user" placeholder="Password" value="{{ $rs->password}}">
        </div>
        <div class="form-group row">
          <label> Role </label>
          <select name="role" class="form-control">
            <option value="">-- Pilih Role --</option>
            @foreach ($ar_role as $role)
              @php $sel = ( $role == $rs->role) ? 'selected' : ''; @endphp
              <option value="{{ $role }}" {{ $sel }}>{{ $role }}</option>
            @endforeach
          </select>
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