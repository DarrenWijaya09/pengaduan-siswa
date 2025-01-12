@extends('layouts.admin')
@section('content')
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <h1
            class="text-4xl text-center font-extrabold bg-clip-text bg-gradient-to-r from-[#E9F1FA] via-[#A6C8FF] to-[#00ABE4] mb-10">
            Daftar Siswa
        </h1>

        <!-- Flash Message -->
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 mb-6 rounded">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tombol Tambah Siswa dan Kembali ke Dashboard Sejajar -->
        <div class="mb-6 flex justify-between">
            <!-- Tombol Tambah Siswa -->
            <a href="{{ route('admin.siswa.create') }}"
                class="inline-flex items-center justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Tambah Siswa
            </a>

            <!-- Button Kembali ke Dashboard -->
            <a href="{{ route('admin.dashboard') }}"
                class="inline-flex items-center justify-center rounded-md border border-transparent bg-gray-600 py-2 px-4 text-sm font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Kembali ke Dashboard
            </a>
        </div>

        <!-- Table Section -->
        <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">NIS</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Kelas</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $data)
                        <tr class="border-t">
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $data->nis }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $data->kelas }}</td>
                            <td class="px-6 py-4 text-sm">
                                <a href="{{ route('admin.siswa.edit', $data->nis) }}"
                                    class="text-blue-600 hover:text-blue-800">Edit</a> |
                                <form action="{{ route('admin.siswa.destroy', $data->nis) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $siswa->links() }}  <!-- Menampilkan pagination -->
        </div>
    </div>
@endsection
