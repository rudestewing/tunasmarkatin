  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <?php echo $this->session->flashdata('sukses'); ?>
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo $header ?></h3>
        </div>
        <div><a href="<?php echo base_url(); ?>admin/user/tambah"><button class="btn btn-primary"><i class="fa fa-plus"></i> Tambah User</button></a> </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <table class="table table-striped">
            <tr id="tabel">
              <th style="width: 10%">No</th>
              <th style="width: 40%">Nama</th>
              <th style="width: 15%">username</th>
              <th style="width: 15%">Otorisasi</th>
              <th style="width: 20%">Action</th>
            </tr>
            <?php $no=1; foreach ($user as $user) {?>
            <tr>
              <td><?php echo $no ?></td>
              <td><?php echo $user['nama_user']; ?></td>
              <td><?php echo $user['username']; ?></td>
              <td><span class="badge bg-red"><?php echo $user['level']; ?></span></td>
              <td>
              <a href="<?php echo base_url('admin/user/edit/'.$user['id_user']); ?>"><button class="btn btn-success"><i class="fa fa-pencil"></i><br></button></a>
              <button type="button" data-toggle="modal" data-target="#hapus" class="btn btn-danger"><i class="fa fa-trash"></i></button></td>
                <!-- Modal -->
              <div class="modal fade" id="hapus" role="dialog">
                <div class="modal-dialog">
    
              <!-- Modal hapus -->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Yakin Menghapus <?php echo $user['nama_user'] ?> ?</h4>
                    </div>
                <div class="modal-footer">
                    <a href="<?php echo base_url('admin/user/hapus/'.$user['id_user']) ?>"><button type="submit" value="submit" class="btn btn-danger" >Hapus</button></a>
                  </div>
              </div>
            </div>
          </div>




              
            </tr>
             <?php $no++;} ?>
          </table>
        </div>

       
        <!-- /.box-body -->
      </div>
    </section>
  </div>
