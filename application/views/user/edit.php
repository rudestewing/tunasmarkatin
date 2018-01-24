<div class="content-wrapper">
 <section class="content-header">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo $header ?></h3>
            
        </div>
        <?php echo validation_errors('<div class="alert alert-danger" style="width:700px; margin: 0px 10px;">','</div>'); ?>
         <!-- /.box-header -->
        <div class="box-body no-padding">
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="">
              <div class="box-body"  style="width: 700px;">
                <div class="form-group">
                  <label for="username">Password Lama</label>
                  <input type="password" class="form-control" id="password_lama" name="password_lama" placeholder="Password Lama">
                </div>
                <div class="form-group">
                  <label for="password">Password Baru</label>
                  <input type="password" class="form-control" id="password_baru" name="password_baru" placeholder="Password Baru">
                </div>
                <div class="form-group">
                  <label for="passconf">Konfirmasi Password</label>
                  <input type="password" class="form-control" id="passconf" name="passconf" placeholder="Password">
                </div>
                 <div class="form-group">
                </div>
                </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button for ="daftar" type="submit" value="submit" name="ganti_pass"  class="btn btn-primary">Submit</button>
              </div>
            </form>
          <!-- /.box -->
    </div>
  </section>
</div>
