<form onsubmit="store()" id="form_create_hns" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Tahun</label>
                <input type="text" id="hns_year" name="hns_year" class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Produk</label>
                <select name="hns_product" id="hns_product" class="form-control">
                    <option value="">Pilih</option>
                    <?php foreach($products as $i => $product): ?>
                        <option value="<?= $product['id'] ?>"> <?= $product['name'] ?> </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Tanggal Surat</label>
                <input type="text" id="hns_date" name="hns_date" class="form-control datepicker-form date" readonly>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>No Surat</label>
                <input type="text" id="hns_number" name="hns_number" class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Perihal</label>
                <input type="text" name="hns_about" id="hns_about" class="form-control" />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Keterangan</label>
                <textarea name="hns_description" id="hns_description" class="form-control"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>File</label>
                <input type="file" name="file" id="file" class="form-control">
            </div>
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <button type="submit" class="btn bg-black btn-flat">Simpan</button>
            </div>
        </div>
    </div>
</form>
<script>
    $("#hns_year").inputFilter(function(value) {
        return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 3000);
    });
    $('.datepicker-form').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
    })
</script>