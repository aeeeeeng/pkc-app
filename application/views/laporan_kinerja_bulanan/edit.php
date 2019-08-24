<form onsubmit="update('<?= $id ?>')" id="form_edit_lapkibul" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Tahun</label>
                <input type="text" id="lkb_year" name="lkb_year" class="form-control" >
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Bulan</label>
                <select id="lkb_month" name="lkb_month" class="form-control">
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
    $("#lkb_year").inputFilter(function(value) {
        return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 3000);
    });
    $("#lkb_month").inputFilter(function(value) {
        return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 12);
    });
    $(document).ready(function(){
        const JWT = localStorage.getItem('JWT')
        $.ajax({
            url: '<?= base_url('api/laporan_kinerja_bulanan/show/'.$id) ?>',
            headers: { 'JWT': JWT }
        }).done((resp, status, err) => {
            $("#lkb_year").val(resp.data.lkb_year)
            $("#lkb_month").val(resp.data.lkb_month)
        }).fail(error => {
            if(error.status === 401) {
                refreshAuth()
            } else if (error.status === 500) {
                toastr.error(respJson.message)
            }
        })
    })
</script>