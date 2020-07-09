 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
       <div class="container-fluid">
          <div class="row mb-2">
             <div class="col-sm-6">
             </div>
             <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                   <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                   <li class="breadcrumb-item active"><?= $this->session->userdata('page');  ?></li>
                </ol>
             </div>
          </div>
       </div>
    </div><!-- /.container-fluid -->

    <!-- Main content -->
    <section class="content">
       <div class="row">
          <div class="col-12">
             <div class="card">
                <div class="card-header">
                   <h3 class="card-title"><?= $this->session->userdata('page');  ?> </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                   <input id="session_level" value="<?php echo $base_controller->LoginInfo->level_id; ?>" hidden />
                   <form id="formData" class="form-horizontal">
                      <div class="row">
                         <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                               <label>Nama Perusahaan</label>
                               <input type="text" class="form-control" id="company_name" name="Nama Perusahaan" value="<?= $base_controller->Configs->COMPANY_NAME; ?>" required>
                            </div>
                         </div>
                         <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                               <label>Alamat</label>
                               <input type="text" class="form-control" id="address" name="Alamat" value="<?= $base_controller->Configs->ADDRESS; ?>" required>
                            </div>
                         </div>
                      </div>
                      <div class="row">
                         <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                               <label>No. Telp</label>
                               <input type="text" class="form-control" id="phone" name="No Telp" value="<?= $base_controller->Configs->PHONE; ?>" required>
                            </div>
                         </div>
                         <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                               <label>Email</label>
                               <input type="text" class="form-control" id="email" name="Email" value="<?= $base_controller->Configs->EMAIL; ?>" required>
                            </div>
                         </div>
                      </div>

                      <div class="row">
                         <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                               <label>Logo</label><br/>
                               <input value="<?php echo $base_controller->Configs->LOGO ?>" id="img_url" name="img_url" style="display:none;" />
                                                            <input type="file" id="logo" name="logo" onchange="previewFile()" accept="image/x-png,image/gif,image/jpeg"><br>
                                                            <center><img id="preview_logo" name="preview_logo" height="30%" width="30%" class="resize_fit_center" src="<?php $imgurl = base_url() . "assets/img/upload.png";
                                                                                                                                                if ($base_controller->Configs->LOGO != null && $base_controller->Configs->LOGO != "") {
                                                                                                                                                    $imgurl = base_url() . "assets/img/" . $base_controller->Configs->LOGO;
                                                                                                                                                }
                                                                                                                                                echo $imgurl  ?>" alt="Image preview..."></center>
                                                            <center><a href="javascript:clearImages();" id="btClearImages" name="btClearImages" class="btn btn-danger text-white" style="display:none;"><i class="fas fa-trash"></i>&nbsp;Clear Images</a></center>
                            </div>
                         </div>
                      </div>

                      <div class="row">
                         <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                               <button class="btn btn-success" id="btnSave" name="btnSave">Simpan</button>
                            </div>
                         </div>
                      </div>
                   </form>
                </div>
                <!-- /.card-body -->
             </div>
             <!-- /.card -->
          </div>
          <!-- /.col -->
       </div>
       <!-- /.row -->
    </section>
    <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->

 <!-- Control Sidebar -->
 <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
 </aside>
 <!-- /.control-sidebar -->