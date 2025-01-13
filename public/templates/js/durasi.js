// Menghilangkan pesan setelah 30 detik
setTimeout(function () {
    const durasi = document.getElementById('durasi');
    if (durasi) {
        durasi.style.display = 'none';
    }
}, 5000); // 30 detik = 30000 milidetik