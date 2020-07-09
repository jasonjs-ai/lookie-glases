 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
       <div class="container-fluid">

          <!-- Modal -->
          <div class="modal fade" id="crudModal" role="dialog" aria-labelledby="crudModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
             <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                   <div class="modal-header">
                      <h5 class="modal-title" id="crudLabel"></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                      </button>
                   </div>
                   <div class="modal-body">
                      <form id="formData" class="form-horizontal">
                         <div class="row" style="display:none;">
                            <div class="col-sm-6">
                               <!-- text input -->
                               <div class="form-group">
                                  <label>ID</label>
                                  <input type="text" disabled class="form-control" id="id" name="ID">
                               </div>
                            </div>
                            <div class="col-sm-6">
                               <div class="form-group">
                                  <label>Action</label>
                                  <input type="text" disabled class="form-control" id="action" name="Action">
                               </div>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-sm-6">
                               <!-- text input -->
                               <div class="form-group">
                                  <label>Kode</label>
                                  <input type="text" class="form-control" id="code" name="Kode" required>
                               </div>
                            </div>
                            <div class="col-sm-6">
                               <div class="form-group">
                                  <label>Nama</label>
                                  <input type="text" class="form-control" id="name" name="Nama" required>
                               </div>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-sm-6">
                               <!-- text input -->
                               <div class="form-group">
                                  <label>Frame Depan</label><br />
                                  <input value="<?php echo base_url() . "assets/img/upload.png" ?>" id="front_url" name="Frame Depan" style="display:none;" required/>
                                  <input type="file" id="front" name="Frame Depan" onchange="previewFileFront()" accept="image/x-png,image/gif,image/jpeg" ><br>
                                  <center><img id="preview_front" name="preview_front" height="30%" width="30%" class="resize_fit_center" src="<?php echo base_url() . "assets/img/upload.png" ?>" alt="Image preview..."></center>
                                  <center><a href="javascript:clearImagesFront();" id="btClearImagesFront" name="btClearImagesFront" class="btn btn-danger text-white" style="display:none;"><i class="fas fa-trash"></i>&nbsp;Clear Images</a></center>
                               </div>
                            </div>
                            <div class="col-sm-6">
                               <!-- text input -->
                               <div class="form-group">
                                  <label>Frame Kiri</label><br />
                                  <input value="<?php echo base_url() . "assets/img/upload.png" ?>" id="left_url" name="Frame Kiri" style="display:none;" required/>
                                  <input type="file" id="left" name="Frame Kiri" onchange="previewFileLeft()" accept="image/x-png,image/gif,image/jpeg" ><br>
                                  <center><img id="preview_left" name="preview_left" height="30%" width="30%" class="resize_fit_center" src="<?php echo base_url() . "assets/img/upload.png" ?>" alt="Image preview..."></center>
                                  <center><a href="javascript:clearImagesLeft();" id="btClearImagesLeft" name="btClearImagesLeft" class="btn btn-danger text-white" style="display:none;"><i class="fas fa-trash"></i>&nbsp;Clear Images</a></center>
                               </div>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-sm-6">
                               <div class="form-group">
                                  <label>Frame Kanan</label><br />
                                  <input value="<?php echo base_url() . "assets/img/upload.png" ?>" id="right_url" name="Frame Kanan" style="display:none;" required/>
                                  <input type="file" id="right" name="Frame Kanan" onchange="previewFileRight()" accept="image/x-png,image/gif,image/jpeg" ><br>
                                  <center><img id="preview_right" name="preview_right" height="30%" width="30%" class="resize_fit_center" src="<?php echo base_url() . "assets/img/upload.png" ?>" alt="Image preview..."></center>
                                  <center><a href="javascript:clearImagesRight();" id="btClearImagesRight" name="btClearImagesRight" class="btn btn-danger text-white" style="display:none;"><i class="fas fa-trash"></i>&nbsp;Clear Images</a></center>
                               </div>
                            </div>
                            <div class="col-sm-6">
                               <div class="form-group">
                                  <label>Keterangan</label>
                                  <textarea class="form-control" id="keterangan" name="Keterangan"></textarea>
                               </div>
                            </div>
                         </div>
                      </form>
                   </div>
                   <div class="modal-footer">
                      <button type="button" id="btSubmit" name="btSubmit" class="btn btn-round btn-primary">Simpan</button>
                      <button type="button" class="btn btn-round btn-danger" data-dismiss="modal">Batal</button>
                   </div>
                </div>
             </div>
          </div>

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
                   <table id="tbdata" class="table table-striped table-bordered">
                      <thead>
                         <tr>
                            <th>ID</th>
                            <th>Aksi</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Frame Depan</th>
                            <th>Frame Kiri</th>
                            <th>Frame Kanan</th>
                            <th>Keterangan</th>
                         </tr>
                      </thead>
                      <tbody id="preview-data">
                      </tbody>
                   </table>
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