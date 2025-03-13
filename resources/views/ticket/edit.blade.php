@extends ('layouts.template')

@section('content')
    <form action="{{ route('tiket.update', $tiket->id) }}" method="POST" class="card p-5">
        @csrf
        @method('PATCH')

        <div class="mb-3 row">
            <label for="film_id" class="col-sm-2 col-form-label">Judul Film:</label>
            <div class="col-sm-10">
                <select name="film_id" class="form-control" required>
                    @foreach ($films as $film)
                        <option value="{{ $film->id }}" 
                            {{ old('film_id', $tiket->film_id) == $film->id ? 'selected' : '' }}>
                            {{ $film->Nama_film }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="showtime" class="col-sm-2 col-form-label">Jadwal Tayang:</label>
            <div class="col-sm-10">
                <select class="form-control" name="showtime" required>
                    <option value="12:00" {{ old('showtime', $tiket->showtime) == '12:00' ? 'selected' : '' }}>12:00</option>
                    <option value="15:00" {{ old('showtime', $tiket->showtime) == '15:00' ? 'selected' : '' }}>15:00</option>
                    <option value="19:00" {{ old('showtime', $tiket->showtime) == '19:00' ? 'selected' : '' }}>19:00</option>
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="studio" class="col-sm-2 col-form-label">Studio:</label>
            <div class="col-sm-10">
                <select class="form-control" name="studio" required>
                    <option value="1" {{ old('studio', $tiket->studio) == 1 ? 'selected' : '' }}>Studio 1</option>
                    <option value="2" {{ old('studio', $tiket->studio) == 2 ? 'selected' : '' }}>Studio 2</option>
                    <option value="3" {{ old('studio', $tiket->studio) == 3 ? 'selected' : '' }}>Studio 3</option>
                    <option value="4" {{ old('studio', $tiket->studio) == 4 ? 'selected' : '' }}>Studio 4</option>
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="type" class="col-sm-2 col-form-label">Jenis Tiket:</label>
            <div class="col-sm-10">
                <select class="form-control" name="type" id="ticket_type" required>
                    <option value="Regular" {{ old('type', $tiket->type) == 'Regular' ? 'selected' : '' }}>Regular</option>
                    <option value="VIP" {{ old('type', $tiket->type) == 'VIP' ? 'selected' : '' }}>VIP</option>
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="price" class="col-sm-2 col-form-label">Harga:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="price" name="price" 
                    value="{{ old('price', $tiket->price) }}" readonly>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="quantity" class="col-sm-2 col-form-label">Jumlah Tiket:</label>
            <div class="col-sm-10">
                <input type="number" class="form-control @error('quantity') is-invalid @enderror" 
                    id="quantity" name="quantity" value="{{ old('quantity', $tiket->quantity) }}" required>
                @error('quantity')
                    <div class="invalid-feedback">Tiket sudah ada!</div>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Ubah Tiket</button>
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
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
