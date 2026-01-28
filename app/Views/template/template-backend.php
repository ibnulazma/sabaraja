<!DOCTYPE html>


<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="<?= base_url() ?>/tempalte/assets/"
    data-template="vertical-menu-template-free">

<head>

    <?= $this->include('template/header') ?>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <?= $this->include('template/sidebar') ?>
            </aside>
            <div class="layout-page">
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <?= $this->include('template/nav') ?>
                </nav>

                <div class="content-wrapper">
                    <?= $this->renderSection('content') ?>
                </div>

                <?= $this->include('template/footer') ?>





                <?php if (session()->get('password_default') == 1) : ?>
                    <div class="modal fade" id="modalGantiPassword" data-bs-backdrop="static" data-bs-keyboard="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-warning">
                                    <h5 class="modal-title">Ganti Password Wajib</h5>
                                </div>
                                <div class="modal-body">

                                    <?php if (session()->getFlashdata('error')) : ?>
                                        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                                    <?php endif; ?>

                                    <form id="formGantiPassword" action="<?= base_url('auth/update-password-pertama') ?>" method="post">
                                        <?= csrf_field(); ?>

                                        <div class="mb-3 position-relative">
                                            <label>Password Baru</label>
                                            <input type="password" name="password_baru" id="passwordBaru" class="form-control" required>
                                            <div class="password-strength mt-2">
                                                <div id="strengthBar"></div>
                                            </div>
                                            <small id="strengthText" class="text-muted"></small>
                                            <span class="toggle-password" onclick="togglePassword('passwordBaru', this)">👁️</span>
                                        </div>

                                        <div class="mb-3 position-relative">
                                            <label>Ulangi Password</label>
                                            <input type="password" name="konfirmasi_password" id="konfirmasiPassword" class="form-control" required>
                                            <span class="toggle-password" onclick="togglePassword('konfirmasiPassword', this)">👁️</span>
                                        </div>

                                        <small class="text-muted">
                                            Minimal 8 karakter, kombinasi huruf besar, huruf kecil, dan angka.
                                        </small>

                                        <button type="submit" class="btn btn-primary w-100 mt-3">Simpan Password Baru</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <style>
                        .toggle-password {
                            position: absolute;
                            top: 38px;
                            right: 15px;
                            cursor: pointer;
                            user-select: none;
                        }

                        .password-strength {
                            width: 100%;
                            height: 6px;
                            background: #eee;
                            border-radius: 10px;
                            overflow: hidden;
                        }

                        .password-strength {
                            width: 100%;
                            height: 6px;
                            background: #eee;
                            border-radius: 10px;
                            overflow: hidden;
                        }

                        #strengthBar {
                            height: 100%;
                            width: 0%;
                            transition: all 0.4s ease;
                        }

                        .strength-weak {
                            background: #dc3545 !important;
                            width: 33% !important;
                        }

                        .strength-medium {
                            background: #ffc107 !important;
                            width: 66% !important;
                        }

                        .strength-strong {
                            background: #198754 !important;
                            width: 100% !important;
                        }
                    </style>

                    <script>
                        function togglePassword(fieldId, el) {
                            const input = document.getElementById(fieldId);
                            if (input.type === "password") {
                                input.type = "text";
                                el.textContent = "🙈";
                            } else {
                                input.type = "password";
                                el.textContent = "👁️";
                            }
                        }

                        // Validasi sebelum submit (frontend)
                        document.getElementById("formGantiPassword")?.addEventListener("submit", function(e) {
                            const pass = document.getElementById("passwordBaru").value;
                            const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;

                            if (!regex.test(pass)) {
                                e.preventDefault();
                                alert("Password harus minimal 8 karakter dan mengandung huruf besar, huruf kecil, serta angka.");
                            }
                        });

                        // Auto tampilkan modal
                        document.addEventListener("DOMContentLoaded", function() {
                            var myModal = new bootstrap.Modal(document.getElementById('modalGantiPassword'));
                            myModal.show();
                        });
                    </script>



                    <script>
                        const passwordInput = document.getElementById("passwordBaru");
                        const strengthBar = document.getElementById("strengthBar");
                        const strengthText = document.getElementById("strengthText");

                        if (passwordInput) {
                            passwordInput.addEventListener("input", function() {
                                const val = passwordInput.value;
                                let strength = 0;

                                if (val.length >= 8) strength++;
                                if (/[A-Z]/.test(val)) strength++;
                                if (/[0-9]/.test(val)) strength++;
                                if (/[^A-Za-z0-9]/.test(val)) strength++;

                                strengthBar.classList.remove("strength-weak", "strength-medium", "strength-strong");

                                if (strength <= 1) {
                                    strengthBar.classList.add("strength-weak");
                                    strengthText.textContent = "Password lemah";
                                    strengthText.style.color = "#dc3545";
                                } else if (strength <= 3) {
                                    strengthBar.classList.add("strength-medium");
                                    strengthText.textContent = "Password sedang";
                                    strengthText.style.color = "#ffc107";
                                } else {
                                    strengthBar.classList.add("strength-strong");
                                    strengthText.textContent = "Password kuat";
                                    strengthText.style.color = "#198754";
                                }
                            });
                        }
                    </script>

                <?php endif; ?>