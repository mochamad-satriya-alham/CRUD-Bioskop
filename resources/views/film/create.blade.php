@extends ('layouts.template')

@section('content')
    <div class="card p-5">
        <h2 class="mb-4">Tambah Film</h2>

        <form action="{{ route('film.store') }}" method="POST">
            @csrf

            <div class="mb-3 row">
                <label for="Nama_film" class="col-sm-2 col-form-label">Nama Film:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('film') is-invalid @enderror" id="Nama_film" name="Nama_film" required>
                    @error('film')
                        <div class="invalid-feedback">Film Sudah Ada.</div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Simpan Tiket</button>
        </form>
    </div>
@endsection
