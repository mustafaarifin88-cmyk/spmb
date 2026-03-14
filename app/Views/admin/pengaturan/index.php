<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<style>
    .glass-card {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.5);
        border-radius: 1.5rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    .form-switch .form-check-input {
        width: 3rem;
        height: 1.5rem;
        cursor: pointer;
    }
</style>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4 text-white" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.2);">
        <span class="text-white fw-light">Pengaturan /</span> Status & Jadwal SPMB
    </h4>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show rounded-pill shadow-sm" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card glass-card">
                <div class="card-header border-bottom mb-4 pb-3 bg-transparent">
                    <h5 class="mb-0 fw-bold text-primary">Form Pengaturan Pendaftaran</h5>
                </div>
                <div class="card-body p-4 p-md-5 pt-0">
                    <form action="<?= base_url('admin/pengaturan/update') ?>" method="POST">
                        <input type="hidden" name="id" value="<?= $pengaturan->id ?>">

                        <div class="mb-5 p-4 border rounded-3 text-center <?= $pengaturan->is_open == 1 ? 'bg-label-success border-success' : 'bg-label-danger border-danger' ?>">
                            <h5 class="fw-bold mb-3">Status Sistem Penerimaan Murid Baru</h5>
                            <div class="form-check form-switch d-flex justify-content-center gap-3 align-items-center mb-2">
                                <label class="form-check-label fw-bold <?= $pengaturan->is_open == 0 ? 'text-danger' : 'text-muted' ?>">TUTUP</label>
                                <input class="form-check-input ms-0 me-0 mt-0" type="checkbox" name="is_open" value="1" <?= $pengaturan->is_open == 1 ? 'checked' : '' ?>>
                                <label class="form-check-label fw-bold <?= $pengaturan->is_open == 1 ? 'text-success' : 'text-muted' ?>">BUKA</label>
                            </div>
                            <small class="text-dark d-block mt-3">Jika ditutup, calon siswa tidak dapat membuat akun baru atau mengirimkan formulir pendaftaran.</small>
                        </div>

                        <h5 class="fw-bold text-primary border-bottom pb-2 mb-4">Pengaturan Jadwal (Ditampilkan ke Pengunjung)</h5>
                        
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold">Tanggal Dibuka</label>
                                <input type="date" name="tgl_buka" class="form-control form-control-lg" value="<?= $pengaturan->tgl_buka ?>" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold">Tanggal Ditutup</label>
                                <input type="date" name="tgl_tutup" class="form-control form-control-lg" value="<?= $pengaturan->tgl_tutup ?>" required>
                            </div>
                        </div>

                        <div class="mt-4 text-end">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill shadow px-5 fw-bold"><i class="bx bx-save me-2"></i>Simpan Pengaturan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>