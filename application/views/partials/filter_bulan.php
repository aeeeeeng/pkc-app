<select class="form-control" id="month" onchange="filter()">
    <option value="">Semua Bulan</option>
    <?php $bulan = ['January', 'February', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] ?>
    <?php foreach($bulan as $i => $data): ?>
    <option value="<?= $i+1 ?>"><?= $data ?></option>
    <?php endforeach; ?>
</select>