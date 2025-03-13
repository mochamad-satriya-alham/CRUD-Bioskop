@extends('layouts.template')

@section('content')
    @if (Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif

    @if (Session::get('deleted'))
        <div class="alert alert-warning">{{ Session::get('deleted') }}</div>
    @endif
    <div class="d-flex mb-3">
        <a href="{{ route('home') }}" class="btn btn-secondary me-2">Kembali</a>
        <a href="{{ route('tiket.create') }}" class="btn btn-primary">Beli Tiket</a>
    </div>

    <div class="row">
        @foreach ($tikets as $item)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-lg border-0">
                    <div class="card-body">
                        <h5 class="card-title text-center fw-bold">{{ $item->film->Nama_film }}</h5>
                        <div class="d-flex justify-content-between">
                            <span class="badge bg-secondary">Studio {{ $item['studio'] }}</span>
                            <span class="badge bg-info">{{ $item['showtime'] }}</span>
                        </div>
                        <hr>
                        <p><strong>Jenis Tiket:</strong> {{ $item['type'] }}</p>
                        <p><strong>Harga:</strong> Rp{{ number_format($item['price'], 0, ',', '.') }}</p>
                        <p><strong>Jumlah:</strong> {{ $item['quantity'] }} Tiket</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection


