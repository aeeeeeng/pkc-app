<form onsubmit="update('<?= $id ?>')" id="form_create_laphar" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Tahun</label>
                <input type="text" id="lh_year" name="lh_year" class="form-control" >
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Bulan</label>
                <select id="lh_month" name="lh_month" class="form-control">
                    <option value="">Pilih Bulan</option>
                    <?php foreach($months as $i => $month): ?>
                        <option value="<?= str_pad($i+1, 2, "0", STR_PAD_LEFT) ?>"><?= $month ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Day</label>
                <input type="text" id="lh_day" name="lh_day" class="form-control" >
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
    $("#lh_year").inputFilter(function(value) {
        return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 3000);
    });
    $("#lh_month").inputFilter(function(value) {
        return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 12);
    });
    $("#lh_day").inputFilter(function(value) {
        const date = new Date();
        const yearInput = ($("#lh_year").val() != '') ? parseInt($("#lh_year").val()) : date.getFullYear()
        const monthInput = ($("#lh_month").val() != '') ? parseInt($("#lh_month").val()) : (date.getMonth()+1)
        const lastDay = new Date(yearInput, monthInput, 0);
        return /^\d*$/.test(value) && (value === "" || parseInt(value) <= lastDay.getDate());
    });
    $(document).ready(function(){
        const JWT = localStorage.getItem('JWT')
        $.ajax({
            url: '<?= base_url('api/laporan_harian/show/'.$id) ?>',
            headers: { 'JWT': JWT }
        }).done((resp, status, err) => {
            $("#lh_year").val(resp.data.lh_year)
            $("#lh_month").val(resp.data.lh_month)
            $("#lh_day").val(resp.data.lh_day)
        }).fail(error => {
            if(error.status === 401) {
                refreshAuth()
            } else if (error.status === 500) {
                toastr.error(respJson.message)
            }
        })
    })
</script>