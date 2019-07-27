<form onsubmit="store()" id="form_create_permentan" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Tahun</label>
                <input type="text" id="permentan_year" name="permentan_year" placeholder="Tahun" class="form-control" >
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>No Permentan</label>
                <input type="text" id="permentan_number" name="permentan_number" placeholder="Nomor Permentan" class="form-control" >
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Perihal</label>
                <textarea name="permentan_description" id="permentan_description" placeholder="Perihal" class="form-control"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Alk. Urea</label>
                <input type="text" name="permentan_total_urea" id="permentan_total_urea" placeholder="Urea" class="form-control must-number-float">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Alk. NPK</label>
                <input type="text" name="permentan_total_npk" id="permentan_total_npk" placeholder="NPK" class="form-control must-number-float">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Alk. Organik</label>
                <input type="text" name="permentan_total_organik" id="permentan_total_organik" placeholder="Organik" class="form-control must-number-float">
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
    $("#permentan_year").inputFilter(function(value) {
        return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 3000);
    });
    $(".must-number-float").inputFilter(function(value) {
        return /^-?\d*[.]?\d*$/.test(value);
    });
</script>