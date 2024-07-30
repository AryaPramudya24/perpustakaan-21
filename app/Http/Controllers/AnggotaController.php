<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index(): View
    {
        $anggota = Anggota::latest()->paginate(10);
        return view('levelAdmin.anggota.index', compact('anggota'));
    }

    public function create()
    {
        return view('levelAdmin.anggota.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'email' => 'required',
        ]);

        Anggota::create($request->all());

        return redirect()->route('admin.anggota.index')
            ->with('success', 'anggota berhasil ditambahkan.');
    }

    public function show(string $id): View
    {
        $anggota = Anggota::findOrFail($id);

        return view('levelAdmin.anggota.show', compact('anggota'));
    }
    public function edit(string $id)
    {
        $anggota = Anggota::findOrFail($id);
        return view('levelAdmin.anggota.edit', compact('anggota'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'email' => 'required',
        ]);

        $anggota = Anggota::findOrFail($id);
        $anggota->update($request->all());

        return redirect()->route('admin.anggota.index')
            ->with('success', 'Data anggota berhasil diubah!.');
    }

    public function destroy($id): RedirectResponse
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();
        return redirect()->route('admin.anggota.index')->with(['success' => 'Data anggota Berhasil Dihapus!']);
    }
}
