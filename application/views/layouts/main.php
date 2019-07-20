<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view('layouts/header'); ?>
  <?= $this->template->render('custom_css'); ?>
</head>
<body class="hold-transition skin-black layout-top-nav">
<div class="full-loading"></div>
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?= base_url() ?>" class="navbar-brand"><b>DOCS</b> App</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>
        <?php $this->load->view('layouts/menu'); ?>
        
        <div class="navbar-custom-menu">
          <?php $this->load->view('layouts/profile'); ?>
        </div>
      </div>
    </nav>
  </header>
  <div class="content-wrapper">
    <div class="container">
      <section class="content-header">
        <h1> <?= $this->template->render('title') ?> </h1>
        <?php $this->load->view('layouts/breadcrumb'); ?>
      </section>
      <?= $this->template->render('content'); ?>
    </div>
  </div>
</div>
    <?php $this->load->view('layouts/javascript'); ?>
      <script>
        $(document).ready(function(){
            $('.datepicker-year').datepicker({
                autoclose: true,
                format: "yyyy",
                viewMode: "years", 
                minViewMode: "years"
            })
        })
        $(function($) {
          // /^\d*$/.test(value) INTEGER
          // /^\d*$/.test(value) && (value === "" || parseInt(value) <= 500) INTEGER DENGAN BATAS TERTENTU
          // /^-?\d*$/.test(value) INTEGER POSITIV DAN NEGATIV
          // /^-?\d*[.,]?\d*$/.test(value) FLOAT
          // /^-?\d*[.,]?\d{0,2}$/.test(value) CURRENCY
          // /^[a-z]*$/i.test(value) ONLY STRING A-Z
          // /^[a-z\u00c0-\u024f]*$/i.test(value) LATIN 
          // /^[0-9a-f]*$/i.test(value) HEXA DESIMAL
          $.fn.inputFilter = function(inputFilter) {
            return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
              if (inputFilter(this.value)) {
                this.oldValue = this.value;
                this.oldSelectionStart = this.selectionStart;
                this.oldSelectionEnd = this.selectionEnd;
              } else if (this.hasOwnProperty("oldValue")) {
                this.value = this.oldValue;
                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
              }
            });
          };
        }(jQuery));
      </script>
    <?= $this->template->render('custom_js'); ?>
    <?= $this->template->render('custom_js_2'); ?>
</body>
</html>
