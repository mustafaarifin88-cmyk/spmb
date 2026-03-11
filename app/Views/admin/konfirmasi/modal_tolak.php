<?php foreach ($pendaftar as $row) : ?>
<div class="modal fade" id="modalTolak<?= $row->id ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tolak Pendaftaran: <?= $row->nama_peserta_didik ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/konfirmasi/reject/' . $row->id) ?>" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="alasan_tolak<?= $row->id ?>" class="form-label">Alasan Penolakan</label>
                            <textarea id="alasan_tolak<?= $row->id ?>" name="alasan_tolak" class="form-control" rows="4" placeholder="Masukkan alasan mengapa pendaftaran ini ditolak..." required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Tolak Pendaftaran</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>