@extends ('layouts.template')

@section('content')
    <form action="{{ route('film.update', $film['id']) }}" method="POST" class="card p-5">
        @csrf
        @method('PATCH')

        <div class="mb-3 row">
            <label for="Nama_film" class="col-sm-2 col-form-label">Judul Film:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="Nama_film"" name="Nama_film"" value="{{ $film['Nama_film'] }}" required>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
    </form>
@endsection
