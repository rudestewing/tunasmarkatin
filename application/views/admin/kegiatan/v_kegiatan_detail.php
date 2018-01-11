<div class="content-wrapper">

    <section class="content-header">
        <h1> ID : <?php echo $kegiatan['id_kegiatan']; ?> </h1> 
        <ol class="breadcrumb">
          <a href="<?php echo base_url('admin/kegiatan/edit/'.$kegiatan['id_kegiatan']); ?>"><button class="btn btn-primary" onclick=""> Edit Kegiatan </button></a>
      </ol>
    </section>
    <br>
    <section class="content">
        <div class="row">
            <div class="col-xs-12"> 
                <div class="box">

                    <div class="box-header"> 
                        <div class="row"> 
                            <div class="col-sm-8">
                            <h3> <?php echo $kegiatan['judul']; ?></h2>
                            </div>
                            <div class="col-sm-4">
                            <h3> Tanggal Kegiatan : <?php echo $kegiatan['tanggal_kegiatan'];?></h3>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="box-body"> 
                        <div class="row">
                            <div class="col-sm-6">
                                    <img class="img-thumbnail" src="<?php echo base_url(). '/assets-admin/gambar/kegiatan/'.$kegiatan['gambar']; ?>" class="img-responsive" alt="">
                            </div>
                        </div>
                    </div>
                    
                    <div class="box-body">     
                        <div class="row">   
                            <div class="col-sm-12">
                               <p id="deskripsi-kegiatan"> <?php echo $kegiatan['deskripsi'];?> </p>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </section>

</div>