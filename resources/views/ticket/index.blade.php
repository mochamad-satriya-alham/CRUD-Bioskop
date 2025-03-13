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
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('tiket.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <button type="submit" class="btn btn-danger"
                            onclick="showModalDelete('{{ $item->id }}','{{ $item->film->Nama_film }}')">Hapus</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Notifikasi Delete -->
    <div class="modal fade" id="ModalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" method="POST" action="" style="background-color: #1a1a2e; color: #f5e6ca; border-radius: 10px; border: 1px solid #444;">
                @csrf
                @method('DELETE')
                <div class="modal-header" style="border-bottom: 1px solid #444;">
                    <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: #c89b3c; font-weight: bold;">
                        Konfirmasi Perubahan
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="filter: invert(1);"></button>
                </div>
                <div class="modal-body" style="color: #f5e6ca; font-size: 16px;">
                    Apakah anda yakin ingin menghapus Tiket 
                    <b id="name-tiket" style="color: #ffcc00;"></b>?
                </div>
                <div class="modal-footer" style="border-top: 1px solid #444;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    function showModalDelete(id, nama) {
        $("#name-tiket").text(nama);
        $("#ModalDelete").modal('show');   
        let url="{{route('tiket.delete', ':id')}}";
        url = url.replace(':id', id);
        $("form").attr('action', url);
        }
</script>

