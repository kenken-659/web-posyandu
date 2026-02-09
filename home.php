<?php
session_start();
include 'config/app.php';
//fungsi cek login
if (!isset($_SESSION['login'])) 
    header("Location: login.php");

// fungsi pendaftaran pasien
if (isset($_POST['kirim'])) {
    $nama_pasien = $_POST['nama_pasien'];
    $usia_kalangan = $_POST['usia_kalangan'];
    $tujuan = $_POST['tujuan'];

    $query = "INSERT INTO pendaftaran (nama_pasien, usia_kalangan, tujuan) VALUES ('$nama_pasien', '$usia_kalangan', '$tujuan')";
    if (mysqli_query($db, $query)) {
        echo "<script>alert('Pesan berhasil dikirim!'); window.location.href='Home.php';</script>";
    } else {
        echo "<script>alert('Gagal mengirim pesan. Silakan coba lagi.'); window.location.href='Home.php';</script>";
    }
}

// fungsi tampilkan jadwal kegiatan

$sql = "SELECT * FROM jadwal";
$result = mysqli_query($db, $sql);
if (!$result) {
    die("Query Gagal: " . mysqli_error($db));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posyandu Sehat Bersama</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="layout/style.css">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="#">
                <i class="fas fa-hand-holding-heart me-2"></i>POSYANDU KITA
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto fw-medium">
                    <li class="nav-item"><a class="nav-link" href="#">Beranda</a></li>
                    <?php if($_SESSION['role']=='Kader Posyandu'): ?>
                    <li class="nav-item"><a class="nav-link" href="#layanan">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#data">Data Pasien</a></li>

                    <?php endif; ?>
                    <li class="nav-item"><a class="nav-link" href="#jadwal">Jadwal</a></li>

                    <span class="nav-link" style="color: #191970;"> Halo, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-danger rounded-pill px-4 shadow-sm" href="logout.php">logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="hero-section text-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-3">Generasi Sehat, Bangsa Kuat</h1>
                    <p class="lead mb-4 opacity-75">Sistem Informasi Pelayanan Kesehatan Masyarakat untuk Ibu, Anak, dan Lansia secara Terpadu.</p>
                    <div class="d-flex justify-content-center gap-3">
                        <!--<a href="#jadwal" class="btn btn-warning btn-lg fw-bold rounded-pill px-4 shadow">Lihat Jadwal</a> -->
                        <a href="#kontak" class="btn btn-outline-light btn-lg rounded-pill px-4">Daftar Pasien</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container" style="margin-top: -50px;">
        <div class="row g-4 text-center">
            <div class="col-md-4">
                <div class="bg-white p-4 rounded-4 shadow-sm">
                    <h3 class="fw-bold text-primary mb-0">
                        <?php
                        $patientCount = 0;
                        $query = "SELECT COUNT(*) AS total FROM pendaftaran";
                        $result = mysqli_query($db, $query);
                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $patientCount = $row['total'];
                        }
                        echo $patientCount;
                        ?>
                    </h3>
                    <small class="text-muted">Total Pasien</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-white p-4 rounded-4 shadow-sm">
                    <h3 class="fw-bold text-success mb-0">98%</h3>
                    <small class="text-muted">Target Imunisasi</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-white p-4 rounded-4 shadow-sm">
                    <h3 class="fw-bold text-info mb-0">
                        <?php
                        $kaderCount = 0;
                        $query = "SELECT COUNT(*) AS total FROM user WHERE role = 'Kader Posyandu'";
                        $result = mysqli_query($db, $query);
                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $kaderCount = $row['total'];
                        }
                        echo $kaderCount;
                        ?>
                    </h3>
                    <small class="text-muted">Kader Posyandu</small>
                </div>
            </div>
        </div>
    </div>

    <?php if($_SESSION['role']=='Kader Posyandu'): ?>
    <section id="layanan" class="container py-5 mt-4">
        <div class="text-center mb-5">
            <h2 class="fw-bold section-title">Layanan Utama</h2>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-md-4">
                <div class="card h-100 card-layanan shadow-sm p-4 text-center border-top-primary" style="border-top: 5px solid #0d6efd;">
                    <i class="fas fa-baby text-primary fs-1 mb-3"></i>
                    <h4 class="fw-bold">KIA & Imunisasi</h4>
                    <p class="text-muted small">Penimbangan, pengukuran tinggi badan, dan pemberian vaksin berkala untuk balita.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 card-layanan shadow-sm p-4 text-center" style="border-top: 5px solid #198754;">
                    <i class="fas fa-apple-whole text-success fs-1 mb-3"></i>
                    <h4 class="fw-bold">Gizi & PMT</h4>
                    <p class="text-muted small">Pemberian Makanan Tambahan dan konsultasi gizi bagi ibu hamil dan anak stunting.</p>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

     <?php if($_SESSION['role']=='Kader Posyandu'): ?>
    <section id="data" class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold section-title">Data Pasien</h2>
        </div>
        <div class="table-responsive table-custom">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-primary">
                    <tr>
                        <th>Nama Pasien</th>
                        <th>Usia</th>
                        <th>Kalangan</th>
                        <th>Terakhir Konsultasi</th>
                        <th>Status Gizi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Alya Putri</td>
                        <td>18 Bulan</td>
                        <td>Balita</td>
                        <td>20 Jan 2026</td>
                        <td><span class="badge bg-success">Sehat</span></td>
                    </tr>
                    <tr>
                        <td>Bima Santoso</td>
                        <td>24 Tahun</td>
                        <td>Dewasa</td>
                        <td>15 Jan 2026</td>
                        <td><span class="badge bg-warning text-dark">Perlu Pantauan</span></td>
                    </tr>
                    <tr>
                        <td>Citra Lestari</td>
                        <td>60 Tahun</td>
                        <td>Lansia</td>
                        <td>10 Jan 2026</td>
                        <td><span class="badge bg-danger">Stunting</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    <?php endif; ?>

    <section id="jadwal" class="bg-white py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold section-title">Jadwal Kegiatan 2026</h2>
            </div>
            <div class="table-responsive table-custom">
                <table border="1" cellpadding="10" class="table table-hover align-middle mb-0">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Kegiatan</th>
                            <th>Lokasi</th>
                            <th>Waktu</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                            <td><?= ++$no; ?></td>
                            <td><?= $row['tanggal']; ?></td>
                            <td class="fw-bold"><?= $row['kegiatan']; ?></td>
                            <td><?= $row['lokasi']; ?></td>
                            <td><?= $row['waktu']; ?></td>
                            <td><?= $row['status'];?></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <section id="kontak" class="container py-5">
        <form action="" method="POST">
        <div class="row g-5">
            <div class="col-lg-6">
                <h2 class="fw-bold mb-4">Hubungi Kami</h2>
                <p class="text-muted mb-4">Punya pertanyaan seputar layanan atau ingin mendaftarkan anggota keluarga baru? Silakan kirim pesan kepada kami.</p>
                <div class="d-flex align-items-center mb-3">
                    <div class="bg-primary text-white p-3 rounded-3 me-3"><i class="fas fa-map-marker-alt"></i></div>
                    <div><strong>Alamat:</strong><br>Jl. RE Martadina Gg.Wahyu  No.60</div>
                </div>
                <div class="d-flex align-items-center mb-3">
                    <div class="bg-success text-white p-3 rounded-3 me-3"><i class="fab fa-whatsapp"></i></div>
                    <div><strong>WhatsApp:</strong><br>0899-0642-715</div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm p-4 rounded-4">
                    <form>
                        <div class="mb-3">
                            <label for="nama_pasien" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" placeholder="Masukkan nama Anda">
                        </div>
                        <div class="mb-3">
                            <label for="usia_kalangan"class="form-label">Usia & Kalangan</label>
                            <select class="form-select" id="usia_kalangan" name="usia_kalangan">
                                <option value="0 - 1 tahun (Bayi)">0 - 1 tahun (Bayi)</option>
                                <option value="1 - 3 tahun (Batita)">1 - 3 tahun (Batita)</option>
                                <option value="3 - 5 tahun (Balita)">3 - 5 tahun (Balita)</option>
                                <option value="5 - 9 tahun (Anak-anak)">5 - 9 tahun (Anak-anak)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tujuan"class="form-label">Tujuan</label>
                            <textarea type="text" class="form-control" rows="4" id="tujuan" name="tujuan" placeholder="Tuliskan tujuan Anda..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 rounded-pill py-2" name="kirim">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
        </form>
    </section>

    <footer class="bg-dark text-white py-5">
        <div class="container text-center">
            <div class="mb-4">
                <i class="fas fa-hand-holding-heart fs-1 text-primary mb-3"></i>
                <h5 class="fw-bold">POSYANDU KITA</h5>
            </div>
            <p class="text-muted small">© 2026 Layanan Digital Posyandu. Dikelola dengan cinta oleh Kader Desa Maju Jaya.</p>
            <div class="mt-3">
                <a href="#" class="text-white me-3"><i class="fab fa-facebook"></i></a>
                <a href="https://www.instagram.com/fajar_wkwkwkwk/" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-white"><i class="fab fa-envelope"></i></a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>