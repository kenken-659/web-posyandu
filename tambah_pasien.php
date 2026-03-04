<?php
include 'config/app.php';

if (isset($_POST['tambah'])){
    // Ambil data dari form dan bersihkan
    $nama_pasien        = mysqli_real_escape_string($db, $_POST['nama_pasien']);
    $usia_kalangan      = mysqli_real_escape_string($db, $_POST['usia_kalangan']);
    $terakhir_konsultasi = mysqli_real_escape_string($db, $_POST['terakhir_konsultasi']);
    $status_kesehatan   = mysqli_real_escape_string($db, $_POST['status_kesehatan']);

    // Query INSERT sesuai struktur tabel 'pasien'
    $query = "INSERT INTO pasien (nama_pasien, usia_kalangan, terakhir_konsultasi, status_kesehatan) 
              VALUES ('$nama_pasien', '$usia_kalangan', '$terakhir_konsultasi', '$status_kesehatan')";

    if (mysqli_query($db, $query)) {
        echo "<script>
                alert('Data Pasien Berhasil Ditambahkan');
                document.location.href = 'home.php';
              </script>";
    } else {
        echo "<script>
                alert('Data Gagal Ditambahkan: " . mysqli_error($db) . "');
                document.location.href = 'home.php';
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pasien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow border-0 mx-auto" style="max-width: 600px;">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Tambah Data Pasien</h4>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Nama Pasien</label>
                        <input type="text" name="nama_pasien" class="form-control" placeholder="Nama Lengkap" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Usia & Kalangan</label>
                        <select name="usia_kalangan" class="form-select" required>
                            <option value="0 - 1 tahun (Bayi)">0 - 1 tahun (Bayi)</option>
                            <option value="1 - 3 tahun (Batita)">1 - 3 tahun (Batita)</option>
                            <option value="3 - 5 tahun (Balita)">3 - 5 tahun (Balita)</option>
                            <option value="5 - 9 tahun (Anak-anak)">5 - 9 tahun (Anak-anak)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Terakhir Konsultasi</label>
                        <input type="date" name="terakhir_konsultasi" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status Kesehatan</label>
                        <select name="status_kesehatan" class="form-select" required>
                            <option value="Sehat">Sehat</option>
                            <option value="Perlu Pantauan">Perlu Pantauan</option>
                            <option value="Stunting">Stunting</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="home.php" class="btn btn-secondary">Kembali</a>
                        <button type="submit" name="tambah" class="btn btn-primary">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>