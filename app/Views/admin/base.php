<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
  <title><?= $title; ?></title>
  <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
  <script src="<?= base_url(''); ?>/swal/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="<?= base_url(''); ?>/swal/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="<?= base_url('/'); ?>/toastr/build/toastr.min.css">
  <style>
  #loader {
    transition: all 0.3s ease-in-out;
    opacity: 1;
    visibility: visible;
    position: fixed;
    height: 100vh;
    width: 100%;
    background: #fff;
    z-index: 90000;
  }

  #loader.fadeOut {
    opacity: 0;
    visibility: hidden;
  }



  .spinner {
    width: 40px;
    height: 40px;
    position: absolute;
    top: calc(50% - 20px);
    left: calc(50% - 20px);
    background-color: #333;
    border-radius: 100%;
    -webkit-animation: sk-scaleout 1.0s infinite ease-in-out;
    animation: sk-scaleout 1.0s infinite ease-in-out;
  }

  @-webkit-keyframes sk-scaleout {
    0% {
      -webkit-transform: scale(0)
    }

    100% {
      -webkit-transform: scale(1.0);
      opacity: 0;
    }
  }

  @keyframes sk-scaleout {
    0% {
      -webkit-transform: scale(0);
      transform: scale(0);
    }

    100% {
      -webkit-transform: scale(1.0);
      transform: scale(1.0);
      opacity: 0;
    }
  }
  </style>
  <script defer="defer" src="<?= base_url(); ?>/main.js"></script>
  <link href="<?= base_url(); ?>/style.css" rel="stylesheet">
</head>

<body class="app">

  <div id="loader">
    <div class="spinner"></div>
  </div>

  <script>
  window.addEventListener('load', function load() {
    const loader = document.getElementById('loader');
    setTimeout(function() {
      loader.classList.add('fadeOut');
    }, 300);
  });
  </script>



  <div>
    <!-- #Left Sidebar ==================== -->
    <?= $this->include('admin/layout/sidebar'); ?>

    <!-- #Main ============================ -->
    <div class="page-container">
      <!-- ### $Topbar ### -->
      <?= $this->include('admin/layout/navbar'); ?>

      <!-- ### $App Screen Content ### -->
      <?= $this->renderSection('content'); ?>

      <!-- ### $App Screen Footer ### -->
      <?= $this->include('admin/layout/footer'); ?>
    </div>
  </div>

  <script src="<?= base_url('/'); ?>/toastr/build/toastr.min.js"></script>

  <?= $this->renderSection('script'); ?>

  <script>
  toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": true,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "showDuration": "600",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }
  </script>

  <?php ?>

  <?php
  if (session()->getFlashdata('dataMessage')) {
    foreach (session()->getFlashdata('dataMessage') as $item) {
      echo '<script>toastr["' .
        session()->getFlashdata('type-status') . '"]("' . $item . '")</script>';
    }
  }
  if (session()->getFlashdata('message')) {
    echo '<script>toastr["' .
      session()->getFlashdata('type-status') . '"]("' . session()->getFlashdata('message') . '")</script>';
  }
  ?>
</body>

</html>