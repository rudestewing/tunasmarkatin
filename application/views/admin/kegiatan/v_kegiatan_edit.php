<div class="content-wrapper">
    <section class="content-header">
    
    </section>

    <section class="content">
        
        <?php echo form_open('admin/kegiatan/update',array('id'=>'edit-kegiatan','class'=>'form-horizontal'));?>
            <div class="row">
                <?php echo validation_errors();?>
                <div class="col-xs-12">
                    <div class="box">
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
                                    <!-- <textarea name="deskripsi_kegiatan-edit" id="deskripsi_kegiatan-edit" class="" cols="100%" rows="10">
                                        <?php //echo $kegiatan['deskripsi'];?>
                                    </textarea> -->

                                    <textarea name="deskripsi" id="" class="deskripsi_kegiatan_wysihtml5" cols="30" rows="10"
                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px;" placeholder="Tambahkan deskripsi kegiatan disini">
                                    <?php echo $kegiatan['deskripsi'];?>
                                   
                                    </textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                <button type="submit" id="btnSave" class="btn btn-primary"> Update Kegiatan </button>
                    
                                </div>

                                
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        <?php echo form_close(); ?>

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
