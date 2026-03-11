<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<style>
    /* Styling khusus untuk Card Dark Glassmorphism */
    .dark-glass-card {
        background: rgba(15, 23, 42, 0.85) !important; /* Latar gelap senada dengan sidebar */
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 1.2rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .dark-glass-card:hover {
        transform: translateY(-8px);
    }
    
    /* Efek Glow di bawah card sesuai kategori */
    .glow-primary { border-bottom: 4px solid #696cff; }
    .glow-primary:hover { box-shadow: 0 15px 25px -5px rgba(105, 108, 255, 0.5); }
    
    .glow-warning { border-bottom: 4px solid #ffab00; }
    .glow-warning:hover { box-shadow: 0 15px 25px -5px rgba(255, 171, 0, 0.5); }
    
    .glow-success { border-bottom: 4px solid #71dd37; }
    .glow-success:hover { box-shadow: 0 15px 25px -5px rgba(113, 221, 55, 0.5); }
    
    .glow-danger { border-bottom: 4px solid #ff3e1d; }
    .glow-danger:hover { box-shadow: 0 15px 25px -5px rgba(255, 62, 29, 0.5); }
    
    /* Warna Background Ikon Avatar yang elegan dan dipaksa tampil (!important) */
    .avatar-primary { background: rgba(105, 108, 255, 0.2) !important; color: #696cff !important; }
    .avatar-primary i { color: #696cff !important; }
    
    .avatar-warning { background: rgba(255, 171, 0, 0.2) !important; color: #ffab00 !important; }
    .avatar-warning i { color: #ffab00 !important; }
    
    .avatar-success { background: rgba(113, 221, 55, 0.2) !important; color: #71dd37 !important; }
    .avatar-success i { color: #71dd37 !important; }
    
    .avatar-danger  { background: rgba(255, 62, 29, 0.2) !important; color: #ff3e1d !important; }
    .avatar-danger i { color: #ff3e1d !important; }
</style>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4 text-white" style="text-shadow: 1px 1px 4px rgba(0,0,0,0.3);">
        <span class="text-white fw-light">Dashboard /</span> Admin
    </h4>

    <div class="row">
        <!-- Card Total Pendaftar -->
        <div class="col-lg-3 col-md-6 col-12 mb-4">
            <div class="card dark-glass-card glow-primary">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <span class="avatar-initial rounded avatar-primary"><i class="bx bx-group fs-3"></i></span>
                        </div>
                    </div>
                    <span class="fw-semibold d-block mb-1 text-light" style="opacity: 0.8;">Total Pendaftar</span>
                    <h3 class="card-title text-white mb-2"><?= $total_pendaftar ?></h3>
                </div>
            </div>
        </div>

        <!-- Card Menunggu -->
        <div class="col-lg-3 col-md-6 col-12 mb-4">
            <div class="card dark-glass-card glow-warning">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <span class="avatar-initial rounded avatar-warning"><i class="bx bx-time-five fs-3"></i></span>
                        </div>
                    </div>
                    <span class="fw-semibold d-block mb-1 text-light" style="opacity: 0.8;">Menunggu</span>
                    <h3 class="card-title text-white mb-2"><?= $menunggu ?></h3>
                </div>
            </div>
        </div>

        <!-- Card Diterima -->
        <div class="col-lg-3 col-md-6 col-12 mb-4">
            <div class="card dark-glass-card glow-success">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <span class="avatar-initial rounded avatar-success"><i class="bx bx-check-circle fs-3"></i></span>
                        </div>
                    </div>
                    <span class="fw-semibold d-block mb-1 text-light" style="opacity: 0.8;">Diterima</span>
                    <h3 class="card-title text-white mb-2"><?= $diterima ?></h3>
                </div>
            </div>
        </div>

        <!-- Card Ditolak -->
        <div class="col-lg-3 col-md-6 col-12 mb-4">
            <div class="card dark-glass-card glow-danger">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <span class="avatar-initial rounded avatar-danger"><i class="bx bx-x-circle fs-3"></i></span>
                        </div>
                    </div>
                    <span class="fw-semibold d-block mb-1 text-light" style="opacity: 0.8;">Ditolak</span>
                    <h3 class="card-title text-white mb-2"><?= $ditolak ?></h3>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>