<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<style>
    .glass-card-siswa {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.5);
        border-radius: 1.5rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }
    .glass-card-siswa:hover {
        transform: translateY(-5px);
    }
</style>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4 text-white" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.2);">
        <span class="text-white fw-light">Dashboard /</span> Siswa
    </h4>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert" style="border-radius: 15px;">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-12">
            <div class="card glass-card-siswa">
                <div class="card-body p-5 text-center">
                    <h2 class="fw-bold text-primary mb-3">Selamat Datang, <?= session()->get('nama_lengkap') ?>!</h2>
                    
                    <?php if (!$pendaftaran) : ?>
                        <div class="mt-4">
                            <img src="<?= base_url('assets/img/illustrations/man-with-laptop-light.png') ?>" alt="Ilustrasi" width="200" class="mb-4" style="animation: float 3s ease-in-out infinite;">
                            <h5 class="mb-3">Anda belum mengisi formulir pendaftaran murid baru.</h5>
                            <p class="text-muted mb-4">Silakan lengkapi data diri, data orang tua, dan asal sekolah Anda untuk melanjutkan proses pendaftaran.</p>
                            <a href="<?= base_url('siswa/pendaftaran') ?>" class="btn btn-primary btn-lg rounded-pill fw-bold shadow">
                                <i class="bx bx-edit-alt me-2"></i> Isi Formulir Sekarang
                            </a>
                        </div>
                    <?php else : ?>
                        <div class="mt-4">
                            <h5 class="mb-4">Status Pendaftaran Anda:</h5>
                            
                            <?php if ($pendaftaran->status_pendaftaran == 'Menunggu') : ?>
                                <div class="alert alert-warning d-inline-block px-5 py-3 rounded-pill shadow-sm">
                                    <i class="bx bx-time-five fs-4 align-middle me-2"></i> 
                                    <span class="fs-5 fw-bold align-middle">Sedang Menunggu Konfirmasi Admin</span>
                                </div>
                                <p class="text-muted mt-3">Data Anda telah kami terima dan sedang dalam proses pengecekan. Harap bersabar.</p>
                            
                            <?php elseif ($pendaftaran->status_pendaftaran == 'Diterima') : ?>
                                <div class="alert alert-success d-inline-block px-5 py-3 rounded-pill shadow-sm">
                                    <i class="bx bx-check-circle fs-4 align-middle me-2"></i> 
                                    <span class="fs-5 fw-bold align-middle">Selamat! Pendaftaran Diterima</span>
                                </div>
                                <p class="text-muted mt-3">Pendaftaran Anda telah disetujui. Silakan cetak bukti formulir di bawah ini.</p>
                                <a href="<?= base_url('siswa/pendaftaran/cetak_pdf') ?>" target="_blank" class="btn btn-success btn-lg rounded-pill fw-bold shadow mt-2">
                                    <i class="bx bx-printer me-2"></i> Cetak Formulir PDF
                                </a>
                            
                            <?php else : ?>
                                <div class="alert alert-danger d-inline-block px-5 py-3 rounded-pill shadow-sm">
                                    <i class="bx bx-x-circle fs-4 align-middle me-2"></i> 
                                    <span class="fs-5 fw-bold align-middle">Pendaftaran Ditolak</span>
                                </div>
                                <div class="mt-3 p-4 bg-light rounded-3 text-start mx-auto shadow-sm" style="max-width: 600px;">
                                    <h6 class="fw-bold text-danger mb-2">Alasan Penolakan:</h6>
                                    <p class="mb-0"><?= $pendaftaran->alasan_tolak ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>