@extends('layouts.admin')

@section('content')
    <div class="max-w-7xl mx-auto">
        <h1 class="text-3xl font-semibold mb-6">Tanggapi Aspirasi</h1>

        <form action="{{ route('admin.aspirasi.update', $aspirasi->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="status" class="block text-gray-700">Status</label>
                <select name="status" id="status" class="w-full p-2 border rounded text-black" required>
                    <option value="Menunggu" {{ $aspirasi->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                    <option value="Proses" {{ $aspirasi->status == 'Proses' ? 'selected' : '' }}>Proses</option>
                    <option value="Selesai" {{ $aspirasi->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="feedback" class="block text-gray-700">Tanggapan</label>
                <textarea name="feedback" id="feedback" rows="4" class="w-full p-2 border rounded text-black">{{ old('feedback', $aspirasi->feedback) }}</textarea>
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Update Tanggapan</button>
        </form>
    </div>
@endsection
