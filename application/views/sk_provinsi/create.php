<form onsubmit="store()" id="form_create_skp" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Tahun</label>
                <input type="text" id="sp_year" name="sp_year" placeholder="tahun" class="form-control" >
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>No SK Provinsi</label>
                <input type="text" id="sp_number" name="sp_number" placeholder="nomor" class="form-control" >
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Provinsi</label>
                <input type="text" id="sp_region" name="sp_region" placeholder="provinsi" class="form-control" >
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Alk. Urea</label>
                <input type="text" name="sp_total_urea" id="sp_total_urea" placeholder="Alk. Urea" class="form-control must-number-float" >
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Alk. NPK</label>
                <input type="text" name="sp_total_npk" id="sp_total_npk" placeholder="Alk. NPK" class="form-control must-number-float" >
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Alk. Organik</label>
                <input type="text" name="sp_total_organik" id="sp_total_organik" placeholder="Alk. Organik" class="form-control must-number-float" >
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
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
    $("#sp_year").inputFilter(function(value) {
        return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 3000);
    });
    $(".must-number-float").inputFilter(function(value) {
        return /^-?\d*[.]?\d*$/.test(value);
    });
</script>