<!DOCTYPE html>
<html lang="id" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="<?= base_url('assets/') ?>" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Sistem Penerimaan Murid Baru</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/favicon/favicon.ico') ?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/fonts/boxicons.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/css/core.css') ?>" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/css/theme-default.css') ?>" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url('assets/css/demo.css') ?>" />
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Public Sans', sans-serif;
            background: linear-gradient(-45deg, #696cff, #e0c3fc, #8ca6fb, #ffb199);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            height: 100vh;
            overflow-x: hidden;
        }
        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .glass-nav {
            background: rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            position: fixed;
            width: 100%;
            z-index: 1000;
            transition: all 0.3s ease;
        }
        .hero-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
        }
        .glass-card {
            background: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.3);
            color: #fff;
            transform: translateY(50px);
            opacity: 0;
            animation: slideUp 1s forwards ease-out;
            max-width: 800px;
            width: 90%;
            margin: 0 auto;
        }
        @keyframes slideUp {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }
        .hero-subtitle {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            color: #f8f9fa;
        }
        .btn-glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: #fff;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            margin: 0 10px;
        }
        .btn-glass:hover {
            background: #ffffff;
            color: #696cff;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
        .floating-element {
            position: fixed;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            border-radius: 50%;
            animation: float 6s infinite ease-in-out;
            z-index: 0;
        }
        @keyframes float {
            0% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
            100% { transform: translateY(0px) rotate(360deg); }
        }
        .step-card {
            background: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            padding: 2rem;
            height: 100%;
            color: #fff;
            transition: transform 0.3s ease, background 0.3s ease;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }
        .step-card:hover {
            transform: translateY(-10px);
            background: rgba(0, 0, 0, 0.6);
        }
        .step-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #fff;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg glass-nav py-3">
        <div class="container">
            <a class="navbar-brand fw-bold text-white fs-4" href="<?= base_url() ?>">
                <i class="bx bxs-school me-2"></i>SPMB Online
            </a>
            <button class="navbar-toggler text-white border-0" type="button" data-bs-toggle="collapse" data-bs-toggle="target="#navbarNav">
                <i class='bx bx-menu fs-1'></i>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item">
                        <a class="nav-link text-white fw-medium" href="<?= base_url() ?>">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-medium" href="#tata-cara">Tata Cara</a>
                    </li>
                    <li class="nav-item ms-lg-3 mt-3 mt-lg-0">
                        <a class="btn btn-light text-primary rounded-pill px-4 fw-bold shadow-sm" href="<?= base_url('auth') ?>">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="floating-element" style="width: 100px; height: 100px; top: 20%; left: 10%; animation-delay: 0s;"></div>
    <div class="floating-element" style="width: 150px; height: 150px; top: 60%; right: 15%; animation-delay: 2s;"></div>
    <div class="floating-element" style="width: 80px; height: 80px; bottom: 10%; left: 20%; animation-delay: 4s;"></div>

    <section class="hero-section">
        <div class="glass-card" style="z-index: 1;">
            <h1 class="hero-title">Penerimaan Murid Baru</h1>
            <p class="hero-subtitle">Masa Depan Cerah Dimulai Dari Sini. Bergabunglah bersama kami dan raih prestasi gemilang dengan fasilitas pendidikan terbaik.</p>
            <div>
                <a href="<?= base_url('auth') ?>" class="btn-glass"><i class='bx bx-log-in-circle me-2'></i>Masuk</a>
                <a href="<?= base_url('auth/register') ?>" class="btn-glass"><i class='bx bx-user-plus me-2'></i>Daftar Sekarang</a>
            </div>
        </div>
    </section>

    <!-- Section Tata Cara Pendaftaran -->
    <section id="tata-cara" class="py-5" style="position: relative; z-index: 1; min-height: 100vh; display: flex; align-items: center;">
        <div class="container py-5">
            <h2 class="text-center text-white fw-bold mb-5" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.2);">Tata Cara Pendaftaran</h2>
            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-2">
                    <div class="step-card text-center">
                        <i class='bx bx-user-plus step-icon'></i>
                        <h5 class="fw-bold text-white">1. Buat Akun</h5>
                        <p class="small mb-0 text-white" style="opacity: 0.8;">Daftar akun baru menggunakan nama lengkap dan username.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2">
                    <div class="step-card text-center">
                        <i class='bx bx-log-in step-icon'></i>
                        <h5 class="fw-bold text-white">2. Login</h5>
                        <p class="small mb-0 text-white" style="opacity: 0.8;">Masuk ke sistem menggunakan akun yang telah dibuat.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2">
                    <div class="step-card text-center">
                        <i class='bx bx-edit step-icon'></i>
                        <h5 class="fw-bold text-white">3. Isi Formulir</h5>
                        <p class="small mb-0 text-white" style="opacity: 0.8;">Lengkapi data diri dan asal sekolah dengan benar.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2">
                    <div class="step-card text-center">
                        <i class='bx bx-time-five step-icon'></i>
                        <h5 class="fw-bold text-white">4. Tunggu</h5>
                        <p class="small mb-0 text-white" style="opacity: 0.8;">Tunggu konfirmasi pendaftaran dari pihak admin sekolah.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2">
                    <div class="step-card text-center">
                        <i class='bx bx-printer step-icon'></i>
                        <h5 class="fw-bold text-white">5. Cetak</h5>
                        <p class="small mb-0 text-white" style="opacity: 0.8;">Cetak bukti formulir pendaftaran jika sudah diterima.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="<?= base_url('assets/vendor/libs/jquery/jquery.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/popper/popper.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/js/bootstrap.js') ?>"></script>
</body>
</html>