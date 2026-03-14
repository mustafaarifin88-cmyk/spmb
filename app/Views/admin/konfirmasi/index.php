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
        <span class="text-white fw-light">Pendaftaran /</span> Konfirmasi
    </h4>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show rounded-pill shadow-sm" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="card glass-card">
        <div class="card-header border-bottom mb-3">
            <h5 class="mb-0 fw-bold text-primary">Data Pendaftar</h5>
        </div>
        <div class="table-responsive text-nowrap pb-4">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Peserta</th>
                        <th>Asal Sekolah</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php $no = 1; foreach ($pendaftar as $row) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td class="fw-medium text-dark"><?= $row->nama_peserta_didik ?></td>
                            <td><?= $row->asal_peserta_didik ?></td>
                            <td>
                                <?php if ($row->status_pendaftaran == 'Menunggu') : ?>
                                    <span class="badge bg-label-warning px-3 py-2 rounded-pill">Menunggu</span>
                                <?php elseif ($row->status_pendaftaran == 'Diterima') : ?>
                                    <span class="badge bg-label-success px-3 py-2 rounded-pill">Diterima</span>
                                <?php elseif ($row->status_pendaftaran == 'Perbaikan') : ?>
                                    <span class="badge bg-label-info px-3 py-2 rounded-pill">Revisi Berkas</span>
                                <?php else : ?>
                                    <span class="badge bg-label-danger px-3 py-2 rounded-pill">Ditolak</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?= base_url('admin/konfirmasi/detail/' . $row->id) ?>" class="btn btn-sm btn-info rounded-pill shadow-sm px-3">
                                    <i class="bx bx-show"></i> Detail
                                </a>
                                <a href="<?= base_url('admin/konfirmasi/edit_siswa/' . $row->id) ?>" class="btn btn-sm btn-warning rounded-pill shadow-sm px-3">
                                    <i class="bx bx-edit"></i> Edit
                                </a>
                                <a href="<?= base_url('admin/konfirmasi/delete_siswa/' . $row->id) ?>" class="btn btn-sm btn-danger rounded-pill shadow-sm px-3" onclick="return confirm('Yakin ingin menghapus data siswa ini secara permanen?')">
                                    <i class="bx bx-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>