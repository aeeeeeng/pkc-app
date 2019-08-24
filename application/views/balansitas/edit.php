<form onsubmit="update('<?= $id ?>')" id="form_create_balansitas" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Tahun</label>
                <input type="text" id="balansitas_year" name="balansitas_year" class="form-control" >
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Bulan</label>
                <select id="balansitas_month" name="balansitas_month" class="form-control">
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
                <input type="text" id="balansitas_day" name="balansitas_day" class="form-control" >
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
    $("#balansitas_year").inputFilter(function(value) {
        $("#balansitas_day").val('')
        return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 3000);
    });
    $("#balansitas_month").inputFilter(function(value) {
        $("#balansitas_day").val('')
        return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 12);
    });
    $("#balansitas_day").inputFilter(function(value) {
        const date = new Date();
        const yearInput = ($("#balansitas_year").val() != '') ? parseInt($("#balansitas_year").val()) : date.getFullYear()
        const monthInput = ($("#balansitas_month").val() != '') ? parseInt($("#balansitas_month").val()) : (date.getMonth()+1)
        const lastDay = new Date(yearInput, monthInput, 0);
        return /^\d*$/.test(value) && (value === "" || parseInt(value) <= lastDay.getDate());
    });
    $(document).ready(function(){
        const JWT = localStorage.getItem('JWT')
        $.ajax({
            url: '<?= base_url('api/balansitas/show/'.$id) ?>',
            headers: { 'JWT': JWT }
        }).done((resp, status, err) => {
            $("#balansitas_year").val(resp.data.balansitas_year)
            $("#balansitas_month").val(resp.data.balansitas_month)
            $("#balansitas_day").val(resp.data.balansitas_day)
        }).fail(error => {
            if(error.status === 401) {
                refreshAuth()
            } else if (error.status === 500) {
                toastr.error(respJson.message)
            }
        })
    })
</script>