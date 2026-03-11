<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master Data /</span> Agama</h4>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Agama</h5>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
                <i class="bx bx-plus me-1"></i> Tambah
            </button>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Agama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php $no = 1; foreach ($agama as $row) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row->nama_agama ?></td>
                            <td>
                                <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $row->id ?>">
                                    <i class="bx bx-edit-alt"></i>
                                </button>
                                <a href="<?= base_url('admin/agama/delete/' . $row->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
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

<?= $this->include('admin/agama/form_tambah') ?>
<?= $this->include('admin/agama/form_edit') ?>

<?= $this->endSection() ?>