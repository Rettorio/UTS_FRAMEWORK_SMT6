<?php

namespace App\Http\Controllers;

use App\Models\Penyelenggara;
use Illuminate\Http\Request;

class PenyelenggaraController extends Controller
{
    public function index()
    {
        $data = Penyelenggara::all();
        return view('penyelenggara.index', compact('data'));
    }

    public function dashboard()
    {
        return view('penyelenggara.index');
    }

    public function create()
    {
        return view('penyelenggara.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:penyelenggaras,email',
            'telepon' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'nama_event' => 'nullable|string|max:255',
            'tanggal_event' => 'nullable|date',
            'lokasi_event' => 'nullable|string|max:255',
            'deskripsi_event' => 'nullable|string',
        ]);

        Penyelenggara::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'nama_event' => $request->nama_event,
            'tanggal_event' => $request->tanggal_event,
            'lokasi_event' => $request->lokasi_event,
            'deskripsi_event' => $request->deskripsi_event,
        ]);

        return redirect()->route('penyelenggara.index')->with('success', 'Data penyelenggara berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $penyelenggara = Penyelenggara::findOrFail($id);
        return view('penyelenggara.edit', compact('penyelenggara'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:penyelenggaras,email,' . $id,
            'telepon' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'nama_event' => 'nullable|string|max:255',
            'tanggal_event' => 'nullable|date',
            'lokasi_event' => 'nullable|string|max:255',
            'deskripsi_event' => 'nullable|string',
        ]);

        $penyelenggara = Penyelenggara::findOrFail($id);
        $penyelenggara->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'nama_event' => $request->nama_event,
            'tanggal_event' => $request->tanggal_event,
            'lokasi_event' => $request->lokasi_event,
            'deskripsi_event' => $request->deskripsi_event,
        ]);

        return redirect()->route('penyelenggara.index')->with('success', 'Data penyelenggara berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $penyelenggara = Penyelenggara::findOrFail($id);
        $penyelenggara->delete();

        return redirect()->route('penyelenggara.index')->with('success', 'Data penyelenggara berhasil dihapus!');
    }
}
