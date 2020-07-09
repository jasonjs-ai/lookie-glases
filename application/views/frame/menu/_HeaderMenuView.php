<body class="sidebar-mini layout-navbar-fixed layout-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user-circle"></i> <?= ucfirst($base_controller->LoginInfo->first_name); ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item change-password">
                            <i class="fas fa-lock"></i> &nbsp;&nbsp;<?= $this->config->item('ChangePassword'); ?>

                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="<?= base_url(); ?>Logout" class="dropdown-item">
                            <i class="fas fa-power-off "></i> &nbsp;&nbsp;<?= $this->config->item('Logout'); ?>

                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url(); ?>" class="brand-link">
                <img src="<?= base_url(); ?>assets/img/<?= $base_controller->Configs->LOGO; ?>" alt="Company Logo" class="brand-image" style="opacity: .8">
                <span class="brand-text font-weight-light"><?= $base_controller->Configs->COMPANY_NAME; ?></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url(); ?>assets/img/avatar_default.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="<?= base_url(); ?>" class="d-block"><?= ucfirst($base_controller->LoginInfo->first_name); ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-header">Menu</li>
                        <!--<li class="nav-item">
                            <a id="menuDashboard" href="<?= base_url(); ?>Home" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    <?= $this->config->item('Dashboard'); ?>
                                </p>
                            </a>
                        </li>-->
                        <?php if ($base_controller->LoginInfo->level_id == 1){ ?>
                        <li class="nav-header"><?= $this->config->item('Master'); ?></li>
                        <li id="menuMaster" class="nav-item has-treeview">
                            <a id="menuMasterParent" href="#" class="nav-link">
                                <i class="nav-icon fas fa-database"></i>
                                <p>
                                    <?= $this->config->item('Master'); ?>
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a id="menuMasterUser" href="<?= base_url(); ?>MasterUser" class="nav-link">
                                        <i class="fas fa-user-friends nav-icon"></i>
                                        <p><?= $this->config->item('MasterUser'); ?></p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-header"><?= $this->config->item('Trans'); ?></li>
                        <li id="menuTrans" class="nav-item has-treeview">
                            <a id="menuTransParent" href="#" class="nav-link">
                                <i class="nav-icon fas fa-download"></i>
                                <p>
                                    <?= $this->config->item('Trans'); ?>
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a id="menuTransDataKacamata" href="<?= base_url(); ?>TransDataKacamata" class="nav-link">
                                        <i class="fas fa-glasses nav-icon"></i>
                                        <p><?= $this->config->item('TransDataKacamata'); ?></p>
                                    </a>
                                </li>
                               
                            </ul>
                        </li>
                        <!--<li class="nav-header"><?= $this->config->item('Report'); ?></li>
                        <li id="menuReport" class="nav-item has-treeview">
                            <a id="menuReportParent" href="#" class="nav-link">
                                <i class="nav-icon fas fa-newspaper"></i>
                                <p>
                                    <?= $this->config->item('Report'); ?>
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                              
                            </ul>
                        </li>-->
                        <li class="nav-header"><?= $this->config->item('Settings'); ?></li>
                        <li class="nav-item">
                            <a id="menuSettings" href="<?= base_url(); ?>Settings" class="nav-link">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>
                                    <?= $this->config->item('Settings'); ?>
                                </p>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <input id="messages" name="messages" type="hidden" value="<?= $this->session->userdata('alert_types') . ";" . $this->session->userdata('alert_messages') ?>" />
        <?php
        $this->session->set_userdata('alert_messages', '');
        $this->session->set_userdata('alert_types', '');
        ?>
        <!-- Modal -->
        <div class="modal fade" id="changePasswordModal" role="dialog" aria-labelledby="changePasswordModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="changePasswordLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="formChangePassword" class="form-horizontal">
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Password Lama</label>
                                        <input type="password" class="form-control" id="password_lama" name="Password Lama" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Password Baru</label>
                                        <input type="password" class="form-control" id="password_baru" name="Password Baru" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Konfirmasi Password Baru</label>
                                        <input type="password" class="form-control" id="confirm_password_baru" name="Konfirmasi Password Baru" required>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btSubmitChangePassword" name="btSubmitChangePassword" class="btn btn-round btn-primary">Simpan</button>
                        <button type="button" class="btn btn-round btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                </div>
            </div>
        </div>