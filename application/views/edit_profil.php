<div class="page-header">
    <h1>Sunting Profil</h1>
</div>

<?php foreach($pengguna->result() as $row){?>
<div class="row">
  <div class="col-md-4">
    <center><img src="<?php echo base_url();?>upload/img/<?php echo $row->userfile;?>" class="img-responsive" alt="Responsive image"></center>
  </div>
  <div class="col-md-8">
  <table class="table table-hover">
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><?php echo $row->nama;?></td>
        </tr>
        <tr>
            <td>NIP</td>
            <td>:</td>
            <td><?php echo $row->nip;?></td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td><?php echo $row->jabatan;?></td>
        </tr>
        <tr>
            <td>Golongan</td>
            <td>:</td>
            <td><?php echo $row->golongan;?></td>
        </tr>
        <tr>
            <td>Bagian</td>
            <td>:</td>
            <td><?php echo $row->bagian;?></td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td><?php echo $row->jabatan;?></td>
        </tr>
  </table>
    <form action="<?php echo base_url();?>pegawai/update_profil" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label>Alamat</label>
        <textarea class="form-control" name="alamat" rows="3"><?php echo $row->alamat;?></textarea>
      </div>
      <div class="form-group">
        <label>No. Handphone</label>
        <input type="text" name="no_hp" class="form-control" placeholder="No. Handphone" value="<?php echo $row->no_hp;?>" >
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $row->email;?>" >
      </div>
      <div class="form-group">
        <label>Foto</label>
        <input type="file" name="userfile">
        <p class="help-block">Example block-level help text here.</p>
      </div>
      <input type="hidden" name="nip" value="<?php echo $row->nip;?>">
      <button type="submit" class="btn btn-success"><i class="fa fa-edit fa-fw"></i> Kirim</button>
    </form>
  </div>
</div>
  <?php
    }
    ?>  

