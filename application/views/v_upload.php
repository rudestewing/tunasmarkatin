<?php echo validation_errors(); ?>

<?php echo form_open('admin/test/tambah');?>
    judul <br>
    <input type="text" name="judul"> <br>

    deskripsi <br>
    <textarea name="deskripsi" id="" cols="30" rows="10"></textarea> <br>

    <input type="submit" name="submit" value="submit">
<? echo form_close();  ?>

