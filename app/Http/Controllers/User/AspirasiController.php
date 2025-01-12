<?php

    namespace App\Http\Controllers\User;

    use App\Http\Controllers\Controller;
    use App\Models\InputAspirasi;
    use App\Models\Kategori;
    use App\Models\Siswa;
    use Illuminate\Http\Request;

    class AspirasiController extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index(Request $request)
        {
            // Ambil nis dari request input
            $nis = $request->get('nis');

            // Ambil aspirasi berdasarkan nis
            $aspirasi = InputAspirasi::with('kategori')
                ->where('nis', $nis)
                ->get();

            return view('user.aspirasi.index', compact('aspirasi'));
        }

        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {
            $kategori = Kategori::all();
            $siswa = \App\Models\Siswa::all();  // Ambil semua data siswa
            return view('user.aspirasi.create', compact('kategori', 'siswa'));
        }

        public function searchNIS(Request $request)
        {
            $query = $request->get('q');
            $siswa = Siswa::where('nis', 'like', "%{$query}%")
                        ->orWhere('kelas', 'like', "%{$query}%")
                        ->get();

            return response()->json($siswa);
        }


        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            $validated = $request->validate([
                'nis' => 'required|exists:siswa,nis',  // Validasi bahwa NIS ada di database
                'kategori_id' => 'required|exists:kategori,id',
                'lokasi' => 'required|string|max:255',
                'keterangan' => 'required|string',
                'foto' => 'nullable|image|max:2048',
            ]);

            if ($request->hasFile('foto')) {
                $validated['foto'] = $request->file('foto')->store('aspirasi_photos', 'public');
            }

            InputAspirasi::create($validated);

            return redirect()->route('user.dashboard')->with('success', 'Aspirasi berhasil dikirim.');
        }

        /**
         * Display the specified resource.
         */
        public function show($id)
        {
            // Ambil data aspirasi beserta kategori dan aspirasi status/tanggapan
            $aspirasi = InputAspirasi::with(['kategori', 'aspirasi'])->findOrFail($id);

            return view('user.aspirasi.show', compact('aspirasi'));
        }


        /**
         * Show the form for editing the specified resource.
         */
        public function edit(string $id)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, string $id)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(string $id)
        {
            //
        }
    }
