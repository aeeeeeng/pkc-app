<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
    <ul class="nav navbar-nav">
        <li class="">
            <a href="<?= base_url() ?>">Home </a>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Laporan Penjualan <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="<?= base_url('laporan_bulanan') ?>">Laporan Bulanan</a></li>
                <li><a href="<?= base_url('laporan_harian') ?>">Laporan Harian</a></li>
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
                <li><a href="<?= base_url('harga_subsidi') ?>">Harga Tebus Subsidi</a></li>
                <li><a href="<?= base_url('harga_non_subsidi') ?>">Harga Tebus non Subsidi</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Stok <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="<?= base_url('stok_subsidi') ?>">Stok Subsidi</a></li>
                <li><a href="<?= base_url('stok_non_subsidi') ?>">Stok Non Subsidi</a></li>
            </ul>
        </li>
    </ul>
</div>