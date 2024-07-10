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