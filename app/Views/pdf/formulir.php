<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Formulir Pendaftaran - <?= $pendaftaran->nama_peserta_didik ?></title>
    <style>
        @page {
            margin: 0px;
        }
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #000;
            margin: 0;
            padding: 0;
        }
        .bg-img {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.2;
        }
        .content {
            padding: 40px 50px;
            position: relative;
            z-index: 1;
        }
        .kop-surat {
            width: 100%;
            border-bottom: 3px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
            display: table;
        }
        .logo-kiri {
            display: table-cell;
            width: 15%;
            vertical-align: middle;
            text-align: center;
        }
        .logo-kiri img {
            max-width: 80px;
            max-height: 80px;
        }
        .logo-kanan {
            display: table-cell;
            width: 15%;
            vertical-align: middle;
            text-align: center;
        }
        .logo-kanan img {
            max-width: 80px;
            max-height: 80px;
        }
        .teks-kop {
            display: table-cell;
            width: 70%;
            vertical-align: middle;
            text-align: center;
        }
        .teks-kop h2 {
            margin: 0 0 5px 0;
            font-size: 20px;
            text-transform: uppercase;
        }
        .teks-kop p {
            margin: 0;
            font-size: 12px;
        }
        .title {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 20px;
            text-decoration: underline;
        }
        .section-title {
            font-weight: bold;
            background-color: #f0f0f0;
            padding: 5px;
            margin-top: 15px;
            margin-bottom: 10px;
            border: 1px solid #000;
        }
        table.tabel-data {
            width: 100%;
            border-collapse: collapse;
        }
        table.tabel-data td {
            padding: 4px;
            vertical-align: top;
        }
        table.tabel-data td:nth-child(1) { width: 5%; }
        table.tabel-data td:nth-child(2) { width: 35%; }
        table.tabel-data td:nth-child(3) { width: 2%; }
        table.tabel-data td:nth-child(4) { width: 58%; }
        
        table.tabel-petugas {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
            margin-bottom: 25px;
        }
        table.tabel-petugas td {
            border: 1px solid #000;
            padding: 10px;
        }
        table.tabel-petugas td:nth-child(1) { width: 30%; font-weight: bold; }
        table.tabel-petugas td:nth-child(2) { width: 70%; }
        
        .ttd-container {
            width: 100%;
            margin-top: 20px;
            page-break-inside: avoid;
        }
        .ttd-box {
            width: 50%;
            float: left;
            text-align: center;
        }
        .ttd-img {
            height: 80px;
            object-fit: contain;
            margin: 10px 0;
        }
        .clear {
            clear: both;
        }
    </style>
</head>
<body>

    <?php if ($latar && file_exists('uploads/latar_belakang/' . $latar->gambar)) : ?>
        <img src="<?= base_url('uploads/latar_belakang/' . $latar->gambar) ?>" class="bg-img" alt="Background">
    <?php endif; ?>

    <div class="content">
        <div class="kop-surat">
            <div class="logo-kiri">
                <?php if ($sekolah && $sekolah->logo_pemda && file_exists('uploads/logo/' . $sekolah->logo_pemda)) : ?>
                    <img src="<?= base_url('uploads/logo/' . $sekolah->logo_pemda) ?>" alt="Logo Pemda">
                <?php endif; ?>
            </div>
            <div class="teks-kop">
                <h2><?= $sekolah ? strtoupper($sekolah->nama_sekolah) : 'NAMA SEKOLAH' ?></h2>
                <p><?= $sekolah ? $sekolah->alamat_lengkap : 'Alamat Lengkap Sekolah' ?></p>
            </div>
            <div class="logo-kanan">
                <?php if ($sekolah && $sekolah->logo_sekolah && file_exists('uploads/logo/' . $sekolah->logo_sekolah)) : ?>
                    <img src="<?= base_url('uploads/logo/' . $sekolah->logo_sekolah) ?>" alt="Logo Sekolah">
                <?php endif; ?>
            </div>
        </div>

        <div class="title">FORMULIR PENDAFTARAN PESERTA DIDIK BARU</div>

        <div class="section-title">A. IDENTITAS PESERTA DIDIK</div>
        <table class="tabel-data">
            <tr><td>1.</td><td>No Kartu Keluarga</td><td>:</td><td><?= $pendaftaran->no_kk ?></td></tr>
            <tr><td>2.</td><td>NIK Siswa</td><td>:</td><td><?= $pendaftaran->nik_siswa ?></td></tr>
            <tr><td>3.</td><td>Nama Peserta Didik</td><td>:</td><td><?= $pendaftaran->nama_peserta_didik ?></td></tr>
            <tr><td>4.</td><td>Nama Panggilan</td><td>:</td><td><?= $pendaftaran->nama_panggilan ?></td></tr>
            <tr><td>5.</td><td>Jenis Kelamin</td><td>:</td><td><?= $pendaftaran->jenis_kelamin ?></td></tr>
            <tr><td>6.</td><td>Tempat Lahir</td><td>:</td><td><?= $pendaftaran->tempat_lahir ?></td></tr>
            <tr><td>7.</td><td>Tanggal Lahir</td><td>:</td><td><?= date('d - m - Y', strtotime($pendaftaran->tanggal_lahir)) ?></td></tr>
            <tr><td>8.</td><td>Kewarganegaraan</td><td>:</td><td><?= $pendaftaran->kewarganegaraan ?></td></tr>
            <tr><td>9.</td><td>Anak Ke</td><td>:</td><td><?= $pendaftaran->anak_ke ?></td></tr>
            <tr><td>10.</td><td>Jumlah Saudara Kandung</td><td>:</td><td><?= $pendaftaran->jumlah_saudara_kandung ?></td></tr>
            <tr><td>11.</td><td>Jumlah Saudara Angkat</td><td>:</td><td><?= $pendaftaran->jumlah_saudara_angkat ?></td></tr>
            <tr><td>12.</td><td>Bahasa Sehari-hari</td><td>:</td><td><?= $pendaftaran->bahasa_sehari_hari ?></td></tr>
            <tr><td>13.</td><td>Berat Badan</td><td>:</td><td><?= $pendaftaran->berat_badan ?> Kg</td></tr>
            <tr><td>14.</td><td>Tinggi Badan</td><td>:</td><td><?= $pendaftaran->tinggi_badan ?> Cm</td></tr>
            <tr><td>15.</td><td>Alamat Lengkap</td><td>:</td><td><?= $pendaftaran->alamat ?></td></tr>
            <tr><td>16.</td><td>No Telp / HP</td><td>:</td><td><?= $pendaftaran->no_telp ?></td></tr>
            <tr><td>17.</td><td>Tempat Tinggal</td><td>:</td><td><?= $pendaftaran->tempat_tinggal ?></td></tr>
        </table>

        <div class="section-title">B. ORANG TUA / WALI PESERTA DIDIK</div>
        <table class="tabel-data">
            <tr><td>18.</td><td>Nama Ayah Kandung</td><td>:</td><td><?= $pendaftaran->nama_ayah ?></td></tr>
            <tr><td>19.</td><td>Nama Ibu Kandung</td><td>:</td><td><?= $pendaftaran->nama_ibu ?></td></tr>
            <tr><td>20.</td><td>NIK Ayah</td><td>:</td><td><?= $pendaftaran->nik_ayah ?></td></tr>
            <tr><td>21.</td><td>NIK Ibu</td><td>:</td><td><?= $pendaftaran->nik_ibu ?></td></tr>
            <tr><td>22.</td><td>Pendidikan Terakhir Ayah</td><td>:</td><td><?= $pendaftaran->pendidikan_ayah ?></td></tr>
            <tr><td>23.</td><td>Pendidikan Terakhir Ibu</td><td>:</td><td><?= $pendaftaran->pendidikan_ibu ?></td></tr>
            <tr><td>24.</td><td>Penghasilan Ayah</td><td>:</td><td><?= $pendaftaran->penghasilan_ayah ?></td></tr>
            <tr><td>25.</td><td>Penghasilan Ibu</td><td>:</td><td><?= $pendaftaran->penghasilan_ibu ?></td></tr>
            <?php if ($pendaftaran->nama_wali) : ?>
                <tr><td>26.</td><td>Nama Wali</td><td>:</td><td><?= $pendaftaran->nama_wali ?></td></tr>
                <tr><td>27.</td><td>Pendidikan Terakhir Wali</td><td>:</td><td><?= $pendaftaran->pendidikan_wali ?></td></tr>
                <tr><td>28.</td><td>Hubungan dengan Siswa</td><td>:</td><td><?= $pendaftaran->hubungan_wali ?></td></tr>
            <?php endif; ?>
        </table>

        <div class="section-title">C. ASAL MULA PESERTA DIDIK</div>
        <table class="tabel-data">
            <tr><td>29.</td><td>Masuk Sekolah Ini Sebagai</td><td>:</td><td><?= $pendaftaran->masuk_sebagai ?></td></tr>
            <tr><td>30.</td><td>Asal Peserta Didik</td><td>:</td><td><?= $pendaftaran->asal_peserta_didik ?></td></tr>
            <tr><td>31.</td><td>Nama Taman Kanak-Kanak</td><td>:</td><td><?= $pendaftaran->nama_tk ?></td></tr>
            <tr><td>32.</td><td>Tahun & Nomor Ijazah TK</td><td>:</td><td><?= $pendaftaran->tahun_nomor_ijazah ?></td></tr>
        </table>

        <div class="section-title">D. DIISI OLEH PETUGAS</div>
        <table class="tabel-petugas">
            <tr>
                <td>Nama Petugas Penerima</td>
                <td></td>
            </tr>
            <tr>
                <td>Nomor Berkas</td>
                <td></td>
            </tr>
        </table>

        <div class="ttd-container">
            <div class="ttd-box">
                <p>Orang Tua / Wali Siswa</p>
                <br>
                <?php if ($pendaftaran->ttd_ortu && file_exists('uploads/ttd/' . $pendaftaran->ttd_ortu)) : ?>
                    <img src="<?= base_url('uploads/ttd/' . $pendaftaran->ttd_ortu) ?>" class="ttd-img" alt="TTD Orang Tua">
                <?php else : ?>
                    <div style="height: 80px;"></div>
                <?php endif; ?>
                <p style="text-decoration: underline; font-weight: bold;"><?= $pendaftaran->nama_ayah ? $pendaftaran->nama_ayah : ($pendaftaran->nama_wali ? $pendaftaran->nama_wali : '..................................') ?></p>
            </div>
            <div class="ttd-box">
                <p><?= $sekolah ? $sekolah->desa : 'Desa' ?>, <?= date('d M Y', strtotime($pendaftaran->created_at)) ?><br>Kepala Sekolah</p>
                <?php if ($sekolah && $sekolah->ttd_kepsek && file_exists('uploads/ttd/' . $sekolah->ttd_kepsek)) : ?>
                    <img src="<?= base_url('uploads/ttd/' . $sekolah->ttd_kepsek) ?>" class="ttd-img" alt="TTD Kepsek">
                <?php else : ?>
                    <div style="height: 80px;"></div>
                <?php endif; ?>
                <p style="text-decoration: underline; font-weight: bold;"><?= $sekolah ? $sekolah->nama_kepsek : '..................................' ?></p>
                <p>NIP. <?= $sekolah ? $sekolah->nip_kepsek : '..................................' ?></p>
            </div>
            <div class="clear"></div>
        </div>

    </div>
</body>
</html>