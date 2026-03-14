<?php foreach ($slideshow as $row) : ?>
<div class="modal fade" id="modalEdit<?= $row->id ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 1.5rem; overflow: hidden;">
            <div class="modal-header bg-warning px-4 py-3">
                <h5 class="modal-title text-white fw-bold">Edit Slideshow</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/slideshow/update/' . $row->id) ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body px-4 py-4">
                    <div class="row g-3">
                        <div class="col-12 text-center mb-2">
                            <img src="<?= base_url('uploads/slideshow/' . $row->gambar) ?>" alt="Slide" class="img-fluid rounded shadow-sm" style="max-height: 150px; object-fit: cover;">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold">Ganti Gambar (Opsional)</label>
                            <input type="file" name="gambar" class="form-control" accept="image/png, image/jpeg, image/jpg" />
                            <small class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar.</small>
                        </div>
                        <div class="col-12 mt-3">
                            <label class="form-label fw-bold">Judul Banner</label>
                            <input type="text" name="judul" class="form-control form-control-lg" value="<?= $row->judul ?>" required />
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold">Keterangan Singkat</label>
                            <textarea name="keterangan" class="form-control" rows="3"><?= $row->keterangan ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer px-4 pb-4 border-0">
                    <button type="button" class="btn btn-outline-secondary rounded-pill" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-warning rounded-pill px-4 shadow-sm text-white">Update Slide</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>