<?php

namespace App\Http\Controllers;

use App\Models\Anggota;

use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('query');
        $order = $request->input('order', "nama");
        $sort = $request->input('sort',"asc"); 

        $anggotas = Anggota::where($order, 'like', '%'.$query.'%')
                        ->orderBy($order, $sort)
                        ->paginate(5);

        return view('anggotas.index', compact('anggotas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('anggotas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|numeric',
            'nama' => 'required|string|max:255',
            'email' => 'required|string|max:255'
        ]);

        Anggota::create($request->all());

        return redirect()->route('anggotas.index')->with('sukses', 'Anggota berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $anggota = Anggota::find($id);
        return view('anggotas.show', compact('anggota'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $anggota = Anggota::find($id);
        return view('anggotas.edit', compact('anggota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required|numeric',
            'nama' => 'required|string|max:255',
            'email' => 'required|string|max:255'
        ]);

        $anggota = Anggota::find($id);
        $anggota->update($request->all());

        return redirect()->route('anggotas.index')->with('sukses', 'Anggota berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $anggota = Anggota::find($id);
        $anggota->delete();

        return redirect()->route('anggotas.index')->with('sukses', 'Anggota berhasil dihapus');
    }

    public function search(Request $request)
    {
        $query = $request->input('query'); 

        $anggotas = Anggota::where('nama', 'like', '%'.$query.'%')->paginate(5); 
        
        return view('anggotas.index', compact('anggotas'));
    }
}