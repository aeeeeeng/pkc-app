<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view('layouts/header'); ?>
  <style>
    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu>.dropdown-menu {
        top: 0;
        left: 100%;
        margin-top: -6px;
        margin-left: -1px;
        -webkit-border-radius: 0 6px 6px 6px;
        -moz-border-radius: 0 6px 6px;
        border-radius: 0 6px 6px 6px;
    }

    .dropdown-submenu:hover>.dropdown-menu {
        display: block;
    }

    .dropdown-submenu>a:after {
        display: block;
        content: " ";
        float: right;
        width: 0;
        height: 0;
        border-color: transparent;
        border-style: solid;
        border-width: 5px 0 5px 5px;
        border-left-color: #ccc;
        margin-top: 5px;
        margin-right: -10px;
    }

    .dropdown-submenu:hover>a:after {
        border-left-color: #fff;
    }

    .dropdown-submenu.pull-left {
        float: none;
    }

    .dropdown-submenu.pull-left>.dropdown-menu {
        left: -100%;
        margin-left: 10px;
        -webkit-border-radius: 6px 0 6px 6px;
        -moz-border-radius: 6px 0 6px 6px;
        border-radius: 6px 0 6px 6px;
    }
  </style>
  <?= $this->template->render('custom_css'); ?>
</head>
<body class="hold-transition skin-black layout-top-nav fixed">
<div class="full-loading"></div>
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?= base_url() ?>" class="navbar-brand">
            <img src="<?= base_url('assets/dist/img/logo.png') ?>" class="new-logo img-responsive" >
          </a>
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
            var url = window.location;
            $('ul.navbar-nav a').filter(function() {
                return this.href == url;
            }).parent().siblings().removeClass('active').end().addClass('active');
            $('ul.dropdown-menu a').filter(function() {
                return this.href == url;
            }).parentsUntil(".navbar-nav > .dropdown-menu").siblings()
            .removeClass('active').end()
            .addClass('active');
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
        $(".empty-page").on("click", function(){
          event.preventDefault();
          toastr.warning('The page under construction')
        })
      </script>
    <?= $this->template->render('custom_js'); ?>
    <?= $this->template->render('custom_js_2'); ?>
</body>
</html>
