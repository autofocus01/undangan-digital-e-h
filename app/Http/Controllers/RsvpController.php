<?php

namespace App\Http\Controllers;

use App\Models\Rsvp;
use Illuminate\Http\Request;

class RsvpController extends Controller
{
    public function index()
    {
        $rsvps = Rsvp::latest()->get();
        return view('rsvp.index', compact('rsvps'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:100',
            'kehadiran' => 'required|in:Hadir,Tidak Hadir',
            'pax'       => 'required_if:kehadiran,Hadir|integer|min:1|max:10|nullable',
            'ucapan'    => 'required|string|max:500',
        ], [
            'nama.required'      => 'Nama wajib diisi.',
            'kehadiran.required' => 'Konfirmasi kehadiran wajib dipilih.',
            'pax.required_if'    => 'Jumlah tamu wajib diisi jika hadir.',
            'pax.min'            => 'Jumlah tamu minimal 1.',
            'pax.max'            => 'Jumlah tamu maksimal 10.',
            'ucapan.required'    => 'Ucapan wajib diisi.',
            'ucapan.max'         => 'Ucapan maksimal 500 karakter.',
        ]);

        Rsvp::create([
            'nama'      => $validated['nama'],
            'kehadiran' => $validated['kehadiran'],
            'pax'       => $validated['kehadiran'] === 'Hadir' ? ($validated['pax'] ?? 1) : 0,
            'ucapan'    => $validated['ucapan'],
        ]);

        return redirect()->route('rsvp.index')
            ->with('success', 'Terima kasih! RSVP dan ucapan Anda telah diterima. 🎊');
    }
}