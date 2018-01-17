//document ready 
$(document).ready(function(){
    $('#tabel-kegiatan').dataTable({
      "paging":true,
      "processing":true,
      "serverSide":true,
      "order":[],
      "ajax":{
          url:site_URL + "admin/kegiatan/fetch_kegiatan",
          type:"POST",
          dataType:"json"
      },
      "columns":[
          {"data":"id_kegiatan"},
          {"data":"judul"},
          {"data":"tanggal_kegiatan"},
          {"data":"action"}
      ],
      
      "columnDefs":[
          {
                "targets":[1,3],
                "orderable":false,    
            },
      ],
    });

    $('#tanggal_kegiatan').datepicker({
      autoclose: true,
      dateFormat: 'yy-mm-dd'
    });

    $('.deskripsi_kegiatan_wysihtml5').wysihtml5();

    $('#tabel-gambar-kegiatan').dataTable({
      "bLengthChange": false,
      "searching":false,
      "scrollY":"300px",
      "scrollCollapse":true,
      "pagging":false,
      "processing":true,
      "serverside":true,
      "order":[],
      "ajax":{
        url: site_URL + "admin/kegiatan/fetch_gambar",
        type: "POST",
        dataType: "json",
      },
      
      "columns":[
        {"data":"no"},
        // {"data":"id_kegiatan"},
        {"data":"gambar"},
        {"data":"action"},
      ],
      "columnDefs":[
        {
              "targets":[0,1,2],
              "orderable":false,    
          },
      ]
    });


    $('#upload').on('click',function(){
      var file_data = $('#gambar').prop('files')[0];
      var form_data = new FormData();
      form_data.append('gambar',file_data);
      $.ajax({
        url:site_URL + '/admin/kegiatan/upload_gambar',
        dataType:'text',
        cache:false,
        contentType:false,
        processData:false,
        data:form_data,
        type:'post',
        success:function(response){
          $('#msg_upload').html(response);
          reload_table_gambar();
          $('#gambar').val('');
        },
        error:function(response){
          $('#msg_upload').html(response);
          
        }
      })

    });


});


function reload_table()
{
  $('#tabel-kegiatan').DataTable().ajax.reload(null,false);

}

  //fungsi input kegiatan 
function save()
{
  $.ajax({
    url : site_URL + 'admin/kegiatan/tambah',
    type : 'post',
    data : $('#form-kegiatan').serialize(),
    dataType:'json',
    success : function(data){
      if(data.status === "true" ){
        alert('Data Berhasil Di Input');
      } else if(data.status === "false"){
        $.each(data.msg, function(key,value){
          var element = $('#message_'+key);
          $(element).html(value); 
        });
          alert('Gagal'); 
      }        
    }
  });
}


function update()
{
  $.ajax({
    url : site_URL + 'admin/kegiatan/update',
    type : 'post',
    data : $('#edit-kegiatan').serialize(),
    dataType:'json',
    success : function(data){
      if(data.status === "true" ){
        alert('Data Berhasil Di Input');
        // alert(data.status);
        $('#content-edit-kegiatan').hide();
      } else if(data.status === "false"){
        $.each(data.msg, function(key,value){
          var element = $('#message_'+key);
          $(element).html(value); 
        });
          alert('Gagal'); 
          // alert(data.status);
      }        
    }
  });
}



function reload_table_gambar()
{
  $('#tabel-gambar-kegiatan').DataTable().ajax.reload(null,false);

}


function hapus_gambar($id)
{
    if(confirm('Yakin mau di hapus?')){
      $.ajax({
        url : site_URL + 'admin/kegiatan/hapus_gambar/' +  $id,  
        type: "POST",
        dataType:"json",
        success:function(data){
          if(data.status=='true'){
            alert('berhasil di hapus');
            reload_table_gambar();
          }
        }
      });
    }
}

function hapus_kegiatan(id_kegiatan)
{
  url = "/admin/kegiatan/hapus/";
  if(confirm('Yakin mau di hapus?')){
    $.ajax({
      url : site_URL + url + id_kegiatan,
      type: "POST",
      dataType: "JSON",
      success : function(data){
        if(data.status=='true'){
          alert(data.status);
          reload_table();
        }
      }
    });
  }
}





