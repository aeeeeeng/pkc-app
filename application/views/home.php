<?php $this->template->section('title') ?>
    Home
<?php $this->template->endsection() ?>

<?php $this->template->section('custom_css') ?>
    <style>
        .col-centered{
            float: none;
            margin: 0 auto;
        }
    </style>
<?php $this->template->endsection() ?>

<?php $this->template->section('content') ?>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Home</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-4 col-centered">
                        <a class="btn btn-app bg-red">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <a class="btn btn-app bg-red">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <a class="btn btn-app bg-red">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <a class="btn btn-app bg-red">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <a class="btn btn-app bg-red">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <a class="btn btn-app bg-red">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <a class="btn btn-app bg-red">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $this->template->endsection() ?>

<?php $this->template->section('custom_js') ?>
<?php $this->template->endsection() ?>

<?php $this->template->view('layouts/main') ?>

