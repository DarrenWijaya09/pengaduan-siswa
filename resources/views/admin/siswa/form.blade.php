@extends('layouts.admin')
@section('content')
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <h1
            class="text-4xl text-center font-extrabold bg-clip-text bg-gradient-to-r from-[#E9F1FA] via-[#A6C8FF] to-[#00ABE4] mb-10">
            {{ isset($siswa) ? 'Edit Siswa' : 'Tambah Siswa' }}
        </h1>

        <form action="{{ isset($siswa) ? route('admin.siswa.update', $siswa->nis) : route('admin.siswa.store') }}"
            method="POST">
            @csrf
            @if (isset($siswa))
                @method('PUT')
            @endif

            <div class="space-y-6">
                <div>
                    <label for="nis" class="block text-sm font-medium text-gray-700">NIS</label>
                    <input type="text" name="nis" id="nis" class="mt-1 block w-full rounded-md text-black border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('nis', $siswa->nis ?? '') }}" required>
                </div>

                <div>
                    <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas</label>
                    <input type="text" name="kelas" id="kelas"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-black focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        value="{{ old('kelas', $siswa->kelas ?? '') }}" required>
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        {{ isset($siswa) ? 'Update' : 'Tambah' }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
