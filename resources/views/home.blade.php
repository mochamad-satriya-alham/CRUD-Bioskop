@extends('layouts.template')

@section('content')
    <div class="container d-flex align-items-center justify-content-center mt-5">
        <div class="img" style="flex: 1; text-align: center;">
            <img src="{{ asset('image/img.jpg') }}" alt="Welcome Image" 
                style="width: 40rem; height: 30rem; border-radius: 20px; box-shadow: 0 8px 16px rgba(0,0,0,0.2); 
                transition: transform 0.3s ease-in-out;"
                onmouseover="this.style.transform='scale(1.05)'" 
                onmouseout="this.style.transform='scale(1)'">
        </div>
        <div class="text" style="flex: 1; padding-left: 20px; margin-left: 10px;">
            <h2 style="font-weight: bold; color: white; margin-bottom: 20px;">Selamat Datang! <br> di Website Bioskop Online</h2>
            <a href="{{ route('tiket.create') }}" class="btn btn-primary">Beli Tiket</a>
        </div>
    </div>
@endsection
