<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posyandu Sehat Bersama</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Poppins', sans-serif; color: #333; }
        
        /* Custom Hero */
        .hero-section {
            background: linear-gradient(135deg, #0d6efd 0%, #0046af 100%);
            color: white;
            padding: 100px 0;
            border-bottom-left-radius: 50px;    
            border-bottom-right-radius: 50px;
        }

        /* Card Styling */
        .card-layanan {
            transition: all 0.3s ease;
            border: none;
            border-radius: 20px;
        }
        .card-layanan:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
        }

        /* Section Title */
        .section-title {
            position: relative;
            padding-bottom: 15px;
            margin-bottom: 30px;
        }
        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background-color: #0d6efd;
            border-radius: 2px;
        }

        /* Table Design */
        .table-custom {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
    </style>
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
                    <li class="nav-item"><a class="nav-link" href="#layanan">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#jadwal">Jadwal</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-primary rounded-pill px-4 shadow-sm" href="#">Login Kader</a>
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
                        <a href="#jadwal" class="btn btn-warning btn-lg fw-bold rounded-pill px-4 shadow">Lihat Jadwal</a>
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
                    <h3 class="fw-bold text-primary mb-0">120+</h3>
                    <small class="text-muted">Balita Terdaftar</small>
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
                    <h3 class="fw-bold text-info mb-0">15</h3>
                    <small class="text-muted">Kader Aktif</small>
                </div>
            </div>
        </div>
    </div>

    <section id="layanan" class="container py-5 mt-4">
        <div class="text-center mb-5">
            <h2 class="fw-bold section-title">Layanan Utama</h2>
        </div>
        <div class="row g-4">
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
            <div class="col-md-4">
                <div class="card h-100 card-layanan shadow-sm p-4 text-center" style="border-top: 5px solid #6f42c1;">
                    <i class="fas fa-user-nurse text-purple fs-1 mb-3" style="color: #6f42c1;"></i>
                    <h4 class="fw-bold">Lansia</h4>
                    <p class="text-muted small">Pengecekan tensi, gula darah, dan senam lansia rutin setiap bulan.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="jadwal" class="bg-white py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold section-title">Jadwal Kegiatan 2026</h2>
            </div>
            <div class="table-responsive table-custom">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-primary">
                        <tr>
                            <th>Tanggal</th>
                            <th>Kegiatan</th>
                            <th>Lokasi</th>
                            <th>Waktu</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>05 Feb 2026</td>
                            <td class="fw-bold">Posyandu Balita (Melati I)</td>
                            <td>Balai Desa (RW 01)</td>
                            <td>08:00 - 11:00</td>
                            <td><span class="badge bg-success">Mendatang</span></td>
                        </tr>
                        <tr>
                            <td>12 Feb 2026</td>
                            <td class="fw-bold">Posyandu Lansia</td>
                            <td>Rumah Ketua RW 03</td>
                            <td>09:00 - 12:00</td>
                            <td><span class="badge bg-success">Mendatang</span></td>
                        </tr>
                        <tr>
                            <td>15 Feb 2026</td>
                            <td class="fw-bold">Penyuluhan Gizi Bumil</td>
                            <td>Puskesmas Pembantu</td>
                            <td>10:00 - Selesai</td>
                            <td><span class="badge bg-secondary">Terjadwal</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <section id="kontak" class="container py-5">
        <div class="row g-5">
            <div class="col-lg-6">
                <h2 class="fw-bold mb-4">Hubungi Kami</h2>
                <p class="text-muted mb-4">Punya pertanyaan seputar layanan atau ingin mendaftarkan anggota keluarga baru? Silakan kirim pesan kepada kami.</p>
                <div class="d-flex align-items-center mb-3">
                    <div class="bg-primary text-white p-3 rounded-3 me-3"><i class="fas fa-map-marker-alt"></i></div>
                    <div><strong>Alamat:</strong><br>Jl. Sehat No. 123, Desa Maju Jaya</div>
                </div>
                <div class="d-flex align-items-center mb-3">
                    <div class="bg-success text-white p-3 rounded-3 me-3"><i class="fab fa-whatsapp"></i></div>
                    <div><strong>WhatsApp:</strong><br>0812-3456-7890</div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm p-4 rounded-4">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="Masukkan nama Anda">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tujuan</label>
                            <select class="form-select">
                                <option>Konsultasi Kesehatan</option>
                                <option>Pendaftaran Balita Baru</option>
                                <option>Laporan Gizi</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pesan</label>
                            <textarea class="form-control" rows="4" placeholder="Tuliskan pesan Anda..."></textarea>
                        </div>
                        <button class="btn btn-primary w-100 rounded-pill py-2">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
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
                <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-white"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>