<?php
include 'config/app.php';

// 1. Ambil ID dari URL dan pastikan bertipe integer untuk keamanan
$id_pasien = (int)$_GET['id'];

// 2. Jalankan query hapus langsung menggunakan mysqli_query
// Pastikan nama kolom 'id_pasien' dan nama tabel 'pasien' sesuai dengan phpMyAdmin
$query = "DELETE FROM pasien WHERE id_pasien = $id_pasien";

if (mysqli_query($db, $query)) {
    echo "<script>
            alert('Data Pasien Berhasil Dihapus');
            document.location.href = 'home.php'; // Arahkan kembali ke halaman utama
          </script>";
} else {
    echo "<script>
            alert('Data Gagal Dihapus: " . mysqli_error($db) . "');
            document.location.href = 'home.php';
          </script>";
}
?>