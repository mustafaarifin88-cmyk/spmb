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
</style>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4 text-white" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.2);">
        <span class="text-white fw-light">Pengaturan /</span> Profil Sekolah
    </h4>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show rounded-pill shadow-sm" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="card glass-card">
        <div class="card-header border-bottom mb-4 pb-3">
            <h5 class="mb-0 fw-bold text-primary">Informasi Data Sekolah & Kepala Sekolah</h5>
        </div>
        <div class="card-body">
            <form action="<?= base_url('admin/profilsekolah/update') ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $sekolah ? $sekolah->id : '' ?>">
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Nama Sekolah</label>
                        <input type="text" name="nama_sekolah" class="form-control form-control-lg" value="<?= $sekolah ? $sekolah->nama_sekolah : '' ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Desa / Kelurahan (Untuk Footer Form)</label>
                        <input type="text" name="desa" class="form-control form-control-lg" value="<?= $sekolah ? $sekolah->desa : '' ?>" required>
                    </div>
                    <div class="col-12 mb-4">
                        <label class="form-label fw-bold">Alamat Lengkap (Untuk Kop Surat)</label>
                        <textarea name="alamat_lengkap" class="form-control" rows="3" required><?= $sekolah ? $sekolah->alamat_lengkap : '' ?></textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Nama Kepala Sekolah</label>
                        <input type="text" name="nama_kepsek" class="form-control form-control-lg" value="<?= $sekolah ? $sekolah->nama_kepsek : '' ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">NIP Kepala Sekolah</label>
                        <input type="text" name="nip_kepsek" class="form-control form-control-lg" value="<?= $sekolah ? $sekolah->nip_kepsek : '' ?>" required>
                    </div>

                    <div class="col-12 mt-3">
                        <label class="form-label fw-bold">Tanda Tangan Kepala Sekolah (PNG Transparan)</label>
                        <div class="d-flex align-items-center gap-4 mt-2 p-3 border rounded bg-light">
                            <?php if ($sekolah && $sekolah->ttd_kepsek) : ?>
                                <img src="<?= base_url('uploads/ttd/' . $sekolah->ttd_kepsek) ?>" alt="TTD Kepsek" id="previewTTD" style="max-height: 100px; max-width: 200px; object-fit: contain;">
                            <?php else : ?>
                                <div id="previewTTD" class="d-flex align-items-center justify-content-center text-muted" style="height: 100px; width: 200px; border: 2px dashed #ccc;">Belum Ada TTD</div>
                            <?php endif; ?>
                            <div class="flex-grow-1">
                                <input type="file" name="ttd_kepsek" id="ttd_kepsek" class="form-control" accept="image/png">
                                <small class="text-muted d-block mt-2">Format wajib PNG tanpa latar belakang agar menyatu dengan dokumen PDF.</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-5 text-end">
                    <button type="submit" class="btn btn-primary btn-lg rounded-pill shadow px-5 fw-bold">Simpan Pengaturan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    document.getElementById('ttd_kepsek').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                let previewContainer = document.getElementById('previewTTD');
                if (previewContainer.tagName === 'DIV') {
                    const img = document.createElement('img');
                    img.id = 'previewTTD';
                    img.style.maxHeight = '100px';
                    img.style.maxWidth = '200px';
                    img.style.objectFit = 'contain';
                    previewContainer.replaceWith(img);
                    previewContainer = img;
                }
                previewContainer.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>
<?= $this->endSection() ?>