<?php $this->template->section('title') ?>
Home
<?php $this->template->endsection() ?>

<?php $this->template->section('custom_css') ?>
<style>
    .col-centered {
        float: none;
        margin: 0 auto;
    }
    .box-body {
        padding: 30px !important;
    }
</style>
<?php $this->template->endsection() ?>

<?php $this->template->section('content') ?>
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Home</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="dropdown-dashboard">
                        <a href="listings-half-screen-map-list.html" class="interestContent">
                            <span>
                                <i class="fa fa-cart-plus"></i>
                                Laporan
                            </span>
                        </a>
                        <div class="dropdown-content">
                            <div class="dropdown-dashboard-sub">
                                <a href="">Laporan Bulanan</a>
                                <div class="dropdown-content-sub">
                                    <a href="<?= base_url('laporan_bulanan') ?>">Laporan Penjualan</a>
                                    <a href="<?= base_url('laporan_kinerja_bulanan') ?>">Laporan Kinerja Penjualan</a>
                                    <a class="empty-page" href="#">Empty</a>
                                    <a class="empty-page" href="#">Empty</a>
                                    <a class="empty-page" href="#">Empty</a>
                                </div>
                            </div>
                            <div class="dropdown-dashboard-sub">
                                <a href="">Laporan Harian</a>
                                <div class="dropdown-content-sub">
                                    <a href="<?= base_url('laporan_harian') ?>">Laporan Penjualan Harian</a>
                                    <a class="empty-page" href="#">Empty</a>
                                    <a class="empty-page" href="#">Empty</a>
                                    <a class="empty-page" href="#">Empty</a>
                                    <a class="empty-page" href="#">Empty</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <a href="<?= base_url('buku_pintar') ?>" class="interestContent">
                        <span>
                            <i class="fa fa-book"></i>
                            Buku Pintar
                        </span>
                    </a>
                </div>
                <div class="col-sm-4">
                    <a href="<?= base_url('balansitas') ?>" class="interestContent">
                        <span>
                            <i class="fa fa-balance-scale"></i>
                            Balansitas
                        </span>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="dropdown-dashboard">
                        <a href="listings-half-screen-map-list.html" class="interestContent">
                            <span>
                                <i class="fa fa-thumb-tack"></i>
                                Peraturan Subsidi
                            </span>
                        </a>
                        <div class="dropdown-content">
                            <a href="<?= base_url('permendag') ?>">Permendag</a>
                            <a href="<?= base_url('permentan') ?>">Permentan</a>
                            <a href="<?= base_url('sk_provinsi') ?>">SK Provinsi</a>
                            <a href="<?= base_url('surat_pupuk_indonesia') ?>">Surat PIHC</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="dropdown-dashboard">
                        <a href="listings-half-screen-map-list.html" class="interestContent">
                            <span>
                                <i class="fa fa-money"></i>
                                Harga
                            </span>
                        </a>
                        <div class="dropdown-content">
                            <a href="<?= base_url('harga_tebus_subsidi') ?>">Harga Tebus Subsidi</a>
                            <a href="<?= base_url('harga_tebus_non_subsidi') ?>">Harga Tebus non Subsidi</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <a href="<?= base_url('users') ?>" class="interestContent">
                        <span>
                            <i class="fa fa-users"></i>
                            User Management
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->template->endsection() ?>

<?php $this->template->section('custom_js') ?>
<?php $this->template->endsection() ?>

<?php $this->template->view('layouts/main') ?>