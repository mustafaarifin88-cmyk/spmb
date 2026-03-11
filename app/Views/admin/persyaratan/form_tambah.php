<div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 1.5rem; overflow: hidden;">
            <div class="modal-header bg-primary px-4 py-3">
                <h5 class="modal-title text-white fw-bold">Tambah Persyaratan</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/persyaratan/store') ?>" method="POST">
                <div class="modal-body px-4 py-4">
                    <div class="row">
                        <div class="col mb-2">
                            <label for="nama_persyaratan" class="form-label fw-bold">Nama Dokumen</label>
                            <input type="text" id="nama_persyaratan" name="nama_persyaratan" class="form-control form-control-lg" placeholder="Contoh: Fotocopy Ijazah Legalisir" required />
                        </div>
                    </div>
                </div>
                <div class="modal-footer px-4 pb-4 border-0">
                    <button type="button" class="btn btn-outline-secondary rounded-pill" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4 shadow-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>