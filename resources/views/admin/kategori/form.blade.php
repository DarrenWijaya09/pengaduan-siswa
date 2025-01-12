@extends('layouts.admin')

@section('content')
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl text-center font-extrabold bg-clip-text bg-gradient-to-r from-[#E9F1FA] via-[#A6C8FF] to-[#00ABE4] mb-10">
            @isset($kategori) Edit Kategori @else Tambah Kategori @endisset
        </h1>

        <form action="{{ isset($kategori) ? route('admin.kategori.update', $kategori->id) : route('admin.kategori.store') }}" method="POST">
            @csrf
            @isset($kategori)
                @method('PUT') <!-- Menandakan ini adalah update request -->
            @endisset

            <div class="mb-4">
                <label for="keterangan" class="block text-sm font-medium text-gray-600">Keterangan Kategori</label>
                <input type="text" name="keterangan" id="keterangan" value="{{ old('keterangan', $kategori->keterangan ?? '') }}" class="mt-1 text-black block w-full p-2 border rounded-md" required>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="inline-flex items-center justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    @isset($kategori) Update @else Simpan @endisset
                </button>
            </div>
        </form>
    </div>
@endsection
