<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard — Undangan Digital</title>
    @vite(['resources/css/app.css'])
    <style>
        .stat-card {
            background: #fff;
            border: 1px solid rgba(184,154,90,0.2);
            border-radius: 0.75rem;
            padding: 1.25rem 1.5rem;
            text-align: center;
        }
        .stat-number {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.5rem;
            font-weight: 300;
            line-height: 1;
            color: var(--brown);
        }
        .stat-label {
            font-size: 0.65rem;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: var(--sage);
            margin-top: 0.25rem;
        }
        .badge-hadir {
            background: rgba(138,158,140,0.15);
            color: var(--sage);
            padding: 0.2rem 0.6rem;
            border-radius: 9999px;
            font-size: 0.7rem;
        }
        .badge-tidak {
            background: rgba(200,100,100,0.1);
            color: #c06060;
            padding: 0.2rem 0.6rem;
            border-radius: 9999px;
            font-size: 0.7rem;
        }
        .btn-danger {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            padding: 0.35rem 0.75rem;
            font-size: 0.7rem;
            letter-spacing: 0.05em;
            background: rgba(200,80,80,0.08);
            color: #c05050;
            border: 1px solid rgba(200,80,80,0.2);
            border-radius: 0.4rem;
            cursor: pointer;
            transition: background 0.2s;
        }
        .btn-danger:hover { background: rgba(200,80,80,0.18); }
        table { width: 100%; border-collapse: collapse; }
        th {
            text-align: left;
            font-size: 0.65rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--sage);
            padding: 0.6rem 0.75rem;
            border-bottom: 1px solid rgba(184,154,90,0.15);
        }
        td {
            padding: 0.75rem;
            font-size: 0.85rem;
            color: var(--text);
            border-bottom: 1px solid rgba(0,0,0,0.04);
            vertical-align: top;
        }
        tr:last-child td { border-bottom: none; }
        tr:hover td { background: rgba(184,154,90,0.03); }
    </style>
</head>
<body style="background-color: #f5f1ea; min-height: 100svh;">

{{-- ── Navbar ── --}}
<nav style="background: var(--brown); padding: 0.85rem 1.5rem; display: flex; align-items: center; justify-content: space-between;">
    <div>
        <span class="font-display text-lg text-white font-light">Admin Panel</span>
        <span style="color: var(--gold-light); font-size: 0.7rem; letter-spacing: 0.15em; text-transform: uppercase; margin-left: 0.75rem;">Undangan Digital</span>
    </div>
    <div class="flex items-center gap-4">
        <a href="{{ route('invitation') }}" style="color: rgba(255,255,255,0.6); font-size: 0.75rem;">
            Lihat Undangan
        </a>
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" style="color: var(--gold-light); font-size: 0.75rem; background: none; border: none; cursor: pointer;">
                Logout
            </button>
        </form>
    </div>
</nav>

<div class="max-w-5xl mx-auto px-4 py-8">

    {{-- ── Flash message ── --}}
    @if(session('success'))
    <div class="mb-6 p-4 rounded-xl text-sm" style="background: rgba(138,158,140,0.12); border: 1px solid rgba(138,158,140,0.3); color: var(--brown);">
        ✅ {{ session('success') }}
    </div>
    @endif

    {{-- ── Statistik ── --}}
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-8">
        <div class="stat-card">
            <div class="stat-number">{{ $stats['total'] }}</div>
            <div class="stat-label">Total RSVP</div>
        </div>
        <div class="stat-card">
            <div class="stat-number" style="color: var(--sage);">{{ $stats['hadir'] }}</div>
            <div class="stat-label">Hadir</div>
        </div>
        <div class="stat-card">
            <div class="stat-number" style="color: #c06060;">{{ $stats['tidak_hadir'] }}</div>
            <div class="stat-label">Tidak Hadir</div>
        </div>
        <div class="stat-card">
            <div class="stat-number" style="color: var(--gold);">{{ $stats['total_pax'] }}</div>
            <div class="stat-label">Total Tamu</div>
        </div>
    </div>

    {{-- ── Filter & Search ── --}}
    <div class="card p-4 mb-5 flex flex-col sm:flex-row gap-3 items-center">
        <form action="{{ route('admin.dashboard') }}" method="GET" class="flex flex-wrap gap-3 items-center flex-1">
            <input type="text" name="search" placeholder="Cari nama…"
                   value="{{ request('search') }}"
                   class="form-input" style="max-width: 200px;" />

            <select name="filter" class="form-input" style="max-width: 160px;">
                <option value="">Semua</option>
                <option value="Hadir" {{ request('filter') === 'Hadir' ? 'selected' : '' }}>Hadir</option>
                <option value="Tidak Hadir" {{ request('filter') === 'Tidak Hadir' ? 'selected' : '' }}>Tidak Hadir</option>
            </select>

            <button type="submit"
                    class="px-4 py-2 text-xs tracking-widest uppercase rounded-lg text-white transition-colors"
                    style="background: var(--gold);">
                Cari
            </button>

            @if(request('search') || request('filter'))
            <a href="{{ route('admin.dashboard') }}" class="text-xs" style="color: var(--sage);">Reset</a>
            @endif
        </form>

        {{-- Hapus semua --}}
        @if($stats['total'] > 0)
        <form action="{{ route('admin.rsvp.destroyAll') }}" method="POST"
              onsubmit="return confirm('Yakin ingin menghapus SEMUA data RSVP? Tindakan ini tidak dapat dibatalkan!');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-danger">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6l-1 14H6L5 6"></path><path d="M10 11v6M14 11v6"></path><path d="M9 6V4h6v2"></path></svg>
                Hapus Semua
            </button>
        </form>
        @endif
    </div>

    {{-- ── Tabel RSVP ── --}}
    <div class="card overflow-hidden">
        @if($rsvps->count() > 0)
        <div style="overflow-x: auto;">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Kehadiran</th>
                        <th>Pax</th>
                        <th>Ucapan</th>
                        <th>Waktu</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rsvps as $i => $rsvp)
                    <tr>
                        <td style="color: var(--sage); font-size: 0.75rem;">
                            {{ $rsvps->firstItem() + $i }}
                        </td>
                        <td style="font-weight: 500; white-space: nowrap;">{{ $rsvp->nama }}</td>
                        <td>
                            @if($rsvp->kehadiran === 'Hadir')
                                <span class="badge-hadir">Hadir</span>
                            @else
                                <span class="badge-tidak">Tidak Hadir</span>
                            @endif
                        </td>
                        <td style="text-align: center;">
                            {{ $rsvp->kehadiran === 'Hadir' ? $rsvp->pax : '—' }}
                        </td>
                        <td style="max-width: 280px; color: #555; font-size: 0.8rem; line-height: 1.5;">
                            {{ Str::limit($rsvp->ucapan, 80) }}
                        </td>
                        <td style="white-space: nowrap; font-size: 0.75rem; color: var(--sage);">
                            {{ $rsvp->created_at->format('d M Y') }}<br>
                            {{ $rsvp->created_at->format('H:i') }} WIB
                        </td>
                        <td>
                            <form action="{{ route('admin.rsvp.destroy', $rsvp) }}" method="POST"
                                  onsubmit="return confirm('Hapus RSVP atas nama {{ addslashes($rsvp->nama) }}?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6l-1 14H6L5 6"></path></svg>
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($rsvps->hasPages())
        <div class="p-4 border-t" style="border-color: rgba(184,154,90,0.12);">
            {{ $rsvps->links() }}
        </div>
        @endif

        @else
        <div class="p-12 text-center">
            <p style="color: var(--sage); font-size: 0.9rem;">
                @if(request('search') || request('filter'))
                    Tidak ada data yang cocok dengan filter.
                @else
                    Belum ada data RSVP yang masuk.
                @endif
            </p>
        </div>
        @endif
    </div>

    <p class="text-center text-xs mt-6" style="color: var(--sage);">
        Menampilkan {{ $rsvps->firstItem() ?? 0 }}–{{ $rsvps->lastItem() ?? 0 }} dari {{ $rsvps->total() }} data
    </p>

</div>
</body>
</html>