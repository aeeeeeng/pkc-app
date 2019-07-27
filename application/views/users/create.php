<div class="row">
    <div class="col-md-12">
        <form onsubmit="store()" id="form_create_users" method="post">
            <div class="form-group has-feedback">
                <input type="text" name="first_name" id="first_name" class="form-control first_name" placeholder="First Name">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="last_name" id="last_name" class="form-control last_name" placeholder="Last Name">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="username" id="username" class="form-control username" placeholder="Username">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="email" name="email" id="email" class="form-control email" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" id="password" class="form-control password" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="passconf" id="passconf" class="form-control passconf" placeholder="Retype password">
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
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