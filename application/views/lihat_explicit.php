<div class="page-header">
    <h1>Explicit</h1>
</div>

<?php
foreach($data_explicit->result() as $row)
        {
            $nip = $row->nip;
            $id_explicit = $row->id_explicit;
            if($id_explicit != 1)
            {
?>  

<div class="row">
<?php if(($this->session->userdata('nip') == $nip) || ($this->session->userdata('level') == 'Admin')){ ?>
<div class="btn-group" role="group">
    <a class="btn btn-success" href="<?php echo base_url();?>pegawai/edit_explicit/<?php echo $row->id_explicit?>"><i class="fa fa-edit fa-fw"></i> Sunting</a>
    <a class="btn btn-success" href="<?php echo base_url();?>pegawai/hapus_explicit/<?php echo $row->id_explicit?>"><i class="fa fa-trash fa-fw"></i> Hapus</a>
</div>
<?php
}
?>
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
    <tr>
        <td>Kategori</td>
        <td>:</td>
        <td><?php echo $row->kategori;?></td>
    </tr>
    <tr>
        <td>Keterangan</td>
        <td>:</td>
        <td><?php echo $row->keterangan;?></td>
    </tr>
    <tr>
        <td>Link Unduh Dokumen</td>
        <td>:</td>
        <td><a href="<?php echo base_url(); ?>upload/pdf/<?php echo $row->dokumen;?>" target="_blank"  title="<?php echo $row->judul;?>"><?php echo $row->dokumen;?></a></td>
    </tr>
</table>
</div>

<?php
        }
    }
?>


<div class="row">
    <div class="col-md-8">
        <h4><b>Komentar</b></h4>
        <form method="post" enctype="multipart/form-data" >
        <?php
            foreach($pengguna->result() as $row)
            {
        ?>
        <input type="hidden" id="nip" name="nip" value="<?php echo $row->nip;?>">
        <input type="hidden" id="nama" name="nip" value="<?php echo $row->nama;?>">
        <?php
            }
        ?>
        <?php
            foreach($data_explicit->result() as $row)
            {
        ?> 
          <input type="hidden" id="id_explicit" name="id_explicit" value="<?php echo $row->id_explicit;?>">
        <?php
            }
        ?>
          <div class="form-group">
             <textarea name="komentar" id="komentar" class="form-control" rows="3"></textarea>
          </div>
          <input type="hidden" id="id_tacit" name="id_tacit" value="1">
          <input type="hidden" id="waktu" name="waktu" value="<?php echo date('Y-m-d H:i:s');?>">
          <button type="submit" id="comment_button" class="btn btn-success"><i class="fa fa-check fa-fw"></i> Kirim</button>
        </form>
    </div>  
</div>
<br />


<div class="row">
    <div id="munculkomen">
        <div class="col-sm-8 pre-scrollable">
        <?php
            $no=1;
            foreach($komentar_explicit->result() as $row)
            {
        ?> 
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong><a href="<?php echo base_url();?>pegawai/profiluser/<?php echo $row->nip;?>" title=""><?php echo $row->nama;?></a></strong> <span class="text-muted"> mengomentari pada <?php echo $row->waktu; ?></span>
                <?php if(($this->session->userdata('nip') == $nip) || ($this->session->userdata('nip') == $row->nip)){ ?>
                    <button type="button" class="close" aria-label="Close">
                      <span aria-hidden="true"><a href="<?php echo base_url();?>pegawai/hapus_komentar_explicit/<?php echo $row->id_komentar;?>" title="Hapus Komentar">&times;</a></span>
                    </button>
                <?php
                    }
                ?>
                </div>
                <div class="panel-body">
                    <?php echo $row->komentar; ?>
                </div>
            </div>
        <?php
            $no++;
        }
        ?>
        </div>
    </div>    
</div>


<script>
    $("#comment_button").click(function() 
    {
        var komentar = $("#komentar").val();    
        var form_data = 
        {
            komentar: $("#komentar").val(),
            nip: $("#nip").val(),
            nama: $("#nama").val(),
            id_tacit: $("#id_tacit").val(),
            id_explicit: $("#id_explicit").val(),
            waktu: $("#waktu").val()
        };   
    if(komentar=='')
    {
        alert("Isi komentar terlebih dahulu");
    }
    else
    {
        $.ajax(
        {
          type: "POST",
          url: "<?= site_url('pegawai/komentar') ?>",
          data: form_data,
          cache: false,
          success: function()
          {
            $("<div class='col-sm-8'><div class='panel panel-default'><div class='panel-heading'><strong>" + form_data.nama + "</strong> mengomentari pada " + form_data.waktu + "</span></div><div class='panel-body'>" + form_data.komentar + "</div></div></div>").prependTo("#munculkomen").hide().slideDown();
            $("#komentar").val('');	
            $("#komentar").focus();
          }
        });
    }
    return false;
});
</script>