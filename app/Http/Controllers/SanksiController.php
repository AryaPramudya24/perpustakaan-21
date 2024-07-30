<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Peminjaman;
use App\Models\Sanksi;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SanksiController extends Controller
{
    public function index(): View
    {
        $sanksi = Sanksi::latest()->paginate(10);
        return view('levelAdmin.sanksi.index', compact('sanksi'));
    }

    public function create()
    {
        $peminjaman = Peminjaman::all();
        $anggota = Anggota::all();
        return view('levelAdmin.sanksi.create', compact('peminjaman', 'anggota'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_anggota' => 'required',
            'id_peminjaman' => 'required',
            'jumlah_denda' => 'required',
            'status' => 'required',
        ]);

        Sanksi::create($request->all());

        return redirect()->route('admin.sanksi.index')
            ->with('success', 'sanksi berhasil ditambahkan.');
    }

    public function show(string $id): View
    {
        $sanksi = Sanksi::findOrFail($id);

        return view('levelAdmin.sanksi.show', compact('sanksi'));
    }
    public function edit(string $id)
    {
        $sanksi = Sanksi::findOrFail($id);
        $peminjaman = Peminjaman::all();
        $anggota = Anggota::all();
        return view('levelAdmin.sanksi.edit', compact('sanksi', 'peminjaman', 'anggota'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'id_anggota' => 'required',
            'id_peminjaman' => 'required',
            'jumlah_denda' => 'required',
            'status' => 'required',
        ]);

        $sanksi = Sanksi::findOrFail($id);
        $sanksi->update($request->all());

        return redirect()->route('admin.sanksi.index')
            ->with('success', 'Data sanksi berhasil diubah!.');
    }

    public function destroy($id): RedirectResponse
    {
        $sanksi = Sanksi::findOrFail($id);
        $sanksi->delete();
        return redirect()->route('admin.sanksi.index')->with(['success' => 'Data sanksi Berhasil Dihapus!']);
    }
}
