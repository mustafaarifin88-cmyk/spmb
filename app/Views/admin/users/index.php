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
        <span class="text-white fw-light">Master Data /</span> User Admin
    </h4>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show rounded-pill shadow-sm" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="card glass-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold text-primary">Daftar Administrator</h5>
            <button type="button" class="btn btn-primary rounded-pill shadow-sm fw-bold px-4" data-bs-toggle="modal" data-bs-target="#modalTambahAdmin">
                <i class="bx bx-user-plus me-1"></i> Tambah Admin
            </button>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Profil</th>
                        <th>Nama Lengkap</th>
                        <th>Username</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php $no = 1; foreach ($users as $row) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <img src="<?= base_url('uploads/profil/' . $row->foto_profil) ?>" alt="Avatar" class="rounded-circle shadow-sm" style="width: 40px; height: 40px; object-fit: cover;">
                            </td>
                            <td class="fw-medium text-dark"><?= $row->nama_lengkap ?></td>
                            <td><span class="badge bg-label-info px-3 py-2 rounded-pill"><?= $row->username ?></span></td>
                            <td>
                                <button type="button" class="btn btn-sm btn-warning rounded-pill shadow-sm" data-bs-toggle="modal" data-bs-target="#modalEditAdmin<?= $row->id ?>">
                                    <i class="bx bx-edit-alt"></i>
                                </button>
                                <?php if($row->id != session()->get('id')): ?>
                                <a href="<?= base_url('admin/adminuser/delete/' . $row->id) ?>" class="btn btn-sm btn-danger rounded-pill shadow-sm" onclick="return confirm('Yakin ingin menghapus admin ini?')">
                                    <i class="bx bx-trash"></i>
                                </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->include('admin/users/form_tambah') ?>
<?= $this->include('admin/users/form_edit') ?>

<?= $this->endSection() ?>