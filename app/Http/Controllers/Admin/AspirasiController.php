<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aspirasi;
use App\Models\InputAspirasi;
use Illuminate\Http\Request;

class AspirasiController extends Controller
{
    public function index()
    {
        $aspirasi = InputAspirasi::with('aspirasi')->get();
        return view('admin.aspirasi.index', compact('aspirasi'));
    }

    public function create()
    {
        return redirect()->route('admin.aspirasi.index');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.aspirasi.index');
    }

    public function show($id)
    {
        $aspirasi = InputAspirasi::findOrFail($id);
        return view('admin.aspirasi.show', compact('aspirasi'));
    }

    public function edit($id)
    {
        $aspirasi = InputAspirasi::findOrFail($id);
        return view('admin.aspirasi.edit', compact('aspirasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Menunggu,Proses,Selesai',
            'feedback' => 'nullable|string',
        ]);

        Aspirasi::updateOrCreate(
            ['inputaspirasi_id' => $id],
            [
                'status' => $request->input('status', 'Menunggu'),  // Default to Menunggu
                'feedback' => $request->feedback,
            ]
        );

        return redirect()->route('admin.aspirasi.index')->with('success', 'Aspirasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Aspirasi::where('inputaspirasi_id', $id)->delete();
        return redirect()->route('admin.aspirasi.index')->with('success', 'Aspirasi berhasil dihapus.');
    }
}
