<?php
$db     = \Config\Database::connect();
$guru = $db->table('tbl_guru')
    ->join('tbl_kelas', 'tbl_kelas.id_guru = tbl_guru.id_guru', 'left')
    ->where('niy', session()->get('username'))
    ->get()->getRowArray();













?>






<div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
        <i class="bx bx-menu bx-sm"></i>
    </a>
</div>

<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
    <!-- Search -->
    <div class="navbar-nav align-items-center">
        <div class="nav-item d-flex align-items-center">
            <?php if (session()->get('level') == 1) { ?>
                <span><?= session()->get('nama') ?></span>

            <?php } elseif (session()->get('level') == 2) { ?>
                <span><?= session()->get('nama') ?></span>
            <?php } elseif (session()->get('level') == 3) { ?>
                <span><?= session()->get('nama') ?></span>
            <?php } ?>
        </div>
    </div>
    <!-- /Search -->

    <ul class="navbar-nav flex-row align-items-center ms-auto">
        <!-- Place this tag where you want the button to render. -->

        <!-- User -->
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                <?php if (session()->get('level') == 1) { ?>
                    <div class="avatar avatar-online">
                        <img src="<?= base_url() ?>/template/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                <?php } else if (session()->get('level') == 2) { ?>
                    <div class="avatar avatar-online">
                        <img src="<?= base_url() ?>/template/assets/img/avatars/logo.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                <?php } else if (session()->get('level') == 3) { ?>
                    <div class="avatar avatar-online">

                        <img src="<?= base_url() ?>/template/assets/img/avatars/logo.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                <?php } ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item" href="#">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar avatar-online">
                                    <img src="<?= base_url() ?>/template/assets/img/avatars/logo.png" alt class="w-px-40 h-auto rounded-circle" />
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <?php if (session()->get('level') == 1) { ?>
                                    <span class="fw-semibold d-block"><?= session()->get('nama') ?></span>
                                <?php } else if (session()->get('level') == 2) { ?>
                                    <span class="fw-semibold d-block"><?= session()->get('nama') ?></span>
                                <?php } else if (session()->get('level') == 3) { ?>
                                    <span class="fw-semibold d-block"><?= session()->get('nama') ?></span>
                                <?php } ?>
                                <?php if (session()->get('level') == 1) { ?>
                                    <small class="text-muted">Admin</small>
                                <?php } else if (session()->get('level') == 2) { ?>
                                    <small class="text-muted">Guru</small>
                                <?php } else if (session()->get('level') == 3) { ?>
                                    <small class="text-muted">Siswa</small>
                                <?php } ?>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <div class="dropdown-divider"></div>
                </li>
                <li>
                    <a class="dropdown-item" href="#">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                    </a>
                </li>
                <li>
                    <div class="dropdown-divider"></div>
                </li>
                <li>
                    <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                    </a>
                </li>
            </ul>
        </li>
        <!--/ User -->
    </ul>
</div>