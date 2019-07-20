<form onsubmit="update('<?= $id ?>')" id="form_create_lapbul" method="post" enctype="multipart/form-data">
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
                        <option value="<?= $i+1 ?>"><?= $month ?></option>
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
                <button type="submit" class="btn bg-black btn-flat">Simpan</button>
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
    $(document).ready(function(){
        const JWT = localStorage.getItem('JWT')
        $.ajax({
            url: '<?= base_url('api/laporan_bulanan/show/'.$id) ?>',
            headers: { 'JWT': JWT }
        }).done((resp, status, err) => {
            $("#lb_year").val(resp.data.lb_year)
            $("#lb_month").val(resp.data.lb_month)
        }).fail(error => {
            if(error.status === 401) {
                refreshAuth()
            } else if (error.status === 500) {
                toastr.error(respJson.message)
            }
        })
    })
</script>