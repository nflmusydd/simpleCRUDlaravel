<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosens = Dosen::latest()->paginate(10);

        return view('dosen.index',compact('dosens'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dosen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate input
        $request->validate([
            'kodedosen' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'notelp' => 'required',
            'domisili' => 'required',
        ]);

        //create new data in database
        Dosen::create($request->all());

        return redirect()->route('dosen.index')->with('success','Data Dosen berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dosen $dosen)
    {
        return view('dosen.show',compact('dosen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dosen $dosen)
    {
        return view('dosen.edit',compact('dosen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dosen $dosen)
    {
        $request->validate([
            'kodedosen' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'notelp' => 'required',
            'domisili' => 'required',
        ]);

        $dosen->update($request->all());

        return redirect()->route('dosen.index')->with('success','Data Dosen Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dosen $dosen)
    {
        $dosen->delete();

        return redirect()->route('dosen.index')->with('success','Data Dosen Berhasil Dihapus');
    }
    
}
