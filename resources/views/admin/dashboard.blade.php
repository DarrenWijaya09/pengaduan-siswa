    @extends('layouts.admin')

    @section('content')
    <div class="min-h-screen bg-trasnparent bg-gradient-to-r from-[#E9F1FA] via-[#A6C8FF] to-[#00ABE4] text-white">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl text-center font-extrabold bg-clip-text bg-gradient-to-r from-[#E9F1FA] via-[#A6C8FF] to-[#00ABE4] mb-10">
                Selamat Datang, {{ Auth::user()->name }} !
            </h1>

            <!-- Grid Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Card: Total Aspirasi -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <div class="flex items-center space-x-4">
                        <div class="bg-gradient-to-r from-green-400 to-teal-500 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17a4 4 0 11-8 0 4 4 0 018 0zm10 0a4 4 0 11-8 0 4 4 0 018 0zM5 17a4 4 0 018 0 4 4 0 01-8 0zm16 0a4 4 0 01-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-gray-900">Total Aspirasi</h2>
                            <p class="text-2xl font-bold text-gray-700">{{ $totalAspirasi ?? 0 }}</p>
                        </div>
                    </div>
                </div>

                <!-- Card: Total Siswa -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <div class="flex items-center space-x-4">
                        <div class="bg-gradient-to-r from-yellow-400 to-orange-500 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16h6M4 6h16" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-gray-900">Total Siswa</h2>
                            <p class="text-2xl font-bold text-gray-700">{{ $totalSiswa ?? 0 }}</p>
                        </div>
                    </div>
                </div>

                <!-- Card: Total Kategori -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <div class="flex items-center space-x-4">
                        <div class="bg-gradient-to-r from-pink-400 to-red-500 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-gray-900">Total Kategori</h2>
                            <p class="text-2xl font-bold text-gray-700">{{ $totalKategori ?? 0 }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Links Section -->
            <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-6">
                <a href="{{ route('admin.aspirasi.index') }}" class="block bg-blue-500 hover:bg-blue-600 text-white text-center font-medium py-4 rounded-lg shadow-lg transition transform hover:scale-105">
                    Kelola Aspirasi
                </a>
                <a href="{{ route('admin.siswa.index') }}" class="block bg-green-500 hover:bg-green-600 text-white text-center font-medium py-4 rounded-lg shadow-lg transition transform hover:scale-105">
                    Kelola Siswa
                </a>
                <a href="{{ route('admin.kategori.index') }}" class="block bg-purple-500 hover:bg-purple-600 text-white text-center font-medium py-4 rounded-lg shadow-lg transition transform hover:scale-105">
                    Kelola Kategori
                </a>
            </div>
        </div>
    </div>
    @endsection
