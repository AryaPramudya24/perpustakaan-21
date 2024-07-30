<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index(): View
    {
        $peminjaman = Peminjaman::latest()->paginate(10);
        return view('levelAdmin.peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        $buku = Buku::all();
        $anggota = Anggota::all();
        return view('levelAdmin.peminjaman.create', compact('buku', 'anggota'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_buku' => 'required',
            'id_anggota' => 'required',
            'tgl_peminjaman' => 'required',
            'tgl_pengembalian' => 'required',
            'status' => 'required',
        ]);

        Peminjaman::create($request->all());

        return redirect()->route('admin.peminjaman.index')
            ->with('success', 'peminjaman berhasil ditambahkan.');
    }

    public function show(string $id): View
    {
        $peminjaman = Peminjaman::findOrFail($id);

        return view('levelAdmin.peminjaman.show', compact('peminjaman'));
    }
    public function edit(string $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $buku = Buku::all();
        $anggota = Anggota::all();
        return view('levelAdmin.peminjaman.edit', compact('peminjaman', 'buku', 'anggota'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'no_buku' => 'required',
            'id_anggota' => 'required',
            'tgl_peminjaman' => 'required',
            'tgl_pengembalian' => 'required',
            'status' => 'required',
        ]);

        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update($request->all());

        return redirect()->route('admin.peminjaman.index')
            ->with('success', 'Data peminjaman berhasil diubah!.');
    }

    public function destroy($id): RedirectResponse
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();
        return redirect()->route('admin.peminjaman.index')->with(['success' => 'Data peminjaman Berhasil Dihapus!']);
    }
}
