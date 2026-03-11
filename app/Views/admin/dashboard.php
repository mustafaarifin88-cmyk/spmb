<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Admin</h4>

    <div class="row">
        <div class="col-lg-3 col-md-6 col-12 mb-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <span class="avatar-initial rounded bg-white text-primary"><i class="bx bx-group"></i></span>
                        </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Total Pendaftar</span>
                    <h3 class="card-title text-white mb-2"><?= $total_pendaftar ?></h3>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-12 mb-4">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <span class="avatar-initial rounded bg-white text-warning"><i class="bx bx-time-five"></i></span>
                        </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Menunggu</span>
                    <h3 class="card-title text-white mb-2"><?= $menunggu ?></h3>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-12 mb-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <span class="avatar-initial rounded bg-white text-success"><i class="bx bx-check-circle"></i></span>
                        </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Diterima</span>
                    <h3 class="card-title text-white mb-2"><?= $diterima ?></h3>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-12 mb-4">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <span class="avatar-initial rounded bg-white text-danger"><i class="bx bx-x-circle"></i></span>
                        </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Ditolak</span>
                    <h3 class="card-title text-white mb-2"><?= $ditolak ?></h3>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>