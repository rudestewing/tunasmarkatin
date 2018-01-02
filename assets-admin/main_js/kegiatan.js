
$(document).ready(function(){

      $('#tabel-kegiatan').dataTable({
        "processing":true,
        "serverSide":true,
        "order":[],
        "ajax":{
             url:site_URL + "admin/kegiatan/fetch_kegiatan",
             type:"POST"
        },
        "columnDefs":[
             {
                  "targets":[-1],
                  "orderable":false,
             },
        ],
      });


      //Datemask dd/mm/yyyy
      $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
      // //Datemask2 mm/dd/yyyy
      // $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
      // //Money Euro
      $('[data-mask]').inputmask()
  
      //Date picker
      $('#tanggal_kegiatan').datepicker({
        autoclose: true
        
      })

      //bootstrap WYSIHTML5 - text editor
       $('.deskripsi_kegiatan').wysihtml5({
        "font-styles":true,
        "emphasis":true,
        "image":false
        
       })

  });

