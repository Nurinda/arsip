<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('./assets/template/material/');?>assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?php echo base_url('./assets/image/undip-original.png'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>SIKD Jateng  <?php echo $content['title']; ?></title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="<?php echo base_url('./assets/template/material/');?>assets/css/material-dashboard.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!--datatable-->
  <link href="https://code.jquery.com/jquery-3.3.1.js">
  <link href="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js">
  <link href="https://cdn.datatables.net/1.10.19/js/dataTables.material.min.js">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css">
  <link href="https://cdn.datatables.net/1.10.19/css/dataTables.material.min.css">
  <!-- Select2-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
</head>
<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white">
      <div class="logo">
        <a href="#" class="simple-text logo-normal">SIKD Jateng</a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <?php
          if ($this->session->userdata['login']){
            $this->load->view($this->session->userdata['role'].'/menu');
          } else {
            echo '&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-primary" data-toggle="modal" data-target="#loginModal"><p>Login Pengguna SKID</p></button>';
          } ?>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <h2>&nbsp;<?php echo "".$content['title']; ?></h2>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
          </div>
        </div>
      </nav>
      <div class="content">
        <div class="container-fluid">
          <ol class="breadcrumb" style="background:white;">
            <li class="breadcrumb-item">SIKDJateng</li>
            <li class="breadcrumb-item"><?php if($this->session->userdata['login']){echo ucfirst($this->session->userdata['role']);} else {echo 'Guest';} ?></li>
            <li class="breadcrumb-item active"><?php echo ucfirst($content['title']); ?></li>
          </ol>
          <?php $this->load->view('notification/'.$content['notification']); ?>
          <?php
          if ($content['view_name'] == 'document1' | $content['view_name'] == 'document0') {
            $this->load->view($content['view_name']);
        } else {
            $this->load->view($this->session->userdata['role'].'/'.$content['view_name']);
          }?>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">

          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>,
            APLIKASI ARSIP VIDEO PEMERINTAH PROVINSI JAWA TENGAH
          </div>
          <!-- your footer here -->
        </div>
      </footer>
    </div>
  </div>

  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form  method="post">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Login Pengguna</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="modal-body">
                <input type="text" name="username" placeholder="Masukan username anda" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
              <div class="modal-body">
                <input type="password" name="password" placeholder="Masukan password anda" class="form-control">
              </div>
            </div>

          </div>

          <div class="modal-footer modal-danger">
            <button type="submit" class="btn btn-warning" name="loginValidation" value="loginValidation">Login</button>
            <button type="button" class="btn btn-grey" data-dismiss="modal">Kembali</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!--   Core JS Files   -->
  <script src="<?php echo base_url('./assets/template/material/');?>assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url('./assets/template/material/');?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="<?php echo base_url('./assets/template/material/');?>assets/js/core/popper.min.js" type="text/javascript"></script>
  <!-- Chartist JS -->
  <script src="<?php echo base_url('./assets/template/material/');?>assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?php echo base_url('./assets/template/material/');?>assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url('./assets/template/material/');?>assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <!-- JQuery -->
  <script src="<?php echo base_url('./assets/template/material/');?>assets/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
  <!-- DatePicker -->
  <script src="<?php echo base_url('./assets/template/uikit'); ?>/assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

  <!--select2-->
  <script type="text/javascript">
  $(document).ready(function() {
    $('.js-example-basic-single').select2({
      dropdownParent: $('#myModal'),
      width: '80%' // need to override the changed default
    });
    $('.js-example-1').select2({
      width: '80%' // need to override the changed default
    });

  });
  </script>
  <!--  Notifications Plugin-->
  <script src="<?php  echo base_url('./assets/template/material'); ?>/assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?php echo base_url('./assets/template/material'); ?>/assets/demo/demo.js"></script>


</body>


</html>
