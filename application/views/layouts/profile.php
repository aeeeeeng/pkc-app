<ul class="nav navbar-nav">
    <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?= base_url('assets/dist/img/user-profile.png') ?>" class="user-image" alt="User Image">
            <span id="username" class="hidden-xs">Alexander Pierce</span>
        </a>
        <ul class="dropdown-menu">
            <li id="profileContent" class="user-header"></li>
            <li class="user-footer">
                <div class="pull-right">
                    <a href="#" onclick="logout()" class="btn bg-red btn-flat">Sign out</a>
                </div>
            </li>
        </ul>
    </li>
</ul>

<?php $this->template->section('custom_js') ?>
    <script>
        
        $(function(){
          
            refreshAuth()
          
        })

        function logout() {
            event.preventDefault();
            localStorage.removeItem('JWT');
            refreshAuth();
        }

        function refreshAuth() {
            $(".full-loading").fadeIn("fast")
            const JWT = localStorage.getItem('JWT');
            if(JWT !== undefined || JWT !== null) {
                const request = $.ajax({
                    url: '<?= base_url('api/users/refresh') ?>',
                    headers: { 'JWT': JWT }
                }).done((response, textStatus, jqXHR) => {
                    $("span#username").html(response.username)
                    $("li#profileContent").html(`
                        
                        <p>
                            ${response.full_name}
                            <small>${response.access}</small>
                        </p>
                    `)
                    // window.location.href = "<?= base_url('home') ?>"
                }).fail((xhr, textStatus, errorThrown) => {
                    if(xhr.status === 401) {
                        localStorage.removeItem('JWT');
                        window.location.href = "<?= base_url('login') ?>"
                    }
                }).always(() => {
                    $(".full-loading").fadeOut()
                })
            } else {
                window.location.href = "<?= base_url('login') ?>"
            }
        }

    </script>
<?php $this->template->endsection() ?>