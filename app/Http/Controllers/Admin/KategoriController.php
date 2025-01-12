<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris = Kategori::paginate(4);  // Mendapatkan semua kategori
        return view('admin.kategori.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    // Menyimpan kategori baru atau memperbarui kategori yang sudah ada
    public function store(Request $request)
    {
        $request->validate([
            'keterangan' => 'required|string|max:255',  // Validasi untuk kolom 'keterangan'
        ]);

        // Jika kategori ada, update, jika tidak simpan baru
        Kategori::updateOrCreate(
            ['id' => $request->id],
            ['keterangan' => $request->keterangan]  // Menyimpan kolom 'keterangan'
        );

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.kategori.form', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'keterangan' => 'required|string|max:255',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update($request->only('keterangan'));

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    // Menghapus kategori
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil dihapus');
    }
}
