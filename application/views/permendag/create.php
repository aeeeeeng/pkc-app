<form onsubmit="store()" id="form_create_permendag" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Tahun</label>
                <input type="text" id="permendag_year" name="permendag_year" class="form-control" >
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>No Permendag</label>
                <input type="text" id="permendag_number" name="permendag_number" class="form-control" >
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Perihal</label>
                <textarea name="permendag_description" id="permendag_description" class="form-control" cols="30" rows="10"></textarea>
            </div>
        </div>
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
    $("#permendag_year").inputFilter(function(value) {
        
        return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 3000);
    });
</script>