//  Table scroll + buttons
$(document).ready(function () {
    var table = $('#table-sb').DataTable({
        stateSave: true,
        responsive: true,
        colReorder: true,
        paging: true,
        dom: 
        "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
        "<'row'<'col-md-12'tr>>" +
        "<'row'<'col-md-5'i><'col-md-7'p>>",
        buttons: [
            'copy', 'excel', 'pdf', 'print', 'colvis'
        ]
    });
});

//  Table scroll + buttons
$(document).ready(function () {
    var table = $('#table-s').DataTable({
        stateSave: false,
        responsive: true,
        colReorder: false,
        paging: false,
        dom: 
        "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
        "<'row'<'col-md-12'tr>>" +
        "<'row'<'col-md-5'i><'col-md-7'p>>",
        buttons: [
            'copy', 'excel', 'pdf', 'colvis'
        ]
    });
});
    // Ambil tahun saat ini
    var tahunSekarang = new Date().getFullYear();
    // Buat teks "Tahun {tahun}"
    var teksTahun = "Tahun " + tahunSekarang;
    // Masukkan teks ke dalam elemen dengan id "tahun"
    document.getElementById("tahun").innerText = teksTahun;
