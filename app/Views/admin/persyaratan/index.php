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
        <span class="text-white fw-light">Master Data /</span> Persyaratan Dokumen
    </h4>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show rounded-pill shadow-sm" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="card glass-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold text-primary">Daftar Dokumen Upload Calon Siswa</h5>
            <button type="button" class="btn btn-primary rounded-pill shadow-sm fw-bold px-4" data-bs-toggle="modal" data-bs-target="#modalTambah">
                <i class="bx bx-plus me-1"></i> Tambah Persyaratan
            </button>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="10%">No</th>
                        <th>Nama Dokumen Persyaratan</th>
                        <th>Status</th>
                        <th width="20%">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php $no = 1; foreach ($persyaratan as $row) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td class="fw-medium text-dark"><i class='bx bx-file text-primary me-2'></i><?= $row->nama_persyaratan ?></td>
                            <td>
                                <?php if($row->is_wajib == 1): ?>
                                    <span class="badge bg-label-danger px-3 py-2 rounded-pill fw-bold">Wajib</span>
                                <?php else: ?>
                                    <span class="badge bg-label-secondary px-3 py-2 rounded-pill fw-bold">Opsional</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-warning rounded-pill shadow-sm" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $row->id ?>">
                                    <i class="bx bx-edit-alt"></i>
                                </button>
                                <a href="<?= base_url('admin/persyaratan/delete/' . $row->id) ?>" class="btn btn-sm btn-danger rounded-pill shadow-sm" onclick="return confirm('Yakin ingin menghapus persyaratan ini?')">
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

<?= $this->include('admin/persyaratan/form_tambah') ?>
<?= $this->include('admin/persyaratan/form_edit') ?>

<?= $this->endSection() ?>