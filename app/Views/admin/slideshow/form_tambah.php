<div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 1.5rem; overflow: hidden;">
            <div class="modal-header bg-primary px-4 py-3">
                <h5 class="modal-title text-white fw-bold">Tambah Slideshow Banner</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/slideshow/store') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body px-4 py-4">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-bold">Upload Gambar</label>
                            <input type="file" name="gambar" class="form-control form-control-lg" accept="image/png, image/jpeg, image/jpg" required />
                            <small class="text-info d-block mt-1">Gunakan resolusi landscape (misal 1280x720) agar terlihat proporsional.</small>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold">Judul Banner</label>
                            <input type="text" name="judul" class="form-control form-control-lg" placeholder="Contoh: Penerimaan Siswa Baru" required />
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold">Keterangan Singkat</label>
                            <textarea name="keterangan" class="form-control" rows="3" placeholder="Masukkan deskripsi banner..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer px-4 pb-4 border-0">
                    <button type="button" class="btn btn-outline-secondary rounded-pill" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4 shadow-sm">Simpan Slide</button>
                </div>
            </form>
        </div>
    </div>
</div>