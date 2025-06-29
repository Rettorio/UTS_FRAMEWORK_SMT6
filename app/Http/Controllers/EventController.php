<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $events = Event::where('penyelenggara', $user_id)->orderBy('created_at', 'desc')->get(); 
        return view('event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi data
        $request->validate([
            'nama_event' => "required|string",
            'lokasi' => "required|string",
            'deskripsi' => "nullable|string",
            'jadwal_mulai' => "required|date",
            'jadwal_selesai' => "required|date",
            'banner1' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'banner2' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'banner3' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'deskripsi' => 'nullable|string',
            'harga_tiket' => 'required|integer',
        ]);

        $event = new Event;
        $event->nama_event = $request->nama_event;
        $event->lokasi = $request->lokasi;
        $event->deskripsi = $request->deskripsi;
        $event->harga_tiket = $request->harga_tiket;
        $event->jadwal_mulai = $request->jadwal_mulai;
        $event->jadwal_selesai = $request->jadwal_selesai;
        //upload foto
        $uploadedFile = $request->file('banner1');
        $destinationFolder = 'assets/event';
        $path = $uploadedFile->store($destinationFolder, 'public'); 
        $event->banner1 = Storage::url($path);

        if($request->file('banner2') != null) {
            $fileBanner2 = $request->file('banner2');
            $folderSimpan = 'assets/event';
            $path = $fileBanner2->store($folderSimpan, 'public'); 
            $event->banner2 = Storage::url($path);
        }
        
        if($request->file('banner3') != null) {
            $fileBanner2 = $request->file('banner3');
            $folderSimpan = 'assets/event';
            $path = $fileBanner2->store($folderSimpan, 'public'); 
            $event->banner3 = Storage::url($path);
        }
        $event->penyelenggara = Auth::user()->id;
        $event->save();
        return redirect()->back()->with('success', 'Berhasil menambah event baru');


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
    public function edit(Event $event)
    {
        return view('event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        // validasi data terlebih dahulu
        $request->validate([
            'nama_event' => "required|string",
            'lokasi' => "required|string",
            'deskripsi' => "nullable|string",
            'jadwal_mulai' => "required|date",
            'jadwal_selesai' => "required|date",
            'banner1' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'banner2' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'banner3' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'deskripsi' => 'nullable|string',
            'harga_tiket' => 'required|integer',
        ]);
        if($request->has('nama_event')) {
            $event->nama_event = $request->nama_event;
        }
        if($request->has('jadwal_masuk')) {
            $event->jadwal_masuk = $request->jadwal_masuk;
        }
        if($request->has('jadwa_selesai')) {
            $event->jadwal_selesai = $request->jadwal_selesai;
        }
        if($request->has('deskripsi')) {
            $event->deskripsi = $request->deskripsi;
        }
        if($request->has('lokasi')) {        
            $event->lokasi = $request->lokasi;
        }
        if($request->has('harga_tiket')) {
            $event->harga_tiket = $request->harga_tiket;
        }
        if($request->hasFile('banner1')) {            
            $uploadedFile = $request->file('banner1');
            $destinationFolder = 'assets/event';
            $path = $uploadedFile->store($destinationFolder, 'public'); 
            $event->banner1 = Storage::url($path);
        }

        if($request->file('banner2') != null) {
            $fileBanner2 = $request->file('banner2');
            $folderSimpan = 'assets/event';
            $path = $fileBanner2->store($folderSimpan, 'public'); 
            $event->banner2 = Storage::url($path);
        }
        
        if($request->file('banner3') != null) {
            $fileBanner2 = $request->file('banner3');
            $folderSimpan = 'assets/event';
            $path = $fileBanner2->store($folderSimpan, 'public'); 
            $event->banner3 = Storage::url($path);
        }

        $event->save();
        return redirect()->back()->with('success', 'Berhasil mengupdate data event');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->back();
    }
}
