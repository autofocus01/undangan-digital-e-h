const kehadiranSelect = document.getElementById('kehadiran');
const paxGroup = document.getElementById('pax-group');
 
if (kehadiranSelect && paxGroup) {
    kehadiranSelect.addEventListener('change', () => {
        paxGroup.style.display = kehadiranSelect.value === 'Hadir' ? 'block' : 'none';
    });
    // Run once on load
    paxGroup.style.display = kehadiranSelect.value === 'Hadir' ? 'block' : 'none';
}