<?php foreach ($pekerjaan as $row) : ?>
<div class="modal fade" id="modalEdit<?= $row->id ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 1.5rem; overflow: hidden;">
            <div class="modal-header bg-warning px-4 py-3">
                <h5 class="modal-title text-white fw-bold">Edit Pekerjaan</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/pekerjaan/update/' . $row->id) ?>" method="POST">
                <div class="modal-body px-4 py-4">
                    <div class="row">
                        <div class="col mb-2">
                            <label for="nama_pekerjaan<?= $row->id ?>" class="form-label fw-bold">Nama Pekerjaan</label>
                            <input type="text" id="nama_pekerjaan<?= $row->id ?>" name="nama_pekerjaan" class="form-control form-control-lg" value="<?= $row->nama_pekerjaan ?>" required />
                        </div>
                    </div>
                </div>
                <div class="modal-footer px-4 pb-4 border-0">
                    <button type="button" class="btn btn-outline-secondary rounded-pill" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-warning rounded-pill px-4 shadow-sm text-white">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>