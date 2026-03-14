<!DOCTYPE html>
<html lang="id" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="<?= base_url('assets/') ?>" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Daftar Akun - SPMB</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/favicon/favicon.ico') ?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/fonts/boxicons.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/css/core.css') ?>" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/css/theme-default.css') ?>" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url('assets/css/demo.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/css/pages/page-auth.css') ?>" />
    <style>
        body {
            background: linear-gradient(-45deg, #ffb199, #8ca6fb, #e0c3fc, #696cff);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            min-height: 100vh;
        }
        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            border-radius: 1.5rem;
            animation: zoomIn 0.8s ease cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        @keyframes zoomIn {
            0% { transform: scale(0.8); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }
        .btn-primary {
            background: linear-gradient(to right, #696cff, #8ca6fb);
            border: none;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(105, 108, 255, 0.4);
        }
    </style>
</head>
<body>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card">
                    <div class="card-body p-4 p-md-5">
                        <div class="app-brand justify-content-center mb-3 mt-2">
                            <a href="<?= base_url() ?>" class="app-brand-link gap-2">
                                <span class="app-brand-text demo text-body fw-bolder fs-3 text-uppercase"><i class='bx bxs-school text-primary me-2'></i>SPMB</span>
                            </a>
                        </div>
                        
                        <?php if ($pengaturan && $pengaturan->is_open == 0) : ?>
                            <div class="text-center mt-4 mb-4">
                                <i class='bx bx-error-circle text-danger' style="font-size: 5rem;"></i>
                                <h4 class="mt-3 fw-bold text-danger">Pendaftaran Ditutup</h4>
                                <p class="text-muted">Maaf, pembuatan akun dan pendaftaran murid baru saat ini sedang tidak dibuka. Silakan kembali lagi nanti sesuai jadwal yang ditentukan.</p>
                                <a href="<?= base_url() ?>" class="btn btn-outline-primary rounded-pill mt-3 px-4">Kembali ke Beranda</a>
                            </div>
                        <?php else : ?>
                            <h4 class="mb-2 fw-bold text-center">Buat Akun Siswa 🚀</h4>
                            <p class="mb-4 text-center">Isi form di bawah untuk mendaftar</p>

                            <?php if (session()->getFlashdata('error')) : ?>
                                <div class="alert alert-danger alert-dismissible fade show rounded-pill px-4" role="alert">
                                    <?= session()->getFlashdata('error') ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>

                            <form id="formAuthentication" class="mb-3" action="<?= base_url('auth/store_register') ?>" method="POST">
                                <div class="mb-3">
                                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-user-circle"></i></span>
                                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan nama lengkap" autofocus required />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-user"></i></span>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Buat username" required />
                                    </div>
                                </div>
                                <div class="mb-3 form-password-toggle">
                                    <label class="form-label" for="password">Password</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-lock-alt"></i></span>
                                        <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" required />
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                </div>
                                <div class="mb-4 mt-4">
                                    <button class="btn btn-primary d-grid w-100 rounded-pill fw-bold" type="submit">Daftar Sekarang</button>
                                </div>
                            </form>

                            <p class="text-center">
                                <span>Sudah memiliki akun?</span>
                                <a href="<?= base_url('auth') ?>" class="fw-bold">
                                    <span>Masuk disini</span>
                                </a>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url('assets/vendor/libs/jquery/jquery.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/popper/popper.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/js/bootstrap.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/js/menu.js') ?>"></script>
    <script src="<?= base_url('assets/js/main.js') ?>"></script>
</body>
</html>