@extends('layouts.app')

@section('title', 'RSVP & Ucapan — Undangan Pernikahan')

@section('content')

<div style="min-height: 100svh; background-color: var(--cream);">

    {{-- ── Header ── --}}
    <header class="text-center py-14 px-6">
        <a href="{{ route('invitation') }}" class="inline-flex items-center gap-2 text-xs tracking-widest uppercase mb-8"
           style="color: var(--sage);">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M19 12H5M12 5l-7 7 7 7"/>
            </svg>
            Kembali ke Undangan
        </a>

        <p class="text-xs tracking-widest uppercase mb-3" style="color: var(--sage);">Konfirmasi Kehadiran</p>
        <h1 class="font-display text-4xl font-light" style="color: var(--brown);">RSVP &amp; Ucapan</h1>

        <div class="divider my-6 max-w-xs mx-auto"></div>
    </header>

    <div class="max-w-xl mx-auto px-6 pb-20">

        {{-- ── Success message ── --}}
        @if(session('success'))
        <div class="mb-8 p-4 rounded-xl text-sm text-center" style="background: rgba(138,158,140,0.12); border: 1px solid rgba(138,158,140,0.3); color: var(--brown);">
            {{ session('success') }}
        </div>
        @endif

        {{-- ── Formulir RSVP ── --}}
        <div class="card p-6 mb-10">
            <p class="text-xs tracking-widest uppercase mb-5" style="color: var(--sage);">Isi Formulir</p>

            <form action="{{ route('rsvp.store') }}" method="POST" novalidate>
                @csrf

                {{-- Nama --}}
                <div class="mb-4">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" class="form-input @error('nama') border-red-400 @enderror"
                           placeholder="Nama Anda" value="{{ old('nama') }}" />
                    @error('nama')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Kehadiran --}}
                <div class="mb-4">
                    <label for="kehadiran" class="form-label">Konfirmasi Kehadiran</label>
                    <select id="kehadiran" name="kehadiran" class="form-input @error('kehadiran') border-red-400 @enderror">
                        <option value="">-- Pilih --</option>
                        <option value="Hadir" {{ old('kehadiran') === 'Hadir' ? 'selected' : '' }}>Hadir</option>
                        <option value="Tidak Hadir" {{ old('kehadiran') === 'Tidak Hadir' ? 'selected' : '' }}>Tidak Hadir</option>
                    </select>
                    @error('kehadiran')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Jumlah tamu (tampil hanya jika Hadir) --}}
                <div id="pax-group" class="mb-4" style="display: none;">
                    <label for="pax" class="form-label">Jumlah Tamu (termasuk Anda)</label>
                    <input type="number" id="pax" name="pax" min="1" max="10"
                           class="form-input @error('pax') border-red-400 @enderror"
                           placeholder="1" value="{{ old('pax', 1) }}" />
                    @error('pax')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Ucapan --}}
                <div class="mb-6">
                    <label for="ucapan" class="form-label">Ucapan &amp; Doa</label>
                    <textarea id="ucapan" name="ucapan" rows="4"
                              class="form-input @error('ucapan') border-red-400 @enderror"
                              placeholder="Tuliskan ucapan dan doa tulus Anda untuk kedua mempelai…"
                              maxlength="500">{{ old('ucapan') }}</textarea>
                    @error('ucapan')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                        class="w-full py-3 text-white text-xs tracking-widest uppercase rounded-lg transition-colors"
                        style="background: var(--gold);"
                        onmouseover="this.style.background='var(--brown)';"
                        onmouseout="this.style.background='var(--gold)';">
                    Kirim RSVP
                </button>
            </form>
        </div>

        {{-- ── Daftar ucapan ── --}}
        @if($rsvps->count() > 0)
        <div>
            <p class="text-xs tracking-widest uppercase mb-5 text-center" style="color: var(--sage);">
                Ucapan &amp; Doa ({{ $rsvps->count() }})
            </p>

            <div class="space-y-4">
                @foreach($rsvps as $rsvp)
                <div class="ucapan-card">
                    <div class="flex items-center justify-between mb-1">
                        <span class="font-medium text-sm" style="color: var(--brown);">
                            {{ $rsvp->nama }}
                        </span>
                        <span class="text-xs px-2 py-0.5 rounded-full"
                              style="background: {{ $rsvp->kehadiran === 'Hadir' ? 'rgba(138,158,140,0.15)' : 'rgba(200,100,100,0.1)' }};
                                     color: {{ $rsvp->kehadiran === 'Hadir' ? 'var(--sage)' : '#c06060' }};">
                            {{ $rsvp->kehadiran }}
                            @if($rsvp->kehadiran === 'Hadir' && $rsvp->pax > 0)
                                ({{ $rsvp->pax }} orang)
                            @endif
                        </span>
                    </div>
                    <p class="text-sm text-stone-600 leading-relaxed">{{ $rsvp->ucapan }}</p>
                    <p class="text-xs text-stone-400 mt-1">{{ $rsvp->created_at->diffForHumans() }}</p>
                </div>
                @endforeach
            </div>
        </div>
        @else
        <p class="text-center text-sm text-stone-400">Belum ada ucapan. Jadilah yang pertama! 🌸</p>
        @endif

    </div>
</div>

@endsection