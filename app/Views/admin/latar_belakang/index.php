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
        transition: transform 0.3s ease;
    }
    .glass-card:hover { transform: translateY(-3px); }
</style>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4 text-white" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.2);">
        <span class="text-white fw-light">Pengaturan /</span> Latar Belakang PDF
    </h4>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show rounded-pill shadow-sm" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card glass-card">
                <div class="card-header">
                    <h5 class="mb-0 fw-bold text-primary">Upload Gambar Baru</h5>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/latarbelakang/store') ?>" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="gambar" class="form-label">File Gambar (A4) - Transparan disarankan</label>
                            <input class="form-control" type="file" id="gambar" name="gambar" accept="image/png, image/jpeg" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 rounded-pill fw-bold shadow-sm">Unggah</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card glass-card">
                <div class="card-header">
                    <h5 class="mb-0 fw-bold text-primary">Daftar Latar Belakang</h5>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Preview</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php $no = 1; foreach ($latar as $row) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td>
                                        <img src="<?= base_url('uploads/latar_belakang/' . $row->gambar) ?>" alt="Latar Belakang" class="rounded border" style="width: 80px; height: 110px; object-fit: cover;">
                                    </td>
                                    <td>
                                        <?php if ($row->is_active == 1) : ?>
                                            <span class="badge bg-label-success px-3 py-2 rounded-pill">Aktif Digunakan</span>
                                        <?php else : ?>
                                            <span class="badge bg-label-secondary px-3 py-2 rounded-pill">Tidak Aktif</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($row->is_active == 0) : ?>
                                            <a href="<?= base_url('admin/latarbelakang/set_active/' . $row->id) ?>" class="btn btn-sm btn-info rounded-pill shadow-sm">
                                                <i class="bx bx-check"></i> Gunakan
                                            </a>
                                        <?php endif; ?>
                                        <a href="<?= base_url('admin/latarbelakang/delete/' . $row->id) ?>" class="btn btn-sm btn-danger rounded-pill shadow-sm" onclick="return confirm('Yakin ingin menghapus gambar ini?')">
                                            <i class="bx bx-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>