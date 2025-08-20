<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beritas = Berita::latest()->paginate(5);
        return view('berita.index', compact('beritas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
        ]);

        Berita::create($request->all());
        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan.');
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
    public function edit(string $id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
        ]);

    $berita = Berita::findOrFail($id);
    $berita->update($request->all());

    return redirect()->route('berita.index')
                     ->with('success', 'Berita berhasil diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();
        return redirect()->route('berita.index')
                     ->with('success', 'Berita berhasil diperbarui.');
    }
}
