<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wisata = Wisata::all();
        return view('wisata.index', compact('wisata'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('wisata.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi data
        $request->validate([
            'nama_tempat' => 'required',
            'lokasi' => 'required',
            'fasilitas' => 'required',
            'banner1' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'banner2' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'banner3' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'deskripsi' => 'nullable|string',
            'harga_tiket' => 'required|integer',
        ]);
        // dd($request->all());
        
        $wisata = new Wisata;
        $wisata->nama_tempat = $request->nama_tempat;
        $wisata->fasilitas = $request->fasilitas;
        $wisata->deskipsi = $request->deskripsi;
        $wisata->harga_tiket = $request->harga_tiket;
        $wisata->lokasi = $request->lokasi;
        //upload foto
        $uploadedFile = $request->file('banner1');
        $destinationFolder = 'assets/wisata';
        $path = $uploadedFile->store($destinationFolder, 'public'); 
        $wisata->banner1 = Storage::url($path);

        if($request->file('banner2') != null) {
            $fileBanner2 = $request->file('banner2');
            $folderSimpan = 'assets/wisata';
            $path = $fileBanner2->store($folderSimpan, 'public'); 
            $wisata->banner2 = Storage::url($path);
        }
        
        if($request->file('banner3') != null) {
            $fileBanner2 = $request->file('banner3');
            $folderSimpan = 'assets/wisata';
            $path = $fileBanner2->store($folderSimpan, 'public'); 
            $wisata->banner3 = Storage::url($path);
        }

        $wisata->save();
        return redirect()->back()->with('success', 'Berhasil menambah wisata');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wisata $wisatum)
    {
        $wisata = $wisatum;
        return view('wisata.edit', compact('wisata'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wisata $wisatum)
    {
        // validasi data
        $request->validate([
            'nama_tempat' => 'required|string',
            'lokasi' => 'required|string',
            'fasilitas' => 'required|string',
            'banner1' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'banner2' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'banner3' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'deskripsi' => 'nullable|string',
            'harga_tiket' => 'required|integer',
        ]);

        $wisata = $wisatum;
        
        if($request->has('nama_tempat')) {
            $wisata->nama_tempat = $request->nama_tempat;
        }
        if($request->has('fasilitas')) {
            $wisata->fasilitas = $request->fasilitas;
        }
        if($request->has('deskripsi')) {
            $wisata->deskipsi = $request->deskripsi;
        }
        if($request->has('lokasi')) {        
            $wisata->lokasi = $request->lokasi;
        }
        if($request->has('harga_tiket')) {
            $wisata->harga_tiket = $request->harga_tiket;
        }
        if($request->hasFile('banner1')) {            
            $uploadedFile = $request->file('banner1');
            $destinationFolder = 'assets/wisata';
            $path = $uploadedFile->store($destinationFolder, 'public'); 
            $wisata->banner1 = Storage::url($path);
        }

        if($request->file('banner2') != null) {
            $fileBanner2 = $request->file('banner2');
            $folderSimpan = 'assets/wisata';
            $path = $fileBanner2->store($folderSimpan, 'public'); 
            $wisata->banner2 = Storage::url($path);
        }
        
        if($request->file('banner3') != null) {
            $fileBanner2 = $request->file('banner3');
            $folderSimpan = 'assets/wisata';
            $path = $fileBanner2->store($folderSimpan, 'public'); 
            $wisata->banner3 = Storage::url($path);
        }

        $wisata->save();
        return redirect()->back()->with('success', 'Berhasil mengupdate data wisata');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wisata $wisatum)
    {
        $wisatum->delete();
        return redirect()->back();
    }
}
