<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>&mdash; Survey &mdash;</title>

  <!-- General CSS Files -->
   <link rel="stylesheet" href="<?=base_url("assets/modules/bootstrap/css/bootstrap.min.css")?>">
   <link rel="stylesheet" href="<?=base_url('assets/modules/fontawesome/css/all.min.css')?>">

   <!-- CSS Libraries -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" href="<?=base_url('assets/modules/summernote/summernote-bs4.css')?>">
   <!-- <link rel="stylesheet" href="<?=base_url('assets/modules/bootstrap-daterangepicker/daterangepicker.css')?>"> -->
   <link rel="stylesheet" href="<?=base_url('assets/datepicker/css/datepicker.css')?>">

   <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?=base_url('assets/modules/bootstrap-daterangepicker/daterangepicker.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/modules/select2/dist/css/select2.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/modules/jquery-selectric/selectric.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')?>">

   <!-- Template CSS -->
   <link rel="stylesheet" href="<?=base_url('assets/css/style.css')?>">
   <link rel="stylesheet" href="<?=base_url('assets/css/components.css')?>">

   <!-- Start GA -->
   <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
   <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
   <script>
   window.dataLayer = window.dataLayer || [];
   function gtag(){dataLayer.push(arguments);}
   gtag('js', new Date());

   gtag('config', 'UA-94034622-3');
   </script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">

    <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?=base_url('assets/img/avatar/avatar-1.png')?>" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hello <?=$this->session->userdata('nama')?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="#" class="dropdown-item has-icon">
                <i class="far fa-user"></i> <?=$this->session->userdata('username')?>
              </a>
              <a href="#" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> <?=$this->session->userdata('email')?>
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?=base_url('auth/logout')?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>