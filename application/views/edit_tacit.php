<div class="page-header">
    <h1>Sunting Data Masalah - Solusi</h1>
</div>
<?php 
    foreach($data_tacit->result() as $row)
    {
        $nip = $row->nip;
        if(($this->session->userdata('nip') == $nip) || ($this->session->userdata('level') == 'Admin')){
?>
<div class="row">
    <div class="col-md-9">
        <form action="<?php echo base_url();?>pegawai/update_knowledge" method="post" >
        <input type="hidden" name="id_tacit" value="<?php echo $row->id_tacit;?>">
          <div class="form-group">
            <label>Judul</label>
            <input type="text" class="form-control" name="judul" value="<?php echo $row->judul;?>" placeholder="Judul">
          </div>
          <div class="form-group">
            <label>Kategori</label>
            <select class="form-control" name="kategori">
               <option value="tacit">Tacit</option>
                  <option value="explicit">Explicit</option>
            
            </select>
          </div>
          <div class="form-group">
            <label>Masalah</label>
            <textarea class="summernote" name="masalah"><?php echo $row->masalah;?></textarea>
          </div>
          <div class="form-group">
            <label>Solusi</label>
            <textarea class="summernote" name="solusi"><?php echo $row->solusi;?></textarea>
          </div>
          <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i> Kirim</button>
        </form>
    </div>
</div>
<?php
    }
    }
?>

<script>
    $(document).ready(function() {
      $('.summernote').summernote();
    });
</script>
