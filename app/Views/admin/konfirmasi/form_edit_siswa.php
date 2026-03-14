<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<style>
    .glass-form {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.6);
        border-radius: 1.5rem;
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    }
    .form-section-title {
        background: linear-gradient(135deg, #696cff, #8ec5fc);
        color: white;
        padding: 10px 20px;
        border-radius: 10px;
        margin-bottom: 20px;
        font-weight: bold;
        box-shadow: 0 4px 10px rgba(105, 108, 255, 0.3);
    }
</style>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4 text-white" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.2);">Edit Data Siswa</h4>

    <div class="card glass-form mb-4">
        <div class="card-header border-bottom mb-4 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold text-primary">Formulir Edit Data: <?= $pendaftaran->nama_peserta_didik ?></h5>
            <a href="<?= base_url('admin/konfirmasi') ?>" class="btn btn-secondary btn-sm rounded-pill shadow-sm"><i class="bx bx-arrow-back me-1"></i> Kembali</a>
        </div>
        <div class="card-body p-4 p-md-5 pt-0">
            <form action="<?= base_url('admin/konfirmasi/update_siswa/' . $pendaftaran->id) ?>" method="POST">
                
                <h5 class="form-section-title">A. IDENTITAS PESERTA DIDIK</h5>
                <div class="row g-3 mb-5">
                    <div class="col-md-6"><label class="form-label">No Kartu Keluarga</label><input type="text" name="no_kk" class="form-control" value="<?= $pendaftaran->no_kk ?>" required></div>
                    <div class="col-md-6"><label class="form-label">NIK Siswa</label><input type="text" name="nik_siswa" class="form-control" value="<?= $pendaftaran->nik_siswa ?>" required></div>
                    <div class="col-md-6"><label class="form-label">Nama Peserta Didik</label><input type="text" name="nama_peserta_didik" class="form-control" value="<?= $pendaftaran->nama_peserta_didik ?>" required></div>
                    <div class="col-md-6"><label class="form-label">Nama Panggilan</label><input type="text" name="nama_panggilan" class="form-control" value="<?= $pendaftaran->nama_panggilan ?>" required></div>
                    <div class="col-md-6"><label class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select" required>
                            <option value="Laki-laki" <?= $pendaftaran->jenis_kelamin == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                            <option value="Perempuan" <?= $pendaftaran->jenis_kelamin == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-3"><label class="form-label">Tempat Lahir</label><input type="text" name="tempat_lahir" class="form-control" value="<?= $pendaftaran->tempat_lahir ?>" required></div>
                    <div class="col-md-3"><label class="form-label">Tanggal Lahir</label><input type="date" name="tanggal_lahir" class="form-control" value="<?= $pendaftaran->tanggal_lahir ?>" required></div>
                    <div class="col-md-6"><label class="form-label">Agama</label>
                        <select name="id_agama" class="form-select" required>
                            <?php foreach($agama as $a): ?>
                                <option value="<?= $a->id ?>" <?= $pendaftaran->id_agama == $a->id ? 'selected' : '' ?>><?= $a->nama_agama ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6"><label class="form-label">Kewarganegaraan</label>
                        <select name="kewarganegaraan" class="form-select" required>
                            <option value="WNI" <?= $pendaftaran->kewarganegaraan == 'WNI' ? 'selected' : '' ?>>WNI</option>
                            <option value="WNA" <?= $pendaftaran->kewarganegaraan == 'WNA' ? 'selected' : '' ?>>WNA</option>
                        </select>
                    </div>
                    <div class="col-md-4"><label class="form-label">Anak Ke</label><input type="number" name="anak_ke" class="form-control" value="<?= $pendaftaran->anak_ke ?>" required></div>
                    <div class="col-md-4"><label class="form-label">Jml Sdr Kandung</label><input type="number" name="jumlah_saudara_kandung" class="form-control" value="<?= $pendaftaran->jumlah_saudara_kandung ?>" required></div>
                    <div class="col-md-4"><label class="form-label">Jml Sdr Angkat</label><input type="number" name="jumlah_saudara_angkat" class="form-control" value="<?= $pendaftaran->jumlah_saudara_angkat ?>" required></div>
                    <div class="col-md-4"><label class="form-label">Bahasa Sehari-hari</label><input type="text" name="bahasa_sehari_hari" class="form-control" value="<?= $pendaftaran->bahasa_sehari_hari ?>" required></div>
                    <div class="col-md-4"><label class="form-label">Berat Badan (kg)</label><input type="number" name="berat_badan" class="form-control" value="<?= $pendaftaran->berat_badan ?>" required></div>
                    <div class="col-md-4"><label class="form-label">Tinggi Badan (cm)</label><input type="number" name="tinggi_badan" class="form-control" value="<?= $pendaftaran->tinggi_badan ?>" required></div>
                    <div class="col-md-8"><label class="form-label">Alamat Lengkap</label><textarea name="alamat" class="form-control" rows="2" required><?= $pendaftaran->alamat ?></textarea></div>
                    <div class="col-md-4">
                        <label class="form-label">No Telp</label><input type="text" name="no_telp" class="form-control mb-3" value="<?= $pendaftaran->no_telp ?>" required>
                        <label class="form-label">Tempat Tinggal</label>
                        <select name="tempat_tinggal" class="form-select" required>
                            <option value="Orang Tua" <?= $pendaftaran->tempat_tinggal == 'Orang Tua' ? 'selected' : '' ?>>Orang Tua</option>
                            <option value="Wali" <?= $pendaftaran->tempat_tinggal == 'Wali' ? 'selected' : '' ?>>Wali</option>
                            <option value="Menumpang" <?= $pendaftaran->tempat_tinggal == 'Menumpang' ? 'selected' : '' ?>>Menumpang</option>
                            <option value="Asrama" <?= $pendaftaran->tempat_tinggal == 'Asrama' ? 'selected' : '' ?>>Asrama</option>
                        </select>
                    </div>
                </div>

                <h5 class="form-section-title">B. ORANG TUA PESERTA DIDIK</h5>
                <div class="row g-3 mb-4">
                    <div class="col-md-6"><label class="form-label">Nama Ayah Kandung</label><input type="text" name="nama_ayah" class="form-control" value="<?= $pendaftaran->nama_ayah ?>" required></div>
                    <div class="col-md-6"><label class="form-label">Nama Ibu Kandung</label><input type="text" name="nama_ibu" class="form-control" value="<?= $pendaftaran->nama_ibu ?>" required></div>
                    <div class="col-md-6"><label class="form-label">NIK Ayah</label><input type="text" name="nik_ayah" class="form-control" value="<?= $pendaftaran->nik_ayah ?>" required></div>
                    <div class="col-md-6"><label class="form-label">NIK Ibu</label><input type="text" name="nik_ibu" class="form-control" value="<?= $pendaftaran->nik_ibu ?>" required></div>
                    <div class="col-md-6"><label class="form-label">Pendidikan Terakhir Ayah</label><input type="text" name="pendidikan_ayah" class="form-control" value="<?= $pendaftaran->pendidikan_ayah ?>" required></div>
                    <div class="col-md-6"><label class="form-label">Pendidikan Terakhir Ibu</label><input type="text" name="pendidikan_ibu" class="form-control" value="<?= $pendaftaran->pendidikan_ibu ?>" required></div>
                    <div class="col-md-6"><label class="form-label">Penghasilan Ayah</label>
                        <select name="penghasilan_ayah" class="form-select" required>
                            <option value="Tidak Berpenghasilan" <?= $pendaftaran->penghasilan_ayah == 'Tidak Berpenghasilan' ? 'selected' : '' ?>>Tidak Berpenghasilan</option>
                            <option value="< 1.000.000" <?= $pendaftaran->penghasilan_ayah == '< 1.000.000' ? 'selected' : '' ?>>< 1.000.000</option>
                            <option value="1.000.000 - 2.000.000" <?= $pendaftaran->penghasilan_ayah == '1.000.000 - 2.000.000' ? 'selected' : '' ?>>1.000.000 - 2.000.000</option>
                            <option value="> 2.000.000" <?= $pendaftaran->penghasilan_ayah == '> 2.000.000' ? 'selected' : '' ?>>> 2.000.000</option>
                        </select>
                    </div>
                    <div class="col-md-6"><label class="form-label">Penghasilan Ibu</label>
                        <select name="penghasilan_ibu" class="form-select" required>
                            <option value="Tidak Berpenghasilan" <?= $pendaftaran->penghasilan_ibu == 'Tidak Berpenghasilan' ? 'selected' : '' ?>>Tidak Berpenghasilan</option>
                            <option value="< 1.000.000" <?= $pendaftaran->penghasilan_ibu == '< 1.000.000' ? 'selected' : '' ?>>< 1.000.000</option>
                            <option value="1.000.000 - 2.000.000" <?= $pendaftaran->penghasilan_ibu == '1.000.000 - 2.000.000' ? 'selected' : '' ?>>1.000.000 - 2.000.000</option>
                            <option value="> 2.000.000" <?= $pendaftaran->penghasilan_ibu == '> 2.000.000' ? 'selected' : '' ?>>> 2.000.000</option>
                        </select>
                    </div>
                    <div class="col-md-6"><label class="form-label">Pekerjaan Ayah</label>
                        <select name="id_pekerjaan_ayah" class="form-select" required>
                            <?php foreach($pekerjaan as $p): ?>
                                <option value="<?= $p->id ?>" <?= $pendaftaran->id_pekerjaan_ayah == $p->id ? 'selected' : '' ?>><?= $p->nama_pekerjaan ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6"><label class="form-label">Pekerjaan Ibu</label>
                        <select name="id_pekerjaan_ibu" class="form-select" required>
                            <?php foreach($pekerjaan as $p): ?>
                                <option value="<?= $p->id ?>" <?= $pendaftaran->id_pekerjaan_ibu == $p->id ? 'selected' : '' ?>><?= $p->nama_pekerjaan ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="row g-3 mb-5 border-top pt-3 bg-light rounded p-2">
                    <div class="col-12"><label class="form-label fw-bold text-primary">Nama Wali (Kosongkan jika tidak ada)</label><input type="text" name="nama_wali" class="form-control" value="<?= $pendaftaran->nama_wali ?>"></div>
                    <div class="col-md-4"><label class="form-label">Pendidikan Terakhir Wali</label><input type="text" name="pendidikan_wali" class="form-control" value="<?= $pendaftaran->pendidikan_wali ?>"></div>
                    <div class="col-md-4"><label class="form-label">Hubungan dengan Siswa</label><input type="text" name="hubungan_wali" class="form-control" value="<?= $pendaftaran->hubungan_wali ?>"></div>
                    <div class="col-md-4"><label class="form-label">Pekerjaan Wali</label>
                        <select name="id_pekerjaan_wali" class="form-select">
                            <option value="">Pilih...</option>
                            <?php foreach($pekerjaan as $p): ?>
                                <option value="<?= $p->id ?>" <?= $pendaftaran->id_pekerjaan_wali == $p->id ? 'selected' : '' ?>><?= $p->nama_pekerjaan ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <h5 class="form-section-title">C. ASAL MULA PESERTA DIDIK</h5>
                <div class="row g-3 mb-5">
                    <div class="col-md-4"><label class="form-label">Asal Peserta Didik</label><input type="text" name="asal_peserta_didik" class="form-control" value="<?= $pendaftaran->asal_peserta_didik ?>" required></div>
                    <div class="col-md-4"><label class="form-label">Nama Taman Kanak-Kanak</label><input type="text" name="nama_tk" class="form-control" value="<?= $pendaftaran->nama_tk ?>" required></div>
                    <div class="col-md-4"><label class="form-label">Tahun dan Nomor Ijazah</label><input type="text" name="tahun_nomor_ijazah" class="form-control" value="<?= $pendaftaran->tahun_nomor_ijazah ?>" required></div>
                </div>

                <div class="text-end border-top pt-4">
                    <button type="submit" class="btn btn-primary btn-lg rounded-pill fw-bold shadow px-5">Simpan Perubahan</button>
                </div>

            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>