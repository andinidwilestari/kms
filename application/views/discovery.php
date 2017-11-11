<div class="page-header">
    <h1>Bagikan Dokumen</h1>
</div>

<div class="row">
    <div class="col-md-9">
        <form action="<?php echo base_url();?>pegawai/input_discovery" method="post" enctype="multipart/form-data" >
          <?php foreach($pengguna->result() as $row){?>
          <input type="hidden" name="nip" value="<?php echo $row->nip;?>">
           <?php
             }
           ?>  
          <div class="form-group">
            <label>Judul Berkas</label>
            <input type="text" class="form-control" name="judul" placeholder="Judul Berkas">
          </div>
          <div class="form-group">
            <label>Kategori</label>
            <select class="form-control" name="kategori">
               <option value="tacit">Tacit</option>
                  <option value="explicit">Explicit</option>
             </select>
          </div>
          <div class="form-group">
            <label>Keterangan</label>
            <textarea id="summernote" name="keterangan"></textarea>
          </div>
          <div class="form-group">
          <label>Unggah Berkas</label>
            <input type="file" name="userfile">
            <p class="help-block">Ekstensi berkas yang diunggah adalah .pdf</p>
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

<script>
    $('#summernote').summernote({
      toolbar: [
        // [groupName, [list of button]]
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']]
      ]
    });
</script>