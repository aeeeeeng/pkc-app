<div class="row">
    <div class="col-md-12">
        <form onsubmit="update('<?= $id ?>')" id="form_edit_users" method="post">
            <div class="form-group has-feedback">
                <input type="text" name="first_name" id="first_name" class="form-control first_name" placeholder="First Name">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="last_name" id="last_name" class="form-control last_name" placeholder="Last Name">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="username" id="username" class="form-control username" placeholder="Username" disabled>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="email" name="email" id="email" class="form-control email" placeholder="Email" disabled>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" id="password" class="form-control password" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <select class="form-control access" name="access" id="access">
                    <option value="">Chose Access</option>
                    <option value="admin">Admin</option>
                    <option value="client">Client</option>
                </select>
            </div>
            <div class="row">
                <div class="col-xs-5 pull-right">
                    <button type="submit" class="btn bg-black btn-block btn-flat">Register</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
$(document).ready(function(){
    const JWT = localStorage.getItem('JWT')
    $.ajax({
        url: '<?= base_url('api/users/edit/'.$id) ?>',
        headers: { 'JWT': JWT }
    }).done((resp, status, err) => {
        $("#first_name").val(resp.data.first_name)
        $("#last_name").val(resp.data.last_name)
        $("#username").val(resp.data.username)
        $("#email").val(resp.data.email)
        $("#email").val(resp.data.email)
        $("#access").val(resp.data.access)
    }).fail(error => {
        if(error.status === 401) {
            refreshAuth()
        } else if (error.status === 500) {
            toastr.error(respJson.message)
        }
    })
})
</script>