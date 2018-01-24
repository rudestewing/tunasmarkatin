<style>
    .gambar-container { 
    float: left;
    margin : 10px;
    width: 200px; 
    height: 200px; 
    overflow: hidden; 
    border:1px solid;
    border-radius:5px;
    padding:3px;
    }
    .gambar-container img { 
        
        height: 100%; 
    }
</style>



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
                            <div class="col-sm-12">
                               <p id="deskripsi-kegiatan"> <?php echo $kegiatan['deskripsi'];?> </p>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <h5>Gambar Kegiatan <?php ?></h5> 
                        <div class="row">
                            <?php foreach ($kegiatan_gambar as $gambar){?>
                                <div class="gambar-container">
                                    <img class=""src="<?php echo base_url('assets-admin/gambar/kegiatan/'.$gambar['gambar']);?>" alt="">
                                </div>
                            <?php }?>
                        </div>
                    </div>
                    <div class="box-footer"> 
                   
                    <p style="font-style:italic;">
                    <?php 
                    $date_create    = date_create($kegiatan['tanggal_buat']); 
                    $tanggal_buat   = date_format($date_create,'d-m-Y');

                    $date_update    = date_create($kegiatan['tanggal_update']);
                    $tanggal_update = date_format($date_create,'d-m-Y');

                    ?>
                    <div class="col-sm-2">
                    <small> tanggal buat : <?php echo $tanggal_buat; ?></small> 
                    </div>
                    <div class="col-sm-2">
                    <small> terakir di update :  <?php echo $tanggal_update; ?></small>
                    </p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>