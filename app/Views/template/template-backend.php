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