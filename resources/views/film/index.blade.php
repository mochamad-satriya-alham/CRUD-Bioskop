@extends('layouts.template')

@section('content')
    @if (Session::get('success'))
        <div class="alert alert-success text-center">{{ Session::get('success') }}</div>
    @endif
    @if (Session::get('deleted'))
        <div class="alert alert-warning text-center">{{ Session::get('deleted') }}</div>
    @endif
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('home') }}" class="btn btn-secondary">⬅ Kembali</a>
        <a href="{{ route('film.create') }}" class="btn btn-warning text-white fw-bold">+ Tambah Film 🎥</a>
    </div>
    <div class="card shadow-lg p-4" style="background: #1E2A38; color: white; border-radius: 12px;">
        <div class="table-responsive">
            <table class="table table-hover table-dark text-center rounded">
                <thead>
                    <tr class="bg-gold text-dark">
                        <th>#</th>
                        <th>Judul Film</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($films as $film)
                        <tr>
                            <td class="align-middle">{{ $no++ }}</td>
                            <td class="align-middle">{{ $film['Nama_film'] }}</td>
                            <td class="align-middle">
                                <div class="d-flex gap-2 ">
                                    <a href="{{ route('film.edit', $film['id']) }}" class="btn btn-warning">✏ Edit</a>
                                    <form action="{{ route('film.delete', $film['id']) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
@endsection
