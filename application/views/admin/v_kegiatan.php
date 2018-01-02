
<style>


  #tabel-kegiatan td { 
    max-width: 0;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    height: 100px;
   }
   

    

</style>

<div class="content-wrapper"> 
    <div class="content-header"> 
        <h1> List Kegiatan </h1>
    </div>

    <div class="content-header">
        <a href="#" data-toggle="modal" data-target="#tambah-kegiatan" class="btn btn-primary btn-sm"> Tambah Kegiatan Baru </a>
    </div>

    <section class="content">
    
        <!-- modal input here -->
        <div class="modal" id="tambah-kegiatan" tabindex="-1" role="dialog">
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
            

            
            <div class="modal-dialog modal-lg" role="document"> 
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">
                                &times;
                            </span>    
                        </button>
                        <div class="modal-title" id=""> 
                        <h3>Form Input Kegiatan</h3> 
                        </div>
                    </div>
                    
                    <div class="modal-body">
                        <?php echo form_open_multipart('admin/kegiatan/tambah',array('class'=>'form-horizontal','id'=>'form_tambah')); ?>
                            <?php echo validation_errors(); ?>
                            <div class="form-group">   
                                <label for="id_kegiatan" class="col-sm-3 control-label" > ID Kegiatan </label>
                                <div class="col-sm-3">
                                    <input type="text" id="id_kegiatan" name="id_kegiatan" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">   
                                <label for="judul_kegiatan" class="col-sm-3 control-label" > Judul Kegiatan </label>
                                <div class="col-sm-6">
                                    <input type="text" id="judul" name="judul" class="form-control">
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
                                </div>
                            </div>
                            <div class="form-group">   
                                <label for="gambar" class="col-sm-3 control-label" > Upload Gambar </label>
                                <div class="col-sm-6">
                                    <input type="file" id="gambar" name="gambar" >
                                    <p class="help-block"> file gambar tidak boleh melebihi .... KB </p>
                                   
                                </div>
                            </div>
                            
                            <div class="form-group">   
                                <label for="deskripsi" class="col-sm-3 control-label" ></label>
                                <div class="col-sm-12"></div>
                                <div class="col-sm-6">
                                </div>
                                <div class="col-sm-12">
                                    <textarea name="deskripsi" id="" class="deskripsi_kegiatan" cols="30" rows="10"
                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px;" placeholder="Tambahkan deskripsi kegiatan disini">
                                    </textarea>
                                    
                                    <input type="hidden" name="_wysihtml5_mode" value="1">
                                

                                    <!-- <textarea name="deskripsi" id="deskripsi" name="deskripsi" cols="80" rows="10"></textarea>   -->
                                
                                </div>
                            </div>


                            
                            
                            
                            <!-- <input type="text" id="datamask" class="form-control" name="tanggaL_kegiatan" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask=""> -->
                            
                    </div>

                    <div class="modal-footer">
                        
                        <button type="submit" class="btn btn-primary"> Input </button>
                    </div>

                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>




        <!-- modal edit here -->
        <div class="modal fade" id="edit-kegiatan" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document"> 
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">
                                &times;
                            </span>    
                        </button>

                        <div class="modal-title" id=""> Edit Kegiatan </div>
                    </div>
                
                    <div class="modal-body">

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger"> Batal </button>
                        <button type="button" class="btn btn-primary"> Update </button>
                    </div>
                        
                </div>
            </div>
        </div>

      
        <!-- box content here -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                   

                    <div class="box-body">
                        
                            <div class="row">
                                <div class="col-sm-12">
                                
                                <table id="tabel-kegiatan" class="table table-striped table-responsive dataTable" >
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;"> ID  </th>
                                            <th style="width: 20%;"> Gambar </th>
                                            <th style="width: 15%;"> Judul Kegiatan </th>
                                            <th style="width: 30%;"> Deskripsi </th>
                                            <th style="width: 15%;">Tanggal </th>
                                            <th style="width: 10%;"> Aksi </th>
                                        </tr>
                                    </thead>

                                    <tfoot>
                                        <th style="width: 5%;"> ID </th>
                                        <th style="width: 20%;"> Gambar </th>
                                        <th style="width: 15%;"> Judul Kegiatan </th>
                                        <th style="width: 30%;"> Deskripsi </th>
                                        <th style="width: 15%;">Tanggal </th>
                                        <th style="width: 10%;"> Aksi </th>
                                    </tfoot>
                                </table>
                                </div>

                            </div>
                            <!-- row -->

                            <div class="row">
                               
                            </div>

                       
                    </div>
                </div>

            </div>
        </div>
    
    </section>


</div>

<script>
    var site_URL = "<?php echo site_url(); ?>";
</script>
