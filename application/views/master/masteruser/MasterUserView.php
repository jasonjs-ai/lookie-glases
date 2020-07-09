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
                                  <label>Nama Pengguna</label>
                                  <input type="text" class="form-control" id="username" name="Nama Pengguna" required>
                               </div>
                            </div>
                            <div class="col-sm-6">
                               <div class="form-group">
                                  <label>Nama Depan</label>
                                  <input type="text" class="form-control" id="first_name" name="Nama Depan">
                               </div>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-sm-6">
                               <!-- text input -->
                               <div class="form-group">
                                  <label>Nama Belakang</label>
                                  <input type="text" class="form-control" id="last_name" name="Nama Belakang">
                               </div>
                            </div>
                            <div class="col-sm-6">
                               <div class="form-group">
                                  <label>Akses</label>
                                  <select class="form-control" id="level" name="Akses" required></select>
                               </div>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-sm-6">
                               <div class="form-group">
                                  <label>Tempat Lahir</label>
                                  <input type="text" class="form-control" id="tempat_lahir" name="Tempat Lahir">
                               </div>
                            </div>
                            <div class="col-sm-6">
                               <div class="form-group">
                                  <label>Tanggal Lahir</label>
                                  <input type="text" class="form-control" id="tanggal_lahir" name="Tanggal Lahir">
                               </div>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-sm-6">
                               <div class="form-group">
                                  <label>No. HP</label>
                                  <input type="text" class="form-control" id="no_hp" name="No HP">
                               </div>
                            </div>
                            <div class="col-sm-6">
                               <div class="form-group">
                                  <label>Email</label>
                                  <input type="text" class="form-control" id="email" name="Email">
                               </div>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-sm-12">
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
                            <th>Nama Pengguna</th>
                            <th>Nama Depan</th>
                            <th>Nama Belakang</th>
                            <th>Akses</th>
                            <th>Email</th>
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