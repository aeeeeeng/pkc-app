<?php $this->template->section('title') ?>
Balansitas
<?php $this->template->endsection() ?>

<?php $this->template->section('custom_css') ?>
<?php $this->template->endsection() ?>

<?php $this->template->section('content') ?>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Balansitas</h3>
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
                                <option value="1">Semua</option>
                                <option value="2" selected>Hanya Bulan dan Tahun</option>
                                <option value="3">Hanya Tahun</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Filter waktu</label>
                            <input type="text" class="form-control date datepicker-all" placeholder="Semua Data" id="date_filter" value="<?= date("m/Y") ?>" onchange="parsing()" readonly>
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
                            <table class="table table-hover table-bordered table-pkc" id="table_balansitas">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun</th>
                                        <th>Bulan</th>
                                        <th>Hari</th>
                                        <th>Di Buat</th>
                                        <th>Di Ubah</th>
                                        <th>Tanggal Buat</th>
                                        <th>Tanggal Ubah</th>
                                        <th>File</th>
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
        let year, month, day;
        let table_balansitas;
        const JWT = localStorage.getItem("JWT");
        $(document).ready(function(){
            setDefault();
        })
        const datePickerInput = $('.datepicker-all').datepicker({
            autoclose: true,
            format: "dd/mm/yyyy",
        })
        function table_balansitas_f() {
            table_balansitas = $("#table_balansitas").DataTable({
                processing: true,
                serverSide: true,
                searching: false,
                lengthMenu: [
                    [10, 20, 50, -1],
                    ['10 baris', '20 baris', '50 baris', 'Lihat Semua']
                ],
                "order": [[ 1, "desc" ], [ 2, "desc" ], [ 3, "desc" ]],
                ajax: {
                    'url': '<?= base_url('api/balansitas') ?>',
                    'type': 'GET',
                    'beforeSend': function(request) {
                        request.setRequestHeader("JWT", JWT);
                    },
                    data: function(d) {
                        d.year = year
                        d.month = month
                        d.day = day
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
                        data: 'balansitas.id',
                        name: 'balansitas.id',
                        render: function(data, type, row, attr) {
                            return attr.row + attr.settings._iDisplayStart + 1;
                        },
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'balansitas_year',
                        name: 'balansitas_year'
                    },
                    {
                        data: 'balansitas_month',
                        name: 'balansitas_month',
                        render: (d, t, f) => {
                            return getMonthName(d);
                        }
                    },
                    {
                        data: 'balansitas_day',
                        name: 'balansitas_day'
                    },
                    { data: 'created_by', name: 'created_by'},
                    { data: 'updated_by', name: 'updated_by'},
                    { data: 'created_at', name: 'created_at'},
                    { data: 'updated_at', name: 'updated_at'},
                    {
                        data: 'balansitas.id',
                        name: 'balansitas.id',
                        render: (d, t, f) => {
                            return '<a href="' + f.file_download_path + '" target="_blank" class="btn btn-success btn-flat btn-sm"><i class="fa fa-download"></i></href>';
                        }
                    },
                    {
                        data: 'id',
                        name: 'balansitas.id',
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
            $("#date_filter").val('<?= date('Y/m') ?>');
            year = '<?= date("Y") ?>'
            month = '<?= date("m") ?>'
            table_balansitas_f()
        }
        function change_date() {
            const val = $("#date_type").val();
            datePickerInput.datepicker('destroy');
            year = undefined; month = undefined; day = undefined;
            $("#date_filter").val('');
            let newOptions = {}
            switch (val) {
                case '3':
                    newOptions = {autoclose: true, format: "yyyy", viewMode: "years", minViewMode: "years" }
                break;
                case '2':
                    newOptions = {autoclose: true, format: "mm/yyyy", viewMode: "months", minViewMode: "months" }
                break;
                case '1':
                    newOptions = {autoclose: true, format: "dd/mm/yyyy", viewMode: "days" }
                break;
            }
            datePickerInput.datepicker(newOptions)
        }
        function search() {
            table_balansitas.draw();
        }
        function parsing() {
            const val = $("#date_filter").val();
            if(val !== '') {
                const date = val.split('/');
                const length = date.length;
                
                console.log(length)
                if(length == 1) {
                    year = date[0];
                } 
                if (length == 2) {
                    year = date[1];
                    month = date[0];
                } 
                if (length == 3) {
                    year = date[2];
                    month = date[1];
                    day = date[0];
                }
            }
        }
        function create() {
            $.ajax({
                url: '<?= base_url('balansitas/create') ?>',
                success: function(response) {
                    bootbox.dialog({
                        title: 'Buat Dokumen Balansitas',
                        message: response
                    });
                }
            })
        }
        function edit(id) {
            $.ajax({
                url: '<?= base_url('balansitas/edit') ?>/'+id,
                success: function(response) {
                    bootbox.dialog({
                        title: 'Edit Dokument Balansitas',
                        message: response
                    });
                }
            });
        }
        function store() {
            event.preventDefault();    
            $("div.form-group").removeClass('has-error');
            $("div.form-group span.help-block").remove();
            var formData = new FormData($("#form_create_balansitas")[0]);
            $.ajax({
                url: '<?= base_url('api/balansitas/store') ?>',
                type: 'POST',
                data: formData,
                enctype: 'multipart/form-data',
                cache: false,
                contentType: false,
                processData: false,
                headers: { 'JWT': JWT }
            }).done((response) => {
                toastr.success('Berhasil di simpan')
                bootbox.hideAll()
                table_balansitas.draw();
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
            var formData = new FormData($("#form_create_balansitas")[0]);
            $.ajax({
                url: '<?= base_url('api/balansitas/update') ?>/'+id,
                type: 'POST',
                data: formData,
                enctype: 'multipart/form-data',
                cache: false,
                contentType: false,
                processData: false,
                headers: { 'JWT': JWT }
            }).done((response) => {
                toastr.success('Berhasil di ubah')
                bootbox.hideAll()
                table_balansitas.draw();
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
                            url: '<?= base_url('api/balansitas/destroy') ?>/'+id,
                            type: 'DELETE',
                            headers: { 'JWT': JWT }
                        }).done(response => {
                            toastr.success('Berhasil di hapus')
                            bootbox.hideAll()
                            table_balansitas.draw();
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
