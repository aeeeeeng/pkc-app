<form onsubmit="store()" id="form_create_lapbul" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Tahun</label>
                <input type="text" id="lb_year" name="lb_year" class="form-control" >
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Bulan</label>
                <select id="lb_month" name="lb_month" class="form-control">
                    <option value="">Pilih Bulan</option>
                    <?php foreach($months as $i => $month): ?>
                    <option value="<?= str_pad($i+1, 2, "0", STR_PAD_LEFT) ?>"><?= $month ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>File</label>
                <input type="file" name="file" id="file" class="form-control" >
            </div>
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <button type="submit" id="submit" class="btn bg-black btn-flat">Simpan</button>
            </div>
        </div>
    </div>
</form>

<script>
    $("#lb_year").inputFilter(function(value) {
        return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 3000);
    });
    $("#lb_month").inputFilter(function(value) {
        return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 12);
    });
</script>