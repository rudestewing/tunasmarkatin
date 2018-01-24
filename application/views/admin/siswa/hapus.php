<button class="btn btn-danger" data-toggle="modal" data-target="#Hapus<?php echo $user['id_siswa']; ?>"><i class="fa fa-trash"></i></button>

<div class="modal fade" id="Hapus<?php echo $user['id_siswa']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Hapus Data Kategori Berita</h4>
            </div><div class="clearfix"></div>
            <div class="modal-body">
                <div class="alert">
                    Yakin ingin memecat  <b><?php echo $user['nama_siswa']; ?></b> ?
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-undo"></i> Batalkan</button>
                <a href="<?php echo base_url('admin/siswa/hapus/' . $user['id_siswa']); ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Ya, Pecat Dia!</a>
            </div>
        </div>
    </div>
</div>