@extends('layouts.app')

@section('content')
    <div class="bg-gradient-to-r from-pink-300 via-purple-500 to-indigo-600 min-h-screen flex items-center justify-center">
        <div class="max-w-4xl w-full bg-white shadow-md rounded-lg p-8">
            <h1 class="text-3xl font-bold mb-6 text-center">Detail Aspirasi</h1>

            <!-- Informasi Aspirasi -->
            <div class="mb-4">
                <label class="font-semibold text-gray-700">NIS:</label>
                <p class="text-gray-900">{{ $aspirasi->nis }}</p>
            </div>

            <div class="mb-4">
                <label class="font-semibold text-gray-700">Kategori:</label>
                <p class="text-gray-900">{{ $aspirasi->kategori->keterangan }}</p>
            </div>

            <div class="mb-4">
                <label class="font-semibold text-gray-700">Lokasi:</label>
                <p class="text-gray-900">{{ $aspirasi->lokasi }}</p>
            </div>

            <div class="mb-4">
                <label class="font-semibold text-gray-700">Keterangan:</label>
                <p class="text-gray-900">{{ $aspirasi->keterangan }}</p>
            </div>

            <!-- Status dan Tanggapan -->
            <div class="mb-4">
                <label class="font-semibold text-gray-700">Status:</label>
                <p class="text-gray-900">
                    @php
                        $status = $aspirasi->aspirasi->status ?? 'Menunggu'; // Ambil status dari relasi aspirasi
                        $statusClass = $status == 'Selesai' ? 'bg-green-100 text-green-600' : ($status == 'Proses' ? 'bg-yellow-100 text-yellow-600' : 'bg-red-100 text-red-600');
                    @endphp
                    <span class="px-2 py-1 rounded {{ $statusClass }}">
                        {{ $status }}
                    </span>
                </p>
            </div>

            <div class="mb-6">
                <label class="font-semibold text-gray-700">Tanggapan Admin:</label>
                <p class="text-gray-900">{{ $aspirasi->aspirasi->feedback ?? 'Belum ada tanggapan.' }}</p>
            </div>

            <!-- Tombol Kembali -->
            <div class="text-center">
                <a href="{{ route('user.aspirasi.index') }}" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">
                    Kembali ke Daftar Aspirasi
                </a>
            </div>
        </div>
    </div>
@endsection
