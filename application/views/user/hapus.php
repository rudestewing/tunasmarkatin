<button type="button" data-toggle="modal" data-target="#hapus" class="btn btn-danger"><i class="fa fa-trash"></i></button></td>
                <!-- Modal -->
              <div class="modal fade" id="hapus" role="dialog">
                <div class="modal-dialog">
    
              <!-- Modal  -->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Yakin Menghapus <?php echo $user['nama_user'] ?> ?</h4>
                    </div>
                <div class="modal-footer">
                    <a href="<?php echo base_url('admin/user/hapus/'.$user['id_user']) ?>"><button type="submit" value="submit" class="btn btn-danger" >Hapus</button></a>
                  </div>
              </div>
s