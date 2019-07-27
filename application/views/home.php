<?php $this->template->section('title') ?>
Home
<?php $this->template->endsection() ?>

<?php $this->template->section('custom_css') ?>
<style>
    .col-centered {
        float: none;
        margin: 0 auto;
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
                                Laporan Penjualan
                            </span>
                        </a>
                        <div class="dropdown-content">
                            <a href="<?= base_url('laporan_bulanan') ?>">Laporan Bulanan</a>
                            <a href="<?= base_url('laporan_harian') ?>">Laporan Harian</a>
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
                            <a href="<?= base_url('harga_non_subsidi') ?>">Harga Tebus non Subsidi</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="dropdown-dashboard">
                        <a href="listings-half-screen-map-list.html" class="interestContent">
                            <span>
                                <i class="fa fa-cubes"></i>
                                Stok
                            </span>
                        </a>
                        <div class="dropdown-content">
                            <a href="<?= base_url('stok_subsidi') ?>">Stok Subsidi</a>
                            <a href="<?= base_url('stok_non_subsidi') ?>">Stok Non Subsidi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->template->endsection() ?>

<?php $this->template->section('custom_js') ?>
<?php $this->template->endsection() ?>

<?php $this->template->view('layouts/main') ?>