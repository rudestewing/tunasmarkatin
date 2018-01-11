 
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

    <div class="content-header">
    <h3> Form Tambah Kegiatan</h4>
    </div>

    <section class="content">
        <!-- box content here -->       
        <div class="row">
            <div class="box-body">
                <?php echo validation_errors();?> 
                <?php echo form_open_multipart('admin/kegiatan/tambah',array('class'=>'form-horizontal','id'=>'form-kegiatan')); ?>                                
                <!-- <div class="form-group">   
                    <label for="id_kegiatan" class="col-sm-3 control-label" > ID Kegiatan </label>
                    <div class="col-sm-3">
                        <input type="text" id="id_kegiatan" name="id_kegiatan" class="form-control">
                        <span id="message_id_kegiatan">  </span>
                    </div>
                </div> -->
                <div class="form-group">  
                    <label for="judul_kegiatan" class="col-sm-3 control-label" > Judul Kegiatan </label>
                    <div class="col-sm-6">
                        <input type="text" id="judul" name="judul" class="form-control">
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
                            <input type="text" name="tanggal_kegiatan" class="form-control pull-right" id="tanggal_kegiatan">
                        </div>
                        <span id="message_tanggal_kegiatan">  </span>
                    </div>
                </div>
                <div class="form-group">   
                    <label for="gambar" class="col-sm-3 control-label" > Upload Gambar </label>
                    <div class="col-sm-6">
                        <input type="file" id="gambar" name="gambar" >
                        <p class="help-block"> file gambar tidak boleh melebihi .... KB </p>
                        <!-- <span id="message_gambar">  </span> -->
                    </div>
                </div>
                <div class="form-group">   
                    <label for="deskripsi" class="col-sm-3 control-label" ></label>
                    <div class="col-sm-12">
                    </div>
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-12">
                
                    <!-- use CKEditor -->

                    <!-- <textarea name="deskripsi" id="deskripsi_kegiatan" class="ckeditor" cols="30" rows="10"
                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px;" placeholder="Tambahkan deskripsi kegiatan disini">    
                    </textarea> -->

                    <!-- use wysihtml5 bootstrap -->
                    <textarea name="deskripsi" id="deskripsi_kegiatan" class="deskripsi_kegiatan_wysihtml5" cols="30" rows="10"
                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px;" placeholder="Tambahkan deskripsi kegiatan disini">
                    input deskripsi disini 
                
                    </textarea>
                    
                    <span id="message_deskripsi">  </span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-3">
                        <!-- <button type="button" id="btnSave" onclick="save()" class="btn btn-primary"> SAVE </button> -->
                        <button class="btn btn-primary "type="submit" id="btnSave" onclick="" class="btn btn-primary"> SAVE </button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        
    </section>
</div>

<script>
    //define site_URL for external javascript
    var site_URL = "<?php echo site_url(); ?>";
</script>
