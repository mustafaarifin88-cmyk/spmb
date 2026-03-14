<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<style>
    .glass-card-detail {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.6);
        border-radius: 1.5rem;
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    }
</style>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4 text-white" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.2);">
        <span class="text-white fw-light">Konfirmasi /</span> Detail Pendaftar
    </h4>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show rounded-pill shadow-sm" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="card glass-card-detail mb-4">
        <div class="card-header d-flex justify-content-between align-items-center border-bottom pb-3">
            <h5 class="mb-0 fw-bold text-primary">Data Lengkap Siswa: <?= $pendaftaran->nama_peserta_didik ?></h5>
            <a href="<?= base_url('admin/konfirmasi') ?>" class="btn btn-secondary btn-sm rounded-pill shadow-sm px-3"><i class="bx bx-arrow-back me-1"></i> Kembali</a>
        </div>
        <div class="card-body mt-4">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="fw-bold text-white bg-primary p-2 rounded shadow-sm">A. IDENTITAS PESERTA DIDIK</h6>
                    <table class="table table-borderless table-sm mb-4">
                        <tr><td width="35%">No. KK</td><td width="5%">:</td><td class="fw-medium"><?= $pendaftaran->no_kk ?></td></tr>
                        <tr><td>NIK Siswa</td><td>:</td><td class="fw-medium"><?= $pendaftaran->nik_siswa ?></td></tr>
                        <tr><td>Nama Lengkap</td><td>:</td><td class="fw-medium"><?= $pendaftaran->nama_peserta_didik ?></td></tr>
                        <tr><td>Nama Panggilan</td><td>:</td><td class="fw-medium"><?= $pendaftaran->nama_panggilan ?></td></tr>
                        <tr><td>Jenis Kelamin</td><td>:</td><td class="fw-medium"><?= $pendaftaran->jenis_kelamin ?></td></tr>
                        <tr><td>Tempat, Tgl Lahir</td><td>:</td><td class="fw-medium"><?= $pendaftaran->tempat_lahir . ', ' . date('d-m-Y', strtotime($pendaftaran->tanggal_lahir)) ?></td></tr>
                        <tr><td>Kewarganegaraan</td><td>:</td><td class="fw-medium"><?= $pendaftaran->kewarganegaraan ?></td></tr>
                        <tr><td>Anak Ke</td><td>:</td><td class="fw-medium"><?= $pendaftaran->anak_ke ?></td></tr>
                        <tr><td>Sdr. Kandung/Angkat</td><td>:</td><td class="fw-medium"><?= $pendaftaran->jumlah_saudara_kandung . ' / ' . $pendaftaran->jumlah_saudara_angkat ?></td></tr>
                        <tr><td>Bahasa</td><td>:</td><td class="fw-medium"><?= $pendaftaran->bahasa_sehari_hari ?></td></tr>
                        <tr><td>Berat/Tinggi Badan</td><td>:</td><td class="fw-medium"><?= $pendaftaran->berat_badan . ' kg / ' . $pendaftaran->tinggi_badan . ' cm' ?></td></tr>
                        <tr><td>Alamat</td><td>:</td><td class="fw-medium"><?= $pendaftaran->alamat ?></td></tr>
                        <tr><td>No. Telp</td><td>:</td><td class="fw-medium"><?= $pendaftaran->no_telp ?></td></tr>
                        <tr><td>Tempat Tinggal</td><td>:</td><td class="fw-medium"><?= $pendaftaran->tempat_tinggal ?></td></tr>
                    </table>

                    <h6 class="fw-bold text-white bg-primary p-2 rounded shadow-sm mt-4">C. ASAL MULA PESERTA DIDIK</h6>
                    <table class="table table-borderless table-sm mb-4">
                        <tr><td width="35%">Masuk Sebagai</td><td width="5%">:</td><td class="fw-medium"><?= $pendaftaran->masuk_sebagai ?></td></tr>
                        <tr><td>Asal Peserta Didik</td><td>:</td><td class="fw-medium"><?= $pendaftaran->asal_peserta_didik ?></td></tr>
                        <tr><td>Nama TK</td><td>:</td><td class="fw-medium"><?= $pendaftaran->nama_tk ?></td></tr>
                        <tr><td>Thn/No Ijazah</td><td>:</td><td class="fw-medium"><?= $pendaftaran->tahun_nomor_ijazah ?></td></tr>
                    </table>
                </div>

                <div class="col-md-6">
                    <h6 class="fw-bold text-white bg-primary p-2 rounded shadow-sm">B. ORANG TUA PESERTA DIDIK</h6>
                    <table class="table table-borderless table-sm mb-4">
                        <tr><td width="35%">Nama Ayah</td><td width="5%">:</td><td class="fw-medium"><?= $pendaftaran->nama_ayah ?></td></tr>
                        <tr><td>Nama Ibu</td><td>:</td><td class="fw-medium"><?= $pendaftaran->nama_ibu ?></td></tr>
                        <tr><td>NIK Ayah</td><td>:</td><td class="fw-medium"><?= $pendaftaran->nik_ayah ?></td></tr>
                        <tr><td>NIK Ibu</td><td>:</td><td class="fw-medium"><?= $pendaftaran->nik_ibu ?></td></tr>
                        <tr><td>Pend. Ayah/Ibu</td><td>:</td><td class="fw-medium"><?= $pendaftaran->pendidikan_ayah . ' / ' . $pendaftaran->pendidikan_ibu ?></td></tr>
                        <tr><td>Penghasilan Ayah</td><td>:</td><td class="fw-medium"><?= $pendaftaran->penghasilan_ayah ?></td></tr>
                        <tr><td>Penghasilan Ibu</td><td>:</td><td class="fw-medium"><?= $pendaftaran->penghasilan_ibu ?></td></tr>
                    </table>

                    <?php if ($pendaftaran->nama_wali) : ?>
                        <h6 class="fw-bold text-white bg-primary p-2 rounded shadow-sm">DATA WALI</h6>
                        <table class="table table-borderless table-sm mb-4">
                            <tr><td width="35%">Nama Wali</td><td width="5%">:</td><td class="fw-medium"><?= $pendaftaran->nama_wali ?></td></tr>
                            <tr><td>Pendidikan Wali</td><td>:</td><td class="fw-medium"><?= $pendaftaran->pendidikan_wali ?></td></tr>
                            <tr><td>Hubungan</td><td>:</td><td class="fw-medium"><?= $pendaftaran->hubungan_wali ?></td></tr>
                        </table>
                    <?php endif; ?>

                    <h6 class="fw-bold text-white bg-primary p-2 rounded shadow-sm mt-4">D. DOKUMEN PERSYARATAN TERLAMPIR</h6>
                    <?php if(!empty($berkas)): ?>
                        <ul class="list-group list-group-flush mb-4 border rounded shadow-sm">
                            <?php foreach($berkas as $b): ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>
                                        <i class='bx bx-file text-primary me-2'></i> <?= $b->nama_persyaratan ?>
                                        <?php if($b->is_wajib == 1): ?>
                                            <span class="badge bg-danger ms-2" style="font-size: 0.65rem;">Wajib</span>
                                        <?php else: ?>
                                            <span class="badge bg-secondary ms-2" style="font-size: 0.65rem;">Opsional</span>
                                        <?php endif; ?>
                                    </span>
                                    <a href="<?= base_url('uploads/siswa/' . $b->file_path) ?>" target="_blank" class="btn btn-xs btn-outline-primary rounded-pill px-3 fw-bold">Lihat File</a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <div class="alert alert-secondary text-center mb-4"><i class='bx bx-info-circle me-1'></i> Siswa tidak mengunggah dokumen apapun.</div>
                    <?php endif; ?>

                    <div class="p-4 rounded-3 border mt-4 <?= $pendaftaran->status_pendaftaran == 'Diterima' ? 'bg-label-success border-success' : ($pendaftaran->status_pendaftaran == 'Menunggu' ? 'bg-label-warning border-warning' : ($pendaftaran->status_pendaftaran == 'Perbaikan' ? 'bg-label-info border-info' : 'bg-label-danger border-danger')) ?>">
                        <h6 class="fw-bold mb-3 text-uppercase">STATUS: <?= $pendaftaran->status_pendaftaran ?></h6>
                        
                        <?php if ($pendaftaran->status_pendaftaran == 'Ditolak') : ?>
                            <p class="text-danger fw-medium mb-0"><i class='bx bx-error-circle me-1'></i>Alasan: <?= $pendaftaran->alasan_tolak ?></p>
                        <?php endif; ?>

                        <?php if ($pendaftaran->status_pendaftaran == 'Perbaikan') : ?>
                            <p class="text-info fw-medium mb-0"><i class='bx bx-edit me-1'></i>Pesan Perbaikan: <?= $pendaftaran->pesan_perbaikan ?></p>
                        <?php endif; ?>

                        <div class="mt-4 d-flex flex-wrap gap-2">
                            <?php if ($pendaftaran->status_pendaftaran == 'Menunggu' || $pendaftaran->status_pendaftaran == 'Perbaikan') : ?>
                                <a href="<?= base_url('admin/konfirmasi/approve/' . $pendaftaran->id) ?>" class="btn btn-success rounded-pill shadow-sm fw-bold px-4" onclick="return confirm('Setujui pendaftaran ini?')">
                                    <i class="bx bx-check me-1"></i> Terima
                                </a>
                                <button type="button" class="btn btn-info rounded-pill shadow-sm fw-bold px-4" data-bs-toggle="modal" data-bs-target="#modalPerbaikan">
                                    <i class="bx bx-edit-alt me-1"></i> Minta Revisi
                                </button>
                                <button type="button" class="btn btn-danger rounded-pill shadow-sm fw-bold px-4" data-bs-toggle="modal" data-bs-target="#modalTolak">
                                    <i class="bx bx-x me-1"></i> Tolak
                                </button>
                            <?php endif; ?>
                            
                            <?php if ($pendaftaran->status_pendaftaran == 'Diterima') : ?>
                                <a href="<?= base_url('admin/konfirmasi/cetak_pdf/' . $pendaftaran->id) ?>" class="btn btn-secondary rounded-pill shadow-sm fw-bold px-4" target="_blank">
                                    <i class="bx bx-printer me-1"></i> Cetak PDF
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalPerbaikan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 1.5rem; overflow: hidden;">
            <div class="modal-header bg-info px-4 py-3">
                <h5 class="modal-title text-white fw-bold">Minta Perbaikan Berkas</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/konfirmasi/perbaikan/' . $pendaftaran->id) ?>" method="POST">
                <div class="modal-body px-4 py-4">
                    <label class="form-label fw-bold">Pesan untuk Siswa</label>
                    <textarea name="pesan_perbaikan" class="form-control" rows="4" placeholder="Sebutkan berkas apa yang salah dan perlu diperbaiki..." required></textarea>
                </div>
                <div class="modal-footer px-4 pb-4 border-0">
                    <button type="button" class="btn btn-outline-secondary rounded-pill" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-info text-white rounded-pill px-4 shadow-sm fw-bold">Kirim Permintaan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTolak" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 1.5rem; overflow: hidden;">
            <div class="modal-header bg-danger px-4 py-3">
                <h5 class="modal-title text-white fw-bold">Tolak Pendaftaran</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/konfirmasi/reject/' . $pendaftaran->id) ?>" method="POST">
                <div class="modal-body px-4 py-4">
                    <label class="form-label fw-bold">Alasan Penolakan</label>
                    <textarea name="alasan_tolak" class="form-control" rows="4" placeholder="Masukkan alasan penolakan secara jelas..." required></textarea>
                </div>
                <div class="modal-footer px-4 pb-4 border-0">
                    <button type="button" class="btn btn-outline-secondary rounded-pill" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger rounded-pill px-4 shadow-sm fw-bold">Tolak Pendaftaran</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>