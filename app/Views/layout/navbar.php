<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme mt-3" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>
    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <div class="navbar-nav align-items-center">
            <div class="nav-item d-flex align-items-center">
                <span class="fw-bold fs-5 text-primary" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.1);">Penerimaan Murid Baru</span>
            </div>
        </div>
        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="<?= base_url('uploads/profil/' . session()->get('foto_profil')) ?>" alt="User Avatar" class="w-px-40 h-px-40 rounded-circle" style="object-fit: cover; border: 2px solid #696cff;" />
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" style="border-radius: 15px; border: 1px solid rgba(0,0,0,0.1); box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        <img src="<?= base_url('uploads/profil/' . session()->get('foto_profil')) ?>" alt class="w-px-40 h-px-40 rounded-circle" style="object-fit: cover;" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-semibold d-block"><?= session()->get('nama_lengkap') ?></span>
                                    <small class="text-muted text-uppercase"><?= session()->get('level') ?></small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li><div class="dropdown-divider"></div></li>
                    <li>
                        <a class="dropdown-item" href="<?= base_url(session()->get('level') == 'admin' ? 'admin/profil' : 'siswa/profil') ?>">
                            <i class="bx bx-user me-2 text-primary"></i>
                            <span class="align-middle fw-semibold">Edit Profil</span>
                        </a>
                    </li>
                    <li><div class="dropdown-divider"></div></li>
                    <li>
                        <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">
                            <i class="bx bx-power-off me-2 text-danger"></i>
                            <span class="align-middle text-danger fw-bold">Log Out</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>