<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Kategori;
use App\Models\InputAspirasi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Mengambil jumlah aspirasi, siswa, dan kategori
        $totalAspirasi = InputAspirasi::count();
        $totalSiswa = Siswa::count();
        $totalKategori = Kategori::count();

        // Kirim data ke view
        return view('admin.dashboard', compact('totalAspirasi', 'totalSiswa', 'totalKategori'));
    }
}
