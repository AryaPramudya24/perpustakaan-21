<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RakController extends Controller
{
    public function index(): View
    {
        $rak = Rak::latest()->paginate(10);
        return view('levelAdmin.rak.index', compact('rak'));
    }

    public function create()
    {
        return view('levelAdmin.rak.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'lokasi' => 'required',
        ]);

        Rak::create($request->all());

        return redirect()->route('admin.rak.index')
            ->with('success', 'rak berhasil ditambahkan.');
    }

    public function show(string $id): View
    {
        $rak = Rak::findOrFail($id);

        return view('levelAdmin.rak.show', compact('rak'));
    }
    public function edit(string $id)
    {
        $rak = Rak::findOrFail($id);
        return view('levelAdmin.rak.edit', compact('rak'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'lokasi' => 'required',
        ]);

        $rak = Rak::findOrFail($id);
        $rak->update($request->all());

        return redirect()->route('admin.rak.index')
            ->with('success', 'Data rak berhasil diubah!.');
    }

    public function destroy($id): RedirectResponse
    {
        $rak = Rak::findOrFail($id);
        $rak->delete();
        return redirect()->route('admin.rak.index')->with(['success' => 'Data rak Berhasil Dihapus!']);
    }
}
