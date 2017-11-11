<div class="page-header">
    <h1>Sunting Data Dokumen</h1>
</div>

<?php
foreach($data_explicit->result() as $row)
        {
            $nip = $row->nip;
            if(($this->session->userdata('nip') == $nip) || ($this->session->userdata('level') == 'Admin')){
?>  

<div class="row">
    <div class="col-md-9">
        <h4><b><?php echo $row->judul;?></b></h4>
        <table class="table table-hover">
            <tr>
                <td>Pengirim</td>
                <td>:</td>
                <td><a href="<?php echo base_url();?>pegawai/profiluser/<?php echo $row->nip;?>" title=""><?php echo $row->nama;?></a></td>
            </tr>
            <tr>
                <td>Diterbitkan pada</td>
                <td>:</td>
                <td><?php echo $row->waktu;?></td>
            </tr>
        </table>
        <form method="post" action="<?php echo base_url();?>pegawai/update_explicit" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_explicit" value="<?php echo $row->id_explicit;?>" />
            <div class="form-group">
                <label>Judul Berkas</label>
                <input type="text" class="form-control" name="judul" placeholder="Judul Berkas" value="<?php echo $row->judul;?>">
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
                <textarea id="summernote" name="keterangan"><?php echo $row->keterangan;?></textarea>
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

<?php
        }
    }
?>


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