
<style>


  #tabel-kegiatan tbody td { 
    max-width: 0;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
   
    /* max-width: 0;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    height: 100px; */
   }
   

</style>

<div class="content-wrapper"> 
    <section class="content-header"> 
        <h1> List Kegiatan </h1>
    </section>

    <section class="content-header">
        <a href="<?php echo base_url('admin/kegiatan/form_tambah')?>"> <button class="btn btn-primary"> Tambah Kegiatan<i class="glyphicon glyphicon-plus"></i> </button></a>
        </button>
        
        <button class="btn btn-default" onclick="reload_table()">
            <i class="glyphicon glyphicon-refresh"> </i>
            Refresh Tabel
        </button>
    
    </section>

    <section class="content">
        <div class="col-xs-12">
            <!-- box content here -->
            <div class="row">
                    <div class="box">
                        <div class="box-body">
                                <div class="row">
                                    <div class="col-sm-12">       
                                    <table id="tabel-kegiatan" class="table table-bordered table-responsive dataTable" >
                                        <thead>
                                            <tr>
                                                
                                                <th style="width:5%;"> ID_Kegiatan </th>
                                                <th style="width: 20%;"> Judul Kegiatan </th>
                                                <!-- <th style="width: 30%;"> Deskripsi </th> -->
                                                <th style="width: 10%;">Tanggal </th>
                                                <th style="width: 10%;"> Aksi </th>
                                            </tr>
                                        </thead>

                                        <tfoot>
                                            
                                            <th style="width:5%;"> ID_Kegiatan </th>
                                            <th style="width: 20%;"> Judul Kegiatan </th>
                                            <!-- <th style="width: 30%;"> Deskripsi </th> -->
                                            <th style="width: 10%;">Tanggal </th>
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



<script src="<?php echo base_url()?>assets-admin/bower_components/ckeditor/ckeditor.js"></script>

<script>
    //define site_URL for external javascript
    var site_URL = "<?php echo site_url(); ?>";
</script>
