<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
    <ul class="nav navbar-nav">
        <li class="">
            <a href="<?= base_url() ?>">Home </a>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Laporan <b class="caret"></b></a>
            <ul class="dropdown-menu multi-level">
                <li class="dropdown-submenu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Laporan Bulanan</a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= base_url('laporan_bulanan') ?>">Laporan Penjualan</a></li>
                        <li><a href="<?= base_url('laporan_kinerja_bulanan') ?>">Laporan Kinerja Penjualan</a></li>
                        <li><a class="empty-page" href="#">Empty</a></li>
                        <li><a class="empty-page" href="#">Empty</a></li>
                        <li><a class="empty-page" href="#">Empty</a></li>
                    </ul>
                </li>
                <li class="dropdown-submenu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Laporan Harian</a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= base_url('laporan_harian') ?>">Laporan Penjualan Harian</a></li>
                        <li><a class="empty-page" href="#">Empty</a></li>
                        <li><a class="empty-page" href="#">Empty</a></li>
                        <li><a class="empty-page" href="#">Empty</a></li>
                        <li><a class="empty-page" href="#">Empty</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="<?= base_url('buku_pintar') ?>">Buku Pintar </a>
        </li>
        <li class="">
            <a href="<?= base_url('balansitas') ?>">Balansitas </a>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Peraturan Subsidi <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="<?= base_url('permendag') ?>">Permendag</a></li>
                <li><a href="<?= base_url('permentan') ?>">Permentan</a></li>
                <li><a href="<?= base_url('sk_provinsi') ?>">SK provinsi</a></li>
                <li><a href="<?= base_url('surat_pupuk_indonesia') ?>">Surat PIHC</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Harga <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="<?= base_url('harga_tebus_subsidi') ?>">Harga Tebus Subsidi</a></li>
                <li><a href="<?= base_url('harga_tebus_non_subsidi') ?>">Harga Tebus non Subsidi</a></li>
            </ul>
        </li>
        
        <li class="">
            <a href="<?= base_url('users') ?>">User Management </a>
        </li>
    </ul>
</div>