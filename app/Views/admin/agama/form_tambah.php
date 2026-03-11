<div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Agama</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/agama/store') ?>" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nama_agama" class="form-label">Nama Agama</label>
                            <input type="text" id="nama_agama" name="nama_agama" class="form-control" placeholder="Masukkan nama agama" required />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>