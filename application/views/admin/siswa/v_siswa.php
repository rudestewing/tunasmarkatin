 <div class="content-wrapper">
    <section class="content-header">
	  <!-- Content Wrapper. Contains page content -->
      <?php echo $this->session->flashdata('sukses'); ?>
      <?php echo $this->session->flashdata('gagal'); ?>
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo $header ?></h3>
        </div>
        <div><a href="<?php echo base_url(); ?>admin/siswa/tambah"><button class="btn btn-primary"><i class="fa fa-plus"></i> Tambah siswa</button></a> </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-striped">
            <tr id="tabel">
              <th>No</th>              
              <th>Nama</th>
              <th>Kelamin</th>
              <th>Pendidikan</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
            <?php $no=1; foreach ($siswa as $user) {?>
            <tr>
              <td><?php echo $no ?></td>
              <td><?php echo $user['nama_siswa']; ?></td>
              <td><?php echo $user['jenis_kelamin']; ?></td>
              <td><?php echo $user['pendidikan']; ?></td>             
              <td><span class="badge bg-red"><?php echo $user['status']; ?></span></td>
              <td>
              <a href="<?php echo base_url('admin/siswa/detail/'.$user['id_siswa']); ?>"><button class="btn btn-success"><i class="fa fa-eye"></i><br></button></a>
                <?php include('hapus.php') ?>
              
            </tr>
             <?php $no++;} ?>
          </table>
        </div>

       
        <!-- /.box-body -->
      </div>
    </section>
  </div>



    </section>
</div>