@extends ('layouts.template')

@section('content')
<div class="back">
    <a href="{{ route('home') }}" class="btn btn-secondary">Kembali</a>
</div>
<br>
<div class="card p-4">
    <h2 class="mb-4">Beli Tiket </h2>
    <form action="{{ route('tiket.store') }}" method="POST">
        @csrf
        <div class="mb-3 row">
            <label for="film_id" class="col-sm-2 col-form-label">Judul Film:</label>
            <div class="col-sm-10">
                <select name="film_id" class="form-control" required>
                    <option value="" disabled selected>-- Pilih Film --</option>
                    @foreach ($films as $film)
                        <option value="{{ $film->id }}" @selected(old('film_id') == $film->id)>
                            {{ $film->Nama_film }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="showtime" class="col-sm-2 col-form-label">Jam Tayang:</label>
            <div class="col-sm-10">
                <select class="form-control" id="showtime" name="showtime" required>
                    <option value="" disabled selected>-- Pilih Jam --</option>
                    <option value="12:00" @selected(old('showtime') == '12:00')>12:00</option>
                    <option value="15:00" @selected(old('showtime') == '15:00')>15:00</option>
                    <option value="19:00" @selected(old('showtime') == '19:00')>19:00</option>
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="studio" class="col-sm-2 col-form-label">Studio:</label>
            <div class="col-sm-10">
                <select class="form-control" id="studio" name="studio" required>
                    <option value="" disabled selected>-- Pilih studio --</option>
                    <option value="1" @selected(old('studio') == '1')>Studio 1</option>
                    <option value="2" @selected(old('studio') == '2')>Studio 2</option>
                    <option value="3" @selected(old('studio') == '3')>Studio 3</option>
                    <option value="4" @selected(old('studio') == '4')>Studio 4</option>
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="type" class="col-sm-2 col-form-label">Jenis Tiket:</label>
            <div class="col-sm-10">
                <select class="form-control" name="type" id="ticket_type" required>
                    <option value="" disabled selected>-- Pilih Tipe --</option>
                    <option value="Regular" @selected(old('type') == 'Regular')>Regular</option>
                    <option value="VIP" @selected(old('type') == 'VIP')>VIP</option>
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="price" class="col-sm-2 col-form-label">Harga:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="price" name="price" readonly value="{{ old('price') }}">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="quantity" class="col-sm-2 col-form-label">Jumlah Tiket:</label>
            <div class="col-sm-10">
                <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity"
                    name="quantity" min="1" required value="{{ old('quantity') }}">
                @error('quantity')
                    <div class="invalid-feedback">Jumlah Tiket sudah di isi!.</div>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Simpan Tiket</button>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const ticketType = document.getElementById("ticket_type");
        const priceInput = document.getElementById("price");
        function updatePrice() {
            priceInput.value = (ticketType.value === "VIP") ? 45000 : 25000;
        }
        ticketType.addEventListener("change", updatePrice);
        updatePrice();
    });
</script>
@endsection
