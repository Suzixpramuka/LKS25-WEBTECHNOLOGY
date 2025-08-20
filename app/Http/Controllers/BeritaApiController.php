<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaApiController extends Controller
{
    // GET /api/berita
    public function index()
    {
        return response()->json(Berita::latest()->get());
    }

    // GET /api/berita/{id}
    public function show($id)
    {
        $berita = Berita::find($id);

        if (!$berita) {
            return response()->json(['message' => 'Berita tidak ditemukan'], 404);
        }

        return response()->json($berita);
    }

    // POST /api/berita
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'isi'   => 'required',
        ]);

        $berita = Berita::create($request->all());

        return response()->json([
            'message' => 'Berita berhasil dibuat',
            'data'    => $berita
        ], 201);
    }

    // PUT /api/berita/{id}
    public function update(Request $request, $id)
    {
        $berita = Berita::find($id);

        if (!$berita) {
            return response()->json(['message' => 'Berita tidak ditemukan'], 404);
        }

        $request->validate([
            'judul' => 'required|max:255',
            'isi'   => 'required',
        ]);

        $berita->update($request->all());

        return response()->json([
            'message' => 'Berita berhasil diperbarui',
            'data'    => $berita
        ]);
    }

    // DELETE /api/berita/{id}
    public function destroy($id)
    {
        $berita = Berita::find($id);

        if (!$berita) {
            return response()->json(['message' => 'Berita tidak ditemukan'], 404);
        }

        $berita->delete();

        return response()->json(['message' => 'Berita berhasil dihapus']);
    }
}
