 

 <style>
    #modal-upload{
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        data-backdrop: static; 
        data-keyboard:false;
    }
    .modal-content {
        height: auto;
        min-height: 100%;
        border-radius: 0;
    }
 
 </style>
<div class="content-wrapper"> 
    
    <?php
        if($this->session->flashdata('sukses')){?>
            <div class="alert alert-success"> 
                Data berhasil di input
                <?php $this->session->flashdata('sukses'); ?>
            </div> 
        <?php }
    ?>

    <?php
        if($this->session->flashdata('gagal')){?>
            <div class="alert alert-danger"> 
                <?php $this->session->flashdata('gagal'); ?>
            </div> 
        <?php }
    ?>

    <?php 
    $session = $this->session->userdata('id_kegiatan');
    //echo $session;
    ?>
    
    <?php if(!isset($session)){ ?>
    <div class="content-header">
        <h3> Form Tambah Kegiatan</h4>    
    </div>

    <!-- deskripsi kegiatan -->
    <section class="content">
        <!-- box content here -->       
        <div class="row">
            <div class="box-body">
               
                <?php echo form_open_multipart('admin/kegiatan/tambah',array('class'=>'form-horizontal','id'=>'form-kegiatan')); ?>                                
                <div class="form-group">  
                    <label for="judul_kegiatan" class="col-sm-3 control-label" > Judul Kegiatan </label>
                    <div class="col-sm-3">
                        <input type="text" id="judul" name="judul" class="form-control">
                        <span id="message_judul"> <?php echo form_error('judul');?>  </span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tanggal_kegiatan" class="col-sm-3 control-label" > Tanggal Kegiatan </label>
                    <div class="col-sm-3">
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"> </i>
                            </div>
                            <input type="text" name="tanggal_kegiatan" class="form-control pull-right" id="tanggal_kegiatan">
                        </div>
                        <span id="message_tanggal_kegiatan"> <?php echo form_error('tanggal_kegiatan'); ?>  </span>
                    </div>
                </div>
                
                <div class="form-group">   
                    
                    <div for="deskripsi" class="col-sm-3">
                    <span id="message_deskripsi"> <?php echo form_error('')?> </span>
                    </div>
                    
                    <div class="col-sm-12">
                    </div>
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-12">
                
                    <!-- use CKEditor -->
                    <!-- <textarea name="deskripsi" id="deskripsi_kegiatan" class="ckeditor" cols="30" rows="10"
                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px;" placeholder="Tambahkan deskripsi kegiatan disini">    
                    </textarea> -->
                    <span id="message_judul"> <?php echo form_error('deskripsi');?>  </span>
                    <!-- use wysihtml5 bootstrap -->
                    <textarea name="deskripsi" id="deskripsi_kegiatan" class="deskripsi_kegiatan_wysihtml5" cols="30" rows="10"
                    style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px;" placeholder="Tambahkan deskripsi kegiatan disini">
                    input deskripsi disini 
                
                    </textarea>
                    
                    
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-md-3">
                       <!-- with ajax jquery -->
                        <!-- <button type="button" id="btnSave" onclick="save()" class="btn btn-primary"> SAVE </button> -->
                     
                        <!-- without ajax jquery -->
                        <button class="btn btn-primary "type="submit" id="btnSave"  class="btn btn-primary"> SAVE </button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </section>
    <?php }else {?>


    <!-- gambar kegiatan -->
    <section class="content">
        <div class="box"> 
        <div class="box-body">
        <?php echo form_open_multipart('admin/kegiatan/upload_gambar',array('class'=>'form-horizontal','id'=>'form-upload')); ?>
                
            <div class="form-group">
                <div class="col-sm-3">
                    <label for="gambar" class="control-label"> <h4> Pilih gambar untuk di upload </h4></label>
                </div>
            </div>
            <div id="msg_upload"> </div>
            <div class="form-group">    
                <div class="col-sm-6">
                    <input type="file" name="gambar" id="gambar">
                </div>
            </div> 

            <!-- <input type="submit" class="btn btn-success btn-md"name="submit" id="submit"> -->
            <!-- <button type="submit" class="btn btn-success btn-md" id="upload" name="upload" >
                <i class="glyphicon glyphicon-plus"></i> 
                Tambah gambar 
            </button> -->
            <button type="button" class="btn btn-success btn-md" id="upload" name="upload" >
                <i class="glyphicon glyphicon-plus"></i> 
                Tambah gambar 
            </button>
        </div>        
        </div>   
            
            <a style="width:300px;"onclick="return confirm('Selesai Input ?');"class="btn btn-primary btn-md"href="<?php echo base_url('admin/kegiatan/unset_session');?>"> 
            Selesai Input Gambar
            </a>  
        
            <?php echo form_close(); ?>
            
            <!-- box content here -->       
            <div class="row">
                <div class="box-body">
                    <table class="table table-bordered table-responsive dataTable" id="tabel-gambar-kegiatan"> 
                        <thead>
                            <tr>
                                <td style="width:1%;">  <h4></h4>    </td>
                                <!-- <td style="width:10%;"> <h4>id_kegiatan</h4> </td> -->
                                <td style="width:30%;"> <h4>Preview Gambar</h4> </td>
                                <td style="width:60%;"> <h4>Action</h4> </td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
    </section>

    <?php } ?>

</div>

<script>
    //define site_URL for external javascript
    var site_URL = "<?php echo site_url(); ?>";
</script>
