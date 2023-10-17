<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;

class PetugasController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $order = $request->input('order', "nama");
        $sort = $request->input('sort',"asc"); 

        $petugass = Petugas::where($order, 'like', '%'.$query.'%')
                        ->orderBy($order, $sort)
                        ->paginate(5);

        return view('petugass.index', compact('petugass'));
    }

    public function create() {
        return view('petugass.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|max:255',
        ]);

        Petugas::create($request->all());

        return redirect()->route('petugass.index')
                         ->with('sukses', 'Petugas berhasil ditambah');
    }

    public function show($id) {
        $petugas = Petugas::find($id);
        return view('petugass.show', compact('petugas'));
    }

    public function edit($id) {
        $petugas = Petugas::find($id);
        return view('petugass.edit', compact('petugas'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|max:255',
        ]);

        $petugas = Petugas::find($id);
        $petugas->update($request->all());

        return redirect()->route('petugass.index')
                         ->with('sukses', 'Petugas berhasil diupdate');
    }

    public function destroy($id) {
        $petugas = Petugas::find($id);
        $petugas->delete();

        return redirect()->route('petugass.index')
                         ->with('sukses', 'Petugas berhasil dihapus');
    }
}