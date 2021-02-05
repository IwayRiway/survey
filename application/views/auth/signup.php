
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>IwayRiway &mdash; HRIS</title>

<!-- General CSS Files -->
<link rel="stylesheet" href="<?=base_url('assets/modules/bootstrap/css/bootstrap.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/modules/fontawesome/css/all.min.css')?>">

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
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-sm-8 offset-sm-2">
            <div class="login-brand">
              <img src="<?=base_url()?>assets/img/logo.png" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
            <div class="card-header">
                  <h4 >Sign Up</h4>
               </div>

              <div class="card-body">
              <form method="POST" action="<?=base_url('auth/save')?>" class="needs-validation" novalidate="">
              
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label for="nama">Nama Lengkap</label>
                           <input id="text" type="text" class="form-control" name="nama" tabindex="1" required autofocus>
                        </div>

                        <div class="form-group">
                           <label for="tgl_lahir">Tanggal Lahir</label>
                           <input id="text" type="date" class="form-control" name="tgl_lahir" tabindex="1" required autofocus>
                        </div>

                        <div class="form-group">
                           <label for="tgl_lahir">Department</label>
                           <select class="form-control select2" name='department_id' id='department_id' required>
                              <option></option>
                              <?php foreach($department as $db):?>
                                 <option value="<?=$db['id']?>"><?=$db['nama']?></option>
                              <?php endforeach?>
                           </select> 
                        </div>
                     </div>

                     <div class="col-sm-6">
                        <div class="form-group">
                           <label for="email">Email</label>
                           <input id="text" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                        </div>

                        <div class="form-group">
                           <label for="username">Username</label>
                           <input id="text" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                        </div>

                        <div class="form-group">
                           <div class="d-block">
                              <label for="password" class="control-label">Password</label>
                           </div>
                           <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                        </div>
                     </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Sign Up
                    </button>
                  </div>
                </form>

              </div>

            </div>
            <div class="simple-footer">
              Copyright &copy; IwayRiway 2021
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <div class="info" data-flashdata="<?= $this->session->flashdata('info'); ?>"></div>
<div class="gagal" data-flashdata="<?= $this->session->flashdata('gagal'); ?>"></div>
<div class="sukses" data-flashdata="<?= $this->session->flashdata('sukses'); ?>"></div>
<div class="warning" data-flashdata="<?= $this->session->flashdata('warning'); ?>"></div>

 <!-- General JS Scripts -->
 <script src="<?=base_url('assets/modules/jquery.min.js')?>"></script>
  <script src="<?=base_url('assets/modules/popper.js')?>"></script>
  <script src="<?=base_url('assets/modules/tooltip.js')?>"></script>
  <script src="<?=base_url('assets/modules/bootstrap/js/bootstrap.min.js')?>"></script>
  <script src="<?=base_url('assets/modules/nicescroll/jquery.nicescroll.min.js')?>"></script>
  <script src="<?=base_url('assets/modules/moment.min.js')?>"></script>
  <script src="<?=base_url('assets/js/stisla.js')?>"></script>
  
  <!-- JS Libraies -->
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

  <!-- JS Libraies -->
  <script src="<?=base_url('assets/modules/cleave-js/dist/cleave.min.js')?>"></script>
  <script src="<?=base_url('assets/modules/cleave-js/dist/addons/cleave-phone.us.js')?>"></script>
  <script src="<?=base_url('assets/modules/jquery-pwstrength/jquery.pwstrength.min.js')?>"></script>
  <script src="<?=base_url('assets/modules/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
  <script src="<?=base_url('assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')?>"></script>
  <script src="<?=base_url('assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js')?>"></script>
  <script src="<?=base_url('assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')?>"></script>
  <script src="<?=base_url('assets/modules/select2/dist/js/select2.full.min.js')?>"></script>
  <script src="<?=base_url('assets/modules/jquery-selectric/jquery.selectric.min.js')?>"></script>

  <!-- Page Specific JS File -->
  <script src="<?=base_url('assets/js/page/forms-advanced-forms.js')?>"></script>
  
  <!-- Template JS File -->
  <script src="<?=base_url('assets/js/scripts.js')?>"></script>
  <script src="<?=base_url('assets/js/custom.js')?>"></script>

  <script>
    const gagal = $('.gagal').data('flashdata');
    if (gagal) {
      Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'Gagal',
        text: gagal,
        showConfirmButton: false,
        timer: 2500
      })
    }

    const warning = $('.warning').data('flashdata');
    if (warning) {
      Swal.fire({
        position: 'center',
        icon: 'warning',
        title: 'Perhatian',
        text: warning,
        showConfirmButton: false,
        timer: 2500
      })
    }

    const info = $('.info').data('flashdata');
    if (info) {
      Swal.fire({
        position: 'center',
        icon: 'info',
        title: 'Info',
        text: info,
        showConfirmButton: false,
        timer: 2500
      })
    }

  </script>

<script>
  $(document).ready(function(){
    $("#department_id").select2({
        placeholder: "Pilih Department",
        allowClear: true
    });

  });
  </script>
</body>
</html>