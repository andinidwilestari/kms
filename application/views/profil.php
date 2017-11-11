
<div class="page-header">
    <h1>Profil Anda</h1>
</div>



<div class="row">
  <div class="col-md-4">
<?php foreach($pengguna->result() as $row)
    {
?>
    <center><img src="<?php echo base_url();?>upload/img/<?php echo $row->userfile;?>" class="img-responsive" alt="Responsive image"></center>
  </div>
  <div class="col-md-8">
    <table class="table table-hover">
        <tr>
            <td>Nama </td>
            <td>:</td>
            <td><?php echo $row->nama;?></td>
        </tr>
        <tr>
            <td>NIP</td>
            <td>:</td>
            <td><?php echo $row->nip?></td>
        </tr>
        <tr>
            <td>Golongan</td>
            <td>:</td>
            <td><?php echo $row->golongan?></td>
        </tr>
        <tr>
            <td>Bagian</td>
            <td>:</td>
            <td><?php echo $row->bagian?></td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td><?php echo $row->jabatan?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><?php echo $row->alamat?></td>
        </tr>
        <tr>
            <td>No. Handphone</td>
            <td>:</td>
            <td><?php echo $row->no_hp?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td><?php echo $row->email?></td>
        </tr> 
        <tr>
            <td>Jumlah Tacit</td>
            <td>:</td>
            <td>
                <?php 
                    echo $jumlah_tacit->num_rows();
                ?>
                buah
            </td>
        </tr>
        <tr>
            <td>Jumlah Explicit</td>
            <td>:</td>
            <td>
                <?php 
                    echo $jumlah_explicit->num_rows();
                ?>
                buah
            </td>
        </tr>
    </table>
    <a class="btn btn-success" href="<?php echo base_url();?>pegawai/edit_profil/<?php echo $row->nip?>"><i class="fa fa-user fa-fw"></i> Sunting Profil</a>
    <a class="btn btn-success" href="<?php echo base_url();?>pegawai/edit_pass/<?php echo $row->nip?>"><i class="fa fa-edit fa-fw"></i> Sunting Password</a>
  </div>
</div>
    <?php
    }
    ?>  