<?php foreach ($users as $row) : ?>
<div class="modal fade" id="modalEditAdmin<?= $row->id ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 1.5rem; overflow: hidden;">
            <div class="modal-header bg-warning px-4 py-3">
                <h5 class="modal-title text-white fw-bold">Edit Administrator</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/adminuser/update/' . $row->id) ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body px-4 py-4">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-bold">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control form-control-lg" value="<?= $row->nama_lengkap ?>" required />
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold">Username</label>
                            <input type="text" name="username" class="form-control form-control-lg" value="<?= $row->username ?>" required />
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold text-danger">Ganti Password (Opsional)</label>
                            <input type="password" name="password" class="form-control form-control-lg" placeholder="Kosongkan jika tidak diganti" />
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold">Ganti Foto Profil (Opsional)</label>
                            <input type="file" name="foto_profil" class="form-control" accept="image/png, image/jpeg" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer px-4 pb-4 border-0">
                    <button type="button" class="btn btn-outline-secondary rounded-pill" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-warning rounded-pill px-4 shadow-sm text-white">Update Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>