 <div class="content-wrapper">
    <section class="content-header">
	
	 <section class="content">
      <div class="row">
        <!-- left column -->
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
        	<?php if (isset($_SESSION['success'])) {?>

        		<div class="alert alert-success"><?php echo $_SESSION['success'] ?></div>
          
        	<?php } ?>
        <h2 class="form-signin-heading"><?php echo $header ?></h2>
         <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
         <?php echo form_open_multipart('admin/guru/tambah', ''); ?>
              <div class="box-body">
                <?php $this->session->flashdata('error'); ?>
              	    <div class="form-group">
                  <label for="nama">Nama Lengkap</label>
                  <input  type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                  <label for="nip">Nomor Induk Pengajar</label>
                  <input type="text" name="nip" class="form-control" id="nip" placeholder="NIP">
                </div>
               
                <div class="form-group">
                  <label for="jenis_kelamin">Jenis Kelamin</label>
                  <select class="form-control" name="kelamin" id="kelamini">
						<option class="form-control" name="kelamin" value="W"> Wanita </option>
						<option class="form-control" name="kelamin" value="P"> Pria </option>
				  </select>
                </div>
                <div class="form-group">
                  <label for="tempat_lahir">Tempat lahir</label>
                  <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir">
                </div>
                <div class="form-group">
                  <label for="nip">Tanggal lahir</label>
                  <input type="date" min="1960-01-01" max="<?php echo date('Y-m-dS') ?>" name="tanggal_lahir"  class="form-control" id="tanggal_lahir" placeholder="Tanggal Lahir">
                </div>
                <div class="form-group">
                  <label for="pendidikan">Pendidikan</label>
                  <select class="form-control" name="pendidikan" id="pendidikan" >
						<option class="form-control" name="pendidikan" value="sma"> SMA/SLTA </option>
						<option class="form-control" name="pendididkan" value="d3"> Diploma  </option>
						<option class="form-control" name="pendididkan" value="s1"> Strata 1  </option>
						<option class="form-control" name="pendididkan" value="s2"> Strata 2  </option>
						<option class="form-control" name="pendididkan" value="s3"> Strata 3  </option>
				  </select>
                </div>
                 <div class="form-group">
                  <label for="status">Jabatan</label>
                  <select class="form-control" name="status" id="status">
						<option class="form-control"  value="Guru">Guru </option>
						<option class="form-control"  value="Staff">Staff  </option>
						<option class="form-control"  value="Freelance">Freelance  </option>
						<option class="form-control"  value="Wakil Kepala Sekolah"> Wakil kepala sekolah  </option>
						<option class="form-control" name="pendididkan" value="Kepala Sekolah"> Kepala sekolah  </option>
				  </select>
          <div class="form-group">
                  <label for="matpel">Mata Pelajaran</label>
                  <input type="text" name="matpel" class="form-control" id="matpel" placeholder="Mata Pelajaran">
                </div>
                <label for="matpel">Facebook</label>
                  <input type="text" name="facebook" class="form-control" id="facebook" placeholder="facebook">
                </div>
                <label for="matpel">Instagram</label>
                  <input type="text" name="instagram" class="form-control" id="instagram" placeholder="instagram">
                </div>
                 <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <textarea type="text" rows="6" name="alamat" class="form-control" id="alamat" placeholder="Alamat"></textarea>
                </div>
                <div class="form-group">
                  <label for="alamat">About me</label>
                  <textarea type="text" rows="3" name="about_me" class="form-control" id="alamat" placeholder="Tulis sesuatu tentang diri anda"></textarea>
                </div>
                <div class="form-group">
                  <label for="path_foto">Input Avatar</label>
                  <input type="file" id="path_foto" name="path_foto">

                  <p class="help-block">Masukan Foto</p>
                </div>
            
                
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button for="tambah" type="submit" name="tambah" value="tambah" class="btn btn-primary">Tambah</button>
              </div>
              <?php form_close(); ?>
            </form>
          </div>
          <!-- /.box -->


    </section>
</div>