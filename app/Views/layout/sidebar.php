<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo mt-2 mb-2">
        <a href="<?= base_url() ?>" class="app-brand-link">
            <i class='bx bxs-school fs-2 text-primary'></i>
            <span class="app-brand-text demo menu-text fw-bolder ms-2 text-uppercase">SPMB</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>
    
    <div class="user-profile text-center mt-3 mb-4">
        <img src="<?= base_url('uploads/profil/' . session()->get('foto_profil')) ?>" alt="Foto Profil" class="rounded-circle mb-2 shadow-sm" style="width: 80px; height: 80px; object-fit: cover; border: 3px solid #696cff; padding: 2px;">
        <h6 class="mb-0 fw-bold text-dark"><?= session()->get('nama_lengkap') ?></h6>
        <small class="badge bg-label-primary text-uppercase mt-1"><?= session()->get('level') ?></small>
    </div>

    <ul class="menu-inner py-1">
        <?php if(session()->get('level') == 'admin'): ?>
            <li class="menu-item <?= uri_string() == 'admin/dashboard' ? 'active' : '' ?>">
                <a href="<?= base_url('admin/dashboard') ?>" class="menu-link"><i class="menu-icon tf-icons bx bx-home-circle"></i><div data-i18n="Dashboard">Dashboard</div></a>
            </li>
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Master Data</span></li>
            <li class="menu-item <?= uri_string() == 'admin/adminuser' ? 'active' : '' ?>">
                <a href="<?= base_url('admin/adminuser') ?>" class="menu-link"><i class="menu-icon tf-icons bx bx-user"></i><div data-i18n="User Admin">User Admin</div></a>
            </li>
            <li class="menu-item <?= uri_string() == 'admin/agama' ? 'active' : '' ?>">
                <a href="<?= base_url('admin/agama') ?>" class="menu-link"><i class="menu-icon tf-icons bx bx-book"></i><div data-i18n="Agama">Agama</div></a>
            </li>
            <li class="menu-item <?= uri_string() == 'admin/pekerjaan' ? 'active' : '' ?>">
                <a href="<?= base_url('admin/pekerjaan') ?>" class="menu-link"><i class="menu-icon tf-icons bx bx-briefcase"></i><div data-i18n="Pekerjaan">Pekerjaan</div></a>
            </li>
            <li class="menu-item <?= uri_string() == 'admin/persyaratan' ? 'active' : '' ?>">
                <a href="<?= base_url('admin/persyaratan') ?>" class="menu-link"><i class="menu-icon tf-icons bx bx-file"></i><div data-i18n="Persyaratan">Persyaratan</div></a>
            </li>
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Pendaftaran</span></li>
            <li class="menu-item <?= strpos(uri_string(), 'admin/konfirmasi') !== false ? 'active' : '' ?>">
                <a href="<?= base_url('admin/konfirmasi') ?>" class="menu-link"><i class="menu-icon tf-icons bx bx-check-shield"></i><div data-i18n="Konfirmasi">Konfirmasi Pendaftaran</div></a>
            </li>
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Pengaturan</span></li>
            <li class="menu-item <?= uri_string() == 'admin/profilsekolah' ? 'active' : '' ?>">
                <a href="<?= base_url('admin/profilsekolah') ?>" class="menu-link"><i class="menu-icon tf-icons bx bx-building-house"></i><div data-i18n="Profil Sekolah">Profil Sekolah</div></a>
            </li>
            <li class="menu-item <?= uri_string() == 'admin/latarbelakang' ? 'active' : '' ?>">
                <a href="<?= base_url('admin/latarbelakang') ?>" class="menu-link"><i class="menu-icon tf-icons bx bx-image"></i><div data-i18n="Latar PDF">Latar PDF</div></a>
            </li>
        <?php else: ?>
            <li class="menu-item <?= uri_string() == 'siswa/dashboard' ? 'active' : '' ?>">
                <a href="<?= base_url('siswa/dashboard') ?>" class="menu-link"><i class="menu-icon tf-icons bx bx-home-circle"></i><div data-i18n="Dashboard">Dashboard</div></a>
            </li>
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Pendaftaran</span></li>
            <li class="menu-item <?= uri_string() == 'siswa/pendaftaran' ? 'active' : '' ?>">
                <a href="<?= base_url('siswa/pendaftaran') ?>" class="menu-link"><i class="menu-icon tf-icons bx bx-edit"></i><div data-i18n="Isi Formulir">Isi Formulir</div></a>
            </li>
        <?php endif; ?>
    </ul>
</aside>