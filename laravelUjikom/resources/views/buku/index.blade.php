@extends('layouts.index')
@section('content')
    @if ( Auth::user()->role != 'user')
        @php
            $no = 1;
            $ar_judul = ['No', 'Kategori', 'Judul', 'Action'];
        @endphp
        <a href="{{ route('buku.create') }}" class="btn btn-primary">
            Add Data
        </a>
        <br><br>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"> Daftar Buku </h6>
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
                                    <td>
                                    <form method="POST" action="{{ route('buku.destroy',$buku->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('buku.edit',$buku->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>&nbsp;
                                        <button type="submit" onclick="return confirm('Yakin dihapus')" class="btn btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        @include('auth.terlarang')
    @endif
@endsection