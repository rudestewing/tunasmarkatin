<div class="content-wrapper">
    <section class="content-header">

    	<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo $header; ?>
			</div>
			<div class="panel-body">
				<div class="col-md-4">
					<img style="max-height: 500px;" src="<?php echo base_url('assets/upload/path_foto/' . $guru
['path_foto']); ?>" alt="Gambar Profil" class="img-thumbnail" width="100%"><br>
					<button class="btn btn-block square-btn-adjust btn-info"><?php echo ucfirst($guru
['nama_guru']); ?></button>
				</div>
				<div class="col-md-8">
					<div class="form-group">
						<label for="username">NIP</label>
						<p><?php echo $guru["nip_guru"]; ?></p>
					</div>
					<div class="form-group">
						<label for="email">Alamat</label>
						<p><?php echo $guru["alamat"]; ?></p>
					</div>
					<div class="form-group">
						<label for="email">Facebook</label>
						<p>www.facebook.com/<?php echo $guru["facebook"]; ?></p>
					</div>
					<div class="form-group">
						<label for="email">Instagram</label>
						<p><?php echo $guru["instagram"]; ?></p>
					</div>
					<div class="form-group">
						<label for="email">Tempat tanggal lahir lahir</label>
						<p><?php echo ucfirst($guru["tempat_lahir"] ." ". $guru['tanggal_lahir']);?></p>
					</div>
					<div class="form-group">
						<label >Status</label>
						
						<p><?php echo ucfirst($guru["status"]); ?></p>
						</select>
					</div>
					
					<div class="form-group">
						<label for="tanggal">About Me</label>
						<p><?php echo $guru['about_me']; ?></p>
					</div>
				</div>

				<div class="form-group col-md-12">
					<div class="pull-right">
						<a href="<?php echo base_url('admin/guru/edit/
' . $guru['id_guru']); ?>" class="btn btn-default"><i class="fa fa-edit"></i></a>
						<a href="<?php echo base_url('admin/guru
'); ?>" class="btn btn-default"><i class="fa fa-undo"></i></a>
					</div>
				</div>
			</div>
		</div>

    </section>
</div>