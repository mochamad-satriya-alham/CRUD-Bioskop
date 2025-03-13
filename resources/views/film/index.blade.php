@extends('layouts.template')

@section('content')
    @if (Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif

    @if (Session::get('deleted'))
        <div class="alert alert alert-warning">{{ Session::get('deleted') }}</div>
    @endif

    <div class="d-flex mb-3">
        <a href="{{ route('home') }}" class="btn btn-secondary me-2">Kembali</a>
        <a href="{{ route('film.create') }}" class="btn btn-primary">Tambah film</a>
    </div>
    <table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>NO</th>
            <th>Film</th>
        </tr>
    </thead>
    <tbody>
        @php $no =1; @endphp
        @foreach ($films as $item)
            <tr>
                <td class="align-middle text-center">{{ $no++ }}</td>
                <td class="align-middle">{{ $item['Nama_film'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

