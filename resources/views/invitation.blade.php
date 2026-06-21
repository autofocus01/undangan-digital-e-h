@extends('layouts.app')

@section('title', 'Undangan Pernikahan — Edi & Husna')

@section('content')

{{-- ══════════════════════════════════
     COVER / SPLASH — klik untuk buka
═══════════════════════════════════ --}}
<div id="splash"
     style="position:fixed;inset:0;z-index:9999;background:linear-gradient(160deg,#1a1209 0%,#2d1f0e 50%,#1a1209 100%);display:flex;flex-direction:column;align-items:center;justify-content:center;cursor:pointer;"
     onclick="openInvitation()">

    <svg class="absolute top-0 left-0 w-32 h-32 opacity-20" viewBox="0 0 120 120" fill="none">
        <path d="M10 10 L10 60 Q10 10 60 10 Z" stroke="#b89a5a" stroke-width="0.8" fill="none"/>
        <path d="M10 10 L10 40 Q10 10 40 10" stroke="#b89a5a" stroke-width="0.4" fill="none" opacity="0.5"/>
    </svg>
    <svg class="absolute bottom-0 right-0 w-32 h-32 opacity-20 rotate-180" viewBox="0 0 120 120" fill="none">
        <path d="M10 10 L10 60 Q10 10 60 10 Z" stroke="#b89a5a" stroke-width="0.8" fill="none"/>
        <path d="M10 10 L10 40 Q10 10 40 10" stroke="#b89a5a" stroke-width="0.4" fill="none" opacity="0.5"/>
    </svg>

    <p class="font-display italic text-sm tracking-widest mb-6" style="color:rgba(184,154,90,0.7);">
        Bismillahirrahmanirrahim
    </p>
    <h1 class="font-display text-5xl sm:text-6xl text-white font-light text-center leading-tight mb-2">
        Edi<br><span style="color:var(--gold-light);">&</span><br>Husna
    </h1>
    <p class="mt-6 text-white/50 text-xs tracking-widest uppercase">Undangan Pernikahan</p>

    <div class="mt-10 flex flex-col items-center gap-2">
        <div style="width:42px;height:42px;border-radius:50%;background:var(--gold);display:flex;align-items:center;justify-content:center;">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" viewBox="0 0 24 24"><path d="M3 9v6h4l5 5V4L7 9H3zm13.5 3A4.5 4.5 0 0 0 14 7.97v8.05c1.48-.73 2.5-2.25 2.5-4.02z"/></svg>
        </div>
        <p class="text-white/40 text-xs tracking-widest mt-1">Ketuk untuk membuka undangan</p>
    </div>
</div>

{{-- ══════════════════════════════════
     KONTEN UTAMA (tersembunyi dulu)
═══════════════════════════════════ --}}
<div id="main-content" style="display:none;">

{{-- ── COVER SECTION ── --}}
<section id="cover">
    <svg class="absolute top-0 left-0 w-32 h-32 opacity-20" viewBox="0 0 120 120" fill="none">
        <path d="M10 10 L10 60 Q10 10 60 10 Z" stroke="#b89a5a" stroke-width="0.8" fill="none"/>
    </svg>
    <svg class="absolute bottom-0 right-0 w-32 h-32 opacity-20 rotate-180" viewBox="0 0 120 120" fill="none">
        <path d="M10 10 L10 60 Q10 10 60 10 Z" stroke="#b89a5a" stroke-width="0.8" fill="none"/>
    </svg>

    <div class="relative z-10 text-center px-6 max-w-md mx-auto">
        <p class="font-display italic text-amber-300/70 text-sm tracking-widest mb-6 fade-up">
            Bismillahirrahmanirrahim
        </p>
        <p class="text-white/50 text-xs tracking-[0.25em] uppercase mb-4 fade-up delay-1">Undangan Pernikahan</p>
        <div class="mb-2 fade-up delay-2">
            <h1 class="font-display text-5xl sm:text-6xl text-white font-light leading-tight">
                Edi<br><span style="color:var(--gold-light);">&</span><br>Husna
            </h1>
        </div>
        <div class="my-6 fade-up delay-3">
            <svg width="120" height="12" viewBox="0 0 120 12" fill="none" class="mx-auto">
                <line x1="0" y1="6" x2="48" y2="6" stroke="#b89a5a" stroke-width="0.5"/>
                <circle cx="60" cy="6" r="3" fill="none" stroke="#b89a5a" stroke-width="0.8"/>
                <line x1="72" y1="6" x2="120" y2="6" stroke="#b89a5a" stroke-width="0.5"/>
            </svg>
        </div>
        <p class="text-white/60 font-display italic text-lg fade-up delay-3">Minggu, 5 Juli 2026</p>
        <div class="mt-10 fade-up delay-4">
            <a href="#bismillah"
               class="inline-block px-8 py-3 border border-amber-400/50 text-amber-300 text-xs tracking-widest uppercase hover:bg-amber-400/10 transition-colors rounded-full">
                Lihat Detail
            </a>
        </div>
    </div>
</section>

{{-- ── PEMBUKAAN ── --}}
<section id="bismillah" class="py-20 px-6 max-w-lg mx-auto text-center">
    <p class="font-display text-3xl text-amber-700 mb-6 reveal">﷽</p>
    <p class="reveal" style="font-family:'Cormorant Garamond',serif;font-style:italic;font-size:1rem;line-height:1.9;color:#57534e;">
        "Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang."
    </p>
    <p class="mt-3 text-xs tracking-widest text-stone-400 reveal">— QS. Ar-Rum: 21</p>
    <div class="divider my-10 reveal"></div>
    <p class="text-stone-600 text-sm leading-relaxed reveal">
        Dengan memohon rahmat dan ridha Allah Subhanahu wa Ta'ala, kami mengundang Bapak/Ibu/Saudara/i untuk hadir dan memberikan doa restu pada pernikahan kami.
    </p>
</section>

{{-- ── MEMPELAI ── --}}
<section class="py-16 px-6" style="background:linear-gradient(to bottom,var(--cream) 0%,#f0ebe0 100%);">
    <div class="max-w-lg mx-auto text-center">
        <p class="text-xs tracking-widest uppercase text-stone-400 mb-8 reveal">Mempelai</p>

        <div class="mb-10 reveal">
            <h2 class="font-display text-4xl font-light" style="color:var(--brown);">Edi Sudrajat</h2>
            <p class="mt-1 text-sm" style="color:var(--sage);">Putra terakhir dari</p>
            <p class="text-stone-600 text-sm mt-1">Bapak Oo Abdurachman &amp; Ibu Euis Arneti</p>
        </div>

        <div class="reveal">
            <p class="font-display text-5xl mb-10" style="color:var(--gold);">&</p>
        </div>

        <div class="reveal">
            <h2 class="font-display text-4xl font-light" style="color:var(--brown);">Husna Hakimah</h2>
            <p class="mt-1 text-sm" style="color:var(--sage);">Putri pertama dari</p>
            <p class="text-stone-600 text-sm mt-1">Bapak Nana Mulyana &amp; Ibu Ida Mutiah</p>
        </div>
    </div>
</section>

{{-- ── TANGGAL & COUNTDOWN ── --}}
<section class="py-20 px-6 max-w-lg mx-auto text-center">
    <p class="text-xs tracking-widest uppercase text-stone-400 mb-8 reveal">Hari Bahagia Kami</p>

    <div id="wedding-date" data-date="2026-07-05T08:00:00" class="reveal">
        <div id="countdown-container" class="flex justify-center gap-4 mb-12">
            <div class="countdown-item"><span class="countdown-number" id="cd-days">00</span><span class="countdown-label">Hari</span></div>
            <div class="countdown-item"><span class="countdown-number" id="cd-hours">00</span><span class="countdown-label">Jam</span></div>
            <div class="countdown-item"><span class="countdown-number" id="cd-minutes">00</span><span class="countdown-label">Menit</span></div>
            <div class="countdown-item"><span class="countdown-number" id="cd-seconds">00</span><span class="countdown-label">Detik</span></div>
        </div>
    </div>

    <div class="card p-6 mb-6 reveal">
        <p class="text-xs tracking-widest uppercase mb-1" style="color:var(--sage);">Akad Nikah</p>
        <p class="font-display text-2xl" style="color:var(--brown);">Minggu, 5 Juli 2026</p>
        <p class="text-sm text-stone-500 mt-1">Pukul 08.00 - 10.00 WIB</p>
    </div>

    <div class="card p-6 reveal">
        <p class="text-xs tracking-widest uppercase mb-1" style="color:var(--sage);">Resepsi</p>
        <p class="font-display text-2xl" style="color:var(--brown);">Minggu, 5 Juli 2026</p>
        <p class="text-sm text-stone-500 mt-1">Pukul 11.00 — 16.00 WIB</p>
    </div>
</section>

{{-- ══════════════════════════════════
     LOKASI + MAPS EMBED + NAVIGASI
═══════════════════════════════════ --}}
<section class="py-16 px-6" style="background-color:#f0ebe0;">
    <div class="max-w-xl mx-auto">
        <p class="text-xs tracking-widest uppercase text-stone-400 mb-8 text-center reveal">Lokasi Acara</p>

        <div class="card overflow-hidden reveal">
            {{-- Nama & alamat --}}
            <div class="p-6 text-center">
                <svg class="mx-auto mb-3" xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#b89a5a" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/>
                </svg>
                <h3 class="font-display text-xl mb-1" style="color:var(--brown);">Nama Gedung / Tempat</h3>
                <p class="text-sm text-stone-500 leading-relaxed">
                    Kp. Cigugur RT/RW.01/05,<br>Ds. Ciheulang, Kec. Ciparay, Kab. Bandung<br>Jawa Barat, Indonesia
                </p>
            </div>

            {{-- Google Maps Embed --}}
            {{-- GANTI src iframe dengan link embed lokasi Anda:
                 Buka maps.google.com → cari lokasi → Share → Embed a map → salin src --}}
            <div style="width:100%;height:260px;background:#e8e4dc;position:relative;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3959.883312744304!2d107.67920307499753!3d-7.0229999929787175!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zN8KwMDEnMjIuOCJTIDEwN8KwNDAnNTQuNCJF!5e0!3m2!1sid!2sid!4v1782011160221!5m2!1sid!2sid" 
                    width="570" 
                    height="260" 
                    style="border:0;display:block;"
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

            {{-- Tombol navigasi --}}
            <div class="p-4 flex gap-3 justify-center flex-wrap" style="border-top:1px solid rgba(184,154,90,0.15);">
                {{-- Google Maps --}}
                <a href="https://maps.app.goo.gl/Xtn7omzjaa5F7FEL9"
                   target="_blank"
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full text-xs tracking-widest uppercase transition-colors"
                   style="border:1px solid var(--gold);color:var(--gold);"
                   onmouseover="this.style.background='var(--gold)';this.style.color='#fff';"
                   onmouseout="this.style.background='';this.style.color='var(--gold)';">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/>
                    </svg>
                    Google Maps
                </a>

            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════
     KADO DIGITAL
═══════════════════════════════════ --}}
<section class="py-20 px-6 max-w-lg mx-auto">
    <p class="text-xs tracking-widest uppercase text-stone-400 mb-8 text-center reveal">Kado Digital</p>

    <div class="text-center mb-8 reveal">
        <p class="text-stone-500 text-sm leading-relaxed">
            Doa restu Anda adalah hadiah terbesar bagi kami. Namun jika Anda ingin memberikan kado, kami menerima melalui transfer rekening berikut.
        </p>
    </div>

    {{-- Rekening 1 --}}
    <div class="card p-6 mb-4 reveal">
        <div class="flex items-center justify-between mb-3">
            <div>
                <p class="text-xs tracking-widest uppercase mb-0.5" style="color:var(--sage);">Bank BCA</p>
                <p class="font-display text-2xl" style="color:var(--brown);">3460630133</p>
                <p class="text-sm text-stone-500 mt-0.5">a.n. Edi Sudrajat</p>
            </div>
            {{-- Logo BCA placeholder --}}
            <div style="width:52px;height:52px;border-radius:0.5rem;background:linear-gradient(135deg,#0066ae,#00a3e0);display:flex;align-items:center;justify-content:center;">
                <span style="color:#fff;font-weight:700;font-size:0.75rem;letter-spacing:0.05em;">BCA</span>
            </div>
        </div>
        <button onclick="copyToClipboard('3460630133', this)"
                class="w-full py-2 text-xs tracking-widest uppercase rounded-lg transition-colors"
                style="border:1px solid var(--gold);color:var(--gold);"
                onmouseover="this.style.background='var(--gold)';this.style.color='#fff';"
                onmouseout="if(!this.dataset.copied){this.style.background='';this.style.color='var(--gold)';}">
            Salin Nomor Rekening
        </button>
    </div>

    {{-- Rekening 2 --}}
    <div class="card p-6 reveal">
        <div class="flex items-center justify-between mb-3">
            <div>
                <p class="text-xs tracking-widest uppercase mb-0.5" style="color:var(--sage);">Dana</p>
                <p class="font-display text-2xl" style="color:var(--brown);">081395853423</p>
                <p class="text-sm text-stone-500 mt-0.5">a.n. Husna Hakimah</p>
            </div>
            {{-- Logo Dana placeholder --}}
            <div style="width:52px;height:52px;border-radius:0.5rem;background:linear-gradient(135deg,#0066ae,#00a3e0);display:flex;align-items:center;justify-content:center;">
                <span style="color:#fff;font-weight:700;font-size:0.75rem;letter-spacing:0.05em;">DANA</span>
            </div>
        </div>
        <button onclick="copyToClipboard('081395853423', this)"
                class="w-full py-2 text-xs tracking-widest uppercase rounded-lg transition-colors"
                style="border:1px solid var(--gold);color:var(--gold);"
                onmouseover="this.style.background='var(--gold)';this.style.color='#fff';"
                onmouseout="if(!this.dataset.copied){this.style.background='';this.style.color='var(--gold)';}">
            Salin Nomor Rekening
        </button>
    </div>
</section>

{{-- ── PENUTUP & CTA RSVP ── --}}
<section class="py-20 px-6 max-w-lg mx-auto text-center" style="background-color:#f0ebe0;">
    <div class="divider mb-10 reveal"></div>
    <p class="font-display italic text-2xl reveal" style="color:var(--brown);">
        Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir memberikan doa restu.
    </p>
    <div class="mt-8 reveal">
    <a href="https://youtu.be/XKwlZ-M4QW0?si=DtVaTipD3_R8omdw"
       target="_blank"
       rel="noopener noreferrer"
       aria-label="Tonton Live Streaming di YouTube"
       style="
           display: inline-flex;
           align-items: center;
           justify-content: center;
           width: 52px;
           height: 52px;
           border-radius: 50%;
           background: #FF0000;
           transition: transform 0.2s, box-shadow 0.2s;
           box-shadow: 0 4px 16px rgba(255,0,0,0.3);
       "
       onmouseover="this.style.transform='scale(1.1)';this.style.boxShadow='0 6px 24px rgba(255,0,0,0.45)';"
       onmouseout="this.style.transform='scale(1)';this.style.boxShadow='0 4px 16px rgba(255,0,0,0.3)';">
 
        {{-- Ikon play YouTube --}}
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="white">
            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
        </svg>
    </a>
     <p class="font-display text-2xl mt-1 reveal" style="color:var(--gold);">Yt by Al Istihdhor</p>
</div>
    <p class="mt-6 text-sm text-stone-500 reveal">Kami yang berbahagia,</p>
    <p class="font-display text-2xl mt-1 reveal" style="color:var(--gold);">Edi &amp; Husna</p>
    <div class="mt-10 reveal">
        <a href="{{ route('rsvp.index') }}"
           class="inline-block px-8 py-3 text-white text-xs tracking-widest uppercase rounded-full transition-all"
           style="background:var(--gold);"
           onmouseover="this.style.background='var(--brown)';"
           onmouseout="this.style.background='var(--gold)';">
            RSVP &amp; Ucapan
        </a>
    </div>
</section>

</div>{{-- end #main-content --}}

{{-- ══════════════════════════════════
     AUDIO (autoplay setelah klik splash)
═══════════════════════════════════ --}}
<audio id="bg-music" loop>
    <source src="/assets/audio/Music_2.mp3" type="audio/mpeg">
</audio>

<script>
// ── Buka undangan + autoplay musik ────────────────────────────
function openInvitation() {
    // Sembunyikan splash
    document.getElementById('splash').style.display = 'none';
    // Tampilkan konten
    document.getElementById('main-content').style.display = 'block';

    // Autoplay musik (bisa jalan karena dipicu interaksi user)
    const music = document.getElementById('bg-music');
    music.volume = 0.5;
    music.play().catch(() => {});

    // Update icon tombol musik
    const icon = document.getElementById('music-icon');
    if (icon) {
        icon.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" width="20" height="20"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/></svg>`;
    }
    window._musicPlaying = true;

    // Jalankan scroll reveal
    initReveal();
}

// ── Scroll reveal ──────────────────────────────────────────────
function initReveal() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                e.target.classList.add('revealed');
                observer.unobserve(e.target);
            }
        });
    }, { threshold: 0.12 });
    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
}

// ── Tombol musik (toggle) ──────────────────────────────────────
window._musicPlaying = false;
const musicBtn = document.getElementById('music-btn');
if (musicBtn) {
    musicBtn.addEventListener('click', () => {
        const music = document.getElementById('bg-music');
        const icon  = document.getElementById('music-icon');
        if (window._musicPlaying) {
            music.pause();
            icon.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" width="20" height="20"><path d="M8 5v14l11-7z"/></svg>`;
        } else {
            music.play().catch(() => {});
            icon.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" width="20" height="20"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/></svg>`;
        }
        window._musicPlaying = !window._musicPlaying;
    });
}

// ── Countdown ──────────────────────────────────────────────────
function updateCountdown() {
    const el = document.getElementById('wedding-date');
    if (!el) return;
    const target = new Date(el.dataset.date);
    const diff   = target - new Date();
    if (diff <= 0) { document.getElementById('countdown-container')?.remove(); return; }
    const pad = n => String(n).padStart(2,'0');
    document.getElementById('cd-days').textContent    = pad(Math.floor(diff/864e5));
    document.getElementById('cd-hours').textContent   = pad(Math.floor(diff%864e5/36e5));
    document.getElementById('cd-minutes').textContent = pad(Math.floor(diff%36e5/6e4));
    document.getElementById('cd-seconds').textContent = pad(Math.floor(diff%6e4/1e3));
}
updateCountdown();
setInterval(updateCountdown, 1000);

// ── Salin nomor rekening ───────────────────────────────────────
function copyToClipboard(text, btn) {
    navigator.clipboard.writeText(text).then(() => {
        const orig = btn.textContent;
        btn.textContent = '✓ Tersalin!';
        btn.style.background = 'var(--gold)';
        btn.style.color = '#fff';
        btn.dataset.copied = '1';
        setTimeout(() => {
            btn.textContent = orig;
            btn.style.background = '';
            btn.style.color = 'var(--gold)';
            delete btn.dataset.copied;
        }, 2000);
    });
}
</script>

@endsection