<?php

namespace App\Http\Controllers;

use App\Models\Penulis;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PenulisController extends Controller
{
    public function index(): View
    {
        $penulis = Penulis::latest()->paginate(10);
        return view('levelAdmin.penulis.index', compact('penulis'));
    }

    public function create()
    {
        return view('levelAdmin.penulis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_penulis' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'email' => 'required',
        ]);

        Penulis::create($request->all());

        return redirect()->route('admin.penulis.index')
            ->with('success', 'penulis berhasil ditambahkan.');
    }

    public function show(string $id): View
    {
        $penulis = Penulis::findOrFail($id);

        return view('levelAdmin.penulis.show', compact('penulis'));
    }
    public function edit(string $id)
    {
        $penulis = Penulis::findOrFail($id);
        return view('levelAdmin.penulis.edit', compact('penulis'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'nama_penulis' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'email' => 'required',
        ]);

        $penulis = Penulis::findOrFail($id);
        $penulis->update($request->all());

        return redirect()->route('admin.penulis.index')
            ->with('success', 'Data penulis berhasil diubah!.');
    }

    public function destroy($id): RedirectResponse
    {
        $penulis = Penulis::findOrFail($id);
        $penulis->delete();
        return redirect()->route('admin.penulis.index')->with(['success' => 'Data penulis Berhasil Dihapus!']);
    }
}
