// ── Music player ──────────────────────────────────────────────
const audio = new Audio();
audio.src = '/assets/audio/Music_2.mp3';
audio.loop = true;
audio.volume = 0.5;

let musicPlaying = false;

const musicBtn = document.getElementById('music-btn');
const musicIcon = document.getElementById('music-icon');

if (musicBtn) {
    musicBtn.addEventListener('click', () => {
        if (musicPlaying) {
            audio.pause();
            musicIcon.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" width="20" height="20">
                    <path d="M8 5v14l11-7z"/>
                </svg>`;
        } else {
            audio.play().catch(() => {});
            musicIcon.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" width="20" height="20">
                    <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>
                </svg>`;
        }
        musicPlaying = !musicPlaying;
    });
}

// ── Countdown timer ────────────────────────────────────────────
function updateCountdown() {
    const weddingDate = new Date(document.getElementById('wedding-date')?.dataset.date);
    if (!weddingDate || isNaN(weddingDate)) return;

    const now = new Date();
    const diff = weddingDate - now;

    if (diff <= 0) {
        document.getElementById('countdown-container')?.remove();
        return;
    }

    const days    = Math.floor(diff / (1000 * 60 * 60 * 24));
    const hours   = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((diff % (1000 * 60)) / 1000);

    const el = (id) => document.getElementById(id);
    if (el('cd-days'))    el('cd-days').textContent    = String(days).padStart(2, '0');
    if (el('cd-hours'))   el('cd-hours').textContent   = String(hours).padStart(2, '0');
    if (el('cd-minutes')) el('cd-minutes').textContent = String(minutes).padStart(2, '0');
    if (el('cd-seconds')) el('cd-seconds').textContent = String(seconds).padStart(2, '0');
}

updateCountdown();
setInterval(updateCountdown, 1000);

// ── Scroll reveal ──────────────────────────────────────────────
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('revealed');
            observer.unobserve(entry.target);
        }
    });
}, { threshold: 0.12 });

document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

// ── RSVP: Toggle pax field ─────────────────────────────────────
const kehadiranSelect = document.getElementById('kehadiran');
const paxGroup = document.getElementById('pax-group');

if (kehadiranSelect && paxGroup) {
    kehadiranSelect.addEventListener('change', () => {
        paxGroup.style.display = kehadiranSelect.value === 'Hadir' ? 'block' : 'none';
    });
    // Run once on load
    paxGroup.style.display = kehadiranSelect.value === 'Hadir' ? 'block' : 'none';
}