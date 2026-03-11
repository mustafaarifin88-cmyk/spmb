<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Konfirmasi /</span> Detail Pendaftar</h4>

    <div class="card mb-4" style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border-radius: 1.5rem; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
        <div class="card-header d-flex justify-content-between align-items-center border-bottom">
            <h5 class="mb-0 fw-bold text-primary">Data Lengkap Siswa: <?= $pendaftaran->nama_peserta_didik ?></h5>
            <a href="<?= base_url('admin/konfirmasi') ?>" class="btn btn-secondary btn-sm rounded-pill"><i class="bx bx-arrow-back"></i> Kembali</a>
        </div>
        <div class="card-body mt-4">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="fw-bold text-primary bg-light p-2 rounded">A. IDENTITAS PESERTA DIDIK</h6>
                    <table class="table table-borderless table-sm mb-4">
                        <tr><td width="35%">No. KK</td><td width="5%">:</td><td><?= $pendaftaran->no_kk ?></td></tr>
                        <tr><td>NIK Siswa</td><td>:</td><td><?= $pendaftaran->nik_siswa ?></td></tr>
                        <tr><td>Nama Lengkap</td><td>:</td><td><?= $pendaftaran->nama_peserta_didik ?></td></tr>
                        <tr><td>Nama Panggilan</td><td>:</td><td><?= $pendaftaran->nama_panggilan ?></td></tr>
                        <tr><td>Jenis Kelamin</td><td>:</td><td><?= $pendaftaran->jenis_kelamin ?></td></tr>
                        <tr><td>Tempat, Tgl Lahir</td><td>:</td><td><?= $pendaftaran->tempat_lahir . ', ' . date('d-m-Y', strtotime($pendaftaran->tanggal_lahir)) ?></td></tr>
                        <tr><td>Kewarganegaraan</td><td>:</td><td><?= $pendaftaran->kewarganegaraan ?></td></tr>
                        <tr><td>Anak Ke</td><td>:</td><td><?= $pendaftaran->anak_ke ?></td></tr>
                        <tr><td>Sdr. Kandung/Angkat</td><td>:</td><td><?= $pendaftaran->jumlah_saudara_kandung . ' / ' . $pendaftaran->jumlah_saudara_angkat ?></td></tr>
                        <tr><td>Bahasa</td><td>:</td><td><?= $pendaftaran->bahasa_sehari_hari ?></td></tr>
                        <tr><td>Berat/Tinggi Badan</td><td>:</td><td><?= $pendaftaran->berat_badan . ' kg / ' . $pendaftaran->tinggi_badan . ' cm' ?></td></tr>
                        <tr><td>Alamat</td><td>:</td><td><?= $pendaftaran->alamat ?></td></tr>
                        <tr><td>No. Telp</td><td>:</td><td><?= $pendaftaran->no_telp ?></td></tr>
                        <tr><td>Tempat Tinggal</td><td>:</td><td><?= $pendaftaran->tempat_tinggal ?></td></tr>
                    </table>

                    <h6 class="fw-bold text-primary bg-light p-2 rounded mt-3">C. ASAL MULA PESERTA DIDIK</h6>
                    <table class="table table-borderless table-sm mb-4">
                        <tr><td width="35%">Masuk Sebagai</td><td width="5%">:</td><td><?= $pendaftaran->masuk_sebagai ?></td></tr>
                        <tr><td>Asal Peserta Didik</td><td>:</td><td><?= $pendaftaran->asal_peserta_didik ?></td></tr>
                        <tr><td>Nama TK</td><td>:</td><td><?= $pendaftaran->nama_tk ?></td></tr>
                        <tr><td>Thn/No Ijazah</td><td>:</td><td><?= $pendaftaran->tahun_nomor_ijazah ?></td></tr>
                    </table>
                </div>

                <div class="col-md-6">
                    <h6 class="fw-bold text-primary bg-light p-2 rounded">B. ORANG TUA PESERTA DIDIK</h6>
                    <table class="table table-borderless table-sm mb-4">
                        <tr><td width="35%">Nama Ayah</td><td width="5%">:</td><td><?= $pendaftaran->nama_ayah ?></td></tr>
                        <tr><td>Nama Ibu</td><td>:</td><td><?= $pendaftaran->nama_ibu ?></td></tr>
                        <tr><td>NIK Ayah</td><td>:</td><td><?= $pendaftaran->nik_ayah ?></td></tr>
                        <tr><td>NIK Ibu</td><td>:</td><td><?= $pendaftaran->nik_ibu ?></td></tr>
                        <tr><td>Pend. Ayah/Ibu</td><td>:</td><td><?= $pendaftaran->pendidikan_ayah . ' / ' . $pendaftaran->pendidikan_ibu ?></td></tr>
                        <tr><td>Penghasilan Ayah</td><td>:</td><td><?= $pendaftaran->penghasilan_ayah ?></td></tr>
                        <tr><td>Penghasilan Ibu</td><td>:</td><td><?= $pendaftaran->penghasilan_ibu ?></td></tr>
                    </table>

                    <?php if ($pendaftaran->nama_wali) : ?>
                        <h6 class="fw-bold text-primary bg-light p-2 rounded">DATA WALI</h6>
                        <table class="table table-borderless table-sm mb-4">
                            <tr><td width="35%">Nama Wali</td><td width="5%">:</td><td><?= $pendaftaran->nama_wali ?></td></tr>
                            <tr><td>Pendidikan Wali</td><td>:</td><td><?= $pendaftaran->pendidikan_wali ?></td></tr>
                            <tr><td>Hubungan</td><td>:</td><td><?= $pendaftaran->hubungan_wali ?></td></tr>
                        </table>
                    <?php endif; ?>

                    <h6 class="fw-bold text-primary bg-light p-2 rounded mt-3">D. DOKUMEN PERSYARATAN TERLAMPIR</h6>
                    <?php if(!empty($berkas)): ?>
                        <ul class="list-group list-group-flush mb-4 border rounded">
                            <?php foreach($berkas as $b): ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><i class='bx bx-file text-info me-2'></i> <?= $b->nama_persyaratan ?></span>
                                    <a href="<?= base_url('uploads/siswa/' . $b->file_path) ?>" target="_blank" class="btn btn-xs btn-outline-primary rounded-pill">Lihat File</a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p class="text-muted fst-italic mb-4">Siswa tidak mengunggah dokumen persyaratan.</p>
                    <?php endif; ?>

                    <h6 class="fw-bold text-primary bg-light p-2 rounded mt-3">STATUS PENDAFTARAN</h6>
                    <div class="mb-3">
                        <?php if ($pendaftaran->status_pendaftaran == 'Menunggu') : ?>
                            <span class="badge bg-warning fs-6">Menunggu Konfirmasi</span>
                        <?php elseif ($pendaftaran->status_pendaftaran == 'Diterima') : ?>
                            <span class="badge bg-success fs-6">Diterima</span>
                        <?php else : ?>
                            <span class="badge bg-danger fs-6">Ditolak</span>
                            <p class="text-danger mt-2 fw-bold">Alasan Penolakan: <?= $pendaftaran->alasan_tolak ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>