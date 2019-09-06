<!DOCTYPE html>
<html>

<head>
    <?php $this->template->section('title') ?>
    Login
    <?php $this->template->endsection() ?>
    <?php $this->load->view('layouts/header'); ?>
    <?= $this->template->render('custom_css'); ?>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-box-body">
            <div class="login-logo">
                <a href="<?= base_url() ?>">
                    <img src="<?= base_url('assets/dist/img/logo.png') ?>" class="new-logo-login img-responsive" >
                </a>
            </div>
            <p class="login-box-msg">Halaman untuk masuk ke panel admin</p>

            <form onsubmit="login()" method="post">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" id="username" placeholder="Username">
                    <span class="fa fa-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" id="password" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-5 pull-right">
                        <button type="submit" class="btn bg-black btn-block btn-flat">Sign In</button>
                    </div>
                </div>
            </form>
            <!-- <a href="#" onclick="openRegister()" class="text-center">Daftar sebagai pengguna baru</a> -->
        </div>
    </div>

    <div class="register-box" style="display:none;">
        <div class="register-box-body">
            <div class="register-logo">
                <a href="<?= base_url() ?>">
                    <img src="<?= base_url('assets/dist/img/logo.png') ?>" class="new-logo-login img-responsive" >
                </a>
            </div>
            <p class="login-box-msg">Register a new membership</p>
            
            <form onsubmit="register()" method="post">
                <div class="form-group has-feedback">
                    <input type="text" id="first_name" class="form-control first_name" placeholder="First Name">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" id="last_name" class="form-control last_name" placeholder="Last Name">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" id="usernameReg" class="form-control username" placeholder="Username">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" id="email" class="form-control email" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" id="passwordReg" class="form-control password" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" id="passconf" class="form-control passconf" placeholder="Retype password">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <select class="form-control access" id="access">
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

            <a href="#" onclick="openLogin()" class="text-center">I already have a membership</a>
        </div>
        <!-- /.form-box -->
    </div>
    <?php $this->load->view('layouts/javascript'); ?>
    <?= $this->template->render('custom_js'); ?>
    <script>
        $(function() {
            $(document).ready(function() {
                checkedAuth()
                $(".register-box").fadeOut("fast")
            })
        })

        function openRegister() {
            event.preventDefault()
            $(".login-box").fadeOut("fast", function(){
                $(".register-box").fadeIn("slow")
            })
        }

        function openLogin() {
            event.preventDefault()
            $(".register-box").fadeOut("fast", function(){
                $(".login-box").fadeIn("slow")
            })
        }

        function checkedAuth() {
            const JWT = localStorage.getItem('JWT');

            if (JWT !== undefined || JWT !== null) {
                const request = $.ajax({
                    url: '<?= base_url('api/users/refresh') ?>',
                    headers: {
                        'JWT': JWT
                    }
                }).done((response, textStatus, jqXHR) => {
                    window.location.href = "<?= base_url('home') ?>"
                })
            }
        }

        function register() {
            event.preventDefault();
            const first_name = $("#first_name").val();
            const last_name = $("#last_name").val();
            const username = $("#usernameReg").val();
            const email = $("#email").val();
            const password = $("#passwordReg").val();
            const passconf = $("#passconf").val();
            const access = $("#access").val();
            $("div.form-group").removeClass('has-error');
            $("div.form-group span.help-block").remove();
            const request = $.ajax({
                url: '<?= base_url('api/users/store') ?>',
                contentType: 'application/json',
                type: 'POST',
                data: JSON.stringify({
                    first_name, last_name, username, email, password, passconf, access
                })
            }).done((response, textStatus, jqXHR) => {
                toastr.success('success', 'Pengguna baru berhasil di simpan');
                openLogin();
            }).fail((xhr, textStatus, errorThrown) => {
                const respJson = $.parseJSON(xhr.responseText)
                if (xhr.status === 400) {
                    Object.keys(respJson.message).map(function(key, index) {
                        const formGroup = $("." + key).closest('div.form-group')
                        formGroup.addClass('has-error')
                        formGroup.append(`<span class="help-block">${respJson.message[key]}</span>`)

                    });
                } else {
                    Object.keys(respJson.message).map(function(key, index) {
                        const formGroup = $("." + key).closest('div.form-group')
                        formGroup.addClass('has-error')
                        formGroup.append(`<span class="help-block">${respJson.message[key]}</span>`);
                    });
                }
            })
        }

        function login() {
            event.preventDefault();
            const username = $("#username").val();
            const password = $("#password").val();
            $("div.form-group").removeClass('has-error');
            $("div.form-group span.help-block").remove();
            const request = $.ajax({
                url: '<?= base_url('api/users/login') ?>',
                contentType: 'application/json',
                type: 'POST',
                data: JSON.stringify({
                    username,
                    password
                }),
            }).done((response, textStatus, jqXHR) => {
                if(response.success === true) {
                    toastr.success('success', 'redirect to home page');
                    localStorage.setItem("JWT", jqXHR.getResponseHeader("JWT"))
                    window.location.href = "<?= base_url('home') ?>"
                } else {
                    Object.keys(response.message).map(function(key, index) {
                        const formGroup = $("#" + key).closest('div.form-group')
                        formGroup.addClass('has-error')
                        formGroup.append(`<span class="help-block">${response.message[key]}</span>`);
                    });
                }
            }).fail((xhr, textStatus, errorThrown) => {
                const respJson = $.parseJSON(xhr.responseText)
                if (xhr.status === 400) {
                    Object.keys(respJson.message).map(function(key, index) {
                        const formGroup = $("#" + key).closest('div.form-group')
                        formGroup.addClass('has-error')
                        formGroup.append(`<span class="help-block">${respJson.message[key]}</span>`)

                    });
                } else {
                    Object.keys(respJson.message).map(function(key, index) {
                        const formGroup = $("#" + key).closest('div.form-group')
                        formGroup.addClass('has-error')
                        formGroup.append(`<span class="help-block">${respJson.message[key]}</span>`);
                    });
                }
            })
        }
    </script>
</body>

</html>