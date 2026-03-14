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
    .alert-glass {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border-radius: 1rem;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
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
    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert" style="border-radius: 15px;">
            <?= session()->getFlashdata('error') ?>
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
                            
                            <?php if ($pengaturan && $pengaturan->is_open == 1) : ?>
                                <p class="text-muted mb-4">Silakan lengkapi data diri, data orang tua, dan asal sekolah Anda untuk melanjutkan proses pendaftaran.</p>
                                <a href="<?= base_url('siswa/pendaftaran') ?>" class="btn btn-primary btn-lg rounded-pill fw-bold shadow px-5">
                                    <i class="bx bx-edit-alt me-2"></i> Isi Formulir Sekarang
                                </a>
                            <?php else : ?>
                                <div class="alert alert-danger d-inline-block px-4 py-3 rounded-pill fw-bold shadow-sm">
                                    <i class="bx bx-error-circle me-2"></i> MAAF, MASA PENDAFTARAN SEDANG DITUTUP
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php else : ?>
                        <div class="mt-4">
                            <h5 class="mb-4">Status Pendaftaran Anda:</h5>
                            
                            <?php if ($pendaftaran->status_pendaftaran == 'Menunggu') : ?>
                                <div class="alert alert-warning d-inline-block px-5 py-3 rounded-pill shadow-sm fw-bold fs-5">
                                    <i class="bx bx-time-five align-middle me-2 fs-3"></i> Sedang Menunggu Konfirmasi Admin
                                </div>
                                <p class="text-muted mt-3">Data Anda telah kami terima dan sedang dalam proses pengecekan. Harap bersabar.</p>
                            
                            <?php elseif ($pendaftaran->status_pendaftaran == 'Diterima') : ?>
                                <div class="alert alert-success d-inline-block px-5 py-3 rounded-pill shadow-sm fw-bold fs-5">
                                    <i class="bx bx-check-circle align-middle me-2 fs-3"></i> Selamat! Pendaftaran Diterima
                                </div>
                                <p class="text-dark mt-3 fs-6">Pendaftaran Anda telah disetujui. Silakan cetak bukti formulir di bawah ini.</p>
                                <a href="<?= base_url('siswa/pendaftaran/cetak_pdf') ?>" target="_blank" class="btn btn-success btn-lg rounded-pill fw-bold shadow mt-2 mb-4 px-5">
                                    <i class="bx bx-printer me-2"></i> Cetak Formulir PDF
                                </a>

                                <?php if(!empty($berkas_fisik)): ?>
                                <div class="card bg-label-info border-info mt-4 mx-auto text-start" style="max-width: 600px; border-radius: 1rem;">
                                    <div class="card-body p-4">
                                        <h5 class="card-title fw-bold text-info border-bottom border-info pb-2 mb-3"><i class='bx bx-info-circle me-2'></i>Informasi Daftar Ulang</h5>
                                        <p class="mb-3 text-dark">Mohon segera datang ke sekolah dengan membawa hasil cetak Formulir PDF beserta berkas fisik berikut untuk diserahkan ke Panitia Pendaftaran:</p>
                                        <ul class="list-group list-group-flush rounded border">
                                            <?php foreach($berkas_fisik as $bf): ?>
                                                <li class="list-group-item bg-transparent text-dark fw-medium"><i class='bx bx-check text-success me-2'></i> <?= $bf->nama_berkas ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                                <?php endif; ?>
                            
                            <?php elseif ($pendaftaran->status_pendaftaran == 'Perbaikan') : ?>
                                <div class="alert alert-info d-inline-block px-5 py-3 rounded-pill shadow-sm fw-bold fs-5">
                                    <i class="bx bx-edit align-middle me-2 fs-3"></i> Permintaan Perbaikan Berkas
                                </div>
                                <div class="mt-3 p-4 bg-label-danger rounded-3 text-start mx-auto shadow-sm" style="max-width: 700px; border: 1px solid #ff3e1d;">
                                    <h6 class="fw-bold text-danger mb-2"><i class='bx bx-message-square-error me-2'></i>Pesan dari Admin:</h6>
                                    <p class="mb-0 text-dark"><?= $pendaftaran->pesan_perbaikan ?></p>
                                </div>
                                
                                <div class="mt-4 p-4 alert-glass mx-auto text-start border border-primary" style="max-width: 700px;">
                                    <h6 class="fw-bold text-primary mb-3">Silakan Unggah Ulang Berkas Anda:</h6>
                                    <form action="<?= base_url('siswa/pendaftaran/update_berkas') ?>" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="id_pendaftaran" value="<?= $pendaftaran->id ?>">
                                        
                                        <?php foreach($persyaratan as $p): ?>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">
                                                    <?= $p->nama_persyaratan ?>
                                                    <?php if($p->is_wajib == 1): ?>
                                                        <span class="badge bg-danger ms-1" style="font-size: 0.6rem;">Wajib</span>
                                                    <?php endif; ?>
                                                </label>
                                                <input type="file" name="berkas[<?= $p->id ?>]" class="form-control" accept=".jpg,.jpeg,.png,.pdf" <?= $p->is_wajib == 1 ? 'required' : '' ?>>
                                                
                                                <?php 
                                                    $fileLama = '';
                                                    foreach($berkas_lama as $bl) {
                                                        if($bl->id_persyaratan == $p->id) {
                                                            $fileLama = $bl->file_path;
                                                            break;
                                                        }
                                                    }
                                                ?>
                                                <?php if($fileLama): ?>
                                                    <small class="text-success d-block mt-1"><i class='bx bx-check'></i> File sebelumnya sudah terunggah.</small>
                                                <?php endif; ?>
                                            </div>
                                        <?php endforeach; ?>
                                        
                                        <div class="text-end mt-4">
                                            <button type="submit" class="btn btn-primary rounded-pill px-4 fw-bold shadow-sm">Kirim Ulang Berkas</button>
                                        </div>
                                    </form>
                                </div>

                            <?php else : ?>
                                <div class="alert alert-danger d-inline-block px-5 py-3 rounded-pill shadow-sm fw-bold fs-5">
                                    <i class="bx bx-x-circle align-middle me-2 fs-3"></i> Pendaftaran Ditolak
                                </div>
                                <div class="mt-3 p-4 bg-light rounded-3 text-start mx-auto shadow-sm" style="max-width: 600px; border-left: 5px solid #ff3e1d;">
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