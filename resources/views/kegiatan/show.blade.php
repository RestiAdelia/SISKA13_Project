@extends('layouts.public')

@section('header')
    <h2 class="font-bold text-3xl text-gray-800 leading-tight">
        {{ __('Detail Kegiatan') }}
    </h2>
@endsection

@section('content')
    <div class="py-10 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
        <div class="max-w-4xl mx-auto bg-white p-8 rounded-2xl shadow-lg">
            <!-- Gambar -->
            @if ($kegiatan->gambar_kegiatan)
                <img src="{{ asset('storage/' . $kegiatan->gambar_kegiatan) }}" alt="{{ $kegiatan->nama_kegiatan }}"
                    class="w-full h-80 object-cover rounded-lg mb-6 shadow-md">
            @endif

            <!-- Info Kegiatan -->
            <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $kegiatan->nama_kegiatan }}</h1>
            <p class="text-gray-600 mb-2">
                <strong>Tanggal:</strong>
                {{ \Carbon\Carbon::parse($kegiatan->tanggal_kegiatan)->translatedFormat('d F Y') }}
            </p>

            @if ($kegiatan->deskripsi)
                <div class="mt-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Deskripsi Kegiatan:</h3>
                    <p class="text-gray-700 leading-relaxed">{{ $kegiatan->deskripsi }}</p>
                </div>
            @endif

            <!-- Tombol Kembali -->
            <div class="mt-8">
                <a href="{{ url('/#kegiatan') }}"
                    class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg font-semibold shadow-md transition-all duration-300">
                    ← Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
@endsection
