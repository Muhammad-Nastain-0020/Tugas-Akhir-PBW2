// // Call the dataTables jQuery plugin
// $(document).ready(function() {
//   $('#dataTable').DataTable();
// });

// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
    "lengthMenu": [ [5, 10, 50, 100, -1], [5, 10, 50, 100, "Semua"] ], // Menambahkan opsi jumlah data per halaman
    "pageLength": 10, // Nilai default untuk data per halaman
    "responsive": true, // Agar tabel responsif di berbagai ukuran layar
  });
});
