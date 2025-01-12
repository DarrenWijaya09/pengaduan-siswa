@extends('layouts.app')

@section('content')
    <div class="bg-gradient-to-r from-pink-300 via-purple-500 to-indigo-600 min-h-screen flex items-center justify-center">
        <div class="w-full max-w-4xl px-6 py-12">
            <!-- Title -->
            <h2
                class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-red-500 mb-8 text-center">
                Buat Aspirasi Baru
            </h2>

            <!-- Form Aspirasi -->
            <form action="{{ route('user.aspirasi.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf

                <!-- NIS and Kategori -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- NIS -->
                    <div class="relative">
                        <label for="nis" class="block text-lg font-medium text-white">NIS</label>
                        <input type="text" id="nis" name="nis"
                            class="w-full rounded-lg border-2 border-white bg-white text-black px-4 py-2 focus:ring-2 focus:ring-yellow-500"
                            placeholder="Ketik NIS atau Kelas" required autocomplete="off">
                        <ul id="nis-results"
                            class="mt-2 p-2 bg-white border border-gray-300 rounded-lg shadow-md hidden absolute w-full z-10">
                        </ul>
                    </div>

                    <!-- Kategori -->
                    <div>
                        <label for="kategori_id" class="block text-lg font-medium text-white">Kategori</label>
                        <select name="kategori_id" id="kategori_id"
                            class="w-full rounded-lg border-2 border-white bg-white text-black px-4 py-2 focus:ring-2 focus:ring-yellow-500">
                            @foreach ($kategori as $category)
                                <option value="{{ $category->id }}">{{ $category->keterangan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Lokasi and Keterangan -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Lokasi -->
                    <div class="relative">
                        <label for="lokasi" class="block text-lg font-medium text-white">Lokasi</label>
                        <input type="text" name="lokasi" id="lokasi" value="{{ old('lokasi') }}"
                            class="w-full rounded-lg border-2 border-white bg-white text-black px-4 py-2 focus:ring-2 focus:ring-yellow-500"
                            required autocomplete="off" placeholder="Ketik nama kota" oninput="filterLokasi()">
                        <ul id="lokasi-results" class="mt-2 p-2 bg-white border border-gray-300 rounded-lg shadow-md hidden absolute z-10 w-full max-w-full"></ul>
                    </div>

                    <!-- Keterangan -->
                    <div>
                        <label for="keterangan" class="block text-lg font-medium text-white">Keterangan</label>
                        <input type="text" name="keterangan" id="keterangan" value="{{ old('keterangan') }}"
                            class="w-full rounded-lg border-2 border-white bg-white text-black px-4 py-2 focus:ring-2 focus:ring-yellow-500" placeholder="Tuliskan Aspirasimu Disini"
                            required>
                    </div>
                </div>

                <!-- Foto -->
                <div class="grid grid-cols-1 gap-6">
                    <!-- Foto -->
                    <div>
                        <label for="foto" class="block text-lg font-medium text-white">Unggah Foto (Opsional)</label>
                        <input type="file" name="foto" id="foto"
                            class="w-full text-white file:bg-purple-600 file:text-white file:rounded-lg file:border-none file:px-4 file:py-2">
                    </div>
                </div>

                <!-- Tombol Submit dan Lihat Aspirasi -->
                <div class="flex justify-center gap-4 mt-8">
                    <!-- Tombol Kirim Aspirasi -->
                    <button type="submit"
                        class="w-full max-w-xs py-3 rounded-lg bg-yellow-500 text-black font-semibold hover:bg-yellow-600 transition transform hover:scale-105">
                        Kirim Aspirasi
                    </button>

                    <!-- Tombol Lihat Aspirasi -->
                    <a href="{{ route('user.aspirasi.index') }}"
                        class="w-full max-w-xs py-3 rounded-lg bg-green-500 text-black font-semibold shadow-xl hover:bg-green-600 transition transform hover:scale-105 text-center flex justify-center items-center">
                        Lihat Aspirasi
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
