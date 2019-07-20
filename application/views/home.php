<?php $this->template->section('title') ?>
    Home
<?php $this->template->endsection() ?>

<?php $this->template->section('custom_css') ?>
<?php $this->template->endsection() ?>

<?php $this->template->section('content') ?>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Home</h3>
            </div>
            <div class="box-body">
                The great content goes here
            </div>
        </div>
    </section>
<?php $this->template->endsection() ?>

<?php $this->template->section('custom_js') ?>
<?php $this->template->endsection() ?>

<?php $this->template->view('layouts/main') ?>

