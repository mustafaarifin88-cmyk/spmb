<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Penerimaan Murid Baru</title>
    <link href="<?= base_url('assets/vendor/css/core.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/css/theme-default.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/fonts/boxicons.css') ?>" rel="stylesheet">
    <style>
        body {
            font-family: 'Public Sans', sans-serif;
            background: linear-gradient(-45deg, #f3e7e9, #e3eeff, #e0c3fc, #f6f0c4);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            min-height: 100vh;
            overflow-x: hidden;
        }
        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .glass-nav {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            position: fixed;
            width: 100%;
            z-index: 1000;
        }
        .carousel-item img {
            height: 60vh;
            object-fit: cover;
            border-radius: 1.5rem;
        }
        .carousel-caption {
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
            border-radius: 1rem;
            padding: 2rem;
            bottom: 2rem;
            border: 1px solid rgba(255,255,255,0.2);
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 1.5rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        .glass-card:hover {
            transform: translateY(-5px);
        }
        .step-card {
            background: rgba(105, 108, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(105, 108, 255, 0.2);
            border-radius: 1.5rem;
            padding: 2rem;
            height: 100%;
            transition: all 0.3s ease;
        }
        .step-card:hover {
            background: rgba(105, 108, 255, 0.9);
            color: white;
            transform: translateY(-10px);
        }
        .step-card:hover .step-icon { color: white; }
        .step-icon {
            font-size: 3rem;
            color: #696cff;
            margin-bottom: 1rem;
            transition: color 0.3s ease;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg glass-nav py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center fw-bold text-primary" href="#">
                <?php if($sekolah && $sekolah->logo_sekolah && file_exists('uploads/logo/'.$sekolah->logo_sekolah)): ?>
                    <img src="<?= base_url('uploads/logo/'.$sekolah->logo_sekolah) ?>" alt="Logo" height="40" class="me-2">
                <?php else: ?>
                    <i class='bx bxs-school fs-2 me-2'></i>
                <?php endif; ?>
                <?= $sekolah ? $sekolah->nama_sekolah : 'SPMB Online' ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item"><a class="nav-link fw-medium text-dark" href="#beranda">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link fw-medium text-dark" href="#informasi">Informasi</a></li>
                    <li class="nav-item"><a class="nav-link fw-medium text-dark" href="#tata-cara">Tata Cara</a></li>
                    <li class="nav-item ms-lg-3 mt-3 mt-lg-0">
                        <a class="btn btn-primary rounded-pill px-4 fw-bold shadow-sm" href="<?= base_url('auth') ?>">Login / Daftar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="beranda" class="pt-5 mt-5">
        <div class="container pt-4">
            <?php if(!empty($slideshow)): ?>
                <div id="heroCarousel" class="carousel slide carousel-fade shadow-lg rounded-3" data-bs-ride="carousel" style="border-radius: 1.5rem; overflow: hidden;">
                    <div class="carousel-inner">
                        <?php $active = true; foreach($slideshow as $s): ?>
                            <div class="carousel-item <?= $active ? 'active' : '' ?>">
                                <img src="<?= base_url('uploads/slideshow/'.$s->gambar) ?>" class="d-block w-100" alt="Slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h3 class="text-white fw-bold mb-2"><?= $s->judul ?></h3>
                                    <p class="mb-0 fs-6"><?= $s->keterangan ?></p>
                                </div>
                            </div>
                        <?php $active = false; endforeach; ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                </div>
            <?php else: ?>
                <div class="glass-card text-center p-5 mt-5">
                    <h1 class="display-5 fw-bold text-primary mb-3">Selamat Datang di Sistem Penerimaan Murid Baru</h1>
                    <p class="lead mb-4">Masa depan cerah dimulai dari sini. Bergabunglah bersama kami sekarang.</p>
                    <a href="<?= base_url('auth') ?>" class="btn btn-primary btn-lg rounded-pill px-5 shadow">Daftar Sekarang</a>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section id="informasi" class="py-5 mt-4">
        <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="col-md-5">
                    <div class="card glass-card h-100 p-4 text-center border-primary" style="border-width: 2px;">
                        <h4 class="fw-bold text-primary mb-4"><i class='bx bx-calendar-check me-2'></i>Jadwal Pendaftaran</h4>
                        
                        <?php if($pengaturan && $pengaturan->is_open == 1): ?>
                            <div class="alert alert-success rounded-pill fw-bold fs-5 mb-4 shadow-sm border-0">PENDAFTARAN DIBUKA</div>
                        <?php else: ?>
                            <div class="alert alert-danger rounded-pill fw-bold fs-5 mb-4 shadow-sm border-0">PENDAFTARAN DITUTUP</div>
                        <?php endif; ?>

                        <div class="d-flex justify-content-center align-items-center gap-3">
                            <div>
                                <small class="text-muted d-block fw-bold text-uppercase">Mulai</small>
                                <span class="fs-5 fw-bold text-dark"><?= $pengaturan && $pengaturan->tgl_buka ? date('d M Y', strtotime($pengaturan->tgl_buka)) : '-' ?></span>
                            </div>
                            <div class="fs-3 text-muted">-</div>
                            <div>
                                <small class="text-muted d-block fw-bold text-uppercase">Berakhir</small>
                                <span class="fs-5 fw-bold text-dark"><?= $pengaturan && $pengaturan->tgl_tutup ? date('d M Y', strtotime($pengaturan->tgl_tutup)) : '-' ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="card glass-card h-100 p-4">
                        <h4 class="fw-bold text-dark mb-4"><i class='bx bx-bar-chart-alt-2 text-primary me-2'></i>Statistik Pendaftaran</h4>
                        <div class="row g-3 h-100 align-items-center">
                            <div class="col-6">
                                <div class="p-4 rounded-3 text-center" style="background: rgba(105, 108, 255, 0.1);">
                                    <h2 class="display-4 fw-bold text-primary mb-0"><?= $total_pendaftar ?></h2>
                                    <p class="text-muted fw-medium mt-2 mb-0">Total Pendaftar</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="p-4 rounded-3 text-center" style="background: rgba(113, 221, 55, 0.1);">
                                    <h2 class="display-4 fw-bold text-success mb-0"><?= $total_diterima ?></h2>
                                    <p class="text-muted fw-medium mt-2 mb-0">Siswa Diterima</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="tata-cara" class="py-5 mb-5">
        <div class="container py-4">
            <h2 class="text-center text-dark fw-bold mb-5">Tata Cara Pendaftaran</h2>
            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-2">
                    <div class="step-card text-center">
                        <i class='bx bx-user-plus step-icon'></i>
                        <h6 class="fw-bold">1. Buat Akun</h6>
                        <p class="small mb-0" style="opacity: 0.8;">Daftar akun baru menggunakan form registrasi.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2">
                    <div class="step-card text-center">
                        <i class='bx bx-edit step-icon'></i>
                        <h6 class="fw-bold">2. Isi Formulir</h6>
                        <p class="small mb-0" style="opacity: 0.8;">Lengkapi data diri dan unggah berkas yang diminta.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2">
                    <div class="step-card text-center">
                        <i class='bx bx-time-five step-icon'></i>
                        <h6 class="fw-bold">3. Verifikasi</h6>
                        <p class="small mb-0" style="opacity: 0.8;">Tunggu admin memeriksa dan memvalidasi berkas Anda.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2">
                    <div class="step-card text-center">
                        <i class='bx bx-printer step-icon'></i>
                        <h6 class="fw-bold">4. Cetak PDF</h6>
                        <p class="small mb-0" style="opacity: 0.8;">Cetak bukti pendaftaran jika status telah diterima.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2">
                    <div class="step-card text-center">
                        <i class='bx bx-building-house step-icon'></i>
                        <h6 class="fw-bold">5. Daftar Ulang</h6>
                        <p class="small mb-0" style="opacity: 0.8;">Bawa formulir PDF beserta berkas fisik ke sekolah.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="text-center py-4" style="background: rgba(255,255,255,0.5); backdrop-filter: blur(10px);">
        <p class="mb-0 text-dark fw-medium">© <?= date('Y') ?> <?= $sekolah ? $sekolah->nama_sekolah : 'SPMB Online' ?>. All Rights Reserved.</p>
    </footer>

    <script src="<?= base_url('assets/vendor/libs/jquery/jquery.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/js/bootstrap.js') ?>"></script>
</body>
</html>