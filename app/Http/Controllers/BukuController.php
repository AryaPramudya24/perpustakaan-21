<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penulis;
use App\Models\Rak;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(): View
    {
        $buku = Buku::latest()->paginate(10);
        return view('levelAdmin.buku.index', compact('buku'));
    }

    public function create()
    {
        $rak = Rak::all();
        $penulis = Penulis::all();
        return view('levelAdmin.buku.create', compact('rak', 'penulis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'edisi' => 'required',
            'no_rak' => 'required',
            'tahun' => 'required',
            'penerbit' => 'required',
            'kd_penulis' => 'required',
        ]);

        Buku::create($request->all());

        return redirect()->route('admin.buku.index')
            ->with('success', 'buku berhasil ditambahkan.');
    }

    public function show(string $id): View
    {
        $buku = Buku::findOrFail($id);

        return view('levelAdmin.buku.show', compact('buku'));
    }
    public function edit(string $id)
    {
        $buku = Buku::findOrFail($id);
        $rak = Rak::all();
        $penulis = Penulis::all();
        return view('levelAdmin.buku.edit', compact('buku', 'rak', 'penulis'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'judul' => 'required',
            'edisi' => 'required',
            'no_rak' => 'required',
            'tahun' => 'required',
            'penerbit' => 'required',
            'kd_penulis' => 'required',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update($request->all());

        return redirect()->route('admin.buku.index')
            ->with('success', 'Data buku berhasil diubah!.');
    }

    public function destroy($id): RedirectResponse
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();
        return redirect()->route('admin.buku.index')->with(['success' => 'Data buku Berhasil Dihapus!']);
    }
}
