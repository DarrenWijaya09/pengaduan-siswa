<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AspirasiKU') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Include Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gradient-to-r from-pink-300 via-purple-500 to-indigo-600 text-gray-800 font-sans">
    <main class="w-full p-6 bg-transparent">
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="bg-gradient-to-r from-pink-300 via-purple-500 to-indigo-600 text-white mt-12 py-6">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; {{ date('Y') }} {{ config('app.name', 'AspirasiKU') }}. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Include Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#nis').on('input', function() {
                var query = $(this).val();
                if (query.length >= 0) {
                    // Menampilkan dropdown saat input memiliki panjang minimal 2 karakter
                    $.ajax({
                        url: '{{ route('user.user.aspirasi.searchNIS') }}',
                        method: 'GET',
                        data: {
                            q: query
                        },
                        success: function(data) {
                            var resultsContainer = $('#nis-results');
                            resultsContainer.empty(); // Kosongkan sebelumnya
                            if (data.length > 0) {
                                data.forEach(function(item) {
                                    resultsContainer.append(
                                        '<li class="cursor-pointer p-2 hover:bg-gray-200" data-nis="' +
                                        item.nis + '" data-kelas="' + item.kelas +
                                        '">' + item.nis + ' - ' + item.kelas +
                                        '</li>');
                                });
                                resultsContainer.removeClass('hidden');
                            } else {
                                resultsContainer.addClass('hidden');
                            }
                        }
                    });
                } else {
                    $('#nis-results').addClass('hidden');
                }
            });

            // Menangani klik pada hasil dropdown
            $(document).on('click', '#nis-results li', function() {
                var nis = $(this).data('nis');
                var kelas = $(this).data('kelas');
                $('#nis').val(nis); // Isi input dengan NIS yang dipilih
                $('#nis-results').addClass('hidden'); // Sembunyikan dropdown
            });

            // Menyembunyikan dropdown jika klik di luar input
            $(document).click(function(e) {
                if (!$(e.target).closest('#nis').length) {
                    $('#nis-results').addClass('hidden');
                }
            });
        });

        const kotaList = [
            'Jakarta Pusat', 'Jakarta Utara', 'Jakarta Selatan', 'Jakarta Timur', 'Jakarta Barat',
            'Bogor', 'Depok', 'Tangerang', 'Bekasi',
            'Cibubur', 'Ciledug', 'Tangerang Selatan', 'Cimanggis', 'Bintaro', 'Cinere', 'Karawaci'
        ];

        function filterLokasi() {
            const input = document.getElementById('lokasi');
            const results = document.getElementById('lokasi-results');
            const query = input.value.toLowerCase();

            // Clear previous results
            results.innerHTML = '';

            // Hanya tampilkan dropdown jika ada query dan hasil yang cocok
            if (query.length > 0) {
                const filteredKota = kotaList.filter(kota => kota.toLowerCase().includes(query));

                if (filteredKota.length > 0) {
                    filteredKota.forEach(kota => {
                        const listItem = document.createElement('li');
                        listItem.textContent = kota;
                        listItem.classList.add('cursor-pointer', 'p-2', 'hover:bg-gray-200');
                        listItem.onclick = () => {
                            input.value = kota;
                            results.classList.add('hidden');
                        };
                        results.appendChild(listItem);
                    });
                    results.classList.remove('hidden');
                } else {
                    results.classList.add('hidden'); // Tidak ada hasil, sembunyikan dropdown
                }
            } else {
                results.classList.add('hidden'); // Tidak ada input, sembunyikan dropdown
            }
        }
    </script>
</body>

</html>
