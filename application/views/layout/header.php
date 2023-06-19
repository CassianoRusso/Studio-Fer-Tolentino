<!DOCTYPE html>
<html lang="pt-br">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <?php echo (isset($titulo) ? '<title>Studio F.T. | '.$titulo.'</title>' : '<title>Studio Fer Tolentino</title>'); ?>
  
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/app.min.css'); ?>">

  <!-- style CSS datatables -->
  <?php if(isset($datatables)){ ?>
    <link rel="stylesheet" href="<?php echo base_url('assets/bundles/datatables/datatables.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css'); ?>">
  <?php } ?>
  
  <!-- style CSS formulario -->
  <?php if(isset($formulario)){ ?>
    <!-- <link rel="stylesheet" href="<?php echo base_url('assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css'); ?>"> -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bundles/jquery-selectric/selectric.css'); ?>">
    <!-- <link rel="stylesheet" href="<?php echo base_url('assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css'); ?>"> -->
  <?php } ?>

  <!-- style CSS calendar -->
  <?php if(isset($plugin_calendar)){ ?>
    <link rel="stylesheet" href="<?php echo base_url("assets/bundles/fullcalendar/fullcalendar.min.css"); ?>">
  <?php } ?>

  <!-- style CSS modal -->
  <?php if(isset($modal)){ ?>
    <link rel="stylesheet" href="<?php echo base_url('assets/bundles/prism/prism.css'); ?>">
  <?php } ?>

  <?php if (isset($plugin_editor)) { ?>
    <link rel="stylesheet" href="<?php echo base_url("assets/bundles/summernote/summernote-bs4.css"); ?>">
  <?php } ?>
  
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/components.css'); ?>">

  <!-- Custom style CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css'); ?>">
  <!-- Favicon -->
  <link rel='shortcut icon' type='image/x-icon' href="<?php echo base_url('assets/img/logo-studio-fer-redondo-2.png'); ?>" />
  <style>
    .modal-backdrop{
      display: none;
    }
    .modal.show .modal-content{
      box-shadow: 0 6px 20px 7px rgb(0 0 0 / 15%);
    }
    .modal-content{
      background-color: #f7f9f9;
    }
  </style>
</head>

<body class="vh-100">
  <div class="loader"></div>
  <div id="app" class="h-100">
    <div class="main-wrapper main-wrapper-1 h-100">
