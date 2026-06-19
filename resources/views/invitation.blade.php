@extends('layouts.app')

@section('title', 'Undangan Pernikahan — E&H')

@section('content')

{{-- ══════════════════════════════════
     COVER
═══════════════════════════════════ --}}
<section id="cover">
    {{-- Ornamen sudut --}}
    <svg class="absolute top-0 left-0 w-32 h-32 opacity-20" viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M10 10 L10 60 Q10 10 60 10 Z" stroke="#b89a5a" stroke-width="0.8" fill="none"/>
        <path d="M10 10 L10 40 Q10 10 40 10" stroke="#b89a5a" stroke-width="0.4" fill="none" opacity="0.5"/>
    </svg>
    <svg class="absolute bottom-0 right-0 w-32 h-32 opacity-20 rotate-180" viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M10 10 L10 60 Q10 10 60 10 Z" stroke="#b89a5a" stroke-width="0.8" fill="none"/>
        <path d="M10 10 L10 40 Q10 10 40 10" stroke="#b89a5a" stroke-width="0.4" fill="none" opacity="0.5"/>
    </svg>

    <div class="relative z-10 text-center px-6 max-w-md mx-auto">
        <p class="font-display italic text-amber-300/70 text-sm tracking-widest mb-6 fade-up">
            Bismillahirrahmanirrahim
        </p>

        <p class="text-white/50 text-xs tracking-[0.25em] uppercase mb-4 fade-up delay-1">
            Undangan Pernikahan
        </p>

        <div class="mb-2 fade-up delay-2">
            <h1 class="font-display text-5xl sm:text-6xl text-white font-light leading-tight">
                Edi<br><span style="color: var(--gold-light);">&</span><br>Husna
            </h1>
        </div>

        <div class="my-6 fade-up delay-3">
            <svg width="120" height="12" viewBox="0 0 120 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="mx-auto">
                <line x1="0" y1="6" x2="48" y2="6" stroke="#b89a5a" stroke-width="0.5"/>
                <circle cx="60" cy="6" r="3" fill="none" stroke="#b89a5a" stroke-width="0.8"/>
                <line x1="72" y1="6" x2="120" y2="6" stroke="#b89a5a" stroke-width="0.5"/>
            </svg>
        </div>

        <p class="text-white/60 font-display italic text-lg fade-up delay-3">
            Minggu, 5 Juli 2026
        </p>

        <div class="mt-10 fade-up delay-4">
            <a href="#bismillah"
               class="inline-block px-8 py-3 border border-amber-400/50 text-amber-300 text-xs tracking-widest uppercase hover:bg-amber-400/10 transition-colors rounded-full">
                Buka Undangan
            </a>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════
     PEMBUKAAN
═══════════════════════════════════ --}}
<section id="bismillah" class="py-20 px-6 max-w-lg mx-auto text-center">
    <p class="font-display text-3xl text-amber-700 mb-6 reveal">﷽</p>

    <p class="text-sm leading-loose text-stone-600 reveal" style="font-family: 'Cormorant Garamond', serif; font-style: italic; font-size: 1rem; line-height: 1.9;">
        "Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang."
    </p>
    <p class="mt-3 text-xs tracking-widest text-stone-400 reveal">— QS. Ar-Rum: 21</p>

    <div class="divider my-10 reveal"></div>

    <p class="text-stone-600 text-sm leading-relaxed reveal">
        Dengan memohon rahmat dan ridha Allah Subhanahu wa Ta'ala, kami mengundang Bapak/Ibu/Saudara/i untuk hadir dan memberikan doa restu pada pernikahan kami.
    </p>
</section>

{{-- ══════════════════════════════════
     MEMPELAI
═══════════════════════════════════ --}}
<section class="py-16 px-6" style="background: linear-gradient(to bottom, var(--cream) 0%, #f0ebe0 100%);">
    <div class="max-w-lg mx-auto text-center">
        <p class="text-xs tracking-widest uppercase text-stone-400 mb-8 reveal">Mempelai</p>

        {{-- Mempelai Pria --}}
        <div class="mb-10 reveal">
            <h2 class="font-display text-4xl font-light" style="color: var(--brown);">
                Edi Sudrajat
            </h2>
            <p class="mt-1 text-sm" style="color: var(--sage);">Putra terakhir dari</p>
            <p class="text-stone-600 text-sm mt-1">Bapak Oo Abdurachman &amp; Ibu Euis Arneti</p>
        </div>

        <div class="reveal">
            <svg width="60" height="40" viewBox="0 0 60 40" class="mx-auto mb-10" fill="none">
                <text x="50%" y="60%" dominant-baseline="middle" text-anchor="middle"
                      font-family="Cormorant Garamond, serif" font-size="32" fill="#b89a5a" font-style="italic">&amp;</text>
            </svg>
        </div>

        {{-- Mempelai Wanita --}}
        <div class="reveal">
            <h2 class="font-display text-4xl font-light" style="color: var(--brown);">
                Husna Hakimah
            </h2>
            <p class="mt-1 text-sm" style="color: var(--sage);">Putri pertama dari</p>
            <p class="text-stone-600 text-sm mt-1">Bapak Nana Mulyana &amp; Ibu Ida Mutiah</p>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════
     TANGGAL & WAKTU
═══════════════════════════════════ --}}
<section class="py-20 px-6 max-w-lg mx-auto text-center">
    <p class="text-xs tracking-widest uppercase text-stone-400 mb-8 reveal">Hari Bahagia Kami</p>

    {{-- Countdown --}}
    <div id="wedding-date" data-date="2026-07-05T08:00:00" class="reveal">
        <div id="countdown-container" class="flex justify-center gap-4 mb-12">
            <div class="countdown-item">
                <span class="countdown-number" id="cd-days">00</span>
                <span class="countdown-label">Hari</span>
            </div>
            <div class="countdown-item">
                <span class="countdown-number" id="cd-hours">00</span>
                <span class="countdown-label">Jam</span>
            </div>
            <div class="countdown-item">
                <span class="countdown-number" id="cd-minutes">00</span>
                <span class="countdown-label">Menit</span>
            </div>
            <div class="countdown-item">
                <span class="countdown-number" id="cd-seconds">00</span>
                <span class="countdown-label">Detik</span>
            </div>
        </div>
    </div>

    {{-- Akad --}}
    <div class="card p-6 mb-6 reveal">
        <p class="text-xs tracking-widest uppercase mb-1" style="color: var(--sage);">Akad Nikah</p>
        <p class="font-display text-2xl" style="color: var(--brown);">Minggu, 5 Juli 2026</p>
        <p class="text-sm text-stone-500 mt-1">Pukul 08.00 — 10.00 WIB</p>
    </div>

    {{-- Resepsi --}}
    <div class="card p-6 reveal">
        <p class="text-xs tracking-widest uppercase mb-1" style="color: var(--sage);">Resepsi</p>
        <p class="font-display text-2xl" style="color: var(--brown);">Minggu, 5 Juli 2026</p>
        <p class="text-sm text-stone-500 mt-1">Pukul 11.00 — 16.00 WIB</p>
    </div>
</section>

{{-- ══════════════════════════════════
     LOKASI
═══════════════════════════════════ --}}
<section class="py-16 px-6" style="background-color: #f0ebe0;">
    <div class="max-w-lg mx-auto text-center">
        <p class="text-xs tracking-widest uppercase text-stone-400 mb-8 reveal">Lokasi</p>

        <div class="card p-8 reveal">
            <svg class="mx-auto mb-4" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#b89a5a" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                <circle cx="12" cy="10" r="3"></circle>
            </svg>
            <h3 class="font-display text-xl mb-1" style="color: var(--brown);">Nama Gedung / Tempat</h3>
            <p class="text-sm text-stone-500 leading-relaxed">
                Kp. Cigugur RT/RW.01/05,<br>Ds. Ciheulang,<br>Kec. Ciparay
            </p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3959.883312744304!2d107.67920307499753!3d-7.0229999929787175!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zN8KwMDEnMjIuOCJTIDEwN8KwNDAnNTQuNCJF!5e0!3m2!1sid!2sid!4v1781838108776!5m2!1sid!2sid" 
                width="450" height="450" style="border:0;" allowfullscreen="" 
                loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
            <a href="https://goo.gl/maps/geERJR93fEBEJtsE6?g_st=aw"
               target="_blank"
               class="inline-block mt-5 px-6 py-2 text-xs tracking-widest uppercase border rounded-full transition-colors"
               style="border-color: var(--gold); color: var(--gold);"
               onmouseover="this.style.background='var(--gold)'; this.style.color='#fff';"
               onmouseout="this.style.background=''; this.style.color='var(--gold)';">
                Buka Maps
            </a>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════
     PENUTUP / CTA KE RSVP
═══════════════════════════════════ --}}
<section class="py-20 px-6 max-w-lg mx-auto text-center">
    <div class="divider mb-10 reveal"></div>

    <p class="font-display italic text-2xl reveal" style="color: var(--brown);">
        Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir memberikan doa restu.
    </p>

    <p class="mt-6 text-sm text-stone-500 reveal">
        Kami yang berbahagia,
    </p>
    <p class="font-display text-2xl mt-1 reveal" style="color: var(--gold);">
        Edi &amp; Husna
    </p>

    <div class="mt-10 reveal">
        <a href="{{ route('rsvp.index') }}"
           class="inline-block px-8 py-3 text-white text-xs tracking-widest uppercase rounded-full transition-all"
           style="background: var(--gold);"
           onmouseover="this.style.background='var(--brown)';"
           onmouseout="this.style.background='var(--gold)';">
            RSVP &amp; Ucapan
        </a>
    </div>
</section>

@endsection