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
                    <div class="box-header">
                      this is box header  
                    </div>

                    <div class="box-body">
                        <div id="datatables_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="dataTables_length" id="example1_length">
                                        <label>Show 
                                            <select name="example1_length" aria-controls="example1" class="form-control input-sm">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select> entries
                                        </label>
                                    </div>
                                </div>
                               
                                <div class="col-sm-6">
                                    <div id="example1_filter" class="dataTables_filter">
                                        <label>Search:
                                            <input type="search" class="form-control input-sm" placeholder="" aria-controls="example1">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- row -->

                            <div class="row">
                                <div class="col-sm-12">
                                <table border="1px;" id="tabel-kegiatan" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                        
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  aria-label="" style="width: 5%;">no.</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="" style="width: 20%;"> Gambar </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="" style="width: 15%;"> Judul Kegiatan </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="" style="width: 30%;"> Deskripsi </th>
                                        <th height="10px" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="" style="width: 15%;">Tanggal </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="" style="width: 10%;"> Aksi </th>
                                    </tr>

                                    </thead>

                                    <tbody>
                                    
                                    <?php 
                                    
                                    $no = 1;
                                    foreach ($kegiatan as $data_kegiatan ) {?>
                                    <tr role="row" >
                                        <td> <?php echo $no; ?> </td>
                                        <td> 
                                        <img style="width: 100px; height: 100px;"  src="<?php echo base_url('assets-admin/gambar/kegiatan/'.$data_kegiatan['gambar']);?>"> 
                                        </td>
                                        <td> <?php echo $data_kegiatan['judul']; ?>  </td>
                                        <td> <?php echo $data_kegiatan['deskripsi']; ?>  </td>
                                        <td> <?php echo $data_kegiatan['tanggal_kegiatan']; ?>  </td>
                                        <td> 
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" > 
                                                    Aksi 
                                                <span class="caret">
                                                </span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li> <a href="#" id="" > Edit </a> </li>
                                                    <li> <a href="#" id="" > Delete </a> </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    <?php $no++; }?>
                                    
                                    </tbody>
                        
                                    <tfoot>
                                    <tr>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"  aria-label="" style="width: 20px;">no.</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="" style="width: 221px;"> Gambar </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="" style="width: 203px;"> Judul Kegiatan </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="" style="width: 145px;"> Deskripsi </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="" style="width: 110px;">Tanggal </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="" style="width: 110px;"> Aksi </th>
                                    </tr>
                                    </tfoot>
                        
                                </table>
                                </div>

                            </div>
                            <!-- row -->

                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                                        Showing 1 to 10 of 57 entries
                                    </div>
                                </div>
              
                                <div class="col-sm-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button previous disabled" id="example1_previous">
                                        <a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">Previous</a>
                                    </li>
                                    <li class="paginate_button active">
                                        <a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a>
                                    </li>
                                    <li class="paginate_button ">
                                        <a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0">2</a>
                                    </li>
                                    <li class="paginate_button ">
                                        <a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0">3</a>
                                    </li>
                                    <li class="paginate_button ">
                                        <a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0">4</a>
                                    </li>
                                    <li class="paginate_button ">
                                        <a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0">5</a>
                                    </li>
                                    <li class="paginate_button ">
                                        <a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0">6</a>
                                    </li>
                                    <li class="paginate_button next" id="example1_next">
                                        <a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0">Next</a>
                                    </li>
                                </ul>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    
    </section>


</div>


