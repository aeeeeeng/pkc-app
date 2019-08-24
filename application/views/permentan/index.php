<?php $this->template->section('title') ?>
Permentan
<?php $this->template->endsection() ?>

<?php $this->template->section('custom_css') ?>
<?php $this->template->endsection() ?>

<?php $this->template->section('content') ?>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Permentan</h3>
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
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Tipe filter waktu</label>
                            <select onchange="change_date()" class="form-control" id="date_type">
                                <option value="" selected>Semua</option>
                                <option value="3">Hanya Tahun</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Filter waktu</label>
                            <input type="text" class="form-control date datepicker-all" placeholder="Semua Data" id="date_filter" value="" onchange="parsing()" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <button class="form-control btn btn-flat bg-black" onclick="search()">Cari</button>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-pkc" id="table_permentan">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun</th>
                                        <th>No Peraturan</th>
                                        <th>Perihal</th>
                                        <th>Alk. Urea</th>
                                        <th>Alk. NPK</th>
                                        <th>Alk. Organik</th>
                                        <th>Di Buat</th>
                                        <th>Di Ubah</th>
                                        <th>Tanggal Buat</th>
                                        <th>Tanggal Ubah</th>
                                        <th>File</th>
                                        <th width="1">Aksi</th>
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
        let year;
        let table_permentan;
        const JWT = localStorage.getItem("JWT");
        $(document).ready(function(){
            setDefault();
        })
        const datePickerInput = $('.datepicker-all').datepicker({autoclose: true, format: "yyyy", viewMode: "years", minViewMode: "years" })
        function table_permentan_f() {
            table_permentan = $("#table_permentan").DataTable({
                processing: true,
                serverSide: true,
                searching: true,
                lengthMenu: [
                    [10, 20, 50, -1],
                    ['10 baris', '20 baris', '50 baris', 'Lihat Semua']
                ],
                "order": [[ 1, "desc" ]],
                ajax: {
                    'url': '<?= base_url('api/permentan') ?>',
                    'type': 'GET',
                    'beforeSend': function(request) {
                        request.setRequestHeader("JWT", JWT);
                    },
                    data: function(d) {
                        d.year = year
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
                        data: 'permentan.id',
                        name: 'permentan.id',
                        render: function(data, type, row, attr) {
                            return attr.row + attr.settings._iDisplayStart + 1;
                        },
                        searchable: false,
                        orderable: false
                    },
                    { data: 'permentan_year', name: 'permentan_year' },
                    { data: 'permentan_number', name: 'permentan_number'},
                    { data: 'permentan_description', name: 'permentan_description'},
                    { data: 'permentan_total_urea', name: 'permentan_total_urea', className: "text-right"},
                    { data: 'permentan_total_npk', name: 'permentan_total_npk', className: "text-right"},
                    { data: 'permentan_total_organik', name: 'permentan_total_organik', className: "text-right"},
                    { data: 'created_by', name: 'created_by'},
                    { data: 'updated_by', name: 'updated_by'},
                    { data: 'created_at', name: 'created_at'},
                    { data: 'updated_at', name: 'updated_at'},
                    {
                        data: 'permentan.id',
                        name: 'permentan.id',
                        render: (d, t, f) => {
                            return '<a href="' + f.file_download_path + '" target="_blank" class="btn btn-success btn-flat btn-sm"><i class="fa fa-download"></i></href>';
                        }
                    },
                    {
                        data: 'id',
                        name: 'permentan.id',
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
            change_date()
            table_permentan_f();
        }
        function change_date() {
            const val = $("#date_type").val();
            datePickerInput.datepicker('destroy');
            year = undefined;
            $("#date_filter").val('');
            let newOptions = {}
            newOptions = {autoclose: true, format: "yyyy", viewMode: "years", minViewMode: "years" }
            datePickerInput.datepicker(newOptions)
        }
        function search() {
            table_permentan.draw();
        }
        function parsing() {
            const val = $("#date_filter").val();
            if(val !== '') {
                const date = val.split('/');
                const length = date.length;
                if(length == 1) {
                    year = date[0];
                    $("#date_type").val("3")
                } else {
                    null
                }
            }
        }
        function create() {
            $.ajax({
                url: '<?= base_url('permentan/create') ?>',
                success: function(response) {
                    bootbox.dialog({
                        title: 'Buat Dokumen Permentan',
                        message: response
                    });
                }
            })
        }
        function edit(id) {
            $.ajax({
                url: '<?= base_url('permentan/edit') ?>/'+id,
                success: function(response) {
                    bootbox.dialog({
                        title: 'Edit Dokument Permentan',
                        message: response
                    });
                }
            });
        }
        function store() {
            event.preventDefault();    
            $("div.form-group").removeClass('has-error');
            $("div.form-group span.help-block").remove();
            var formData = new FormData($("#form_create_permentan")[0]);
            $.ajax({
                url: '<?= base_url('api/permentan/store') ?>',
                type: 'POST',
                data: formData,
                enctype: 'multipart/form-data',
                cache: false,
                contentType: false,
                processData: false,
                headers: { 'JWT': JWT },
                beforeSend: function() {
                    $("#submit").prop("disabled", true).html('<i class="fa fa-spin fa-refresh"></i> &nbsp; Menyimpan')
                }
            }).done((response) => {
                toastr.success('Berhasil di simpan')
                bootbox.hideAll()
                table_permentan.draw();
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
            }).always(() => {
                $("#submit").prop("disabled", false).html('Simpan')
            })
        }
        function update(id) {
            event.preventDefault();    
            $("div.form-group").removeClass('has-error');
            $("div.form-group span.help-block").remove();
            var formData = new FormData($("#form_edit_permentan")[0]);
            $.ajax({
                url: '<?= base_url('api/permentan/update') ?>/'+id,
                type: 'POST',
                data: formData,
                enctype: 'multipart/form-data',
                cache: false,
                contentType: false,
                processData: false,
                headers: { 'JWT': JWT },
                beforeSend: function() {
                    $("#submit").prop("disabled", true).html('<i class="fa fa-spin fa-refresh"></i> &nbsp; Menyimpan')
                }
            }).done((response) => {
                toastr.success('Berhasil di ubah')
                bootbox.hideAll()
                table_permentan.draw();
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
            }).always(() => {
                $("#submit").prop("disabled", false).html('Simpan')
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
                            url: '<?= base_url('api/permentan/destroy') ?>/'+id,
                            type: 'DELETE',
                            headers: { 'JWT': JWT }
                        }).done(response => {
                            toastr.success('Berhasil di hapus')
                            bootbox.hideAll()
                            table_permentan.draw();
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
