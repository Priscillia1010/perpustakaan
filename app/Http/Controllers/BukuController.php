<?php

namespace App\Http\Controllers;

use App\Models\Buku;

use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $query = $request->input('query');
        $order = $request->input('order', "judul");
        $sort = $request->input('sort',"asc"); 

        $bukus = Buku::where($order, 'like', '%'.$query.'%')
                        ->orderBy($order, $sort)
                        ->paginate(5);

        return view('bukus.index', compact('bukus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bukus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tahun' => 'required|string|max:255',
            'stock' => 'required|numeric'
        ]);

        Buku::create($request->all());

        return redirect()->route('bukus.index')->with('sukses', 'Buku berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $buku = Buku::find($id);
        return view('bukus.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $buku = Buku::find($id);
        return view('bukus.edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tahun' => 'required|string|max:255',
            'stock' => 'required|numeric'
        ]);

        $buku = Buku::find($id);
        $buku->update($request->all());

        return redirect()->route('bukus.index')->with('sukses', 'Buku berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $buku = Buku::find($id);
        $buku->delete();

        return redirect()->route('bukus.index')->with('sukses', 'Buku berhasil dihapus');
    }
}