<?php
session_start();
include 'config/app.php';

// Ambil id_pasien dari URL
$id_pasien = (int)$_GET['id'];

// Query data pasien berdasarkan id (Sesuaikan dengan nama tabel 'pasien' dan PK 'id_pasien')
// Saya asumsikan fungsi select() Anda mengembalikan array
$data = mysqli_query($db, "SELECT * FROM pasien WHERE id_pasien = $id_pasien");
$pasien = mysqli_fetch_assoc($data);

// Jika tombol ubah ditekan
if (isset($_POST['ubah'])){
    $nama_pasien        = mysqli_real_escape_string($db, $_POST['nama_pasien']);
    $usia_kalangan      = mysqli_real_escape_string($db, $_POST['usia_kalangan']);
    $terakhir_konsultasi = mysqli_real_escape_string($db, $_POST['terakhir_konsultasi']);
    $status_kesehatan   = mysqli_real_escape_string($db, $_POST['status_kesehatan']);

    $query = "UPDATE pasien SET 
                nama_pasien = '$nama_pasien', 
                usia_kalangan = '$usia_kalangan', 
                terakhir_konsultasi = '$terakhir_konsultasi', 
                status_kesehatan = '$status_kesehatan' 
              WHERE id_pasien = $id_pasien";

    if (mysqli_query($db, $query)) {
        echo "<script>
                alert('Data Pasien Berhasil Diubah');
                document.location.href = 'Home.php'; // Kembali ke halaman utama
              </script>";
    } else {
        echo "<script>
                alert('Data Gagal Diubah: " . mysqli_error($db) . "');
              </script>";
    }
}
?>

<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Data Pasien</title>
  </head>
  <body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white">
                        <h3 class="text-center mb-0">EDIT DATA PASIEN</h3>
                    </div>
                    <div class="card-body p-4">
                        <form action="" method="POST">
                            <input type="hidden" name="id_pasien" value="<?= $pasien['id_pasien']; ?>">
                            
                            <div class="mb-3">
                                <label for="nama_pasien" class="form-label">Nama Pasien</label>
                                <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="<?= $pasien['nama_pasien']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="usia_kalangan" class="form-label">Usia & Kalangan</label>
                                <select class="form-select" id="usia_kalangan" name="usia_kalangan" required>
                                    <option value="0 - 1 tahun (Bayi)" <?= $pasien['usia_kalangan'] == '0 - 1 tahun (Bayi)' ? 'selected' : ''; ?>>0 - 1 tahun (Bayi)</option>
                                    <option value="1 - 3 tahun (Batita)" <?= $pasien['usia_kalangan'] == '1 - 3 tahun (Batita)' ? 'selected' : ''; ?>>1 - 3 tahun (Batita)</option>
                                    <option value="3 - 5 tahun (Balita)" <?= $pasien['usia_kalangan'] == '3 - 5 tahun (Balita)' ? 'selected' : ''; ?>>3 - 5 tahun (Balita)</option>
                                    <option value="Dewasa" <?= $pasien['usia_kalangan'] == 'Dewasa' ? 'selected' : ''; ?>>Dewasa</option>
                                    <option value="Lansia" <?= $pasien['usia_kalangan'] == 'Lansia' ? 'selected' : ''; ?>>Lansia</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="terakhir_konsultasi" class="form-label">Terakhir Konsultasi</label>
                                <input type="date" class="form-control" id="terakhir_konsultasi" name="terakhir_konsultasi" value="<?= $pasien['terakhir_konsultasi']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="status_kesehatan" class="form-label">Status Kesehatan</label>
                                <select class="form-select" id="status_kesehatan" name="status_kesehatan" required>
                                    <option value="Sehat" <?= $pasien['status_kesehatan'] == 'Sehat' ? 'selected' : ''; ?>>Sehat</option>
                                    <option value="Perlu Pantauan" <?= $pasien['status_kesehatan'] == 'Perlu Pantauan' ? 'selected' : ''; ?>>Perlu Pantauan</option>
                                    <option value="Stunting" <?= $pasien['status_kesehatan'] == 'Stunting' ? 'selected' : ''; ?>>Stunting</option>
                                </select>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <a href="Home.php" class="btn btn-secondary px-4">Batal</a>
                                <button type="submit" class="btn btn-primary px-4" name="ubah">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>