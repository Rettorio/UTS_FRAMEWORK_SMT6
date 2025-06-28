<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index() {
        // nanti rubah pake template sama dashboard admin
        return view('admin.index');
    }

    public function dashboard() {
        // nanti rubah pake template sama dashboard admin
        return view('admin.dashboard');
    }

    public function daftarEvent() {
        $raw_events = Event::with('partner')->get();
        $now = Carbon::now();
        $events = $raw_events->map(function (Event $event) use ($now) {
            $start = $event->jadwal_mulai;
            $end = $event->jadwal_akhir;

            if($now->lessThan($start)) {
                $event->status = 'coming';
            } else if ($now->greaterThanOrEqualTo($start) && $now->lessThanOrEqualTo($end)) {
                $event->status = 'active';
            } else {
                $event->status = "done";
            }
            $event->penyelenggara = $event->partner->name;
            return $event;
        });
        // dd($events);
        return view('admin.daftar-event', compact('events'));
    }
}
