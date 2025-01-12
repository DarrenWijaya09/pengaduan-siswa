@extends('layouts.admin')

@section('content')
    <div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded-lg">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-extrabold text-gray-800">Daftar Aspirasi</h1>
            <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded shadow hover:bg-blue-600">
                Kembali ke Dashboard
            </a>
        </div>
        <table class="w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="border p-4 text-left text-gray-600 font-semibold">NIS</th>
                    <th class="border p-4 text-left text-gray-600 font-semibold">Lokasi</th>
                    <th class="border p-4 text-left text-gray-600 font-semibold">Keterangan</th>
                    <th class="border p-4 text-left text-gray-600 font-semibold">Status</th>
                    <th class="border p-4 text-center text-gray-600 font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($aspirasi as $item)
                <tr class="hover:bg-gray-50">
                    <td class="border text-black p-4">{{ $item->nis }}</td>
                    <td class="border text-black p-4">{{ $item->lokasi }}</td>
                    <td class="border text-black p-4">{{ $item->keterangan }}</td>
                    <td class="border text-black p-4">
                        @php
                            $status = $item->aspirasi->status ?? 'Menunggu';
                            $statusClass = $status == 'Selesai' ? 'bg-green-100 text-green-600' : ($status == 'Proses' ? 'bg-yellow-100 text-yellow-600' : 'bg-red-100 text-red-600');
                        @endphp
                        <span class="px-2 py-1 rounded {{ $statusClass }}">
                            {{ $status }}
                        </span>
                    </td>
                    <td class="border p-4 text-center">
                        <a href="{{ route('admin.aspirasi.edit', $item->id) }}" class="text-blue-500 hover:underline">Lihat</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
