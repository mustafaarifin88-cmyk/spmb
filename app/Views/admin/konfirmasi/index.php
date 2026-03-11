<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pendaftaran /</span> Konfirmasi</h4>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Data Pendaftar</h5>
        </div>
        <div class="table-responsive text-nowrap">
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
                            <td><?= $row->nama_peserta_didik ?></td>
                            <td><?= $row->asal_peserta_didik ?></td>
                            <td>
                                <?php if ($row->status_pendaftaran == 'Menunggu') : ?>
                                    <span class="badge bg-label-warning">Menunggu</span>
                                <?php elseif ($row->status_pendaftaran == 'Diterima') : ?>
                                    <span class="badge bg-label-success">Diterima</span>
                                <?php else : ?>
                                    <span class="badge bg-label-danger">Ditolak</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?= base_url('admin/konfirmasi/detail/' . $row->id) ?>" class="btn btn-sm btn-info">
                                    <i class="bx bx-show"></i> Detail
                                </a>
                                <?php if ($row->status_pendaftaran == 'Menunggu') : ?>
                                    <a href="<?= base_url('admin/konfirmasi/approve/' . $row->id) ?>" class="btn btn-sm btn-success" onclick="return confirm('Setujui pendaftaran ini?')">
                                        <i class="bx bx-check"></i> Terima
                                    </a>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalTolak<?= $row->id ?>">
                                        <i class="bx bx-x"></i> Tolak
                                    </button>
                                <?php endif; ?>
                                <?php if ($row->status_pendaftaran == 'Diterima') : ?>
                                    <a href="<?= base_url('admin/konfirmasi/cetak_pdf/' . $row->id) ?>" class="btn btn-sm btn-secondary" target="_blank">
                                        <i class="bx bx-printer"></i> Cetak PDF
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

<?= $this->include('admin/konfirmasi/modal_tolak') ?>

<?= $this->endSection() ?>