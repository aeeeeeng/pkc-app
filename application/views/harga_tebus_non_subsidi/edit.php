<form onsubmit="update('<?= $id ?>')" id="form_edit_hns" method="post" enctype="multipart/form-data">
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
                <button type="submit" id="submit" class="btn bg-black btn-flat">Simpan</button>
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
    $(document).ready(function(){
        const JWT = localStorage.getItem('JWT')
        $.ajax({
            url: '<?= base_url('api/harga_non_subsidi/show/'.$id) ?>',
            headers: { 'JWT': JWT }
        }).done((resp, status, err) => {
            $("#hns_year").val(resp.data.hns_year)
            $("#hns_product").val(resp.data.hns_product)
            $("#hns_date").val(resp.data.hns_date)
            $("#hns_number").val(resp.data.hns_number)
            $("#hns_about").val(resp.data.hns_about)
            $("#hns_description").val(resp.data.hns_description)
        }).fail(error => {
            if(error.status === 401) {
                refreshAuth()
            } else if (error.status === 500) {
                toastr.error(respJson.message)
            }
        })
    })
</script>