<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>User Dashboard</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
                <style>
                    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap');
                    body {
                        font-family: 'Inter', sans-serif;
                    }
                    .gradient-bg {
                        background: linear-gradient(135deg, #ff7eb3, #ff758c, #ff6a63);
                    }
                    .hover-scale:hover {
                        transform: scale(1.05);
                        transition: transform 0.3s ease;
                    }
                </style>
        @endif
    </head>
    <body class="bg-gradient-to-r from-pink-300 via-purple-500 to-indigo-600 min-h-screen flex items-center justify-center">
        <!-- Direct Layout without Card -->
        <div class="w-full max-w-3xl text-center px-6 py-12">
            <!-- Title -->
            <h2 class="text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-red-500 mb-6">
                Halo, Murid Hebat!
            </h2>

            <!-- Description -->
            <p class="mt-4 text-lg leading-relaxed text-white font-medium mb-8">
                Apa yang ingin kamu ubah, tingkatkan, atau tambahkan di sekolah? Gunakan dashboard ini untuk memberikan aspirasi dan jadilah bagian dari perubahan!
            </p>

            <!-- Icon Buttons Layout (Horizontal) -->
            <div class="flex justify-center space-x-6">
                <!-- Button with Icon for Create Aspirasi -->
                <a href="{{ route('user.aspirasi.create') }}" class="flex flex-col items-center space-y-2 bg-yellow-500 text-black font-semibold py-3 px-8 rounded-lg shadow-xl hover:bg-yellow-600 transition-all ease-in-out transform hover:scale-105">
                    <!-- Heroicon Lightbulb Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v1a3 3 0 006 0v-1m-3 0V9a3 3 0 00-3-3 3 3 0 00-3 3v8m6 4H9a2 2 0 01-2-2v-1a4 4 0 008 0v1a2 2 0 01-2 2z" />
                    </svg>
                    <span class="text-lg">Buat Aspirasi Baru</span>
                    <span class="text-sm text-white mt-1">Mulai perubahan di sekolahmu!</span>
                </a>

                <!-- Button with Icon for View Aspirasi -->
                <a href="{{ route('user.aspirasi.index') }}" class="flex flex-col items-center space-y-2 bg-green-500 text-black font-semibold py-3 px-8 rounded-lg shadow-xl hover:bg-green-600 transition-all ease-in-out transform hover:scale-105">
                    <!-- Heroicon Eye Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12c0 1.657-1.343 3-3 3s-3-1.343-3-3 1.343-3 3-3 3 1.343 3 3zm0 0a9.986 9.986 0 01-6 2c-2.317 0-4.402-.832-6-2m12 0a9.986 9.986 0 00-6-2c-2.317 0-4.402.832-6 2" />
                    </svg>
                    <span class="text-lg">Lihat Aspirasi Saya</span>
                    <span class="text-sm text-white mt-1">Lihat aspirasi yang sudah kamu buat</span>
                </a>
            </div>

            <!-- Additional Info Section -->
            <div class="mt-10 text-white text-sm font-light">
                <p>Dengan memberikan aspirasi, kamu turut berperan dalam memperbaiki lingkungan sekolahmu. Jadilah bagian dari perubahan!🙏😘🌹</p>
            </div>
        </div>
    </body>
</html>
