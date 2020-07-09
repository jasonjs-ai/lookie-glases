<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <img class="login-image" src="<?= base_url(); ?>assets/img/<?= $base_controller->Configs->LOGO; ?>" alt="logo"><br/>
      <a href="<?= base_url(); ?>"><b><?= $base_controller->Configs->COMPANY_NAME; ?></b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg"><?= $this->session->userdata('alert_messages'); ?></p>
        <?php $this->session->set_userdata('alert', false);
        $this->session->set_userdata('alert_types', null);
        $this->session->set_userdata('alert_messages', null); ?>
        <form action="<?= base_url(); ?>login/login/" method="post">
          <div class="input-group mb-3">
            <input type="text" id="username" name="username" class="form-control" placeholder="Nama Pengguna">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" id="password" name="password" class="form-control" placeholder="Kata Sandi">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Masuk</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url(); ?>assets/js/adminlte.min.js"></script>

</body>