<div class="page-header">
    <h1>Bagikan Masalah - Solusi</h1>
</div>

<div class="row">
    <div class="col-md-9">
        <form action="<?php echo base_url();?>pegawai/input_capture" method="post" >
          <?php foreach($pengguna->result() as $row){?>
          <input type="hidden" name="nip" value="<?php echo $row->nip;?>">
           <?php
             }
           ?>  
          <div class="form-group">
            <label>Judul</label>
            <input type="text" class="form-control" name="judul" placeholder="Judul">
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
            <textarea class="summernote" name="masalah" ></textarea>
          </div>
          <div class="form-group">
            <label>Solusi</label>
            <textarea class="summernote" name="solusi"></textarea>
          </div>
          <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i> Kirim</button>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
      $('.summernote').summernote();
    });
</script>
