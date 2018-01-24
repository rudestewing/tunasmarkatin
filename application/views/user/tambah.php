<div class="content-wrapper">
 <section class="content-header">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo $header ?></h3>
            
        </div>
        
         <!-- /.box-header -->
        <div class="box-body no-padding">
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="">
              <?php echo validation_errors('<div class="alert alert-danger" style="width:700px; margin: 0px 10px;">','</div>'); ?>
              <div class="box-body"  style="width: 700px;">
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" id="usernae" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="passconf">Konfirmasi Password</label>
                  <input type="password" class="form-control" id="passconf" name="passconf" placeholder="Password">
                </div>
                 <div class="form-group">
                  <label for="username">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                </div>
                </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button for ="daftar" type="submit" value="submit" name="daftar"  class="btn btn-primary">Submit</button>
              </div>
            </form>
          <!-- /.box -->
		</div>
	</section>
</div>
