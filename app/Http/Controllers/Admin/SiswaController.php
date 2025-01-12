<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::paginate(5);
        return view('admin.siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.siswa.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|string|unique:siswa,nis|max:255',
            'kelas' => 'required|string|max:255',
        ]);

        Siswa::create($request->all());

        return redirect()->route('admin.siswa.index')->with('success', 'Siswa berhasil ditambahkan');
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
    public function edit($nis)
    {
        $siswa = Siswa::findOrFail($nis);
        return view('admin.siswa.form', compact('siswa'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $nis)
    {
        // Validasi input
        $request->validate([
            'nis' => 'required|string|max:255|unique:siswa,nis,' . $nis . ',nis',  // Memperbaiki pengecekan pada kolom 'nis'
            'kelas' => 'required|string|max:255',
        ]);

        // Cari siswa berdasarkan NIS
        $siswa = Siswa::findOrFail($nis);

        // Update data siswa, termasuk nis dan kelas
        $siswa->update($request->only('nis', 'kelas'));

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.siswa.index')->with('success', 'Siswa berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($nis)
    {
        $siswa = Siswa::findOrFail($nis);
        $siswa->delete();

        return redirect()->route('admin.siswa.index')->with('success', 'Siswa berhasil dihapus');
    }
}
