<?php

namespace App\Http\Controllers;

use App\Models\Rsvp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    // Password admin — ganti sesuai keinginan
    private string $adminPassword = 'admin123';

    // ── Halaman login ──────────────────────────────────────────
    public function loginForm()
    {
        if (Session::get('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'password' => 'required|string',
        ]);

        if ($request->password !== $this->adminPassword) {
            return back()->withErrors(['password' => 'Password salah.']);
        }

        Session::put('admin_logged_in', true);
        return redirect()->route('admin.dashboard');
    }

    public function logout()
    {
        Session::forget('admin_logged_in');
        return redirect()->route('admin.login');
    }

    // ── Dashboard / daftar RSVP ────────────────────────────────
    public function dashboard(Request $request)
    {
        $query = Rsvp::latest();

        // Filter berdasarkan kehadiran
        if ($request->filled('filter')) {
            $query->where('kehadiran', $request->filter);
        }

        // Pencarian nama
        if ($request->filled('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $rsvps  = $query->paginate(15)->withQueryString();

        $stats = [
            'total'        => Rsvp::count(),
            'hadir'        => Rsvp::where('kehadiran', 'Hadir')->count(),
            'tidak_hadir'  => Rsvp::where('kehadiran', 'Tidak Hadir')->count(),
            'total_pax'    => Rsvp::where('kehadiran', 'Hadir')->sum('pax'),
        ];

        return view('admin.dashboard', compact('rsvps', 'stats'));
    }

    // ── Hapus satu data ────────────────────────────────────────
    public function destroy(Rsvp $rsvp)
    {
        $rsvp->delete();
        return back()->with('success', "Data RSVP atas nama \"{$rsvp->nama}\" berhasil dihapus.");
    }

    // ── Hapus semua data ───────────────────────────────────────
    public function destroyAll()
    {
        Rsvp::truncate();
        return back()->with('success', 'Semua data RSVP berhasil dihapus.');
    }
}