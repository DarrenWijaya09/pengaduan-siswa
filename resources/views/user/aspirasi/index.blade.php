@extends('layouts.app')

@section('content')
    <div class="bg-gradient-to-r from-pink-300 via-purple-500 to-indigo-600 min-h-screen flex items-center justify-center">
        <div class="w-full max-w-4xl px-6 py-12">
            <!-- Title -->
            <h2
                class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-red-500 mb-8 text-center">
                Daftar Aspirasi
            </h2>

            <!-- Tombol Kembali ke Dashboard -->
            <div class="mb-8 text-center">
                <a href="{{ route('user.dashboard') }}"
                    class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">Kembali ke Dashboard</a>
            </div>

            <!-- Form untuk input NIS -->
            <form action="{{ route('user.aspirasi.index') }}" method="GET" class="mb-8">
                <div class="relative w-full">
                    <div class="flex items-center space-x-4">
                        <!-- Input NIS -->
                        <input type="text" name="nis" id="nis"
                            class="w-full rounded-lg border-2 border-white bg-white text-black px-4 py-2 focus:ring-2 focus:ring-yellow-500"
                            placeholder="Masukkan NIS" autocomplete="off" oninput="filterNIS()">

                        <!-- Button Cari Aspirasi -->
                        <button type="submit" class="bg-yellow-500 text-black px-6 py-2 rounded-lg">Cari Aspirasi</button>
                    </div>

                    <!-- Dropdown untuk NIS -->
                    <ul id="nis-results"
                        class="mt-2 p-2 bg-white border border-gray-300 rounded-lg shadow-md hidden absolute z-10 w-full max-w-full mt-1">
                    </ul>
                </div>
            </form>

            <!-- Daftar Aspirasi -->
            @if ($aspirasi->isEmpty())
                <p class="text-white text-center">Tidak ada aspirasi untuk NIS ini.</p>
            @else
                <div class="flex flex-wrap gap-6 justify-start">
                    @foreach ($aspirasi as $aspirasiItem)
                        <div class="bg-white p-6 rounded-lg shadow-md w-80">
                            <h3 class="font-bold text-lg text-center">{{ $aspirasiItem->kategori->keterangan }}</h3>
                            <p class="text-gray-600 mt-2 text-center">{{ $aspirasiItem->keterangan }}</p>
                            <span class="block text-sm text-gray-500 mt-4 text-center">Lokasi:
                                {{ $aspirasiItem->lokasi }}</span>
                            <span class="block text-sm text-gray-500 mt-2 text-center">Tanggal:
                                {{ $aspirasiItem->created_at->format('d-m-Y') }}</span>

                            <!-- Tombol Lihat Detail -->
                            <div class="mt-4 text-center">
                                <a href="{{ route('user.aspirasi.show', $aspirasiItem->id) }}"
                                    class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>

    <script>
        function filterNIS() {
            const input = document.getElementById('nis');
            const results = document.getElementById('nis-results');
            const query = input.value.toLowerCase();

            // Filter NIS berdasarkan input
            const filteredNIS = siswaNIS.filter(nis => nis.toLowerCase().includes(query));

            // Menampilkan dropdown hasil filter
            results.innerHTML = '';
            if (query && filteredNIS.length > 0) {
                results.classList.remove('hidden');
                filteredNIS.forEach(nis => {
                    const listItem = document.createElement('li');
                    listItem.classList.add('py-2', 'px-4', 'cursor-pointer', 'hover:bg-gray-100');
                    listItem.textContent = nis;
                    listItem.onclick = function() {
                        input.value = nis;
                        results.classList.add('hidden');
                    };
                    results.appendChild(listItem);
                });
            } else {
                results.classList.add('hidden');
            }
        }
    </script>

@endsection
