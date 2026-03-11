<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<style>
    .glass-card-profil {
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
        <span class="text-white fw-light">Pengaturan /</span> Profil Admin
    </h4>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show rounded-pill shadow-sm" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card glass-card-profil">
                <div class="card-body p-5">
                    <form action="<?= base_url('admin/profil/update') ?>" method="POST" enctype="multipart/form-data">
                        
                        <div class="d-flex align-items-start align-items-sm-center gap-4 mb-4 pb-4 border-bottom">
                            <img src="<?= base_url('uploads/profil/' . $admin->foto_profil) ?>" alt="user-avatar" class="d-block rounded-circle shadow" height="120" width="120" id="uploadedAvatar" style="object-fit: cover; border: 4px solid #696cff;" />
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-2 rounded-pill shadow-sm fw-bold px-4" tabindex="0">
                                    <span class="d-none d-sm-block"><i class="bx bx-upload me-2"></i>Ganti Foto Profil</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="upload" name="foto_profil" class="account-file-input" hidden accept="image/png, image/jpeg" />
                                </label>
                                <p class="text-muted mb-0 small">Mendukung format JPG, GIF atau PNG. Maks. 2MB.</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control form-control-lg" value="<?= $admin->nama_lengkap ?>" required />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Username</label>
                                <input type="text" name="username" class="form-control form-control-lg" value="<?= $admin->username ?>" required />
                            </div>
                            <div class="col-12 mb-4 mt-2">
                                <div class="alert alert-warning rounded-3 shadow-sm border-0 bg-label-warning px-4 py-3">
                                    <h6 class="alert-heading fw-bold mb-1"><i class='bx bx-lock-open-alt me-1'></i> Ganti Password (Opsional)</h6>
                                    <p class="mb-0 small">Kosongkan kolom di bawah ini jika Anda tidak ingin mengubah password akun admin saat ini.</p>
                                </div>
                                <input type="password" name="password" class="form-control form-control-lg" placeholder="Masukkan password baru...">
                            </div>
                        </div>
                        
                        <div class="mt-2 text-end border-top pt-4">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill shadow px-5 fw-bold">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    document.addEventListener('DOMContentLoaded', function (e) {
        let fileInput = document.querySelector('.account-file-input');
        let profileImg = document.getElementById('uploadedAvatar');

        if (fileInput) {
            fileInput.onchange = () => {
                if (fileInput.files[0]) {
                    profileImg.src = window.URL.createObjectURL(fileInput.files[0]);
                }
            };
        }
    });
</script>
<?= $this->endSection() ?>