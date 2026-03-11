<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<style>
    .glass-form {
        background: rgba(255, 255, 255, 0.9);
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
    #signature-pad {
        border: 2px dashed #696cff;
        border-radius: 10px;
        background: #fff;
        cursor: crosshair;
        width: 100%;
        max-width: 500px;
        height: 200px;
    }
</style>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4 text-white" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.2);">Formulir Pendaftaran</h4>

    <div class="card glass-form mb-4">
        <div class="card-body p-4 p-md-5">
            <form id="formPendaftaran" action="<?= base_url('siswa/pendaftaran/store') ?>" method="POST">
                
                <h5 class="form-section-title">A. IDENTITAS PESERTA DIDIK</h5>
                <div class="row g-3 mb-5">
                    <div class="col-md-6"><label class="form-label">1. No Kartu Keluarga</label><input type="text" name="no_kk" class="form-control" required></div>
                    <div class="col-md-6"><label class="form-label">2. NIK Siswa</label><input type="text" name="nik_siswa" class="form-control" required></div>
                    <div class="col-md-6"><label class="form-label">3. Nama Peserta Didik</label><input type="text" name="nama_peserta_didik" class="form-control" required></div>
                    <div class="col-md-6"><label class="form-label">4. Nama Panggilan</label><input type="text" name="nama_panggilan" class="form-control" required></div>
                    <div class="col-md-6"><label class="form-label">5. Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select" required>
                            <option value="">Pilih...</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-3"><label class="form-label">6. Tempat Lahir</label><input type="text" name="tempat_lahir" class="form-control" required></div>
                    <div class="col-md-3"><label class="form-label">7. Tanggal Lahir</label><input type="date" name="tanggal_lahir" class="form-control" required></div>
                    <div class="col-md-6"><label class="form-label">8. Agama</label>
                        <select name="id_agama" class="form-select" required>
                            <option value="">Pilih...</option>
                            <?php foreach($agama as $a): ?><option value="<?= $a->id ?>"><?= $a->nama_agama ?></option><?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6"><label class="form-label">9. Kewarganegaraan</label>
                        <select name="kewarganegaraan" class="form-select" required>
                            <option value="WNI">WNI</option>
                            <option value="WNA">WNA</option>
                        </select>
                    </div>
                    <div class="col-md-4"><label class="form-label">10. Anak Ke</label><input type="number" name="anak_ke" class="form-control" required></div>
                    <div class="col-md-4"><label class="form-label">11. Jml Sdr Kandung</label><input type="number" name="jumlah_saudara_kandung" class="form-control" required></div>
                    <div class="col-md-4"><label class="form-label">12. Jml Sdr Angkat</label><input type="number" name="jumlah_saudara_angkat" class="form-control" required></div>
                    <div class="col-md-4"><label class="form-label">13. Bahasa Sehari-hari</label><input type="text" name="bahasa_sehari_hari" class="form-control" required></div>
                    <div class="col-md-4"><label class="form-label">14. Berat Badan (kg)</label><input type="number" name="berat_badan" class="form-control" required></div>
                    <div class="col-md-4"><label class="form-label">15. Tinggi Badan (cm)</label><input type="number" name="tinggi_badan" class="form-control" required></div>
                    <div class="col-md-8"><label class="form-label">16. Alamat Lengkap</label><textarea name="alamat" class="form-control" rows="2" required></textarea></div>
                    <div class="col-md-4">
                        <label class="form-label">17. No Telp</label><input type="text" name="no_telp" class="form-control mb-3" required>
                        <label class="form-label">18. Tempat Tinggal</label>
                        <select name="tempat_tinggal" class="form-select" required>
                            <option value="Orang Tua">Orang Tua</option>
                            <option value="Wali">Wali</option>
                            <option value="Menumpang">Menumpang</option>
                            <option value="Asrama">Asrama</option>
                        </select>
                    </div>
                </div>

                <h5 class="form-section-title">B. ORANG TUA PESERTA DIDIK</h5>
                <div class="row g-3 mb-4">
                    <div class="col-md-6"><label class="form-label">19a. Nama Ayah Kandung</label><input type="text" name="nama_ayah" class="form-control" required></div>
                    <div class="col-md-6"><label class="form-label">19b. Nama Ibu Kandung</label><input type="text" name="nama_ibu" class="form-control" required></div>
                    <div class="col-md-6"><label class="form-label">20a. NIK Ayah</label><input type="text" name="nik_ayah" class="form-control" required></div>
                    <div class="col-md-6"><label class="form-label">20b. NIK Ibu</label><input type="text" name="nik_ibu" class="form-control" required></div>
                    <div class="col-md-6"><label class="form-label">21a. Pendidikan Terakhir Ayah</label><input type="text" name="pendidikan_ayah" class="form-control" required></div>
                    <div class="col-md-6"><label class="form-label">21b. Pendidikan Terakhir Ibu</label><input type="text" name="pendidikan_ibu" class="form-control" required></div>
                    <div class="col-md-6"><label class="form-label">22a. Penghasilan Ayah</label>
                        <select name="penghasilan_ayah" class="form-select" required>
                            <option value="Tidak Berpenghasilan">Tidak Berpenghasilan</option>
                            <option value="< 1.000.000">< 1.000.000</option>
                            <option value="1.000.000 - 2.000.000">1.000.000 - 2.000.000</option>
                            <option value="> 2.000.000">> 2.000.000</option>
                        </select>
                    </div>
                    <div class="col-md-6"><label class="form-label">22b. Penghasilan Ibu</label>
                        <select name="penghasilan_ibu" class="form-select" required>
                            <option value="Tidak Berpenghasilan">Tidak Berpenghasilan</option>
                            <option value="< 1.000.000">< 1.000.000</option>
                            <option value="1.000.000 - 2.000.000">1.000.000 - 2.000.000</option>
                            <option value="> 2.000.000">> 2.000.000</option>
                        </select>
                    </div>
                    <div class="col-md-6"><label class="form-label">23a. Pekerjaan Ayah</label>
                        <select name="id_pekerjaan_ayah" class="form-select" required>
                            <option value="">Pilih...</option>
                            <?php foreach($pekerjaan as $p): ?><option value="<?= $p->id ?>"><?= $p->nama_pekerjaan ?></option><?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6"><label class="form-label">23b. Pekerjaan Ibu</label>
                        <select name="id_pekerjaan_ibu" class="form-select" required>
                            <option value="">Pilih...</option>
                            <?php foreach($pekerjaan as $p): ?><option value="<?= $p->id ?>"><?= $p->nama_pekerjaan ?></option><?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="row g-3 mb-5 border-top pt-3">
                    <div class="col-12"><label class="form-label fw-bold text-primary">24. Nama Wali (Opsional)</label><input type="text" id="nama_wali" name="nama_wali" class="form-control" placeholder="Isi jika ada wali"></div>
                    <div class="col-md-4 wali-field" style="display: none;"><label class="form-label">25. Pendidikan Terakhir Wali</label><input type="text" name="pendidikan_wali" class="form-control"></div>
                    <div class="col-md-4 wali-field" style="display: none;"><label class="form-label">26. Hubungan dengan Peserta Didik</label><input type="text" name="hubungan_wali" class="form-control"></div>
                    <div class="col-md-4 wali-field" style="display: none;"><label class="form-label">27. Pekerjaan Wali</label>
                        <select name="id_pekerjaan_wali" class="form-select">
                            <option value="">Pilih...</option>
                            <?php foreach($pekerjaan as $p): ?><option value="<?= $p->id ?>"><?= $p->nama_pekerjaan ?></option><?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <h5 class="form-section-title">C. ASAL MULA PESERTA DIDIK</h5>
                <div class="row g-3 mb-5">
                    <div class="col-md-12"><label class="form-label">28. Masuk Sekolah ini sebagai</label><input type="text" class="form-control" value="Murid Baru" readonly></div>
                    <div class="col-md-4"><label class="form-label">29a. Asal Peserta Didik</label><input type="text" name="asal_peserta_didik" class="form-control" required></div>
                    <div class="col-md-4"><label class="form-label">29b. Nama Taman Kanak-Kanak</label><input type="text" name="nama_tk" class="form-control" required></div>
                    <div class="col-md-4"><label class="form-label">29c. Tahun dan Nomor Ijazah</label><input type="text" name="tahun_nomor_ijazah" class="form-control" required></div>
                </div>

                <div class="border p-4 rounded bg-light mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="cekKebenaran" style="width: 20px; height: 20px;">
                        <label class="form-check-label ms-2 fw-bold text-dark mt-1" for="cekKebenaran">
                            Pernyataan bahwa data yang diinput sudah sesuai data kependudukan resmi.
                        </label>
                    </div>
                </div>

                <div class="text-center mb-4">
                    <label class="form-label fw-bold d-block mb-3 fs-5">Tanda Tangan Orang Tua / Wali</label>
                    <canvas id="signature-pad"></canvas>
                    <div class="mt-2">
                        <button type="button" class="btn btn-sm btn-outline-danger" id="clear-signature">Bersihkan Tanda Tangan</button>
                    </div>
                    <input type="hidden" name="ttd_ortu_base64" id="ttd_ortu_base64" required>
                </div>

                <div class="text-end">
                    <button type="submit" id="btnSubmit" class="btn btn-primary btn-lg rounded-pill fw-bold shadow px-5" disabled>Kirim Pendaftaran</button>
                </div>

            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    document.getElementById('nama_wali').addEventListener('input', function() {
        let fields = document.querySelectorAll('.wali-field');
        if(this.value.trim().length > 0) {
            fields.forEach(el => el.style.display = 'block');
        } else {
            fields.forEach(el => el.style.display = 'none');
        }
    });

    const checkbox = document.getElementById('cekKebenaran');
    const btnSubmit = document.getElementById('btnSubmit');
    checkbox.addEventListener('change', function() {
        btnSubmit.disabled = !this.checked;
    });

    const canvas = document.getElementById('signature-pad');
    const ctx = canvas.getContext('2d');
    let isDrawing = false;

    canvas.width = canvas.offsetWidth;
    canvas.height = canvas.offsetHeight;

    ctx.lineWidth = 3;
    ctx.lineCap = 'round';
    ctx.strokeStyle = '#000';

    function getMousePos(canvas, evt) {
        var rect = canvas.getBoundingClientRect();
        return {
            x: (evt.clientX || evt.touches[0].clientX) - rect.left,
            y: (evt.clientY || evt.touches[0].clientY) - rect.top
        };
    }

    function startDrawing(e) {
        isDrawing = true;
        let pos = getMousePos(canvas, e);
        ctx.beginPath();
        ctx.moveTo(pos.x, pos.y);
        e.preventDefault();
    }

    function draw(e) {
        if (!isDrawing) return;
        let pos = getMousePos(canvas, e);
        ctx.lineTo(pos.x, pos.y);
        ctx.stroke();
        e.preventDefault();
    }

    function stopDrawing() {
        if (isDrawing) {
            isDrawing = false;
            document.getElementById('ttd_ortu_base64').value = canvas.toDataURL('image/png');
        }
    }

    canvas.addEventListener('mousedown', startDrawing);
    canvas.addEventListener('mousemove', draw);
    canvas.addEventListener('mouseup', stopDrawing);
    canvas.addEventListener('mouseout', stopDrawing);

    canvas.addEventListener('touchstart', startDrawing, {passive: false});
    canvas.addEventListener('touchmove', draw, {passive: false});
    canvas.addEventListener('touchend', stopDrawing);

    document.getElementById('clear-signature').addEventListener('click', function() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        document.getElementById('ttd_ortu_base64').value = '';
    });

    document.getElementById('formPendaftaran').addEventListener('submit', function(e) {
        if (document.getElementById('ttd_ortu_base64').value === '') {
            e.preventDefault();
            alert('Mohon lengkapi tanda tangan terlebih dahulu.');
        }
    });
</script>
<?= $this->endSection() ?>