// Script untuk menampilkan input NIDN atau NPM sesuai dengan pilihan role
document.getElementById('role').addEventListener('change', function() {
    var role = this.value;
    document.getElementById('posisi_field').style.display = 'none';
    document.getElementById('npm_field').style.display = 'none';
    document.getElementById('prodi_field').style.display = 'none';
    document.getElementById('fakultas_field').style.display = 'none';
    document.getElementById('instansi_field').style.display = 'none';
    
    if (role === 'admin') {
        document.getElementById('posisi_field').style.display = 'block';
        document.getElementById('instansi_field').style.display = 'block';
    } else if (role === 'operator') {
        document.getElementById('posisi_field').style.display = 'block';
        document.getElementById('instansi_field').style.display = 'block';
    } else if (role === 'mahasiswa') {
        document.getElementById('npm_field').style.display = 'block';
        document.getElementById('prodi_field').style.display = 'block';
        document.getElementById('fakultas_field').style.display = 'block';
    }
});

// Menambahkan event listener untuk semua elemen dengan kelas dropdown-toggle
document.querySelectorAll('.dropdown-toggle').forEach(item => {
    item.addEventListener('click', event => {
        event.preventDefault(); // Mencegah default behavior dari link
        const parent = item.closest('.dropdown'); // Mendapatkan elemen induk terdekat dengan kelas dropdown
        parent.classList.toggle('active'); // Menambahkan atau menghapus kelas active

        // Menutup semua dropdown lain yang tidak diklik
        document.querySelectorAll('.dropdown').forEach(dropdown => {
            if (dropdown !== parent) {
                dropdown.classList.remove('active');
            }
        });
    });
});

// Menambahkan event listener untuk mendeteksi klik di luar navbar
document.addEventListener('click', event => {
    if (!event.target.closest('.navbar-list')) {
        document.querySelectorAll('.dropdown').forEach(dropdown => {
            dropdown.classList.remove('active'); // Menutup semua dropdown jika klik di luar navbar
        });
    }
});
