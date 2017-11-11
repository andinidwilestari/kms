<?php
    foreach($motor_byid->result() as $row)
    {
?>
<div class="page-header">
    <h2>Edit Foto Utama <?php echo $row->nama_motor ?></h2>
</div>

<div class="row">
    <img src="<?php echo base_url();?>upload/img/<?php echo $row->foto_motor ?>" class="img-responsive" />    
    <form role="form" action="<?php echo base_url();?>motor/ubah_foto_utama" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="file" name="userfile" required="">
            <input type="hidden" name="id_motor" value="<?php echo $row->id_motor ?>" />
        </div>
        <button type="submit" class="btn btn-primary">Ubah</button>
    </form> 
</div>
<?php
    }
?>