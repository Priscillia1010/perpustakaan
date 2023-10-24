<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rak;

class RakController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $order = $request->input('order', "nama");
        $sort = $request->input('sort',"asc"); 

        $raks = Rak::where($order, 'like', '%'.$query.'%')
                        ->orderBy($order, $sort)
                        ->paginate(5);

        return view('raks.index', compact('raks'));
    }

    public function create() {
        return view('raks.create');
    }

    public function store(Request $request) {
        $request->validate([
            'kode' => 'required|numeric',
            'nama' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
        ]);

        Rak::create($request->all());

        return redirect()->route('raks.index')
                         ->with('sukses', 'Rak berhasil ditambah');
    }

    public function show($id) {
        $rak = Rak::find($id);
        return view('raks.show', compact('rak'));
    }

    public function edit($id) {
        $rak = Rak::find($id);
        return view('raks.edit', compact('rak'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'kode' => 'required|numeric',
            'nama' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
        ]);

        $rak = Rak::find($id);
        $rak->update($request->all());

        return redirect()->route('raks.index')
                         ->with('sukses', 'Rak berhasil diupdate');
    }

    public function destroy($id) {
        $rak = Rak::find($id);
        $rak->delete();

        return redirect()->route('raks.index')
                         ->with('sukses', 'Rak berhasil dihapus');
    }

    public function search(Request $request)
    {
        $query = $request->input('query'); 

        $raks = Rak::where('nama', 'like', '%'.$query.'%')->paginate(5); 
        
        return view('raks.index', compact('raks'));
    }
}