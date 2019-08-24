<form onsubmit="update('<?= $id ?>')" id="form_edit_srt_pi" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Tahun</label>
                <input type="text" id="sp_year" name="sp_year" class="form-control" >
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>No Surat Peraturan</label>
                <input type="text" id="sp_number" name="sp_number" class="form-control" >
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Perihal</label>
                <textarea name="sp_description" id="sp_description" class="form-control" cols="30" rows="10"></textarea>
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
                <button type="submit" id="submit" class="btn bg-black btn-flat">Simpan</button>
            </div>
        </div>
    </div>
</form>
<script>
    $("#sp_year").inputFilter(function(value) {
        return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 3000);
    });
    $(document).ready(function(){
        const JWT = localStorage.getItem('JWT')
        $.ajax({
            url: '<?= base_url('api/srt_pi/show/'.$id) ?>',
            headers: { 'JWT': JWT }
        }).done((resp, status, err) => {
            $("#sp_year").val(resp.data.sp_year)
            $("#sp_number").val(resp.data.sp_number)
            $("#sp_description").val(resp.data.sp_description)
        }).fail(error => {
            if(error.status === 401) {
                refreshAuth()
            } else if (error.status === 500) {
                toastr.error(respJson.message)
            }
        })
    })
</script>