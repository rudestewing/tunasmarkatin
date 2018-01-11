
  

  function hapus_kegiatan(id_kegiatan){
    url = "/admin/kegiatan/hapus/";
    if(confirm('Yakin mau di hapus?')){
      $.ajax({
        url : site_URL + url + id_kegiatan,
        type: "POST",
        dataType: "JSON",
        success : function(data){
          if(data.status=='true'){
            alert(data.status);
          }
        }
      });
    }
  }




//document ready 
$(document).ready(function(){
  $('#tabel-kegiatan').dataTable({
    "paging":true,
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
  $('#tanggal_kegiatan').datepicker({
    autoclose: true,
    dateFormat: 'yy-mm-dd'
  })
  $('.deskripsi_kegiatan_wysihtml5').wysihtml5();
});

 

function reload_table(){
  $('#tabel-kegiatan').DataTable().ajax.reload(null,false);

}


















  // var save_method ;
  // var url;
  // function tambah_kegiatan(){
  //   //deklarasi save method untuk tambah
  //   save_method = 'tambah';
  //   // //bersihkan form dan error
  //   $('#form-kegiatan')[0].reset();
  //   $('#modal-kegiatan').modal('show');
  //   $('.modal-title').html('<h4>Tambah Kegiatan</h4>');
  // }

  // function edit_kegiatan(){
  //   //deklarasi save method untuk mengupdate
  //   save_method = 'update';

  // }




//useless upload file pakai Ajax

  // function save(){
  //   if(save_method == 'tambah' ){
  //     url = "admin/kegiatan/tambah";
  //   } else if( save_method == 'update'){
  //     url = "admin/kegiatan/update";
  //   }
  
  //   var formData = new FormData($('#form-kegiatan'));
  //   $.ajax({
  //     url : site_URL + url,
  //     type : "POST",
  //     data : formData,
  //     processData:false,
  //     cache : false,
  //     contentType:false,
  //     success : function(data){
  //       if(data.status === "true" ){
  //         alert('ata Berhasil Di Input');
  //         $('#modal-kegiatan').modal('hide');
  //       } else if(data.status === "false"){
  //         $.each(data.msg, function(key,value){
  //           var element = $('#message_'+key);
  //             $(element).html(value); 
  //           });
  //         alert('Gagal');
  //       }        
  //     }
  //   });
  // }


// $('#form-kegiatan').submit(function(e){
//   e.preventDefault();
//   var formData = new FormData(this);
//   //alert($('#judul').val());
//   $.ajax({
//     url : site_URL + "admin/kegiatan/tambah",
//     type: "POST",
//     data:formData,
//     success : function(data){
//       if(data.status === "true" ){
//         alert('ata Berhasil Di Input');
//         $('#modal-kegiatan').modal('hide');
//       } else if(data.status === "false"){
//         $.each(data.msg, function(key,value){
//           var element = $('#message_'+key);
//             $(element).html(value); 
//           });
//         alert('Gagal');
//       }        
//     },
//     cache : false,
//     contentType:false,
//     processData:false 
//   })
// });
