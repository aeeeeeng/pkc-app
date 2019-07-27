<?php $this->template->section('title') ?>
Users Management
<?php $this->template->endsection() ?>

<?php $this->template->section('custom_css') ?>
<?php $this->template->endsection() ?>

<?php $this->template->section('content') ?>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Users Management</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-right">
                            <button onclick="create()" class="btn bg-black btn-flat">Buat baru</button>
                        </div>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-pkc" id="table_users">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Full Name</th>
                                        <th>Access</th>
                                        <th>Tanggal Buat</th>
                                        <th>Tanggal Ubah</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $this->template->endsection() ?>

<?php $this->template->section('custom_js_2') ?>
<?php $this->load->view('partials/javascript'); ?>
    <script>
        let table_users;
        const JWT = localStorage.getItem("JWT");
        $(document).ready(function(){
            setDefault();
        })
        function table_users_f() {
            table_users = $("#table_users").DataTable({
                processing: true,
                serverSide: true,
                searching: true,
                lengthMenu: [
                    [10, 20, 50, -1],
                    ['10 baris', '20 baris', '50 baris', 'Lihat Semua']
                ],
                ajax: {
                    'url': '<?= base_url('api/users') ?>',
                    'type': 'GET',
                    'beforeSend': function(request) {
                        request.setRequestHeader("JWT", JWT);
                    },
                    error: function(error) {
                        if(error.status === 401) {
                            refreshAuth()
                        } else if (error.status === 500) {
                            toastr.error(respJson.message)
                        }
                        
                    }
                },
                columns: [
                    {
                        data: 'id',
                        name: 'id',
                        render: function(data, type, row, attr) {
                            return attr.row + attr.settings._iDisplayStart + 1;
                        },
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'username',
                        name: 'username'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'first_name',
                        name: 'first_name'
                    },
                    {
                        data: 'last_name',
                        name: 'last_name'
                    },
                    {
                        data: 'full_name',
                        name: 'full_name'
                    },
                    {
                        data: 'access',
                        name: 'access'
                    },
                    { data: 'created_at', name: 'created_at'},
                    { data: 'updated_at', name: 'updated_at'},
                    {
                        data: 'id',
                        name: 'id',
                        render: (d, t, f) => {
                            const edit = `<button onclick="edit(${d})" class="btn btn-primary btn-flat btn-sm"><i class="fa fa-wrench"></i></button>`;
                            const remove = `<button onclick="remove(${d})" class="btn btn-danger btn-flat btn-sm"><i class="fa fa-trash"></i></button>`;
                            return edit+' '+remove;
                        }
                    }
                ]   
            })
        }
        function setDefault() {
            table_users_f();
        }
        function create() {
            $.ajax({
                url: '<?= base_url('users/create') ?>',
                success: function(response) {
                    bootbox.dialog({
                        title: 'Buat User Baru',
                        message: response,
                        size: "small",
                    });
                }
            })
        }
        function edit(id) {
            $.ajax({
                url: '<?= base_url('users/edit') ?>/'+id,
                success: function(response) {
                    bootbox.dialog({
                        title: 'Edit User',
                        message: response,
                        size: "small"
                    });
                }
            });
        }
        function store() {
            event.preventDefault();    
            $("div.form-group").removeClass('has-error');
            $("div.form-group span.help-block").remove();
            var formData = new FormData($("#form_create_users")[0]);
            var object = {};
            formData.forEach((value, key) => {object[key] = value});
            var payloads = JSON.stringify(object);
            $.ajax({
                url: '<?= base_url('api/users/store') ?>',
                type: 'POST',
                data: payloads,
                enctype: 'multipart/form-data',
                cache: false,
                contentType: false,
                processData: false,
                headers: { 'JWT': JWT }
            }).done((response) => {
                toastr.success('Berhasil di simpan')
                bootbox.hideAll()
                table_users.draw();
            }).fail((error) => {
                const respJson = $.parseJSON(error.responseText)
                Object.keys(respJson.message).map(function(key, index) {
                    const formGroup = $("#" + key).closest('div.form-group')
                    formGroup.addClass('has-error')
                    formGroup.append(`<span class="help-block">${respJson.message[key]}</span>`)
                });
                if(error.status === 401) {
                    refreshAuth()
                } else if (error.status === 500) {
                    toastr.error(respJson.message)
                }
            })
        }
        function update(id) {
            event.preventDefault();    
            $("div.form-group").removeClass('has-error');
            $("div.form-group span.help-block").remove();
            var formData = new FormData($("#form_edit_users")[0]);
            var object = {};
            formData.forEach((value, key) => {object[key] = value});
            var payloads = JSON.stringify(object);
            $.ajax({
                url: '<?= base_url('api/users/update') ?>/'+id,
                type: 'POST',
                data: payloads,
                enctype: 'multipart/form-data',
                cache: false,
                contentType: false,
                processData: false,
                headers: { 'JWT': JWT }
            }).done((response) => {
                toastr.success('Berhasil di ubah')
                bootbox.hideAll()
                table_users.draw();
            }).fail((error) => {
                const respJson = $.parseJSON(error.responseText)
                Object.keys(respJson.message).map(function(key, index) {
                    const formGroup = $("#" + key).closest('div.form-group')
                    formGroup.addClass('has-error')
                    formGroup.append(`<span class="help-block">${respJson.message[key]}</span>`)
                });
                if(error.status === 401) {
                    refreshAuth()
                } else if (error.status === 500) {
                    toastr.error(respJson.message)
                }
            })
        }
        function remove(id) {
            bootbox.confirm({
                message: "Apakah anda yakin ? ",
                buttons: {
                    confirm: {
                        label: 'Ok',
                        className: 'bg-black'
                    },
                    cancel: {
                        label: 'Cancel',
                        className: 'btn-default'
                    }
                },
                callback: function (result) {
                    if(result) {
                        $.ajax({
                            url: '<?= base_url('api/users/destroy') ?>/'+id,
                            type: 'DELETE',
                            headers: { 'JWT': JWT }
                        }).done(response => {
                            toastr.success('Berhasil di hapus')
                            bootbox.hideAll()
                            table_users.draw();
                        }).fail(error => {
                            const respJson = $.parseJSON(error.responseText)
                            Object.keys(respJson.message).map(function(key, index) {
                                const formGroup = $("#" + key).closest('div.form-group')
                                formGroup.addClass('has-error')
                                formGroup.append(`<span class="help-block">${respJson.message[key]}</span>`)
                            });
                            if(error.status === 401) {
                                refreshAuth()
                            } else if (error.status === 500) {
                                toastr.error(respJson.message)
                            }
                        })
                    }
                }
            });
            
        }
    </script>
<?php $this->template->endsection() ?>
<?php $this->template->view('layouts/main') ?>
