<form onsubmit="store()" id="form_create_hs" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Tahun</label>
                <input type="text" id="hs_year" name="hs_year" class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>No Surat</label>
                <input type="text" id="hs_number" name="hs_number" class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Perihal</label>
                <textarea name="hs_description" id="hs_description" class="form-control"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Rata2 H. Tebus Urea</label>
                <input type="text" id="hs_urea" name="hs_urea" class="form-control just-currency">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Rata2 H. Tebus NPK</label>
                <input type="text" id="hs_npk" name="hs_npk" class="form-control just-currency">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Rata2 H. Tebus Organik</label>
                <input type="text" id="hs_organik" name="hs_organik" class="form-control just-currency">
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
    $("#hs_year").inputFilter(function(value) {
        return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 3000);
    });

    $('input.just-currency').on('input keydown keyup mousedown mouseup select contextmenu drop keyup', function(event) {
        if (event.which >= 37 && event.which <= 40) return;
        $(this).val(function(index, value) {
            return value
                .replace(/\D/g, "")
                .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        });
    });
</script>