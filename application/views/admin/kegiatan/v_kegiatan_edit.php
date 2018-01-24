<div class="content-wrapper">
    <section class="content-header">
        <h3>Edit Kegiatan</h3>
    <?php echo $this->session->userdata('id_kegiatan');?>
    </section>

    <section class="content" id="content-edit-kegiatan">
        <div class="row">
             <?php echo form_open('admin/kegiatan/update',array('id'=>'edit-kegiatan','class'=>'form-horizontal'));?>    
                <?php echo validation_errors();?>
                        <div class="box-body">
                            <div class="form-group">   
                                <label for="judul_kegiatan" class="col-sm-3 control-label" > Judul Kegiatan </label>
                                <div class="col-sm-6">
                                    <input type="hidden" name="id_kegiatan" value="<?php echo $kegiatan['id_kegiatan']; ?>">
                                    <input type="text" id="judul" name="judul" class="form-control" value="<?php echo $kegiatan['judul']; ?>">
                                    <span id="message_judul">  </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_kegiatan" class="col-sm-3 control-label" > Tanggal Kegiatan </label>
                                <div class="col-sm-3">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"> </i>
                                        </div>
                                    <?php 
                                    //format date again to display in date picker
                                        $tanggal            = $kegiatan['tanggal_kegiatan'];
                                        $date 				= date_create($tanggal); 
			                            $tanggal_kegiatan 	= date_format($date,'m/d/Y');
                                    ?> 
                                        <input type="text" name="tanggal_kegiatan" class="form-control pull-right" id="tanggal_kegiatan" value="<?php echo $tanggal_kegiatan; ?>">
                                    </div>
                                    <span id="message_tanggal_kegiatan">  </span>
                                </div>
                            </div>
                            <div class="form-group">   
                                <label for="deskripsi" class="col-sm-3 control-label" ></label>
                                <div class="col-sm-12">
                                </div>
                                <div class="col-sm-6">
                                </div>
                                <div class="col-sm-12">
                                    <textarea name="deskripsi" id="" class="deskripsi_kegiatan_wysihtml5" cols="30" rows="10"
                                    style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px;" placeholder="Tambahkan deskripsi kegiatan disini">
                                    <?php echo $kegiatan['deskripsi'];?>
                                    </textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                <button type="button" id="btnSave" onclick="update()" class="btn btn-primary"> Update Kegiatan </button>
                                <!-- <button type="submit" id="btnSave" class="btn btn-primary"> Update Kegiatan </button> -->
                                </div>          
                            </div>
                        </div>
            <?php echo form_close(); ?>
        </div>
    </section>
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
</div> 



<!-- CK Editor -->
<script src="<?php echo base_url()?>assets-admin/bower_components/ckeditor/ckeditor.js"></script>
<script>
    //define site_URL for external javascript
    var site_URL = "<?php echo site_url(); ?>";

    // var content = "<?php //echo $kegiatan['deskripsi'];?>";

    CKEDITOR.replace('deskripsi_kegiatan-edit');

    CKEDITOR.instances['deskripsi_kegiatan-edit'].setData('lmao');


</script>
